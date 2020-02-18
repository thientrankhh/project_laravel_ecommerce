<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function categoryp ($id){
        $data = [];
        $product = DB::table('product')->where('category_id',$id)->paginate(8);
        $categories = DB::table('category')->get();
        $origins = DB::table('origin')->get();
        foreach ($product as $value){
            foreach ($categories as $category){
                if(($value->category_id)==($category->category_id)){
                    $title = $category->category_name;
                }
            }
        }

        $data['title'] = $title;
        $data['product'] = $product;
        $data['origins'] = $origins;
        $data['categories'] = $categories;
        return view('category_product',$data);
    }
}
