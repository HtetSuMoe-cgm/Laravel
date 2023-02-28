<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPosts implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Post::select("id", "title", "description", "post_img", "public_flag")->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Title',
            'Description',
            'Image',
            'Flag',
        ];
    }
}
