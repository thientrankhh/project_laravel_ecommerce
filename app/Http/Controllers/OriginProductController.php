<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class OriginProductController extends Controller
{
    public function originp ($id){
        $data = [];
        $product = DB::table('product')->where('origin_id',$id)->paginate(8);
        $categories = DB::table('category')->get();
        $origins = DB::table('origin')->get();
        foreach ($product as $value){
            foreach ($origins as $origin){
                if(($value->origin_id)==($origin->origin_id)){
                    $title = $origin->origin_name;
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
