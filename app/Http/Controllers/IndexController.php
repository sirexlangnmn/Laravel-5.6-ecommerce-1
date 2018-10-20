<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;

class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::where('banner_status', 1)->get();
        return view('index')->with(compact('banners'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {

        /*ascending order (default)*/
        $productsAll = Product::inRandomOrder()->get();
                                               /*->paginate(9);*/
        /*$productsAll = Product::orderBy('product_id', 'DESC')->get();*/

        /* with('categories') hasMany .. is a function found in Category Model.
         it is need to  create a relation and to do the advance approach */
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        /*$categories = json_decode(json_encode($categories));
        echo "<pre>"; print_r($categories);*/


       
       // This is for Basic approach. (Without realtion).  
       // Place this piece of code on index where it belong. <?php echo $categories_menu; 

        /*$categories_menu = "";
        foreach($categories as $cat){
            $categories_menu .= 
            "<div class='panel-heading'>
                <h4 class='panel-title'>
                    <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->category_id."'>
                        <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                        ".$cat->category."
                    </a>
                </h4>
            </div>
            <div id='".$cat->category_id."' class='panel-collapse collapse'>
                <div class='panel-body'>
                    <ul>";
                        $sub_categories = Category::where(['parent_id'=>$cat->category_id])->get();
                        foreach($sub_categories as $subcat){
                            echo $subcat->category; echo '<br />';
                            $categories_menu .=  "<li><a href='".$subcat->url."'>".$subcat->category."</a></li>";
                        }
                        $categories_menu .= "
                    </ul>
                </div>
            </div>";*/

        /*return view('index')->with(compact('productsAll', 'categories_menu'));*/
        return view('frontend_views/modules/allProducts_page')->with(compact('productsAll', 'categories'));
            
    }
        
    public function contactUs()
    {
        /*return view('frontend_views/modules/home');*/
        return view('frontend_views/modules/contact_page');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
