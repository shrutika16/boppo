<?php

use App\SeatCategories;

if (!function_exists('getseatsArrange')) {
    function getseatsArrange($no_of_seats)
    {
        $seatCategories = SeatCategories::orderBy('category_rank', 'ASC')->get();

        $seat_start_no = $seat_end_no = 1;
        $pending_seats = $no_of_seats;

        foreach ($seatCategories as $key => $seatCategory) {

            $calculate_seats = round((($no_of_seats / 100) * $seatCategory->reserved_percentage), 0);

            // set from seat no
            if ((count($seatCategories)- 1) == $key) {
                $seat_end_no = $no_of_seats;
                $calculate_seats = $pending_seats;
            }
            else {
                $seat_end_no = ($seat_start_no - 1) + $calculate_seats;
            }

            $seatArranged[$seatCategory->id] = array(
                'total_seats' => $calculate_seats,
                'seats_range' => $seat_start_no . '-' . $seat_end_no
            );
            
            $pending_seats = $pending_seats - $calculate_seats;
            $seat_start_no = $seat_end_no + 1;
        }
        
        return $seatArranged;
    }
}
?>
