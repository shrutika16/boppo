<?php

use App\SeatCategories;

if (!function_exists('getseatsArrange')) {
    function getseatsArrange($no_of_seats)
    {
        $seatCategories = SeatCategories::orderBy('category_rank', 'DESC')->get();

        $seat_start_no = 1;
        $i = 0;

        foreach ($seatCategories as $seatCategory) {
            $reserved_percentage = $seatCategory->reserved_percentage;

            $calculate_seats = round(($no_of_seats / 100) * $reserved_percentage);

            //set from seat no
            $from_seat = $seat_start_no;

            //set to seat no
            $to_seat = $i + $calculate_seats;

            if ($seatCategory->category_rank == 1) {
                $from_seat = $seat_start_no;
                $to_seat = ($no_of_seats - $seat_start_no) + $i;
            }

            //set seat start no as last categories to seat
            $seat_start_no = $to_seat;
            $i = $to_seat;

            $seatArranged[$seatCategory->id] = $from_seat . ' - ' . $to_seat;
        }
        return $seatArranged;
    }
}

?>
