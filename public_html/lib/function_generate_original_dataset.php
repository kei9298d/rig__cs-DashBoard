<?
function generate_original_dataset($cfg) {
    // -------
    // Generate original datta Array.
    // -------

    // Create Array
    $data['watt']['current'] = array();
    $data['watt']['month']['this'] = array();

    // Get now unixtime
    $cfg['time']['current']['end'] = time();
    $cfg['time']['current']['start'] = $cfg['time']['end'] - ($cfg['hour'] * 60 * 60);

    $cfg['time']['month']['this']['start'] = strtotime('first day of this month');
    $cfg['time']['month']['this']['start'] = strtotime('last day of this month') + ( 24 * 60 * 60 -1 ); 
    
    // Load Data set
    $data['csv'] = file($cfg['file']['datafile']);

    // for Current Hour
    foreach ($data['csv'] as $row) {
        $row_array = explode(',', $row);
        // Erase CRLF
        $row_array[1] = str_replace("\n", '', $row_array[1]);

        // Filter
        if( $row_array != '' && $row_array[0] >= $cfg['time']['current']['start'] && $row_array[0] <= $cfg['time']['current']['end'] ) {
            $data['watt']['current'][] = $row_array;
        }
    }

    // for This Month.
    foreach ($data['csv'] as $row) {
        $row_array = explode(',', $row);
        // Erase CRLF
        $row_array[1] = str_replace("\n", '', $row_array[1]);

        // Filter
        if( $row_array != '' && $row_array[0] >= $cfg['time']['month']['this']['start'] && $row_array[0] <= $cfg['time']['month']['this']['end'] ) {
            $data['watt']['month']['this'][] = $row_array;
        }
    }

    unset($row_array);
    unset($row);

    return(array($cfg, $data));
}
