<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CursoController extends Controller
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
            $data['title'] = 'Gestionar Cursos';
            $data['courses'] = Course::all();
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
        $validator = $request->validate([
            'coach_name' => 'required|string|max:255',
            'coach_video' => 'required|url',
            'coach_thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            // 'titles' => 'required|array',
            // 'titles.*' => 'required|string|max:255',
            // 'descriptions' => 'required|array',
            // 'descriptions.*' => 'required|string|max:1000',
            // 'video_urls' => 'required|array',
            // 'video_urls.*' => 'required|url',
            // 'thumbnails' => 'required|array',
            // 'thumbnails.*' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        try {
            // Upload Coach Intro Video
            $coachVideoPath = $request->coach_video;

            // Handle cropped or regular coach thumbnail
            if ($request->has('coach_thumbnail_cropped')) {
                $croppedImage = $request->coach_thumbnail_cropped;
                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
                $fileName = 'thumbnail_' . time() . '.jpg';
                file_put_contents(public_path('uploads/coach_thumbnails/' . $fileName), $imageData);
                $coachThumbnailPath = 'uploads/coach_thumbnails/' . $fileName;
            } elseif ($request->hasFile('coach_thumbnail')) {
                $coachThumbnailPath = $this->uploadFile($request->file('coach_thumbnail'), 'coach_thumbnails');
            }

           // Prepare courses data only if all required fields are provided
        $courses = [];
        if ($request->has('titles') && is_array($request->titles)) {
            foreach ($request->titles as $key => $title) {
                if (!isset($request->descriptions[$key], $request->video_urls[$key])) {
                    continue; // Skip if any essential course data is missing
                }

                $thumbnailPath = $request->hasFile("thumbnails.$key")
                    ? $this->uploadFile($request->file("thumbnails.$key"), 'course_thumbnails')
                    : null;

                $courses[] = [
                    'title' => $title,
                    'description' => $request->descriptions[$key],
                    'video_url' => $request->video_urls[$key],
                    'thumbnail' => $thumbnailPath,
                    'slug' => Str::slug($title),
                ];
            }
        }

        // Create Course entry
        Course::create([
            'coach_name' => $request->coach_name,
            'course_title' => $request->course_title,
            'course_description' => $request->course_description,
            'coach_video' => $coachVideoPath,
            'coach_thumbnail' => $coachThumbnailPath ?? null,
            'courses' => !empty($courses) ? json_encode($courses) : null, // Store only if courses are present
        ]);


            return response()->json(['success' => true, 'message' => 'Cursos añadidos con éxito.']);
        } catch (\Exception $e) {
            Log::error('Error creating courses: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al añadir cursos. Inténtalo de nuevo más tarde.'], 500);
        }
    }



    public function edit($id)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Editar Curso';
            $data['categories'] = Category::all();
            $course = Course::where('id', $id)->first();

            // Decode the 'courses' JSON column to an array
            $course->items = json_decode($course->courses);
            $data['course'] = $course;

            return view('admin.curso.edit', $data);
        }
    }


    public function update(Request $request, $id)
    {
        $course = Course::where('id', $id)->first();
        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Curso no encontrado.'], 404);
        }

        try {
            // Decode the existing courses field
            $courses = json_decode($course->courses, true);


                $course->coach_video = $request->coach_video;


            // Handle Coach Thumbnail (cropped or regular)
            if ($request->hasFile('coach_thumbnail')) {
                $this->deleteFile($course->coach_thumbnail);
                $course->coach_thumbnail = $this->uploadFile($request->file('coach_thumbnail'), 'coach_thumbnails');
            }

            if ($request->has('coach_thumbnail_cropped')) {
                $croppedImage = $request->coach_thumbnail_cropped;
                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
                $fileName = 'thumbnail_' . time() . '.jpg';
                file_put_contents(public_path('uploads/coach_thumbnails/' . $fileName), $imageData);
                $course->coach_thumbnail = 'uploads/coach_thumbnails/' . $fileName;
            }


        // Prepare updated courses data only if valid input exists
        $updatedCourses = [];
        if ($request->has('titles') && is_array($request->titles)) {
            foreach ($request->titles as $key => $title) {
                if (!isset($request->descriptions[$key], $request->video_urls[$key])) {
                    continue; // Skip if any essential course data is missing
                }

                $thumbnailPath = $courses[$key]['thumbnail'] ?? null;

                // Check if a new thumbnail is uploaded
                if ($request->hasFile("thumbnails.$key")) {
                    if (!empty($courses[$key]['thumbnail'])) {
                        $this->deleteFile($courses[$key]['thumbnail']);
                    }
                    $thumbnailPath = $this->uploadFile($request->file("thumbnails.$key"), 'course_thumbnails');
                }

                $updatedCourses[] = [
                    'title' => $title,
                    'description' => $request->descriptions[$key],
                    'video_url' => $request->video_urls[$key],
                    'thumbnail' => $thumbnailPath,
                    'slug' => Str::slug($title),
                ];
            }
        }

        // Update the course entry
        $course->update([
            'coach_name' => $request->coach_name,
            'course_title' => $request->course_title,
            'course_description' => $request->course_description,
            'courses' => !empty($updatedCourses) ? json_encode($updatedCourses) : $course->courses, // Keep existing courses if no updates are provided
        ]);

            return response()->json(['success' => true, 'message' => 'Curso actualizado exitosamente.']);
        } catch (\Exception $e) {
            Log::error('Error updating course: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al actualizar el curso.'], 500);
        }
    }





    public function delete($id)
    {
        $course = Course::where('id', $id)->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Curso no encontrado.'], 404);
        }

        // Delete course-related files
        $this->deleteFile($course->coach_video);
        $this->deleteFile($course->coach_thumbnail);

        foreach (json_decode($course->courses, true) as $courseData) {
            if (!empty($courseData['thumbnail'])) {
                $this->deleteFile($courseData['thumbnail']);
            }
        }

        // Delete course record
        $course->delete();

        return response()->json(['success' => true, 'message' => 'Curso eliminado exitosamente.']);
    }
    public function bulkDelete(Request $request)
    {
        try {
            $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'exists:courses,id'
            ]);

            $courses = Course::whereIn('id', $request->ids)->get();
            foreach ($courses as $course) {
                $this->deleteFile($course->video_thumbnail); // Remove video thumbnail files before deleting
            }
            Course::whereIn('id', $request->ids)->delete();

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

    private function uploadFile($file, $folder)
    {
        $fileName = time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('uploads/' . $folder);
        $file->move($destinationPath, $fileName);
        return 'uploads/' . $folder . '/' . $fileName;
    }

    private function deleteFile($filePath)
    {
        if (file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
        }
    }
}
