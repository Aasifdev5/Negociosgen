<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\HomeSettings;
use App\Models\Setting;
use App\Models\User;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeSettingController extends Controller
{
    use General, ImageSaveTrait;

    public function themeSettings()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Theme Settings');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['themeSettingsActiveClass'] = 'active';

        return view('admin.application_settings.home.theme-settings', $data);
    }
    public function updateHomeSettings(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'video' => 'nullable|mimes:mp4,mkv,avi|max:100000',
            'video_thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:5000',
            'video_caption' => 'nullable|string|max:255',
        ]);

        // Retrieve existing home settings (assuming the settings are stored under a specific key)
        $existingSettings = HomeSettings::where('key', 'home_special_feature')->first();

        // Prepare data to update
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'video_caption' => $request->input('video_caption'),
        ];

        // Handle Video Upload
        if ($request->hasFile('video')) {
            // Get existing video path
            $existingVideoPath = $existingSettings ? $existingSettings->video : null;

            // Delete old video if it exists
            if ($existingVideoPath && file_exists(public_path($existingVideoPath))) {
                unlink(public_path($existingVideoPath)); // Delete old video
            }

            $video = $request->file('video');
            $videoName = time() . '_' . \Illuminate\Support\Str::random(10) . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName); // Move the video to 'uploads/videos' folder
            $data['video'] = 'uploads/videos/' . $videoName; // Store the file path
        }

        // Handle Video Thumbnail Upload
        if ($request->hasFile('video_thumbnail')) {
            // Get existing thumbnail path
            $existingThumbnailPath = $existingSettings ? $existingSettings->video_thumbnail : null;

            // Delete old thumbnail if it exists
            if ($existingThumbnailPath && file_exists(public_path($existingThumbnailPath))) {
                unlink(public_path($existingThumbnailPath)); // Delete old thumbnail
            }

            $thumbnail = $request->file('video_thumbnail');
            $thumbnailName = time() . '_' . \Illuminate\Support\Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/thumbnails'), $thumbnailName); // Move the thumbnail to 'uploads/thumbnails' folder
            $data['video_thumbnail'] = 'uploads/thumbnails/' . $thumbnailName; // Store the file path
        }

        // Save or update the HomeSettings
        HomeSettings::updateOrCreate(
            ['key' => 'develop_skills'], // If you're updating a specific setting, use a unique key
            $data
        );

        return redirect()->back()->with('success', __('Home settings updated successfully.'));
    }
    public function updateCourseSettings(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'video' => 'nullable|mimes:mp4,mkv,avi|max:100000',
            'video_thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:5000',
            'video_caption' => 'nullable|string|max:255',
        ]);

        // Retrieve existing home settings (assuming the settings are stored under a specific key)
        $existingSettings = HomeSettings::where('key', 'home_special_feature')->first();

        // Prepare data to update
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'video_caption' => $request->input('video_caption'),
        ];

        // Handle Video Upload
        if ($request->hasFile('video')) {
            // Get existing video path
            $existingVideoPath = $existingSettings ? $existingSettings->video : null;

            // Delete old video if it exists
            if ($existingVideoPath && file_exists(public_path($existingVideoPath))) {
                unlink(public_path($existingVideoPath)); // Delete old video
            }

            $video = $request->file('video');
            $videoName = time() . '_' . \Illuminate\Support\Str::random(10) . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName); // Move the video to 'uploads/videos' folder
            $data['video'] = 'uploads/videos/' . $videoName; // Store the file path
        }

        // Handle Video Thumbnail Upload
        if ($request->hasFile('video_thumbnail')) {
            // Get existing thumbnail path
            $existingThumbnailPath = $existingSettings ? $existingSettings->video_thumbnail : null;

            // Delete old thumbnail if it exists
            if ($existingThumbnailPath && file_exists(public_path($existingThumbnailPath))) {
                unlink(public_path($existingThumbnailPath)); // Delete old thumbnail
            }

            $thumbnail = $request->file('video_thumbnail');
            $thumbnailName = time() . '_' . \Illuminate\Support\Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/thumbnails'), $thumbnailName); // Move the thumbnail to 'uploads/thumbnails' folder
            $data['video_thumbnail'] = 'uploads/thumbnails/' . $thumbnailName; // Store the file path
        }

        // Save or update the HomeSettings
        HomeSettings::updateOrCreate(
            ['key' => 'success_tips'], // If you're updating a specific setting, use a unique key
            $data
        );

        return redirect()->back()->with('success', __('Home settings updated successfully.'));
    }


    public function sectionSettings()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Section Settings');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['sectionSettingsActiveClass'] = 'active';
        $data['home'] = Home::first();

        return view('admin.application_settings.home.section-settings', $data);
    }

    public function bannerSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Banner Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['bannerSectionActiveClass'] = 'active';
        $data['home'] = Home::first();

        return view('admin.application_settings.home.banner-section', $data);
    }

    public function specialFeatureSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        // Retrieve existing home settings (assuming the settings are stored under a specific key)
        $data['existingSettings'] = HomeSettings::where('key', 'develop_skills')->first();
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Home Special Feature Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['specialSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.special-feature-section', $data);
    }

    public function courseSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['existingSettings'] = HomeSettings::where('key', 'success_tips')->first();
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Course Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['courseSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.course-section', $data);
    }

    public function categoryCourseSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Category Course Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['categoryCourseSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.category-course-section', $data);
    }

    public function upcomingCourseSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Upcoming Course Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['upcomingCourseSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.upcoming-course-section', $data);
    }

    public function productSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Product Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['productSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.product-section', $data);
    }

    public function bundleCourseSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Bundle Course Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['bundleCourseSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.bundle-course-section', $data);
    }

    public function topCategorySection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Top Category Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['topCategorySectionActiveClass'] = 'active';

        return view('admin.application_settings.home.top-category-section', $data);
    }

    public function topInstructorSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Top Instructor Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['topInstructorSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.top-instructor-section', $data);
    }

    public function becomeInstructorVideoSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Become Instructor Video Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['becomeInstructorVideoSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.become-instructor-video-section', $data);
    }

    public function customerSaySection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Customer Say Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['customerSaySectionActiveClass'] = 'active';

        return view('admin.application_settings.home.customer-say-section', $data);
    }

    public function achievementSection()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->route('login')->withErrors(__('Please login to access this page.'));
        }
        $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
        $data['title'] = __('Achievement Section');
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['achievementSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.achievement-section', $data);
    }
}
