<?
function generate_sheet_PowerConsumption($cfg, $data) {
  // -------
  // Generate Table.
  // -------
  // $data['watt']['current'][0] - UNIX Time
  // $data['watt']['current'][1] - AMP

  // Start-Stop Time.
  $data['sheet']['time']['start'] = ceil($cfg['time']['start'] / 300) * 300;
  $data['sheet']['time']['end'] = floor($cfg['time']['end'] / 300) * 300;

  // Create AVG/MAX/MIN
  $tmp['ct'] = 0;
  $tmp['sum'] = 0;
  $tmp['max'] = 0;
  $tmp['min'] = 9999;

  foreach( $data['watt']['current'] as $row) {
    if( $row[0] >= $data['sheet']['time']['start'] && $row[0] <= $data['sheet']['time']['end']) {
      $tmp['ct']++;
      $watt = $row[1] * $cfg['power']['volt'];
      $tmp['sum'] += $watt;
      if ($tmp['max'] < $watt) $tmp['max'] = $watt;
      if ($tmp['min'] > $watt) $tmp['min'] = $watt;
      unset($watt);
    }

    // Get Last update time.
    $data['sheet']['lastupdate'] = $row[0];
    $data['sheet']['current']    = $row[1] * $cfg['power']['volt'];
    unset($row);

  }

  $data['sheet']['avg'] = round($tmp['sum'] / $tmp['ct']);
  $data['sheet']['max'] = $tmp['max'];
  $data['sheet']['min'] = $tmp['min'];
  $data['sheet']['ct']  = $tmp['ct'];
  unset($tmp);

  return($data['sheet']);
}