<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input; // for uploading files files
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use App\Banner;
use Session;
use Image;
use DB;


class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();
        return view("backend_views.modules.banners.list_page")->with(compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend_views.modules.banners.form_page");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $banner = new Banner;
            
            // banner image
            if(empty($data['banner_image'])){
                return redirect()->back()->with('flash_message_error','Banner Image is missing.');
            }

            // banner status
            if(empty($data['banner_status'])){
                $banner_status = 0;
            }
            else{
                $banner_status = 1;
            }

            $banner->banner_title       = $data['banner_title'];
            $banner->banner_tagline     = $data['banner_tagline'];
            $banner->banner_description = $data['banner_description'];
            $banner->banner_link        = $data['banner_link'];
            $banner->banner_status      = $banner_status;
            
            //upload files/image
            if($request->hasFile('banner_image')){
                $image_tmp = Input::file('banner_image');
                /*echo "<pre>"; print_r($image_tmp); die;*/
                
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                      
                    $large_image_path = 'backend_assets/images/banners/large'.'/'.$fileName;
                    $medium_image_path = 'backend_assets/images/banners/medium'.'/'.$fileName;  
                    $small_image_path = 'backend_assets/images/banners/small'.'/'.$fileName; 
                    $thumbnail_image_path = 'backend_assets/images/banners/thumbnail'.'/'.$fileName;  

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($image_tmp)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($medium_image_path);

                    Image::make($image_tmp)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($small_image_path);

                    Image::make($image_tmp)->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($thumbnail_image_path);

                    // Stretch the image to be fit to your declared dimension
                    /*Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/

                    // Store image name in products table
                    $banner->banner_image = $fileName;

                }
            }

            $banner->save();

            return redirect(route('createBanners_route'))->with('flash_message_success', 'Banner insert successfully');
        }
        return redirect(route('createBanners_route'))->with('flash_message_error', 'Banner insert failed');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($banner_id)
    {
        $banner = Banner::where(['banner_id'=>$banner_id])->first();
        return view('backend_views.modules.banners.form_page')->with(compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($banner_id)
    {
        $banner = Banner::where(['banner_id'=>$banner_id])->first();
        return view('backend_views.modules.banners.form_page')->with(compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $banner_id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "pre"; print_r($data); die;*/

            // banner status
            if(empty($data['banner_status'])){
                $banner_status = 0;
            }
            else{
                $banner_status = 1;
            }  

            //upload files/image
            if($request->hasFile('banner_image')){
                $image_tmp = Input::file('banner_image');
                
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $original_image_path = 'backend_assets/images/banners/orginal'.'/'.$fileName;  
                    $large_image_path = 'backend_assets/images/banners/large'.'/'.$fileName;
                    $medium_image_path = 'backend_assets/images/banners/medium'.'/'.$fileName;  
                    $small_image_path = 'backend_assets/images/banners/small'.'/'.$fileName; 
                    $thumbnail_image_path = 'backend_assets/images/banners/thumbnail'.'/'.$fileName;  

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($image_tmp)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($medium_image_path);

                    Image::make($image_tmp)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($small_image_path);

                    Image::make($image_tmp)->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($thumbnail_image_path);

                    // Stretch the image to be fit to your declared dimension
                    /*Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/

                    // Store image name in products table
                    /*$product->banner_image = $fileName;*/

                }
            }
            else{
                $fileName = $data['current_image']; 
            }


            Banner::where([ 'banner_id' => $banner_id ])
            ->update([
                'banner_title'       => $data['banner_title'],
                'banner_tagline'     => $data['banner_tagline'],
                'banner_description' => $data['banner_description'],
                'banner_link'        => $data['banner_link'],
                'banner_status'      => $banner_status,
                'banner_image'       => $fileName
                
            ]);

            return redirect(route('indexBanners_route'))->with('flash_message_success', 'Banners update successfully');
            
        }
        return redirect(route('indexBanners_route'))->with('flash_message_error', 'Banner update failed');
    }


     public function destroyBannerImage($banner_id)
    { 
        // get banner image name
        $bannerImage = banner::where(['banner_id' => $banner_id])->first();
        /*echo $bannerImage->banner_image; die;*/

        // get banner image path
        $large_image_path = 'backend_assets/images/banners/large/';
        $medium_image_path = 'backend_assets/images/banners/medium/';  
        $small_image_path = 'backend_assets/images/banners/small/'; 
        $thumbnail_image_path = 'backend_assets/images/banners/thumbnail/';

        // delete large image if not exists in folder
        if (file_exists($large_image_path.$bannerImage->banner_image)) {
            unlink($large_image_path.$bannerImage->banner_image);
        }
        // delete medium image if not exists in folder
        if (file_exists($medium_image_path.$bannerImage->banner_image)) {
            unlink($medium_image_path.$bannerImage->banner_image);
        }
        // delete small image if not exists in folder
        if (file_exists($small_image_path.$bannerImage->banner_image)) {
            unlink($small_image_path.$bannerImage->banner_image);
        }
        // delete thumbnail image if not exists in folder
        if (file_exists($thumbnail_image_path.$bannerImage->banner_image)) {
            unlink($thumbnail_image_path.$bannerImage->banner_image);
        }

        // delete image from banners table
        banner::where(['banner_id'=>$banner_id])->update(['banner_image'=>'']);
        return redirect()->back()->with('flash_message_success', 'Banner Image has been deleted succesfuly.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($banner_id)
    {
        if(!empty($banner_id)){
            Banner::where(['banner_id' => $banner_id])->delete();
            return redirect(route('indexBanners_route'))->with('flash_message_error', 'Banner deleted succesfully.');
        }
    }
}
