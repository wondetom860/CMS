<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public $contacts = [
        [
            "name" => "Wonde",
            "propic" => 'profile-picture.jpeg',
            'date_of_birth' => 18987676,
            'company' => 'ETDU',
            'role' => 'Programmer',
        ],
        [
            "name" => "Belete",
            "propic" => 'pr1.jpg',
            'date_of_birth' => 19675463,
            'company' => 'ETDU',
            'role' => 'Junior Programmer',
        ],
        [
            "name" => "Ahmed",
            "propic" => 'team-image-2.jpeg',
            'date_of_birth' => 17895478,
            'company' => 'ETDU',
            'role' => 'Data Analyst',
        ]
    ];

    public function index()
    {
        $posts = Post::all();
        return view('posts.posts')->with('contacts', $posts);
    }

    public function about($name)
    {
        return view('posts.about', ['profileData' => $this->getProfileData($name)]);
    }

    private function getProfileData($name)
    {
        $profileData = NULL;
        foreach ($this->contacts as $contact) {
            if (isset($contact['name']) && $contact['name'] == $name) {
                $profileData = $contact;
            }
        }
        return $profileData;
    }

    public function find($id)
    {

        if (($post = Post::find($id)) !== NULL) {
            return view('posts.post')->with('post', $post);
        } else {
            return view('error')->with('message', 'Such record not foud.');
        }
    }
    public function insertPostWithPostImage(){
        $post = new Post();
        $post->title = 'New Person 2';
        $post->body = 'QA Analyst 2';
        $post->created_by = 7;
        $post->sealData();
        $postImage = new PostImage(['name' => 'New Person Image','url' => '/images/postImage/rer.jpg']);
        $post->save();
        $post->postImage()->save($postImage);
        $post->save();
    }

    public function getPostImage($postId){
        return Post::find($postId)->postImage;
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->restore();

        return view('posts.posts')->with('contacts', Post::all());
    }

    public function readSoftDeletes(){
        return view('posts.posts', ['contacts'=> Post::onlyTrashed()->get()]);
    }

    public function softDelete($id){
        if (Post::where('id',$id)->delete()) {
            return view('posts.posts')->with('contacts', Post::all());
        } else {
            return view('error')->with('message', 'Soft.Delete de Record failed.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function insert()
    {
        $model = new Post;
        // str_pad
        $model->title = 'New Post_:_' . str_pad((string)rand(99, 10000), 4, '0', STR_PAD_LEFT);
        $model->body = "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum";
        // Auth::user()->id;
        $model->created_by = 11;
        $model->sealData();
        if ($model->save()) {
            return redirect()->route("post.list")->with("success", "Record inserted succesfully");
        } else {
            return redirect()->route("error")->with("message", 'Record inserting failed.');
        }
    }

    public function select()
    {
        $posts = Post::all();
        return view('posts.posts')->with('contacts', $posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // create equivalent
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //view equivalent
    {
        if (($post = Post::find($id)) !== NULL) {
            return view('posts.post')->with('post', $post);
        } else {
            return view('error')->with('message', 'Such record not foud.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //update equivalent
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //delete equivalent
    {
        //
    }
}
