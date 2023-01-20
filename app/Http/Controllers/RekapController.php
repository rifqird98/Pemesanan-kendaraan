<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Pemesanan;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.rekap.index');
    }
    public function export(Request $request)
    {
        $data = Pemesanan::with(['driver'], ['atasan'], ['atasan'], ['kendaraan.jenis'])
            ->whereBetween('tanggal_peminjaman', [$request->tgl_awal, $request->tgl_akhir])
            ->first()
            ->get();
            
        DB::table('exports')->truncate();
        foreach ($data as $item) {
            if ($item->status_pengambilan == null) {
                $status = "belum dikembalikan";
            } else {
                $status = "sudah dikembalikan";
            }
            Export::create([
                'nama_driver' => $item->driver->first()->nama,
                'nama_kendaraan' => $item->kendaraan->first()->namakendaraan,
                'jenis_kendaraan' => $item->kendaraan->first()->jenis->jenis,
                'nama_persetujuan1' => $item->atasan->first()->nama,
                'nama_persetujuan2' => $item->atasan2->first()->nama,
                'status_pengembalian' => $status,
            ]);
        }
        return Excel::download(new UsersExport, 'rekap.xlsx');
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
        $data = Pemesanan::with(['driver'], ['atasan'], ['atasan'], ['kendaraan.jenis'])
            ->whereBetween('tanggal_peminjaman', [$request->tanggalawal, $request->tanggalakhir])
            ->first()
            ->get();
        $tgl = [
            'mulai' => $request->tanggalawal,
            'akhir' => $request->tanggalakhir
        ];
        return view('pages.admin.rekap.index', compact('data', 'tgl'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
