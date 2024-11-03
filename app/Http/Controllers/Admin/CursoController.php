<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CursoController extends Controller
{
    use ImageSaveTrait, General;

    protected $model;

    public function __construct(Course $course)
    {
        $this->model = new Crud($course);
    }

    public function index()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Gestionar Cursos';
            $data['courses'] = $this->model->getOrderById('DESC', 25);
            return view('admin.curso.index', $data);
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['categories'] = Category::all();
            $data['title'] = 'Añadir Curso';
            return view('admin.curso.create', $data);
        }
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string|max:255',
        'video_link' => 'required|url',
        'video_thumbnail' => 'nullable|image|mimes:png,jpg,jpeg', // Validate video thumbnail
    ]);
// dd($request->all());
    $data = [
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'category' => $request->category,
        'video_link' => $request->video_link,
        'slug' => Str::slug($request->title),
    ];

    // Handle video thumbnail upload
    if ($request->hasFile('video_thumbnail')) {
        $attribute = $request->file('video_thumbnail');
        $destination = 'video_thumbnail';
        $file_name = time() . '-' . Str::random(10) . '.' . $attribute->getClientOriginalExtension();
        $attribute->move(public_path('uploads/' . $destination), $file_name);
        $data['video_thumbnail'] = 'uploads/' . $destination . '/' . $file_name; // Add this line
    }

    try {
        $this->model->create($data);
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        Log::error('Error al crear el Curso: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Error al crear el Curso.'], 500);
    }
}

    public function edit($uuid)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Editar Curso';
            $data['categories'] = Category::all();
            $data['course'] = $this->model->getRecordByUuid($uuid);
            return view('admin.curso.edit', $data);
        }
    }

    public function update(Request $request, $uuid)
    {
        Log::info('Updating course with UUID: ' . $uuid); // Log UUID

        // Retrieve the course by UUID
        $course = Course::where('uuid', $uuid)->first(); // Directly query the Course model

        // Check if the course exists
        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found.'], 404);
        }

        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'video_link' => 'required|url',
            'video_thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        // Prepare the data for update
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'video_link' => $request->video_link,
            'slug' => Str::slug($request->title),
        ];

        // Handle video thumbnail upload if a new file is provided
        if ($request->hasFile('video_thumbnail')) {
            // Remove the old thumbnail if it exists
            $this->deleteFile($course->video_thumbnail); // You can handle this in your deleteFile method
            // Save the new video thumbnail
            $data['video_thumbnail'] = $this->saveImage($request->file('video_thumbnail'), 'video_thumbnail'); // Adjust directory as needed
        }

        // Update the course attributes
        $course->update($data); // Directly update the model instance

        return response()->json(['success' => true]);
    }



    public function delete($uuid)
    {
        $course = Course::where('uuid', $uuid)->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Curso no encontrado.'], 404);
        }

        $this->deleteFile($course->video_thumbnail); // Eliminar el archivo de video thumbnail asociado
        $course->delete();

        return response()->json(['success' => true]);
    }

    public function bulkDelete(Request $request)
    {
        try {
            $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'exists:courses,uuid'
            ]);

            $courses = Course::whereIn('uuid', $request->ids)->get();
            foreach ($courses as $course) {
                $this->deleteFile($course->video_thumbnail); // Remove video thumbnail files before deleting
            }
            Course::whereIn('uuid', $request->ids)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cursos eliminados con éxito.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar los cursos seleccionados.'
            ], 500);
        }
    }
}
