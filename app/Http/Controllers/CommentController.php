<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment= $comment;
    }
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'comment_body' . $post_id=>'required|max:150'
        ],
        [
            'comment_body'. $post_id . '.required' =>'Cannot submit an empty comment.',
            'comment_body'. $post_id . '.max' =>'The comment must not be greater than 150 characters',
        ]
    );

        $this->comment->user_id = Auth::user()->id;  //Who created the comment
        $this->comment->post_id =$post_id;            //Which post did the user make the comment
        $this->comment->body    =$request->input('comment_body' . $post_id);
        $this->comment->save();

        return redirect()->back();
    }
    public function destroy($id)
    {
        $this->comment->destroy($id);
        return redirect()->back();
    }
}
