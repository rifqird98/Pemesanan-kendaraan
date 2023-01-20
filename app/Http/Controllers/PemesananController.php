<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemesanan::with(['driver'],['atasan'],['atasan'],['kendaraan.jenis'])->get();

        return view('pages.admin.pemesanan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver = Driver::all();
        $atasan = Atasan::with('level')->get();
        $kendaraan = Kendaraan::with('jenis')->get();

        return view('pages.admin.pemesanan.create', compact('driver','atasan','kendaraan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        Pemesanan::create([
            'id_driver' => $request->id_driver,
            'persetujuan_1' => $request->persetujuan_1,
            'persetujuan_2' => $request->persetujuan_2,
            'tanggal_peminjaman' => $request->tanggalpeminjaman,
            'tanggal_pengembalian' => null,
            'id_kendaraan' => $request->kendaraan,
            'id_driver' => $request->id_driver,
            'status1'=> 0,
            'status2'=> 0,
        ]);

        return redirect()->route('pemesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Pemesanan::findOrFail($id);
        $data->delete();
        return \redirect()->back();
    }
}
