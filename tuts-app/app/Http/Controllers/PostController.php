<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {     
        return[
            // new Middleware('auth',only:['store']),
            new Middleware('auth',except:['index','show'])
        ];
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::orderBy('created_at','desc')->get();


       
        // same as above
        $posts = Post::latest()->paginate(5);
        
        
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

       

        // dd('ok');
        // validate
        $request->validate([
            'title'=>['required','max:255'],
            'body'=>['required'],
            'image'=>['nullable','file','max:10000','mimes:png,jpg,webp,svg']
        ]);

        $path = null;
        // store image if it exists
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('posts_images', $request->image);

        }
        

        // create
        // Post::create([$fields]);
        // ignore the red-flag
        
        $post=Auth::user()->posts()->create([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$path,
        ]);

         // sending mail

         Mail::to('dankyiemmanuel0@gmail.com')->send(new WelcomeMail(Auth::user(),$post));

        // redirect to dashboard
        return back()->with('success','Your post was created...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view ('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        // applying policies to edit
        Gate::authorize('modify',$post);
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // applying policies to edit
        Gate::authorize('modify',$post);

        // dd(Auth::user());
        // validate

        $request->validate([
            'title'=>['required','max:255'],
            'body'=>['required'],
            'image'=>['nullable','file','max:2000','mimes:png,jpg,webp']
        ]);


        $path = $post->image ?? null;
        // store image if it exists
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete( $post->image);
            }
            $path = Storage::disk('public')->put('posts_images', $request->image);

        }

        // update the post
       
        // ignore the red-flag
        $post->update(
            [
                'title'=>$request->title,
                'body'=>$request->body,
                'image'=>$path,
            ]
        );

        // redirect to dashboard
        return redirect()->route('dashboard')->with('success','Your post was updated...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
         // store image if it exists
         if ($post->image) {
            Storage::disk('public')->delete( $post->image);

        }

        // applying policies to edit
        Gate::authorize('modify',$post);

        $post->delete();

        return back()->with('delete','your post was deleted');
    }
}
