<?php

namespace App\Http\Controllers;
use App\Http\Requests\HomeRequest;
use DB;
use App\Model\Product;
use App\Model\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data = [];
        $products = DB::table('product')->where('status','0')->paginate(8);
        $categories = DB::table('category')->get();
        $origins = DB::table('origin')->get();
        $data ['products'] = $products;
        $data['categories'] = $categories;
        $data['origins'] = $origins;
        return view('index',$data);
    }

    public function timkiem (Request $request) {
        $search_product = $request->search_product;
        $search_product = '%'.$search_product.'%';

        $categories = DB::table('category')->where()->get();
        $origins = DB::table('origin')->get();
        $products = DB::table('product')->where('product_name','like',$search_product);

    }

    public function lienhe() {
        $data = [];
        $products = DB::table('product')->where('status','0')->paginate(8);
        $categories = DB::table('category')->get();
        $origins = DB::table('origin')->get();
        $data ['products'] = $products;
        $data['categories'] = $categories;
        $data['origins'] = $origins;
        return view('lienhe',$data);
    }



}
