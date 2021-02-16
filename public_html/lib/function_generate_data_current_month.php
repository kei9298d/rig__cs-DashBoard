<?php
// Create this month Range Data.
    function generate_data_current_month($cfg, $DP) {

    $data = array();
    // 月初 00:00:00
    $start = strtotime('first day of this month');
    $start = round($start / 86400) * 86400;  // 日付を丸める

    // 月末 23:59:59
    $end = strtotime('last day of this month');
    $end = round($end / 86400) * 86400; // 日付を丸める
    $end = $end + (((( 23 * 60 ) + 59 ) * 60 ) + 59); // 23:59:59

    $data = $DP->select(
        (int)$start,
        (int)$end
    );

    // $data - 対象範囲の連想配列
    return( $data );
}
