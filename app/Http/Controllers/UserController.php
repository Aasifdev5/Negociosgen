<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Mail\ComposeMail;
use App\Models\TimeLog;
use App\Mail\SendMailreset;
use App\Models\BankDetails;
use App\Models\BillingDetail;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Campaign;
use App\Models\ProductVariations;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\GeneralSetting;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\PasswordReset;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Related_product;
use App\Models\Role;
use App\Models\User;
use App\Models\Wishlist;
use App\Notifications\NewUserRegisteredNotification;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\UserRegisteredNotification;
use App\Notifications\VerifyEmailNotification;
use App\Traits\SendNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


function getIp()
{
    $ip = null;
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
    } else {
        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
    }
    return $ip;
}

class UserController extends Controller
{
    use SendNotification;



    public function home()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();
        $general_setting = GeneralSetting::find('1');
        return view('index', compact('user_session',  'general_setting', 'pages'));
    }

    public function ganancias()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();


        $pages = Page::all();
        return view('ganancias', compact('user_session', 'pages'));
    }
    public function fondo()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();
        return view('fondo', compact('user_session', 'pages'));
    }
    public function tarjeta()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();
        return view('tarjeta', compact('user_session', 'pages'));
    }
    public function transferencia()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();
        return view('transferencia', compact('user_session', 'pages'));
    }
    public function Userlogin()
    {
        $pages = Page::all();
        return view('login', compact('pages'));
    }
    public function admin()
    {
        return view('admin.admin');
    }
    public function signup()
    {
        $pages = Page::all();
        return view('register', compact('pages'));
    }


    public function registration(Request $request)
    {
        $user = new User();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'max:30'],

            'mobile_number' => 'required'
        ]);
        $mobileNumber = $request->mobile_number;
        $prefixedMobileNumber = "591" . $mobileNumber;

        // Create a new user instance
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

            'mobile_number' => $prefixedMobileNumber,
            'ip_address' => getIp(),
        ]);

        // Send email verification notification
        $user->notify(new VerifyEmailNotification($user));
        // Fire the UserRegistered event
        // event(new UserRegistered($user));
        $text = 'A new user has registered on the platform.';
        $target_url = route('users');
        $this->sendForApi($text, 1, $target_url, $user->id, $user->id);
        $pages = Page::all();
        if ($user) {
            return view('feedback', compact('user', 'pages'));
        } else {
            return back()->with('fail', 'failed');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($request->password == $user->password) {
                if ($user->email_verified_at === null) {
                    return back()->with('fail', 'Your account is not verified. Please verify your email.');
                }

                $user->update(['is_online' => 1, 'last_seen' => Carbon::now('UTC')]);
                $request->session()->put('LoggedIn', $user->id);
                $userId = Session::get('LoggedIn');
                // Create a new time log entry with UTC timestamp
                TimeLog::create([
                    'user_id' => $userId,
                    'start_time' => Carbon::now('America/La_Paz'),

                ]);
                return redirect('home');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'Email is not registered');
        }
    }
    public function ProductDetail($slug)
    {
        if (Session::has('LoggedIn')) {
            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $product = Product::where('slug', $slug)->first();
            $IsVariation = ProductVariations::where('product_id', $product->id)->orderBy('id', 'asc')->first();
            if (!empty($IsVariation)) {
                $IsVariationProductDetails  = Product::where('sku', $IsVariation->sku)->first();
            } else {
                $IsVariationProductDetails = '';
            }


            $latestProductId = $product->id;
            $related_products = DB::table('products')
                ->join('related_products', 'products.id', '=', 'related_products.related_item_id')
                ->select('related_products.id as related_id', 'products.title', 'products.id', 'products.f_thumbnail', 'products.slug', 'products.price1', 'products.price2', 'products.price3', 'products.price4', 'products.price5')
                ->where('related_products.product_id', $product->id)
                ->orderBy('related_products.id', 'desc')
                ->paginate(15);

            $general_setting = GeneralSetting::find('1');
            return view('product_detail', compact('product', 'user_session', 'related_products', 'general_setting', 'pages', 'latestProductId', 'IsVariationProductDetails'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function MyOrders()
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            // Fetch orders with related order items, products, and payment status
            $orders = Order::where('orders.user_id', Session::get('LoggedIn'))
                ->leftJoin('payments', 'orders.id', '=', 'payments.order_id')

                ->with(['orderItems' => function ($query) {
                    $query->with('product');
                }])
                ->select('orders.id', 'orders.created_at', 'orders.total_amount', 'payments.accepted')
                ->get();



            $general_setting = GeneralSetting::find('1');
            return view('my_orders', compact('user_session',  'general_setting', 'pages', 'orders'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    function userNotifications()
    {
        $notifications = Notification::where('user_type', 2)
            ->where('is_seen', 'no')
            ->orderByDesc('created_at')
            ->paginate(5);
        return response()->json($notifications);
    }
    public function checkout()
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $qrcode =  BankDetails::orderby('id', 'desc')->first();
            $carts = Cart::where('user_id', Session::get('LoggedIn'))->get();
            $general_setting = GeneralSetting::find('1');
            return view('checkout', compact('user_session',  'general_setting', 'pages', 'carts', 'qrcode'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function term()
    {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $general_setting = GeneralSetting::find(1);

            // Pass the order ID to the success view for triggering the PDF download
            return view('term', compact('user_session', 'general_setting', 'pages'));

    }


    public function clearCart()
    {
        $userId = Session::get('LoggedIn');
        Cart::where('user_id', $userId)->delete();

        return redirect()->back()->with('success', '¡El carrito ha sido vaciado con éxito!');
    }
    public function clearWishlist()
    {
        $userId = Session::get('LoggedIn');
        Wishlist::where('user_id', $userId)->delete();

        return redirect()->back()->with('success', '¡Lista de deseos vaciada con éxito!');
    }
    public function Billingstore(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $billingDetail = BillingDetail::create([
            'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);

        // Redirect to the next step or show success message
        return redirect()->route('next.step')->with('success', 'Billing details saved successfully!');
    }
    public function verification()
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $general_setting = GeneralSetting::find('1');
            return view('verification', compact( 'user_session',  'general_setting', 'pages'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function blog_detail(Request $request)
    {



        $project_detail = Blog::where('id', $request->id)->first();
        $category = Category::all();
        $countries = Country::all();
        $pages = Page::all();
        $general_setting = GeneralSetting::find('1');
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        // dd($request->id);
        return view('blog_detail', compact('countries', 'user_session', 'project_detail', 'category', 'general_setting', 'pages'));
    }
    public function storeLikes(Request $request)
    {



        // Create a new Like record
        $data = Like::create([
            'project_id' => $request->projectId,
        ]);
        // dd($data);
        // Get the updated like count for the project
        $likeCount = Like::where('project_id', $request->projectId)->count();

        // Return response (optional)
        return response()->json([
            'success' => true,
            'likeCount' => $likeCount,
            'message' => 'Liked Successfully'
        ]);
    }

    public function checkLike(Request $request)
    {
        $projectId = $request->projectId; // Get the project ID
        $userId = Session::get('LoggedIn'); // Get the currently logged-in user ID

        // Check if user already liked the project
        $like = Like::where('project_id', $projectId)->exists();

        // Return response
        return response()->json([
            'liked' => $like,
        ]);
    }

    public function addpaymentmethod(Request $request)
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $pages = Page::all();
        return view('addpaymentmethod', compact('user_session', 'pages'));
    }
    public function ayuda(Request $request)
    {
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $pages = Page::all();
        return view('ayuda', compact('user_session', 'pages'));

    }
    public function sendResetPasswordLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('fail', 'Email address not found.');
        }
        $token = Str::random(40);


        $datetime = Carbon::now()->format('Y-m-d H:i:s');

        $token = PasswordReset::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => $datetime
            ]
        );

        // Send the password reset notification
        $user->notify(new ResetPasswordNotification($token));

        return back()->with('success', 'Password reset link sent successfully.');
    }

    public function dashboard()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $pages = Page::all();

            return view('dashboard', compact('user_session', 'pages'));
        }
    }
    public function welcome()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();


        $pages = Page::all();

        $general_setting = GeneralSetting::find('1');
        return view('welcome', compact('user_session', 'pages', 'general_setting'));
    }
    public function blogs()
    {

        $news = Blog::orderBy('id', 'DESC')->paginate(3);

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $data['blogComments'] = BlogComment::active();
        $blogComments = $data['blogComments']->whereNull('parent_id')->get();
        $pages = Page::all();
        $latest_posts = Blog::orderBy('id', 'DESC')->paginate(3);
        $general_setting = GeneralSetting::find('1');
        return view('ads', compact('user_session', 'latest_posts', 'news', 'pages', 'blogComments', 'general_setting'));
    }
    public function news_category($slug)
    {
        $news = DB::table('blogs')
            ->join('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')
            ->where('blog_categories.slug', $slug)
            ->select('blogs.*')
            ->get();

        // dd($news);
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $title = $slug;
        $data['blogComments'] = BlogComment::active();
        $blogComments = $data['blogComments']->whereNull('parent_id')->get();
        $pages = Page::all();
        $latest_posts = Blog::orderBy('id', 'DESC')->paginate(3);
        $general_setting = GeneralSetting::find('1');
        return view('news_category', compact('user_session', 'latest_posts', 'title', 'news', 'pages', 'blogComments', 'general_setting'));
    }
    public function blogCommentStore(Request $request)
    {
        $comment = new BlogComment();
        $comment->blog_id = $request->blog_id;
        $comment->user_id = $request->user_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->status = 1;

        if ($comment->save()) {
            // Retrieve updated comments for the specific blog
            $blogComments = BlogComment::active()
                ->where('blog_id', $request->blog_id)
                ->whereNull('parent_id')
                ->get();

            return response()->json([
                'success' => true,

            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function blogCommentReplyStore(Request $request)
    {
        if ($request->user_id && $request->comment) {
            $comment = new BlogComment();
            $comment->blog_id = $request->blog_id;
            $comment->user_id = $request->user_id;
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->comment = $request->comment;
            $comment->status = 1;
            $comment->parent_id = $request->parent_id;
            $comment->save();

            return response()->json([
                'success' => true,
                'message' => 'Comment successfully added.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store comment.',
            ]);
        }
    }

    public function searchBlogList(Request $request)
    {
        $data['blogs'] = Blog::active()->where('title', 'like', "%{$request->title}%")->get();


        return view('frontend.blog.render-search-blog-list', $data);
    }


    public function nosotros()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();


        return view('nosotros', compact('user_session', 'pages'));
    }
    public function contact()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();


        return view('contact', compact('user_session', 'pages'));
    }
    public function shop()
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];
            $products = Product::whereIn('category', $userCategories)
                ->whereNotIn('sku', function ($query) {
                    $query->select('sku')
                        ->from('product_variations');
                })
                ->orderBy('id', 'desc')
                ->paginate(9);



            $general_setting = GeneralSetting::find('1');
            return view('shop', compact('products', 'user_session',  'general_setting', 'pages'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function search(Request $request)
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];

            $query = $request->input('query');

            // Retrieve paginated products based on user categories and search query
            $products = Product::whereIn('category', $userCategories)
                ->when($query, function ($q) use ($query) {
                    // Apply search condition if query exists
                    $q->where('title', 'like', '%' . $query . '%');
                })
                ->whereNotIn('sku', function ($query) {
                    // Exclude products with SKUs found in product_variations table
                    $query->select('sku')->from('product_variations');
                })
                ->orderBy('id', 'desc') // Order by ID descending
                ->paginate(9); // Paginate with 9 products per page




            $general_setting = GeneralSetting::find('1');
            return view('search-results', compact('products', 'user_session',  'general_setting', 'pages'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function geanologìa(Request $request)
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();
       return view('geanologìa',compact('user_session'));
    }
    public function productbybrand($id)
    {
        if (Session::has('LoggedIn')) {
            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];
            $products = Product::whereIn('category', $userCategories)->where('brand_id', $id)
                ->whereNotIn('sku', function ($query) {
                    $query->select('sku')
                        ->from('product_variations');
                })
                ->orderBy('id', 'desc')
                ->paginate(9);

            $category = $id;
            $general_setting = GeneralSetting::find('1');
            return view('productbybrand', compact('products', 'user_session',  'general_setting', 'pages', 'category'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function productbyCategory($id)
    {
        if (Session::has('LoggedIn')) {
            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];
            $products = Product::whereIn('category', $userCategories)->where('category', $id)
                ->whereNotIn('sku', function ($query) {
                    $query->select('sku')
                        ->from('product_variations');
                })
                ->orderBy('id', 'desc')
                ->paginate(9);

            $category = $id;
            $general_setting = GeneralSetting::find('1');
            return view('productbyCategory', compact('products', 'user_session',  'general_setting', 'pages', 'category'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function productbySubCategory($category, $subcategory)
    {
        if (Session::has('LoggedIn')) {
            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];
            $products = Product::whereIn('category', $userCategories)->where('category', $category)->where('subcategory_id', $subcategory)
                ->whereNotIn('sku', function ($query) {
                    $query->select('sku')
                        ->from('product_variations');
                })
                ->orderBy('id', 'desc')
                ->paginate(9);

            $subcategory = $subcategory;
            $category = $category;
            $general_setting = GeneralSetting::find('1');
            return view('productbySubCategory', compact('products', 'user_session',  'general_setting', 'pages', 'subcategory', 'category'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function productbyChildCategory($category, $subcategory, $childcategory)
    {
        if (Session::has('LoggedIn')) {
            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];
            $products = Product::whereIn('category', $userCategories)->where('category', $category)->where('subcategory_id', $subcategory)->where('childcategory', $childcategory)
                ->whereNotIn('sku', function ($query) {
                    $query->select('sku')
                        ->from('product_variations');
                })
                ->orderBy('id', 'desc')
                ->paginate(9);

            $childcategory = $childcategory;
            $general_setting = GeneralSetting::find('1');
            return view('productbyChildCategory', compact('products', 'user_session',  'general_setting', 'pages', 'childcategory'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function getProducts(Request $request)
    {
        $searchTerm = $request->input('search');
        $categoryId = $request->input('category_id');

        // Fetch user session and categories
        $user_session = User::find(Session::get('LoggedIn'));

        $userCategories = $user_session->categories ? explode(',', $user_session->categories) : [];

        // Query products based on user's allowed categories
        $query = Product::whereIn('category', $userCategories);

        if (!empty($searchTerm)) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        if (!empty($categoryId) && $categoryId != 1) {
            $query->where('category', $categoryId);
        }

        // Exclude products with skus present in product_variations table
        $query->whereNotIn('sku', function ($subquery) {
            $subquery->select('sku')
                ->from('product_variations');
        });

        // Get products matching the query
        $products = $query->get();


        // Return JSON response with a 200 status code (assuming success)
        return response()->json($products, 200);
    }
    public function addToCart($price, $id, $quantity, $chooseSize)
    {
        $productSku = Product::where('id', $id)->first();

        if (!$productSku) {
            return back()->with('error', 'Product not found.');
        }

        $variation = ProductVariations::where('sku', $productSku->sku)->first();
        if (!empty($variation)) {
            $skuvariation = ProductVariations::where('product_id', $variation->product_id)
                ->where('size', $chooseSize)
                ->where('color', $variation->color)
                ->first();
            // Check if the result is null before accessing the sku property
            if ($skuvariation) {
                $skuvariation = $skuvariation->sku;
            } else {
                // Handle the case where no matching variation is found
                $skuvariation = $productSku->sku;
            }
        } else {
            $skuvariation = $productSku->sku;
        }

        // Check if a variation exists
        if ($variation) {
            $color = $variation->color;
        } else {
            $color = ''; // Handle the case where no variation is found
        }

        // Save into cart
        $saveIntoCart = Cart::create([
            'user_id' => Session::get('LoggedIn'),
            'product_id' => $id,
            'color' => $color,
            'price' => $price,
            'quantity' => $quantity,
            'size' => $chooseSize,
            'sku' => $skuvariation
        ]);

        return back()->with('success', 'El producto se añade al carrito.');
    }

    public function vBuyaddToCart($price, $id, $quantity, $chooseSize)
    {

        $productSku = Product::where('id', $id)->first();

        if (!$productSku) {
            return back()->with('error', 'Product not found.');
        }

        $variation = ProductVariations::where('sku', $productSku->sku)->first();

        if (!empty($variation)) {
            $skuvariation = ProductVariations::where('product_id', $variation->product_id)
                ->where('size', $chooseSize)
                ->where('color', $variation->color)
                ->first();

            if (!empty($skuvariation)) {
                $skuvariation = $skuvariation->sku;
            } else {
                $skuvariation = ProductVariations::where('product_id', $variation->product_id)
                    ->where('color', $variation->color)
                    ->first();

                $skuvariation = $skuvariation ? $skuvariation->sku : null;
            }
        } else {
            $skuvariation = $productSku->sku;
        }



        // Check if a variation exists
        if ($variation) {
            $color = $variation->color;
        } else {
            $color = ''; // Handle the case where no variation is found
        }


        // Save into cart
        $saveIntoCart = Cart::create([
            'user_id' => Session::get('LoggedIn'),
            'product_id' => $id,
            'color' => $color,
            'price' => $price,
            'quantity' => $quantity,
            'size' => $chooseSize,
            'sku' => $skuvariation
        ]);

        return redirect()->route('cart');
    }

    public function BuyaddToCart($price, $id, $quantity)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        $variation = ProductVariations::where('sku', $product->sku)->first();

        // Check if a variation exists
        if ($variation) {
            $color = $variation->color;
        } else {
            $color = ''; // Handle the case where no variation is found
        }

        // Save into cart
        $saveIntoCart = Cart::create([
            'user_id' => Session::get('LoggedIn'),
            'product_id' => $id,
            'color' => $color,
            'price' => $price,
            'quantity' => $quantity,
        ]);

        return redirect()->route('cart');
    }

    public function updateQuantity(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        // Validate the input
        $request->validate([
            'productId' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Update the quantity in the database
        $cartItem = Cart::where('product_id', $productId)->where('user_id', Session::get('LoggedIn'))->first();
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Cart item not found'], 404);
    }
    public function addToWishlist($price, $id)
    {
        $stock = Product::find($id);
        if (!empty($stock->is_stock)) {
            $stockcheck = $stock->is_stock;
        }
        if ($stock->is_stock == null || empty($stock->is_stock)) {
            $stockcheck = 0;
        }
        $saveIntoWishlist = Wishlist::create([
            'user_id' => Session::get('LoggedIn'),
            'product_id' => $id,
            'price' => $price,
            'is_stock' => $stockcheck,
        ]);
        return back()->with('success', 'El producto se añade a la lista de deseos.');
    }
    public function RemoveWish($id)
    {
        if (Session::has('LoggedIn')) {
            $wishItem = Wishlist::find($id);
            if ($wishItem) {
                $wishItem->delete();
                return redirect()->route('wishlist')->with('success', 'Artículo eliminado de la lista de deseos');
            } else {
                return redirect()->route('wishlist')->with('fail', 'Item not found in wishlist');
            }
        } else {
            return redirect()->route('login')->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function removeCart($id)
    {
        if (Session::has('LoggedIn')) {
            $cartItem = Cart::find($id);
            if ($cartItem) {
                $cartItem->delete();
                return redirect()->route('cart')->with('success', 'Artículo eliminado del carrito');
            } else {
                return redirect()->route('cart')->with('fail', 'Item not found in cart');
            }
        } else {
            return redirect()->route('login')->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    public function cart()
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];
            $products = Product::whereIn('category', $userCategories)->orderBy('id', 'desc')->paginate(4);

            $latest_products = Product::whereIn('category', $userCategories)
                ->whereNotIn('sku', function ($query) {
                    $query->select('sku')
                        ->from('product_variations');
                })
                ->orderBy('id', 'desc')->get();

            $carts = Cart::where('user_id', Session::get('LoggedIn'))->get();
            $general_setting = GeneralSetting::find('1');
            return view('cart', compact('products', 'user_session',  'general_setting', 'pages', 'latest_products', 'carts'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function ProjectStore(Request $request)
    {

        $rules = [
            'category' => 'required',
            'title' => 'required',
            'image' => 'required',

            'description' => 'required',
            // 'short_description' => 'required|max:200',
            'goal' => 'required',
            'end_method' => 'required',
            'country_id' => 'required',
        ];

        $this->validate($request, $rules);

        $user_id = Session::get('LoggedIn');

        $slug = unique_slug($request->title);
        if ($request->hasFile('image')) {

            // Handle new image upload
            $attribute = $request->file('image');
            $destination = 'Projects';

            // Generate unique filename
            $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();
            // Move uploaded file to the destination directory
            $attribute->move(public_path('uploads/' . $destination), $file_name);
            // Update image path
            $image = 'uploads/' . $destination . '/' . $file_name;
        }
        //feature image has been moved to update
        $data = [
            'user_id' => $user_id,
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => $slug,
            'image' => $image,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'campaign_owner_commission' => get_option('campaign_owner_commission'),
            'goal' => $request->goal,
            'min_amount' => $request->min_amount,
            'max_amount' => $request->max_amount,

            'end_method' => $request->end_method,
            'video' => $request->video,
            'feature_image' => '',
            'status' => 0,
            'country_id' => $request->country_id,
            'address' => $request->address,
            'is_funded' => 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $attribute = $request->file('og_image');
            $destination = 'meta';

            // Generate unique filename
            $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();
            // Move uploaded file to the destination directory
            $attribute->move(public_path('uploads/' . $destination), $file_name);
            // Update og_image path
            $data['og_image'] = 'uploads/' . $destination . '/' . $file_name;
        }

        $create = Campaign::create($data);
        $text = 'A new project has posted on the platform.';
        $target_url = url('project-details', ['slug' => $slug]);
        $this->sendForApi($text, 1, $target_url, $user_id, $user_id);

        // dd($request->all());
        if ($create) {
            return back()->with('success', 'Project Created');
        }

        return back()->with('fail', 'Something went wrong');
    }

    public function blog()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $pages = Page::all();
        return view('blog', compact('pages', 'user_session'));
    }
    public function course()
    {
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $pages = Page::all();
        return view('course', compact('pages', 'user_session'));
    }
    public function storeBack(Request $request)
    {

        // Store credit reload request
        $request->validate([
            'amount' => 'required|numeric',
            'payment_receipt' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $campaign_owner_user_id = Campaign::find($request->campaign_id)->user_id;
        $campaign_owner = User::find($campaign_owner_user_id);
        // dd($campaign_owner);
        $subject = "You have a new backer on your Campaign";
        $msg = str_ireplace("\r\n", "<br/>", "You have a new backer on your Campaign");

        // Assuming $name represents the name of the user
        $name = $campaign_owner->name;

        // Send email using the ComposeMail Mailable
        Mail::to($campaign_owner->email)->send(new ComposeMail($subject, $msg, $name));
        $text = "You have a new backer on your Campaign";
        $target_url = url('chat');

        $this->sendForApi($text, 2, $target_url, $campaign_owner_user_id, $request->user_id);
        $backer = User::find($request->user_id);
        $Payment = new Payment([
            'name' => $backer->name,
            'payer_email' => $backer->email,
            'user_id' => $request->user_id,
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'accepted' => false,
        ]);

        if ($request->hasFile('payment_receipt')) {
            $payment_receipt = $request->file('payment_receipt');
            $imageName = $payment_receipt->getClientOriginalName();
            $payment_receipt->move(public_path('payment_receipt'), $imageName);

            $Payment->payment_receipt = 'payment_receipt/' . $imageName;
        }


        $Payment->save();

        return redirect('dashboard')->with('success', 'Fund has request submitted');
    }

    public function WithdrawFunds()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('WithdrawFunds', compact('user_session'));
        }
    }

    public function change_password(Request $request)
    {

        $data = array();
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', '=', Session::get('LoggedIn'))->first();
        }
        $pages = Page::all();
        return view('change_password', compact('user_session', 'pages'));
    }
    public function update_password(Request $request)
    {


        $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        # Update the new Password
        $data = User::find($request->user_id);
        $data->password = ($request->new_password);
        $data->save();

        return back()->with('success', 'Successfully Updated');
    }
    public function save_address(Request $request)
    {


        $request->validate([
            'address' => 'required',
            'city' => 'required',
        ]);

        # Update the new Password
        $data = User::find($request->user_id);
        $data->address = ($request->address . ' ' . $request->city);
        $data->save();

        return back()->with('success', 'Successfully Updated');
    }

    public function updateLogoutTime(Request $request)
    {
        $userId = Session::get('LoggedIn');

        if ($userId) {
            $lastTimeLog = TimeLog::where('user_id', $userId)->latest()->first();
            if ($lastTimeLog) {
                // Use UTC for consistency
                $lastTimeLog->end_time = Carbon::now('America/La_Paz');
                $lastTimeLog->save();
            }
            $data = User::find(Session::get('LoggedIn'));
            $data->update(['is_online' => 0, 'last_seen' => Carbon::now('America/La_Paz')]);
            // Clear the session
            Session::forget('LoggedIn');

            // Check if the request expects JSON
            if ($request->wantsJson()) {
                return response()->json(['status' => 'updated']);
            }

            // Redirect as a fallback
            return redirect('/');
        }

        // Redirect if the user is not logged in
        return redirect('/');
    }

    public function logout(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $data = User::find(Session::get('LoggedIn'));
            if ($data) {
                $data->update(['is_online' => 0, 'last_seen' => Carbon::now('America/La_Paz')]);

                // Log the logout time
                $lastTimeLog = TimeLog::where('user_id', Session::get('LoggedIn'))->latest()->first();
                if ($lastTimeLog) {
                    // Update the end_time with the current UTC time
                    $lastTimeLog->update(['end_time' => Carbon::now('America/La_Paz')]);
                }
            }

            Session::forget('LoggedIn');
            $request->session()->invalidate();
            return redirect('/');
        }

        return redirect('/'); // In case session is not set
    }


    public function edit_profile()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $pages = Page::all();
            return view('edit_profile', compact('user_session', 'pages'));
        }
    }
    public function update_profile(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required',
            'email' => 'required|email|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if a new profile photo is provided
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $imageName = $profilePhoto->getClientOriginalName();

            // Move the uploaded file to the 'profile_photo' directory in the public path
            $profilePhoto->move(public_path('profile_photo'), $imageName);

            // Update the profile photo variable
            $profile = $imageName;
        } else {
            // If no new photo is provided, use the existing one
            $user = User::find($request->user_id);
            $profile = $user->profile_photo;
        }
        $mobileNumber = $request->mobile_number;
        $prefixedMobileNumber = "591" . $mobileNumber;

        // Update user data in the database
        $userUpdate = User::where('id', $request->user_id)->update([
            'name' => $request->name,
            'mobile_number' => $prefixedMobileNumber,
            'email' => $request->email,
            'profile_photo' => $profile,
        ]);

        if ($userUpdate) {
            return redirect('dashboard')->with('success', 'Profile Updated Successfully');
        } else {
            return back()->with('fail', 'Failed to update profile');
        }
    }

    public function forget_password()
    {
        $pages = Page::all();
        return view('forget_password', compact('pages'));
    }
    public function forget_mail(Request $request)
    {
        try {
            $customer = User::where('email', $request->email)->get();

            if (count($customer) > 0) {

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain . '/ResetPasswordLoad?token=' . $token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Password Reset";
                $data['body'] = "Please click on below link to reset your password.";
                $data['auth'] = "SkyForecastingTeam";

                Mail::to($request->email)->send(
                    new SendMailreset(
                        $token,
                        $request->email,
                        $data
                    )
                );


                $datetime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime
                    ]
                );
                return redirect('forget_password')->with('success', 'Please check your mail to reset your password');
                // return response()->json(['success' => true, 'msg' => 'Please check your mail to reset your password.']);
            } else {
                return redirect('forget_password')->with('fail', 'User not found');
                // return response()->json(['fail' => false, 'msg' => 'User not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function ResetPasswordLoad(Request $request)
    {

        $resetData =  PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($resetData) > 0) {
            $customer = User::where('email', $resetData[0]['email'])->get();
            $pages = Page::all();
            return view('ResetPasswordLoad', ['customer' => $customer], compact('pages'));
        }
    }



    public function ResetPassword(Request $request)
    {

        $request->validate([

            'email' => 'required',
            'password' => ['required', 'string', 'min:8', 'max:30'],
        ]);

        $data = User::where('email', $request->email)->first();

        $data->password = $request->password;
        $data->custom_password = $request->password;
        $data->update();

        PasswordReset::where('email', $data->email)->delete();

        echo "<h1>Successfully Reset Password</h1>";
        return redirect('Userlogin');
    }
}
