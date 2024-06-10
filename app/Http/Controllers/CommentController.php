<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function delete($id_comment)
    {
        $comment = Comment::findOrFail($id_comment);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function update(Request $request, $id_comment)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id_comment);
        $comment->update([
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }
}
