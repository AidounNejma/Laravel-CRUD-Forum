<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request,$id){

        /* Validation des inputs */
        $request->validate([
            'content' => ['required', 'string', 'max:500']
        ]);

        $comment = new Comment();

        $comment->content =  $request->input('content');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->save();

        return redirect()->back()->with('status', 'Commentaire envoyé !');
    }

    public function destroyComment($id){

        $comment= Comment::find($id);

        $comment->delete();
        return redirect()->back()->with('status', 'Le commentaire a été supprimé avec succès !');
    }
}
