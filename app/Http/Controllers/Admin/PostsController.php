<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    private $post;
    public function __construct(Post $post)
    {
        $this->post= $post;
    }
    public function index()
    {
        $all_posts= $this->post->withTrashed()->latest()->paginate(10);
        return view('admin.posts.index')->with('all_posts', $all_posts);
    }
    public function hidden($id)
    {
        $this->post->destroy($id);
        return redirect()->back();
    }
    public function visible($id)
    {
        $this->post->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }
}