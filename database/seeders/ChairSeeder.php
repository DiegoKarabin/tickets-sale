<?php

namespace Database\Seeders;

use App\Models\Chair;
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

        foreach ($distribution as $chair_data) {
            Chair::create($chair_data);
        }
    }

    private function distribution()
    {
        return [
            ...$this->left_lateral()
        ];
    }

    private function left_lateral(): array
    {
        $section_code = 'I';

        $full_rows = [
            // [start_row, start_column, seats_number, row_code]
            [5, 59, 10, 'A'],
            [5, 55, 12, 'B'],
            [5, 51, 13, 'C'],
            [5, 47, 13, 'D'],
            [5, 43, 13, 'E'],
            [5, 39, 14, 'F'],
            [7, 35, 19, 'G'],
            [7, 31, 19, 'H'],
            [7, 27, 20, 'I'],
            [7, 23, 22, 'J'],
            [7, 19, 23, 'K'],
            [7, 15, 24, 'L'],
            [7, 11, 25, 'M'],
            [7, 7, 28, 'N']
        ];

        $diagonals = [
            // [start_row, start_column, seats_number, starting_seat_number, row_code]
            [31, 47, 2, 14, 'D'],
            [31, 43, 5, 14, 'E'],
            [33, 39, 3, 15, 'F'],
            [45, 35, 4, 20, 'G'],
            [45, 31, 7, 20, 'H'],
            [47, 27, 10, 21, 'I'],
            [51, 23, 12, 23, 'J'],
            [53, 19, 3, 24, 'K'],
            [65, 26, 8, 27, 'K'],
            [55, 15, 4, 25, 'L'],
            [69, 23, 9, 29, 'L'],
            [57, 11, 5, 26, 'M'],
            [73, 20, 10, 31, 'M'],
            [63, 7, 4, 29, 'N'],
            [77, 15, 11, 33, 'N'],
        ];

        return [
            ...array_merge(
                ...array_map(
                    function($row_options) use ($section_code) {
                        $chairs = [];

                        for ($i = 1; $i <= $row_options[2]; $i++) {
                            $chairs[] = [
                                'code' => "{$section_code}-{$row_options[3]}-{$i}",
                                'row' => $row_options[0] + (2 * ($i - 1)),
                                'column' => $row_options[1],
                                'number' => $i
                            ];
                        }

                        return $chairs;
                    },
                    $full_rows
                ),
                ...array_map(
                    function($row_options) use ($section_code) {

                        $chairs = [];

                        for ($i = 1; $i <= $row_options[2]; $i++) {
                            $chair_number = $row_options[3] + $i - 1;

                            $chairs[] = [
                                'code' => "{$section_code}-{$row_options[4]}-{$i}",
                                'row' => $row_options[0] + (2 * ($i - 1)),
                                'column' => $row_options[1] + $i,
                                'number' => $chair_number
                            ];
                        }

                        return $chairs;
                    },
                    $diagonals
                )
            )
        ];
    }
}
