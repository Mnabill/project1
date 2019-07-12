<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Facades\Storage;

use App\post ;

use DB;

class postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();

        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('cover_image'));

        $this->validate($request,[

            'name'=>'required',
            'details'=>'required',
            'cover_image'=>'image|nullable|max:1999'

        ]);

                if($request->hasfile('cover_image')){

                    $file= $request->file('cover_image');
                    $ext= $file->getClientOriginalExtension();
                    $filename = 'cover_image'. '_'. time(). '.'. $ext;
                    $file->storeAs('public/cover_image',$filename);
                    
                }else{
                    $filename= 'noimages.jpg';

                }

            $post= new post;
            $post->name= $request->input('name');
            $post->details= $request->input('details');
            $post->cover_image = $filename;
            $post->save();

            return redirect('/posts')->with('success','Product Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('ok');
        // $posts= post::find($id);
        $posts = DB::select('select * from posts where id=?',[$id]);
        return view('posts.show',['posts' => $posts]);
        // dd('ok');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post= post::find($id);
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,[

            'name'=>'required',
            'details'=>'required',

        ]);

                if($request->hasfile('cover_image')){

                    $file= $request->file('cover_image');
                    $ext= $file->getClientOriginalExtension();
                    $filename = 'cover_image'. '_'. time(). '.'. $ext;
                    $file->storeAs('public/cover_image',$filename);
                    
                }

            $post=  post::find($id);
            $post->name= $request->input('name');
            $post->details= $request->input('details');
            if($request->hasfile('cover_image')){

                $post->cover_image = $filename;
            }
            
            $post->save();

            return redirect('/posts')->with('success','Product Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);

        if( $post->cover_image != 'noimage.jpg' ){

            Storage::delete('public/cover_image/'. $post->cover_image);

        }

        $post->delete();
        return redirect('/posts')->with('success','Post deleted');
    }
}
