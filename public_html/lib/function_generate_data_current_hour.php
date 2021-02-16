<?
// Create Currenet Range Data.
    function generate_data_current_hour($cfg, $DP) {
    $data = array();

    // 直前の1時間ぶんのUNIXTIME
    $end = time();
    $start = $end - (1 * 60 * 60); // 1hour

    $data = $DP->select(
        (int)$start,
        (int)$end
    );

    // $data - 対象範囲の連想配列
    return( $data );
}