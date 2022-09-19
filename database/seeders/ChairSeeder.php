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
            ...$this->left_lateral(),
            ...$this->central(),
            ...$this->right_lateral()
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
            [77, 15, 11, 33, 'N']
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

    private function central(): array
    {
        $section_code = 'C';

        $rows = [
            // [start_row, start_column, seats_numbers, starting_seat_numbers, row_code]
            [29, 61, 32, 1, 'A'],
            [33, 57, 30, 1, 'B'],
            [37, 57, 30, 1, 'C'],
            [41, 53, 34, 1, 'D'],
            [45, 53, 21, 1, 'E'],
            [45, 101, 12, 22, 'E'],
            [49, 53, 21, 1, 'F'],
            [49, 101, 13, 22, 'F'],
            [53, 53, 21, 1, 'G'],
            [53, 101, 14, 22, 'G'],
            [57, 53, 21, 1, 'H'],
            [57, 101, 15, 22, 'H'],
            [61, 53, 21, 1, 'I'],
            [61, 101, 16, 22, 'I'],
            [65, 53, 21, 1, 'J'],
            [65, 101, 17, 22, 'J'],
            [69, 53, 21, 1, 'K'],
            [69, 101, 19, 22, 'K'],
            [73, 53, 21, 1, 'L'],
            [73, 101, 20, 22, 'L'],
            [77, 53, 21, 1, 'M'],
            [77, 101, 21, 22, 'M'],
            [81, 53, 20, 1, 'N'],
            [81, 102, 21, 21, 'N'],
        ];

        return [
            ...array_merge(
                ...array_map(
                    function($row_options) use ($section_code) {
                        $chairs = [];

                        for ($i = 1; $i <= $row_options[2]; $i++) {
                            $chair_number = $row_options[3] + $i - 1;

                            $chairs[] = [
                                'code' => "{$section_code}-{$row_options[4]}-{$i}",
                                'row' => $row_options[0],
                                'column' => $row_options[1] + (2 * ($i - 1)),
                                'number' => $chair_number
                            ];
                        }

                        return $chairs;
                    },
                    $rows
                )
            )
        ];
    }

    private function right_lateral(): array
    {
        $section_code = 'D';

        $full_rows = [
            // [start_row, start_column, seats_number, row_code]
            [7, 125, 10, 'A'],
            [7, 129, 8, 'B'],
            [7, 133, 8, 'C'],
            [7, 137, 9, 'D'],
            [7, 141, 10, 'E'],
            [7, 145, 10, 'F'],
            [7, 149, 11, 'G'],
            [3, 153, 13, 'H'],
            [3, 157, 14, 'I'],
            [3, 161, 14, 'J'],
            [3, 165, 15, 'K'],
            [3, 169, 16, 'L'],
            [3, 173, 17, 'M'],
            [3, 177, 18, 'N']
        ];

        $diagonals = [
            // [start_row, start_column, seats_numbers, starting_seat_numbers, row_code]
            [23, 133, 3, 9, 'C'],
            [25, 137, 4, 10, 'D'],
            [27, 141, 5, 11, 'E'],
            [27, 145, 8, 11, 'F'],
            [29, 149, 13, 12, 'G'],
            [29, 153, 15, 14, 'H'],
            [31, 157, 18, 15, 'I'],
            [31, 161, 19, 15, 'J'],
            [33, 165, 7, 16, 'K'],
            [53, 155, 11, 23, 'K'],
            [35, 169, 6, 17, 'L'],
            [53, 160, 10, 23, 'L'],
            [37, 173, 7, 18, 'M'],
            [57, 163, 12, 25, 'M'],
            [39, 177, 7, 19, 'N'],
            [59, 167, 15, 26, 'N']
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
                                'column' => $row_options[1] - $i,
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
