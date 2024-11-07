<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ForumCategory;
use App\Models\ForumPost;
use App\Models\ForumPostComment;
use App\Models\User;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    use General;
    public function index()
    {
        if (Session::has('LoggedIn')) {


            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['pageTitle'] = 'Forum';
            $data['forumCategories'] = ForumCategory::active()->get();

            $data['totalForumPost'] = ForumPost::active()->count();
            $data['totalForumAnswer'] = ForumPostComment::active()->count();
            $totalForumPostMemberIds = ForumPost::pluck('user_id')->toArray();
            $totalForumMemberIds = ForumPostComment::pluck('user_id')->toArray();
            $data['totalMember'] = count(array_merge($totalForumPostMemberIds, $totalForumMemberIds));

            $data['recent_discussions'] = ForumPost::active()->get();

            $data['blogs'] = Blog::active()->latest()->take(2)->get();

            $userIDComments = ForumPostComment::pluck('user_id')->toArray();
            $data['topContributors'] = User::whereIn('id', $userIDComments)->withCount([
                'forumPostComments as totalComments' => function ($q) {
                    $q->select(DB::raw("COUNT(user_id)"));
                }
            ])->orderBy('totalComments', 'desc')->take(10)->get();

            return view('frontend.forum.index')->with($data);
        }
    }

    public function askQuestion()
    {
        if (Session::has('LoggedIn')) {


            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['pageTitle'] = 'Forum Ask Question';
            $data['forumCategories'] = ForumCategory::active()->get();
            $data['blogs'] = Blog::active()->latest()->take(2)->get();
            return view('frontend.forum.ask-question')->with($data);
        }
    }

    public function questionStore(Request $request)
    {

        if (!Auth::id()) {
            $this->showToastrMessage('error', __('At first you are login first!'));
            return redirect()->back();
        }


        $request->validate([
            'title' => 'required',
            'forum_category_id' => 'required',
            'description' => 'required',
        ]);

        $post = new ForumPost();
        $post->title = $request->title;
        $post->forum_category_id = $request->forum_category_id;
        $post->description = $request->description;
        $post->save();

        $this->showToastrMessage('success', __('Question created successfully.'));
        return redirect()->route('forum.forumPostDetails', $post->uuid);
    }

    public function forumPostDetails($uuid)
    {
        if (Session::has('LoggedIn')) {


            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['pageTitle'] = 'Forum Details';

            $data['forumPost'] = ForumPost::where('uuid', $uuid)->firstOrFail();
            $data['forumPost']->total_seen = ++$data['forumPost']->total_seen;
            $data['forumPost']->save();

            $forumPostComments = ForumPostComment::active();
            $data['forumPostComments'] = $forumPostComments->where('forum_post_id', $data['forumPost']->id)->whereNull('parent_id')->get();
            $data['blogs'] = Blog::active()->latest()->take(2)->get();
            $data['suggestedForumPosts'] = ForumPost::where('id', '!=', $data['forumPost']->id)->where('forum_category_id', $data['forumPost']->forum_category_id)->take(6)->get();
            return view('frontend.forum.forum-details')->with($data);
        }
    }

    public function forumPostCommentStore(Request $request)
    {
        if (!Auth::id()) {
            $this->showToastrMessage('error', __('At first you are login first!'));
            return redirect()->back();
        }

        $comment = new ForumPostComment();
        $comment->forum_post_id = $request->forum_post_id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->status = 1;
        $comment->save();

        $this->showToastrMessage('success', __('Forum Post Comment Created Successfully'));
        return redirect()->back();
    }

    public function forumPostCommentReplyStore(Request $request)
    {
        if (!Auth::id()) {
            $this->showToastrMessage('error', __('At first you are login first!'));
            return redirect()->back();
        }

        $comment = new ForumPostComment();
        $comment->forum_post_id = $request->forum_post_id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->parent_id = $request->parent_id;
        $comment->status = 1;
        $comment->save();

        $this->showToastrMessage('success', __('Forum Post Comment Created Successfully'));
        return redirect()->back();
    }

    public function renderForumCategoryPosts(Request $request)
    {
        $data['forumCategory'] = ForumCategory::find($request->forum_category_id);
        if ($request->forum_category_id) {
            $data['recent_discussions'] = ForumPost::where('forum_category_id', $request->forum_category_id)->active()->get();
        } else {
            $data['recent_discussions'] = ForumPost::active()->get();
        }
        return view('frontend.forum.partial.render-forum-posts', $data);
    }

    public function forumCategoryPosts($uuid)
    {
        $data['forumCategories'] = ForumCategory::active()->get();
        $data['forumCategory'] = ForumCategory::where('uuid', $uuid)->firstOrFail();
        $data['recent_discussions'] = ForumPost::where('forum_category_id', $data['forumCategory']->id)->active()->get();
        $userIDComments = ForumPostComment::pluck('user_id')->toArray();
        $data['topContributors'] = User::whereIn('id', $userIDComments)->withCount([
            'forumPostComments as totalComments' => function ($q) {
                $q->select(DB::raw("COUNT(user_id)"));
            }
        ])->orderBy('totalComments', 'desc')->take(10)->get();

        $data['blogs'] = Blog::active()->latest()->take(2)->get();
        return view('frontend.forum.forum-category-posts', $data);
    }

    public function forumLeaderboard(Request $request)
    {
        $data['pageTitle'] = 'Forum Leaderboard';
        $userIDComments = ForumPostComment::pluck('user_id')->toArray();
        $data['topContributors'] = User::whereIn('id', $userIDComments)->withCount([
            'forumPostComments as totalComments' => function ($q) {
                $q->select(DB::raw("COUNT(user_id)"));
            }
        ])->orderBy('totalComments', 'desc')->paginate(24, ['*'], 'all');

        return view('frontend.forum.forum-leaderboard', $data);
    }
    public function searchForumList(Request $request)
    {
        $data['forums'] = ForumPost::active()->where('title', 'like', "%{$request->title}%")->get();
        return view('frontend.forum.partial.render-forum-search-list', $data);
    }
}