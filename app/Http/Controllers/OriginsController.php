<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class OriginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $origins = DB::table('origin')->paginate(5);
        $data['origins'] = $origins;
        return view('admin.origin.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.origin.create');
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
        $dataInsert = [
            'origin_name' => $params['origin_name']
        ];
        try {
            DB::beginTransaction();
            DB::table('origin')->insert($dataInsert);
            DB::commit();

            return  redirect()->route('origin.index')->with('success','Thêm mới thành công');
        }catch (Exception $exception) {
            DB::rollBack();
            return  redirect()->route('origin.index')->with('error','Thêm mới thất bại');
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
        $origin = DB::table('origin')->where('origin_id',$id)->get();
        $data ['origin'] = $origin;
        return  view('admin.origin.edit',$data);
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
        $params = $request->all();
        $dataUpdate = [
            'origin_name' => $params['origin_name']
        ];
        try {
            DB::beginTransaction();
            DB::table('origin')->where('origin_id',$id)->update($dataUpdate);
            DB::commit();

            return  redirect()->route('origin.index')->with('success','Update successful');
        }catch (Exception $exception) {
            DB::rollBack();
            return  redirect()->route('origin.index')->with('error','Update Fail');
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
            DB::table('origin')->where('origin_id',$id)->delete();
            DB::commit();

            return redirect()->route('origin.index')->with('success','Delete successfull');
        }catch (Exception $exception){
            DB::rollBack();

            return redirect()->route('category.index')->with('error','Delete Fail.');
        }
    }
}
