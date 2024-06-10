<?php

namespace App\Export;
use App\Models\Region;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Region::select('*')->get();
    }
}
