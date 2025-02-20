<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Intro;
use App\Models\User;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class IntroController extends Controller
{
    use ImageSaveTrait, General;

    public function __construct()
    {
        // Removed the Crud dependency as it's no longer required.
    }

    public function index()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Gestionar successs';
            $data['Intros'] = Intro::all();
            return view('admin.introv.index', $data);
        }
    }

    public function create()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['categories'] = Category::all();
            $data['title'] = 'Añadir success';
            return view('admin.introv.create', $data);
        }
    }

    public function store(Request $request)
{
    // Validate incoming data
    $validator = $request->validate([
        'coach_name' => 'required|string|max:255',
        'coach_video' => 'required|url', // Since it's a URL, we use the URL validation rule.
        'coach_thumbnail' => 'nullable|image|mimes:png,jpg,jpeg', // Regular image file
        'coach_thumbnail_cropped' => 'nullable|string', // Base64 image data for cropped images
    ]);

    try {
        // Handle the thumbnail (either cropped or uploaded as a file)
        if ($request->has('coach_thumbnail_cropped')) {
            // Handle the base64 cropped image
            $croppedImage = $request->coach_thumbnail_cropped;
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
            $fileName = 'thumbnail_' . time() . '.jpg';
            file_put_contents(public_path('uploads/coach_thumbnails/' . $fileName), $imageData);
            $coachThumbnailPath = 'uploads/coach_thumbnails/' . $fileName;
        } elseif ($request->hasFile('coach_thumbnail')) {
            // Handle regular image file upload
            $coachThumbnailPath = $this->uploadFile($request->file('coach_thumbnail'), 'coach_thumbnails');
        }

        // Create Intro entry
        Intro::create([
            'coach_name' => $request->coach_name,
            'course_title' => $request->course_title,
            'course_description' => $request->course_description,
            'coach_video' => $request->coach_video,
            'coach_thumbnail' => $coachThumbnailPath ?? null,
        ]);

        // Return success response
        return response()->json(['success' => true, 'message' => 'El curso se ha añadido con éxito.']);
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error al crear Intro: ' . $e->getMessage());

        // Return error response
        return response()->json(['success' => false, 'message' => 'Error al añadir el curso. Inténtalo de nuevo más tarde.'], 500);
    }
}




    public function edit($id)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Editar success';

            $Intro = Intro::where('id', $id)->first();

            $data['Intro'] = $Intro;

            return view('admin.introv.edit', $data);
        }
    }


    public function update(Request $request, $id)
{
    $Intro = Intro::where('id', $id)->first();

    if (!$Intro) {
        return response()->json(['success' => false, 'message' => 'Success no encontrado.'], 404);
    }

    try {
        // Validate the incoming request
        $request->validate([
            'coach_name' => 'required|string|max:255',
            'coach_video' => 'required|url',
            'coach_thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'coach_thumbnail_cropped' => 'nullable|string',
        ]);

        // Handle Coach Thumbnail (cropped or regular)
        if ($request->hasFile('coach_thumbnail')) {
            // Ensure the file is valid and not a string
            $file = $request->file('coach_thumbnail');
            if ($file && $file->isValid()) {

                $Intro->coach_thumbnail = $this->uploadFile($file, 'coach_thumbnails');
            }
        }

        if ($request->has('coach_thumbnail_cropped')) {
            // Handle the cropped image as base64
            $croppedImage = $request->coach_thumbnail_cropped;
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
            $fileName = 'thumbnail_' . time() . '.jpg';
            file_put_contents(public_path('uploads/coach_thumbnails/' . $fileName), $imageData);

            $Intro->coach_thumbnail = 'uploads/coach_thumbnails/' . $fileName;
        }

        // Update the Intro entry
        $Intro->update([
            'coach_name' => $request->coach_name,
            'course_title' => $request->course_title,
            'course_description' => $request->course_description,
            'coach_video' => $request->coach_video,
            // Don't update the coach_thumbnail if no change occurred
        ]);

        return response()->json(['success' => true, 'message' => 'Success actualizado exitosamente.']);
    } catch (\Exception $e) {
        Log::error('Error updating Intro: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Error al actualizar el success.'], 500);
    }
}
public function uploadFile($file, $directory)
{
    // Ensure the file is an instance of UploadedFile
    if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
        $fileName = time() . '.' . $file->extension(); // Create a unique file name
        $path = $file->storeAs('public/' . $directory, $fileName); // Store the file in the specified directory
        return 'storage/' . $directory . '/' . $fileName; // Return the file path
    }
    return null; // Return null if invalid
}







    public function delete($id)
    {
        $Intro = Intro::where('id', $id)->first();

        if (!$Intro) {
            return response()->json(['success' => false, 'message' => 'success no encontrado.'], 404);
        }



        // Delete Intro record
        $Intro->delete();

        return response()->json(['success' => true, 'message' => 'success eliminado exitosamente.']);
    }
    public function bulkDelete(Request $request)
    {
        try {
            $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'exists:Intros,id'
            ]);

            $Intros = Intro::whereIn('id', $request->ids)->get();

            Intro::whereIn('id', $request->ids)->delete();

            return response()->json([
                'success' => true,
                'message' => 'successs eliminados con éxito.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar los successs seleccionados.'
            ], 500);
        }
    }


}
