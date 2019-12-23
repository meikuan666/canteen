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

        return  response()->json(['success' => true,'message' => '查询成功','bags' => Bag::all()]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bag::create($request->all());
        return  response()->json(['success' => true,'message' => '新增成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bags = Bag::where('id', $id)->get();
        return  response()->json(['success' => true,'message' => '新增成功'],compact('bags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bags = Bag::find($id);
        $bags->update([
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
        ]);
        return  response()->json(['success' => true,'message' => '修改成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  response()->json(['success' => true,'message' => '删除成功','bags' => Bag::destroy($id)]);
    }
}
