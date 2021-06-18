<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('blog.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        // dd($request->all());

        $newImageName = uniqid(). $request->title. $request->image->extension();

        $test = $request->image->move(public_path('images'),$newImageName);
        
            Post::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'image_path'=> $newImageName,
                'user_id'=>auth()->user()->id
            ]);

            return redirect('/posts')->with('message','Your post has been added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id',$id)->first();
        
        return view('blog.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();

        // check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('message','Unauthorized user');
        }

        return view('blog.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // we need to validate the input
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'mimes:png,jpg,jpeg|max:5048'
        ]);

        // dd($request->all());
        // dd($request->image);
        // $input = $request->all();

        if($image = $request->file('image')){
            $newImageNameUpdate = uniqid(). $request->title. $request->image->extension();
            $test =$request->image->move(public_path('images'),$newImageNameUpdate);
            
            Post::where('id',$id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'image_path' => $newImageNameUpdate,
                'user_id'=>auth()->user()->id
            ]);


        }else{
            Post::where('id',$id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'user_id'=>auth()->user()->id
            ]);
            
        }

        // Post::where('id',$id)->update([
        //     'title'=>$request->title,
        //     'description'=>$request->description,
        //     'image_path' => $newImageNameUpdate,
        //     'user_id'=>auth()->user()->id
        // ]);

        // Post::where('id', $id)->update($input);


            return redirect('posts')->with('message', 'Post Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Post::where('id',$id)->delete();

        $post = Post::find($id);

        // check correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('message','Unauthorized Page');
        }

        $post->delete();
        return redirect('posts')->with('message','Post Deleted');
    }
}
