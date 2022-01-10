<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{

     /* Afficher tous les articles */
    public function show(){
        $posts = Post::all();

        return view('layouts/show_all_posts', [
            'posts'=> $posts
        ]);
    }

    /* Afficher qu'un seul post */
    public function showOnePost($id){
        $post = Post::findOrFail($id);
        $comments = Comment::all();

        $results = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->select('users.id', 'users.name')
            ->get();

        $pseudo = [];

        foreach($results as $result){
            $pseudo[$result->id] = $result->name;
        }

        return view('layouts/show_one_post', [
            'post' => $post,
            'comments'=> $comments,
            'pseudo'=>$pseudo
        ]);
    }

    /* Afficher le formulaire */
    public function create(){

        return view('admin/add_posts_admin');

    }

    /* Ajouter un nouveau post */
    public function addPosts(Request $request){

        /* Validation des inputs */
        $request->validate([
            'title' => ['required', 'string','min:1', 'max:70', 'unique:posts'],
            'summary' => ['required', 'string', 'max:500'],
            'released_at' => ['required', 'date'],
            'picture' => ['required'],
            'type' => ['required', 'string'],
            'duration' => ['required', 'integer']
        ]);

            /* Création d'un nouvel objet */
            $post= new Post();
            $post->title =  $request->input('title');
            $post->summary = $request->input('summary');
            $post->released_at = $request->input('released_at');
            $post->type = $request->input('type');
            $post->duration = $request->input('duration');

            if($request->hasFile('picture')){
                $file = $request->file('picture');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('pictures/', $filename);
                $post->picture = $filename;
            }
            $post->save();

        return redirect()->back()->with('status', 'L\'article a été créé avec succès !');
    }

    /* Editer un article */
    public function editPost($id){
        $post = Post::findOrFail($id);

        return view('admin/edit_post', [
            'post' => $post
        ]);
    }

    /* Envoi du formulaire au clic du btn submit */
    public function submitEdit(Request $request, $id){

        $request->validate([
            'title' => ['required', 'string','min:1', 'max:70'],
            'summary' => ['required','string', 'max:500'],
            'released_at' => ['required', 'date'],
            'type' => ['required', 'string'],
            'duration' => ['required', 'integer']
        ]);
            $update = Post::find($id);
            $update->title =  $request->input('title');
            $update->summary = $request->input('summary');
            $update->released_at = $request->input('released_at');
            $update->type = $request->input('type');
            $update->duration = $request->input('duration');

            if($request->file('picture') != null){
                if($request->hasFile('picture')){

                    $destination = 'pictures/'. $update->picture;
                    if(File::exists($destination)){
                        File::delete($destination);
                    }

                    $file = $request->file('picture');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('pictures/', $filename);
                    $update->picture = $filename;
                }
                $update->update();
                return redirect()->back()->with('status', 'L\'article a été modifié avec succès !');
            }
            else{
                $update->update();
                return redirect()->back()->with('status', 'L\'article a été modifié avec succès !');
            }


    }

    /* Voir tous les posts dans le tableau administrateur */
    public function viewPostsAdmin(){
        $posts = Post::all();

        return view('admin/posts_view_admin', [
            'posts'=> $posts
        ]);
    }

    public function destroyPost($id){
        $post= Post::find($id);
        $destination = 'pictures/'.$post->picture;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $post->delete();
        return redirect()->back()->with('status', 'L\'article a été supprimé avec succès !');
    }
}
