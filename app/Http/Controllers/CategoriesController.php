<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ]; 
        return view("backend_views.modules.categories.list_page")->with($data);
                                                                /*->with(compact($categories));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // addCategory 
    {
         $data = [
            'levels' => Category::where(['parent_id'=>0])->get()
        ]; 
        return view('backend_views.modules.categories.form_page')->with($data);
        /*$levels = Category::where(['parent_id'=>0])->get();
        return view('backend_views.modules.categories.form_page')->with(compact('levels'));*/
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
            /*echo "pre"; print_r($data); die;*/
            if(empty($data['status'])){
                $status = 0;
            }
            else{
                $status = 1;
            }

            $category = new Category;
            $category->category    = $data['category'];
            $category->parent_id   = $data['parent_id'];
            $category->description = $data['description'];
            $category->url         = $data['url'];
            $category->status      = $status;
            $category->save();

            return redirect(route('create_category_route'))->with('flash_message_success', 'Category insert successfully');
        }
        return redirect(route('create_category_route'))->with('flash_message_error', 'Category insert failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        /*$data = [
            'category' => Category::find($category_id)
            'levels' => Category::where(['parent_id'=>0])->get()
        ];
        return view('backend_views.modules.categories.form_page')->with($data);
         */
        
        $category = Category::where(['category_id'=>$category_id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('backend_views.modules.categories.form_page')->with(compact('category', 'levels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category = Category::where(['category_id'=>$category_id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('backend_views.modules.categories.form_page')->with(compact('category', 'levels'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
           /* echo "pre"; print_r($data); die;*/

            if(empty($data['status'])){
                $status = 0;
            }
            else{
                $status = 1;
            }

            Category::where([ 'category_id' => $category_id ])
            ->update([
                'category'    => $data['category'],
                'parent_id'   => $data['parent_id'],
                'description' => $data['description'], 
                'url'         => $data['url'],
                'status'      => $status
            ]);

            return redirect(route('index_category_route'))->with('flash_message_success', 'Category update successfully');
        }
        return redirect(route('index_category_route'))->with('flash_message_error', 'Category update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        if(!empty($category_id)){
            Category::where(['category_id' => $category_id])->delete();
            return redirect(route('index_category_route'))->with('flash_message_error', 'Category deleted succesfuly.');
        }
        /* 2nd way of delete
        $categories = Category::find($category_id);
        $categories->delete();
        return redirect()->route('index_category_route')->with('flash_message_error', 'Category deleted succesfuly.');
        */
    }
}
