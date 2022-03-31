<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\LienHe\LienHeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\LienHe;
use App\Http\Requests\LienHeEdit;

class LienHeController extends Controller
{
    private $LienHe;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(LienHeRepository $LienHe)
    {
        $this->LienHe = $LienHe;
    }
    public function index()
    {
        $data = $this->LienHe->getAll();
        return view('Admin.LienHe.index',compact('data'));
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
    // public function store(LienHe $request)
    // {

    //     $img =  $this->uploadSingle($this::PATH_UPLOADS,$request->img);
    //     $data = [
    //         'name'=> $request->name,
    //         'img'=> $img,
    //         'slug'=>Str::slug($request->name),
    //         'loai'=>$request->loai
    //     ];

    //     $this->LienHe->create($data);
    //     return redirect('quantri/lienhe')->with('success','Thêm thành công');
    // }

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
    // public function edit($id)
    // {
    //     $data  = $this->LienHe->find($id);
    //     return view('Admin.LienHe.edit',compact('data'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(LienHe $request, $id)
    // {
    //     $data = [
    //         'name'=> $request->name,
    //         'slug'=>Str::slug($request->name),
    //         'loai'=>$request->loai
    //     ];

    //     if($request->img){
    //         $img =  $this->uploadSingle($this::PATH_UPLOADS,$request->img);
    //         $data['img'] = $img;
    //     }

    //     $this->LienHe->update($id,$data);
        
    //     return redirect('quantri/LienHe')->with('success','Sửa thành công');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $this->LienHe->delete($id);
    //     // thiếu logic check xem có sản phẩm,bài viết, dịch vụ không
        
    //     return redirect('quantri/LienHe')->with('success','Xoá thành công');
    // }
}
