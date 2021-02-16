<?php
// Create this month Range Data.
    function generate_data_current_month($cfg, $DP) {

    $data = array();
    // 月初 00:00:00
    $start = strtotime('first day of this month');
    // 月末 23:59:59
    $end = strtotime('last day of this month') + ( (23 * 60 * 60) + (59 * 60) + 59 ); 

    $data = $DP->select(
        $start,
        $end
    );

    // $data - 対象範囲の連想配列
    return( $data );
}
