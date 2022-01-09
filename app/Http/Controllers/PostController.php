<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function create(){

        return view('admin/add_posts_admin');

    }

    public function addPosts(Request $request){

        $request->validate([
            'title' => ['required', 'string','min:1', 'max:70', 'unique:posts'],
            'summary' => ['required', 'string', 'max:500'],
            'released_at' => ['required', 'date'],
            'picture' => ['required', 'string']
        ]);

        Post::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'released_at' => $request->released_at,
            'picture'=> $request->picture
        ]);

        return redirect('/dashboard-admin');
    }

    public function show(){
        $posts = Post::all();

        return view('layouts/show_all_posts', [
            'posts'=> $posts
        ]);
    }

    public function showOnePost($id){
        $post = Post::findOrFail($id);

        return view('layouts/show_one_post', [
            'post' => $post
        ]);
    }

    public function modifyPost($id){
        $post = Post::findOrFail($id);

        return view('layouts/modify_post', [
            'post' => $post
        ]);
    }

    public function submitEdit(Request $request){

        $request->validate([
            'title' => ['required', 'string','min:1', 'max:70'],
            'summary' => ['required','string', 'max:500'],
            'released_at' => ['required', 'date'],
            'picture' => ['required','string']
        ]);
            $update = Post::find($request->id);
            $update->title = $request->title;
            $update->summary = $request->summary;
            $update->released_at = $request->released_at;
            $update->picture = $request->picture;
            $update->save();


        return redirect('tous-les-posts/'. $request->id);
    }
}
