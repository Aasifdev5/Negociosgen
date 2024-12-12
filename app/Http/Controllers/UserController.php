<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Mail\ComposeMail;
use App\Mail\MarkdownMail;
use App\Mail\SendMailreset;
use App\Models\Audiobook;
use App\Models\BankDetails;
use App\Models\Banner;
use App\Models\BillingDetail;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\GeneralSetting;
use App\Models\Like;
use App\Models\MailTemplate;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\PasswordReset;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductVariations;
use App\Models\Related_product;
use App\Models\Role;
use App\Models\Sales;
use App\Models\SupportTicketQuestion;
use App\Models\TimeLog;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Withdrawal;
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
        $course = Course::orderBy('created_at', 'desc')->take(4)->get();  // Fetch 4 most recent courses
        $audiobook = Audiobook::orderBy('created_at', 'desc')->take(6)->get();  // Fetch 6 most recent audiobooks
        $brands = Brand::all();
        $pages = Page::all();

        return view('index', compact('user_session',   'pages', 'course', 'audiobook', 'brands'));
    }
    public function requestWithdrawal(Request $request)
    {
        $user = User::find($request->user_id);

        // Validar el monto de retiro
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // Verificar si el monto solicitado es mayor que el saldo disponible
        if ($request->amount > $user->balance) {
            return back()->with('fail', 'Saldo insuficiente.');
        }

        // Crear la solicitud de retiro
        Withdrawal::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
        ]);

        return back()->with('success', 'Solicitud de retiro enviada.');
    }

    public function ganancias()
    {


        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $sales = Sales::where('refer_id', $user_session->id)->with('user')->get();
        $pages = Page::all();
        return view('ganancias', compact('user_session', 'pages', 'sales'));
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
    public function signup(Request $request)
    {
        // Get all keys from the request
        $keys = array_keys($request->all());

        // Check if the keys array is not empty before accessing the first key
        $refer = request()->get('refer');
        $membershipType = request()->get('membership');

        // Fetch the necessary data
        $pages = Page::all();
        $countries = Country::all();
        $cities = City::all();

        // Pass the $refer value to the view
        return view('register', compact('pages', 'countries', 'cities', 'refer', 'membershipType'));
    }


    public function registration(Request $request)
    {
        // Validate input fields
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'max:30'],
            'mobile_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'country' => 'nullable|exists:countries,id',
            'city' => 'nullable|exists:cities,id',
            'refer' => 'nullable|string|max:255' // Optional referral field
        ]);

        // Handle mobile number with prefix
        $prefixedMobileNumber = "591" . $request->mobile_number;

        // Create a new user
        $user = User::create([
            'account_type' => 'affiliate',
            'membershipType' => $request->membershipType,
            'membership_status' => 'pending',
            'name' => trim($request->first_name . ' ' . $request->last_name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'custom_password' => $request->password, // Storing plain password is insecure; reconsider this
            'mobile_number' => $prefixedMobileNumber,
            'refer' => $request->refer,
            'ip_address' => getIp(), // Assuming getIpAddress is a defined method
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'birth_date' => $request->birth_date
        ]);

        if ($user) {
            // Send notification for registration
            $text = 'A new member has registered on the platform.';
            $target_url = route('users');
            $this->sendForApi($text, 1, $target_url, $user->id, $user->id);

            // Store user ID in session for further steps
            session(['LoggedIn' => $user->id]);

            return redirect('addpaymentmethod')->with([

                'user' => $user
            ]);
        }

        return back()->with('fail', 'User registration failed.');
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

                return redirect('dashboard');
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


            return view('product_detail', compact('product', 'user_session', 'related_products',  'pages', 'latestProductId', 'IsVariationProductDetails'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function requestW()
    {
        if (Session::has('LoggedIn')) {

            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();


            return view('requestsWithdraw', compact('user_session',   'pages'));
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

            return view('checkout', compact('user_session',   'pages', 'carts', 'qrcode'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function recursos(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $pages = Page::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $course = Course::orderBy('created_at', 'desc')->take(4)->get();

            $query = $request->input('query');

            // Fetch blogs, filtering by the search query if it exists
            $blogs = Blog::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                    ->orWhere('short_description', 'like', '%' . $query . '%');
            })->orderBy('id', 'DESC')->paginate(9);

            // Fetch banners, filtering by the search query if it exists
            $banners = Banner::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title1', 'like', '%' . $query . '%')
                    ->orWhere('title2', 'like', '%' . $query . '%');
            })->orderBy('id', 'DESC')->paginate(10);

            return view('recursos', compact('user_session', 'pages', 'course', 'blogs', 'banners', 'query'));
        } else {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }

    public function term()
    {

        $pages = Page::all();
        $user_session = User::where('id', Session::get('LoggedIn'))->first();



        // Pass the order ID to the success view for triggering the PDF download
        return view('term', compact('user_session',  'pages'));
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


            return view('verification', compact('user_session',   'pages'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function blog_detail(Request $request)
    {

        $blog_detail = Blog::where('slug', $request->slug)->first();
        // dd($blog_detail);
        $data['blogComments'] = BlogComment::active();
        $blogComments = $data['blogComments']->whereNull('parent_id')->get();
        // Fetch blog with count of active comments
        $commentCount = BlogComment::where('blog_id', $blog_detail->id)

            ->where('status', '1') // If you have a status for active comments
            ->count();

        $pages = Page::all();
        $latest_posts = Blog::orderBy('id', 'DESC')->paginate(3);
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        // dd($request->id);
        return view('blog_detail', compact('blogComments', 'user_session', 'blog_detail', 'pages', 'latest_posts', 'commentCount'));
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
        // Retrieve the user ID from the session
        $userId = session('LoggedIn');

        if (!$userId) {
            return back()->with('fail', 'Session expired. Please log in again.');
        }

        // Fetch the user and associated data
        $user_session = User::find($userId);
        $qrcode = BankDetails::orderby('id', 'desc')->first();
        $pages = Page::all();

        return view('addpaymentmethod', compact('user_session', 'pages', 'qrcode'));
    }

    public function ayuda(Request $request)
    {
        $query = $request->get('query'); // Capture the search query

        $supportQuestions = SupportTicketQuestion::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('question', 'like', '%' . $query . '%')
                ->orWhere('answer', 'like', '%' . $query . '%');
        })->paginate(9); // Adjust number of items per page


        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $pages = Page::all();

        return view('ayuda', compact('user_session', 'pages', 'supportQuestions', 'query'));
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

        return back()->with('success', 'Enlace para restablecer la contraseña enviado correctamente.');
    }


    public function dashboard()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $sales = Sales::where('refer_id', $user_session->id)->with('user')->get();

            // dd($sales);
            $pages = Page::all();

            return view('dashboard', compact('user_session', 'pages', 'sales'));
        } else {
            // Redirect to the login page if the user is not logged in
            return redirect()->route('Userlogin'); // or use 'login' if you have a named route for login
        }
    }
    public function getDashboardData(Request $request)
    {
        // Get the current user's ID
        $userId = Session::get('LoggedIn');

        // Fetch monthly sales data (sum of the 'commission' field per month)
        $sales = Sales::selectRaw('MONTH(created_at) as month, SUM(commission) as total')
            ->where('refer_id', $userId)
            ->groupBy('month')
            ->orderBy('month') // Ensure months are ordered properly
            ->pluck('total', 'month');

        // Ensure every month (1-12) is accounted for, even if there are no sales in some months
        $months = collect(range(1, 12))->mapWithKeys(fn($month) => [$month => $sales->get($month, 0)]);

        // Calculate total commission earned by the user (sum of the 'commission' field)
        $totalCommission = Sales::where('refer_id', $userId)
            ->sum('commission');

        // Commission breakdown by level (if needed)
        $commissionByLevel = Sales::select('level', 'commission')
            ->where('refer_id', $userId)
            ->get();


        return response()->json([
            'monthlySales' => $months,
            'totalCommission' => $totalCommission,
            'commissionByLevel' => $commissionByLevel,
        ]);
    }



    public function welcome()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $pages = Page::all();

            return view('welcome', compact('user_session', 'pages'));
        } else {
            // Redirect to the login page if the user is not logged in
            return redirect()->route('Userlogin'); // or use 'login' if you have a named route for login
        }
    }

    public function blogs(Request $request)
    {
        $query = $request->get('query'); // Get the search query

        // Fetch blogs, filtering by the search query if it exists
        $blogs = Blog::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', '%' . $query . '%')
                ->orWhere('short_description', 'like', '%' . $query . '%');
        })->orderBy('id', 'DESC')->paginate(9);

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $data['blogComments'] = BlogComment::active();
        $blogComments = $data['blogComments']->whereNull('parent_id')->get();
        $pages = Page::all();
        $latest_posts = Blog::orderBy('id', 'DESC')->paginate(3);

        return view('blog', compact('user_session', 'latest_posts', 'blogs', 'pages', 'blogComments', 'query'));
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

        return view('news_category', compact('user_session', 'latest_posts', 'title', 'news', 'pages', 'blogComments'));
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
        // dd($request->all());
        if ($request->user_id && $request->reply_comment) {
            $comment = new BlogComment();
            $comment->blog_id = $request->blog_id;
            $comment->user_id = $request->user_id;

            $comment->comment = $request->reply_comment;
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
    public function who()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();


        return view('who', compact('user_session', 'pages'));
    }
    public function affiliate_company()
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $brands = Brand::all();
        $pages = Page::all();


        return view('affiliate_company', compact('user_session', 'pages', 'brands'));
    }
    public function membership(Request $request)
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $brands = Brand::all();
        $pages = Page::all();
        // Get all keys from the request
        $keys = array_keys($request->all());

        // Check if the keys array is not empty before accessing the first key
        $refer = !empty($keys) ? $keys[0] : null;

        return view('membership', compact('user_session', 'pages', 'brands', 'refer'));
    }
    public function membershipRenew(Request $request)
{

    $userId = $request->query('user_id');
    // Retrieve the logged-in user
    $user_session = User::find($userId);

    // Ensure the user exists
    if (!$user_session) {
        return redirect()->route('login')->with('error', 'User not found. Please log in again.');
    }



    // Pass data to the view
    return view('membershipRenew', compact('user_session'));
}
public function renew(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'membership' => 'required|string|in:GEN_CLASSIC,GEN_VIP,GEN_GOLD,GEN_PLATINUM',
    ]);

    // Retrieve the logged-in user
    $user_session = User::find($request->user_id);

    if (!$user_session) {
        return redirect()->route('login')->with('error', 'User not found. Please log in again.');
    }

    // Renew membership logic (update user's membership type and expiry date)
    $membershipType = $request->input('membership');
    $user_session->update([
        'membershipType' => $membershipType,
        'membership_status' => 'pending',
        'payment_status' => 'pending',
    ]);
    return redirect('addpaymentmethod')->with([

        'membershipType' => $membershipType
    ]);

}

    public function gen_cards(Request $request)
    {

        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        $pages = Page::all();


        return view('gen_cards', compact('user_session', 'pages'));
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




            return view('shop', compact('products', 'user_session',   'pages'));
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





            return view('search-results', compact('products', 'user_session',   'pages'));
        } else {
            return Redirect()->with('fail', 'Tienes que iniciar sesión primero');
        }
    }
    public function geanologìa(Request $request)
    {
        if (Session::has('LoggedIn')) {
            // Get the currently logged-in user
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            // Fetch users with their children (for multi-level marketing)
            $users = User::with('children')->where('refer', $user_session->id)->get();  // Get users referred by the logged-in user

            return view('geanologìa', compact('user_session', 'users'));
        } else {
            return Redirect('Userlogin')->with('fail', 'Tienes que iniciar sesión primero');
        }
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

            return view('productbybrand', compact('products', 'user_session',   'pages', 'category'));
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

            return view('productbyCategory', compact('products', 'user_session',   'pages', 'category'));
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

            return view('productbySubCategory', compact('products', 'user_session',   'pages', 'subcategory', 'category'));
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

            return view('productbyChildCategory', compact('products', 'user_session',   'pages', 'childcategory'));
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

            return view('cart', compact('products', 'user_session',   'pages', 'latest_products', 'carts'));
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
        if (!Session::has('LoggedIn')) {
            return redirect()->route('Userlogin')->with('error', 'Por favor, inicie sesión primero.');
        }
        $course = Course::orderByDesc('id')->paginate(12);
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $pages = Page::all();
        return view('course', compact('pages', 'user_session', 'course'));
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
        // dd($request->all());
        try {
            $user = User::find($request->user_id);

            if ($request->hasFile('profile_photo')) {
                $profilePhoto = $request->file('profile_photo');
                $imageName = time() . '_' . $profilePhoto->getClientOriginalName();
                $profilePhoto->move(public_path('profile_photo'), $imageName);

                // Elimina la foto anterior si existe y guarda la nueva
                if ($user->profile_photo && file_exists(public_path('profile_photo/' . $user->profile_photo))) {
                    unlink(public_path('profile_photo/' . $user->profile_photo));
                }
                $user->profile_photo = $imageName;
            }

            $user->name = $request->name;
            $user->about = $request->bio;
            $user->username = $request->username;
            $user->mobile_number = "591" . $request->mobile_number;
            $user->email = $request->email;
            $user->facebook = $request->facebook ?? $user->facebook;
            $user->instagram = $request->instagram ?? $user->instagram;
            $user->linkedin = $request->linkedin ?? $user->linkedin;
            $user->twitter = $request->twitter ?? $user->twitter;

            if ($user->save()) {
                return redirect()->back()->with('success', 'Perfil actualizado con éxito');
            } else {
                return redirect()->back()->with('fail', 'Error al actualizar el perfil');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Error: ' . $e->getMessage());
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
        // Validate the input
        $request->validate([
            'new_password' => ['required', 'string', 'min:8', 'max:30'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        // Retrieve the user by email
        $data = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$data) {
            return redirect()->back()->with('fail', 'User not found.');
        }

        // Hash and save the new password
        $data->password = bcrypt($request->new_password);
        $data->custom_password = $request->new_password; // If you need plain text storage
        $data->update();

        // Delete the password reset entry
        PasswordReset::where('email', $data->email)->delete();
        if ($data->is_super_admin == 1) {
            // Redirigir a la página de inicio de sesión del administrador
            return redirect()->to('admin/login'); // O usar 'http://127.0.0.1:8000/admin/login' si es necesario
        } else {
            // Redirigir a la página de inicio de sesión del usuario con un mensaje de éxito
            return redirect('Userlogin')->with('success', 'Contraseña restablecida con éxito.');
        }
    }
}
