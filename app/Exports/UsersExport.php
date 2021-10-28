<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Products;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Products::all();
    }
    public function headings(): array
    {
        return [
            'Id', 'Name', 'Description', 'Price'
        ];
    }
}
