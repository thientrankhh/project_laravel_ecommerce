<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use DB;
use App\Model\Category;
use Illuminate\Http\Request;
use Matrix\Exception;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('category')->paginate(5);
        $data ['categories'] = $categories;
        return view('admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $params = $request->all();
        $dataInsert = [
            'category_name' => $params['category_name']
        ];
        try {
            DB::beginTransaction();
            DB::table('category')->insert($dataInsert);
            DB::commit();

            return  redirect()->route('category.index')->with('success','Thêm mới thành công');
        }catch (Exception $exception) {
            DB::rollBack();
            return  redirect()->route('category.index')->with('error','Thêm mới thất bại');
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
        $category = DB::table('category')->where('category_id',$id)->get();
        $data ['category'] = $category;
        return  view('admin.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $params = $request->all();
        $dataUpdate = [
            'category_name' => $params['category_name']
        ];
        try {
            DB::beginTransaction();
            DB::table('category')->where('category_id',$id)->update($dataUpdate);
            DB::commit();

            return  redirect()->route('category.index')->with('success','Update successful');
        }catch (Exception $exception) {
            DB::rollBack();
            return  redirect()->route('category.index')->with('error','Update Fail');
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
            DB::table('category')->where('category_id',$id)->delete();
            DB::commit();
//            return response()->json([
//                'success'=>'Delete successfull.'
//            ]);

            return redirect()->route('category.index')->with('success','Delete successfull');
        }catch (Exception $exception){
            DB::rollBack();
//            return response()->json([
//                'error'=>'Delete Fail'
//            ]);

            return redirect()->route('category.index')->with('error','Delete Fail.');
        }
    }
}
