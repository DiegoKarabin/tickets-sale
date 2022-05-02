<?php

namespace Database\Seeders;

use App\Models\Chair;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $distribution = $this->distribution();

        foreach ($distribution as $index => $row_scheme) {
            $row = $row_scheme['row'];
            $cells = $row_scheme['cells'];
            $row_label = chr(ord('A') + $index);

            foreach ($cells as $cell) {
                $code = "{$row_label}-" . str_pad($cell, 2, '0', STR_PAD_LEFT);

                Chair::create([
                    'code' => $code,
                    'row' => $row,
                    'column' => $cell
                ]);
            }
        }
    }

    private function distribution() {
        return array_merge(
            array_map(
                fn ($row) => [
                    'row' => $row,
                    'cells' => array_merge(range(2, 11), range(32, 44))
                ],
                range(2, 5)
            ),
            array_map(
                fn ($row) => [
                    'row' => $row,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(25, 30), range(32, 44))
                ],
                range(6, 7)
            ),
            [

                [
                    'row' => 8,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 30), range(32, 43))
                ],
                [
                    'row' => 9,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 30), range(32, 42))
                ],
                [
                    'row' => 10,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 30), range(32, 41), range(44, 44))
                ],
                [
                    'row' => 11,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 30), range(32, 40), range(43, 44))
                ],
                [
                    'row' => 12,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 30), range(33, 39), range(42, 44))
                ],
                [
                    'row' => 13,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 31), range(34, 38), range(41, 44))
                ],
                [
                    'row' => 14,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 32), range(35, 37), range(40, 44))
                ],
                [
                    'row' => 15,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 33), range(36, 36), range(39, 44))
                ],
                [
                    'row' => 16,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 34), range(38, 44))
                ],
                [
                    'row' => 17,
                    'cells' => array_merge(range(2, 11), range(14, 22), range(24, 34), range(37, 44))
                ],
                [
                    'row' => 18,
                    'cells' => array_merge(range(3, 11), range(14, 22), range(24, 35), range(37, 44))
                ],
                [
                    'row' => 19,
                    'cells' => array_merge(range(5, 11), range(14, 22), range(24, 35), range(37, 44))
                ],
                [
                    'row' => 20,
                    'cells' => array_merge(range(14, 22), range(24, 35), range(37, 44))
                ]
            ],
            array_map(
                fn ($row) => [
                    'row' => $row,
                    'cells' => array_merge(range(14, 21), range(25, 35), range(37, 44))
                ],
                range(21, 25)
            )
        );
    }
}
