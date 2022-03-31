<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TheoDoi\TheoDoiRepository;
use Illuminate\Http\Request;

class TheoDoiFLController extends Controller
{
    private $TheoDoi;

    public function __construct(TheoDoiRepository $TheoDoi)
    {
        $this->TheoDoi=$TheoDoi;
    }

    /**
     * Show danh sách email theo dõi
     */
    public function index()
    {
        $data=$this->TheoDoi->getAll();
        return view('Admin.TheoDoi.index',compact('data',$data));
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
     *
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
     * Xóa
     */
    public function destroy($id)
    {
        $delete=$this->TheoDoi->delete($id);
        if ($delete){
            $message=[
                'message'=>"Xóa người theo dõi thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }else{
            $message=[
                'message'=>"Xóa người theo dõi thất bại.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }
    }
}
