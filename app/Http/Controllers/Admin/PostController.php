<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; //importiamo per generare lo slug
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'string|required|max:100',
            'content' => 'string|required'
        ]);

        // Insert
        $newPost = new Post(); //crea un nuovo oggetto Post
        $newPost->fill($request->all()); //filla il $newPost con i dati della request

        $slug = Str::of($request->title)->slug('-'); //genera lo slug

        $postExist = Post::where('slug', $slug)->first(); //cerca nel DB se esiste un post con lo stesso slug
        $count = 2; //il count parte da 2
        while ($postExist){ //se esiste un post con lo stesso slug $postExist risulta vero e entriamo nel while
            $slug = $slug . "-" . $count; //unisco slug e count

            $postExist = Post::where('slug', $slug)->first(); //controllo di nuovo se esiste un post con lo stesso slug

            $count++; //aumento il contatore
        }

        $newPost->slug = $slug; //inserisce lo slug in $newPost
        $newPost->save(); //pusha nel database

        // Post::create($request->all()); -- non si usa xk abbiamo già $newPost->save();

        // Redirect
        return redirect()->route('admin.posts.index')->with('success', "il post è stato creato");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validation
        $request->validate([
            'title' => 'string|required|max:100',
            'content' => 'string|required'
        ]);

        if($post->title != $request->title){
            $slug = Str::of($request->title)->slug('-'); //genera lo slug

            $postExist = Post::where('slug', $slug)->first(); //cerca nel DB se esiste un post con lo stesso slug
            $count = 2; //il count parte da 2
            while ($postExist){ //se esiste un post con lo stesso slug $postExist risulta vero e entriamo nel while
                $slug = $slug . "-" . $count; //unisco slug e count

                $postExist = Post::where('slug', $slug)->first(); //controllo di nuovo se esiste un post con lo stesso slug

                $count++; //aumento il contatore
            }
            $post->slug = $slug; //inserisce lo slug in $newPost
        }

        $post->fill($request->all());
        $post->save();

        //redirect
        return redirect()->route('admin.posts.show', $post->id)->with('success', "il post {$post['id']} è stato aggiornato");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', "il post {$post['id']} è stato cancellato");
    }
}
