<?php

namespace App\Exports;

use App\Models\Export;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Export::all();
    }

    public function headings(): array
    {
       return ["no","nama driver","nama Kendaraan","jenis kendaraan","nama persetujuan 1","nama persetujuan 2","status pengembalian"];
        # code...
    }
}
