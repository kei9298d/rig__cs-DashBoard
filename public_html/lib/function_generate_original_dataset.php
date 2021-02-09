<?
function generate_original_dataset($cfg) {
    // -------
    // Generate original datta Array.
    // -------

    // Create Array
    $data['watt'] = array();

    // Get now unixtime
    $cfg['time']['end'] = time();
    $cfg['time']['start'] = $cfg['time']['end'] - ($cfg['hour'] * 60 * 60);

    // Load Data set
    $data['csv'] = file($cfg['file']['datafile']);

    foreach ($data['csv'] as $row) {
        $row_array = explode(',', $row);
        // Erase CRLF
        $row_array[1] = str_replace("\n", '', $row_array[1]);

        // Filter
        if( $row_array != '' && $row_array[0] >= $cfg['time']['start'] && $row_array[0] <= $cfg['time']['end'] ) {
            $data['watt'][] = $row_array;
        }
    }
    unset($row_array);
    unset($row);

    return(array($cfg, $data));
}
