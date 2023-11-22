<?php

namespace App\Imports;

use App\Models\Structure;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StructureImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $collection->each(function ($row, $key) {
            if ($key !== 0) {
                Structure::query()->create([
                    'id' => (int) $row[0],
                    'name' => $row[3],
                    'code' => !is_null($row[1]) ? (int)$row[1] : null,
                    'manager' => null,
                    'parent_id' => !is_null($row[4]) ? (int)$row[4] : null
                ]);
            }
        });
    }
}
