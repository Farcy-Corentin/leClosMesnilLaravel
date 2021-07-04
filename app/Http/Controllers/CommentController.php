<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

use App\Models\CommentPost;
use App\Http\Requests\TemplateForm;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Faut etre identifier pour commenter
     * un post
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($post, Request $request)
    {
        $validated = $this->getValidatedData($request);

        $p = Post::find($post);
        $comment = new CommentPost();
        $comment->post_id = $p->id;
        $comment->content = $validated['content'];
        $comment->author = auth()->user()->id;
        $comment->save();
        $p->comment_count += 1;
        $p->save();

        return redirect()->route('RouteShowPost', $p->slug);
    }

    public function update(int $id, Request $request)
    {
        $validated = $this->getValidatedData($request);

        $comment = CommentPost::find($id);
        $comment->content = $validated['content'];
        $comment->save();
        return redirect()->route('RouteShowPost', $comment->posts->slug);
    }

    /**
     * The visitor can delete his comment
     */
    public function destroy(int $comment)
    {
        $comment = CommentPost::find($comment);
        if ($comment === null) {
            return back()->with('error', 'comment not found');
        }
        $comment->posts->comment_count -= 1;
        $comment->posts->save();

        $comment->delete();
        return back();
    }

    private function getValidatedData(Request $request): array
    {
        return $request->validate([
            'content' => 'required|min:5'
        ]);
    }
}