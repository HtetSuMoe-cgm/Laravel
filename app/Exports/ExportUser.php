<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select("username", "email","gender","type")->get();
    }

    public function headings(): array
    {
        return[
            'Name',
            'Email',
            'Gender',
            'Type',
        ];
    }
}
