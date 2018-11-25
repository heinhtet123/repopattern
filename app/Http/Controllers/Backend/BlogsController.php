<?php

/**
* @author hein-htet
*/


namespace App\Http\Controllers\Backend;
use Gate;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Repositories\BlogRepository;
use App\Repositories\Criteria\BlogCriteria\BlogCriteria;
use Intervention\Image\ImageManager as Image;
use Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // to test
    private $blog;
    
    public function __construct(BlogRepository $blog)
    {
        $this->blog=$blog;
    }



    public function index(Request $request)
    {
        // $blogs=Blog::findOrFail(1);
        // if(Gate::denies("update-blog",$blogs))
        // {
        //     abort(401,"unauthorized");
        // }
        
        $this->blog->pushCriteria(new BlogCriteria());
        $blog_post=$this->blog->getAll($request); 

        return view('backend.blogs.index')->with('blogs',$blog_post);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog)
    {
      //  $this->authorize('create',$blog);
        return view('backend.blogs.register',['blog'=>$blog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //$request->file('attachment')->getClientOriginalName()
        $extension = $request->all();
        
        $structure = public_path().'/upload/blogs';
        $data_structure= public_path()."/upload/blogs";

        if(!file_exists($structure))
        {
            mkdir($structure,0777,true);
        }

       //  Storage::makeDirectory($structure,0777);
       //request->file('attachment')->move('upload/blogs',uniqid());

        //$image_name=uniqid();

        $image=new Image();
        $image->make($request->file('attachment'))->fit(576, 754)->save('upload/blogs/'.uniqid()."_large");
        $image->make($request->file('attachment'))->fit(220, 220)->save($structure.'/'.uniqid());
        $image->make($request->file('attachment'))->fit(80, 80)->save($structure.'/'.uniqid().'_thumbnail');

         


         $file=array('image' => $request->file('attachment')->getClientOriginalName());
         print_r($file);
         exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($id)
    {
        //
    }


    ////////////////////////  ajax call for   /////////////////////////////////
    public function update_newpost(Request $request)
    {

        // $post_id=$request->session()->get('newpost_condition')+1;
        // $request->session()->put('newpost_condition',$post_id);
        // return response(["success"=>true]);
        // exit();
        $this->blog->pushCriteria(new BlogCriteria());
        $items=$this->blog->updateNewPost($request);
        return response($items);
        exit();
    }

    public function listing_access(Request $request)
    {
        $this->blog->pushCriteria(new BlogCriteria());
        $items=$this->blog->getScroll($request);
        
        return response($items);
        exit();
    }
    
    public function listing_newpost(Request $request)
    {   
        $this->blog->pushCriteria(new BlogCriteria());
        $items=$this->blog->getNewPost($request);
        if($items==false)
        {
           $items["false"]=$items;
        }

        return response($items);
        exit();
    }




}
