<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use  ImageSaveTrait, General;

    protected $model;
    public function __construct(Brand $brand)
    {
        $this->model = new Crud($brand);
    }
    public function index()
    {
        if (Session::has('LoggedIn')) {


            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Manage Brands';
            $data['categories'] = $this->model->getOrderById('DESC', 25);
            return view('admin.brands.index', $data);
        }
    }

    public function create()
    {

        if (Session::has('LoggedIn')) {


            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Add Brands';
            return view('admin.brands.create', $data);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('thumbnail')) {

            // Handle new image upload
            $attribute = $request->file('thumbnail');
            $destination = 'Brands';

            // Generate unique filename
            $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();
            // Move uploaded file to the destination directory
            $attribute->move(public_path('uploads/' . $destination), $file_name);
            // Update image path
            $thumbnailPath = 'uploads/' . $destination . '/' . $file_name;
        }
        Brand::create([
            'name' => $request->name,
            'address' => $request->address,
            'thumbnail' => $thumbnailPath,
        ]);


        return redirect()->route('brands.index');
    }

    public function edit($id)
    {

        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Edit Brands';
            $data['brand'] = $this->model->getRecordByid($id);
            return view('admin.brands.edit', $data);
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:191',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:255',
        ]);

        // Find the brand by ID
        $brand = Brand::findOrFail($id); // If the brand does not exist, a 404 error will be thrown

        // Initialize thumbnail path variable
        $thumbnailPath = $brand->thumbnail;

        // Check if a new thumbnail is uploaded
        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if ($brand->thumbnail && file_exists(public_path($brand->thumbnail))) {
                unlink(public_path($brand->thumbnail));
            }

            // Handle the new image upload
            $attribute = $request->file('thumbnail');
            $destination = 'Brands';

            // Generate a unique filename
            $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();
            // Move the uploaded file to the destination directory
            $attribute->move(public_path('uploads/' . $destination), $file_name);
            // Update the thumbnail path
            $thumbnailPath = 'uploads/' . $destination . '/' . $file_name;
        }

        // Update the brand record
        $brand->update([
            'name' => $request->name,
            'address' => $request->address,
            'thumbnail' => $thumbnailPath,
        ]);

        // Redirect to the brand index page with a success message
        return redirect()->route('brands.index')->with('success', 'Marca actualizada con éxito.');
    }


   public function delete($id)
{
    // Find the brand by ID
    $brand = Brand::findOrFail($id);

    // Delete the associated thumbnail if it exists
    if ($brand->thumbnail && file_exists(public_path($brand->thumbnail))) {
        unlink(public_path($brand->thumbnail));
    }

    // Delete the brand from the database
    $brand->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('brands.index')->with('success', 'Marca eliminada con éxito.');
}

}
