<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use DB;
use Illuminate\Http\Request;
use Matrix\Exception;
use DateTime,File,Input;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('product')->paginate(5);
        $data['products'] = $products;
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $categories = DB::table('category')->get();
        $origins = DB::table('origin')->get();
        $promotions = DB::table('promotion')->get();
        $data ['categories'] = $categories;
        $data['origins'] = $origins;
        $data['promotions'] = $promotions;
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();

        //Xử lý hình ảnh trên server với image và thumbail
//       if ($request->hasFile('image')) {
//           $images = $request->file('image');
//           $filename = time().'.'.$images->getClientOriginalName();
//           $images-> move(public_path('assets/frontend/images/products/'),$filename);
//
//       }
//        dd($filename);

//        $image_dir_path1 = getcwd().asset("assets\frontend\images\thumbail");
//        if (isset($_FILES['thumbail'])) {
//            $filename = $_FILES['thumbail']['name'];
//            if (!empty($filename)) {
//                $source = $_FILES['thumbail']['tmp_name'];
//                $target = $image_dir_path1.'/'.$filename;
//                move_uploaded_file($source,$target);
//                $params['thumbail'] = $filename;
//            }
//        } else {
//            $params['thumbail'] = "";
//        }
        if ($params['quantity_instore'] > 0) {
            $status = 0;
        }else {
            $status =1;
        }


        $dataInsert = [
            'product_name' => $params['product_name'],
            'category_id' => $params['category_id'],
            'origin_id' => $params['origin_id'],
            'promotion_id' => $params['promotion_id'],
            'price' => $params['price'],
            'actual_price' => $params['actual_price'],
            'quantity_instore' => $params['quantity_instore'],
            'parameter' => $params['parameter'],
            'description' => $params['description'],
            'guarantee' => $params['guarantee'],
            'image' => $params['image'],
            'thumbail' => $params['thumbail'],
            'status' => $status
        ];

        try {
            DB::beginTransaction();
            DB::table('product')->insert($dataInsert);
            DB::commit();

            return redirect()->route('product.index')->with('success','Thêm mới thành công');
        } catch (Exception $exception) {
            DB::rollBack();

            return  redirect()->route('product.index')->with('error','Thêm mới thất bại');
        }
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
        $data = [];
        $product = DB::table('product')->where('product_id',$id)->get();
        $categories = DB::table('category')->get();
        $origins = DB::table('origin')->get();
        $promotions = DB::table('promotion')->get();
        $data ['categories'] = $categories;
        $data['origins'] = $origins;
        $data['promotions'] = $promotions;
        $data['product'] = $product;

        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $params = $request->all();
        if (($params['image'])==($params['old_image']) || $params['image']=="") {
            $image = $params['old_image'];
        } else {
            $image = $params['image'];
        }
        if (($params['thumbail'])==($params['old_thumbail']) || $params['thumbail']=="") {
            $thumbail = $params['old_thumbail'];
        } else {
            $thumbail = $params['thumbail'];
        }

        $dataUpdate = [
            'product_name' => $params['product_name'],
            'quantity_instore' => $params['quantity_instore'],
            'category_id' => $params['category_id'],
            'origin_id' => $params['origin_id'],
            'promotion_id' => $params['promotion_id'],
            'price' => $params['price'],
            'actual_price' => $params['actual_price'],
            'description' => $params['description'],
            'parameter' => $params['parameter'],
            'guarantee' => $params['guarantee'],
            'image' => $image,
            'thumbail' => $thumbail,
        ];

        try {
            DB::beginTransaction();
            DB::table('product')->where('product_id',$id)->update($dataUpdate);
            DB::commit();

            return redirect()->route('product.index')->with('success','Update successful');
        } catch (Exception $exception) {
            DB::rollBack();
            return  redirect()->route('product.index')->with('error','Update Fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            DB::table('product')->where('product_id',$id)->delete();
            DB::commit();

            return redirect()->route('product.index')->with('success','Delete successfull');
        } catch (Exception $exception) {
            DB::rollBack();

            return  redirect()->route('product.index')->with('error','Delete Fail');
        }
    }
}
