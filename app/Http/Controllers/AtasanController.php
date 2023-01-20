<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AtasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Pemesanan::with(['driver'],['atasan'],['atasan'],['kendaraan.jenis'])->get();
        return view('pages.persetujuan.index',compact('data'));
    }

    public function status (Request $request, $id)
    {
     $data = Pemesanan::findOrFail($id);
     $item = $request->atasan;
     if ($item == 1) {
        $data->status1 = 1;
        $data->save();
     } else {
        $data->status2 = 1;
        $data->save();
     }
     
     return \redirect()->back();

        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atasan  $atasan
     * @return \Illuminate\Http\Response
     */
    public function show(Atasan $atasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atasan  $atasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Atasan $atasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atasan  $atasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atasan $atasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atasan  $atasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atasan $atasan)
    {
        //
    }
}
