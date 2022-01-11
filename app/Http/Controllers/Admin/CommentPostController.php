<?php

namespace App\Http\Controllers\Admin;

use App\Models\CommentPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CommentPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy(CommentPost $commentPost): RedirectResponse
    {
        $commentPost->delete();
        return redirect()
            ->route('admin.post.index')
            ->with(['success' => 'Le commentaire a bien été supprimé']);
    }
}
