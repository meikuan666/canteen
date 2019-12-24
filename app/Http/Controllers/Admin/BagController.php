<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bag;

class BagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(['success' => true, 'message' => '查询成功', 'bags' => Bag::all()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bag = Bag::create($request->all());
        return response()->json(['success' => true, 'message' => '新增成功','bag' => $bag]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bag = Bag::find($id);
        return response()->json(['success' => true, 'message' => '查询成功', 'bag' => $bag]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bag = Bag::where('id',$id)->update($request->only('name','image','price'));

        return response()->json(['success' => true, 'message' => '修改成功','bag' => $bag]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bag::destroy($id);
        return response()->json(['success' => true, 'message' => '删除成功']);
    }
}
