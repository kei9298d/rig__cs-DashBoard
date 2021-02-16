<?
// Create Currenet Range Data.
    function generate_data_current_hour($cfg, $DP) {

    $data = array();
    $end = time();
    $start = $time - (1 * 60 * 60); // 1hour

    $data = $DP->select(
        $start,
        $end
    );

    // $data - 対象範囲の連想配列
    return( $data );
}