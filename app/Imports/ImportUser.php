<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows)
    {
         Validator::make($rows->toArray(), [
             '*.name' => 'required|string',
             '*.email' => 'required|email|unique:users,email',
             '*.password' => 'required|max:255|min:8',
             '*.gender' => 'required|string',
             '*.type' => 'required|integer|between:0,255',
         ])->validate();

        foreach ($rows as $row) {
            User::create([
                'username' => $row['name'],
                'email' => $row['email'],
                'password' => bcrypt($row['password']),
                'gender' => $row['gender'],
                'type' => $row['type'],
            ]);
        }
    }
}
