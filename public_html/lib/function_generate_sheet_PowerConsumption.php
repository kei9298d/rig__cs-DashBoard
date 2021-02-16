<?
function generate_sheet_PowerConsumption($cfg, $data) {
  // -------
  // Generate Table.
  // -------
  // $data['hour'] - 直近1時間の電気代 
  // $data['month'] - 今月の消費した電気代

  // Create AVG/MAX/MIN
  $tmp['ct'] = 0;
  $tmp['sum'] = 0;
  $tmp['max'] = 0;
  $tmp['min'] = 9999;

  foreach( $data as $key => $val) {
    if( $key >= $start && $key <= $end ) {
      $tmp['ct']++;
      $watt = $val * $cfg['power']['volt'];
      $tmp['sum'] += $watt;
      if ($tmp['max'] < $watt) $tmp['max'] = $watt;
      if ($tmp['min'] > $watt) $tmp['min'] = $watt;
      unset($watt);
    }

    // Get Last update time.
    $data['lastupdate'] = $key;
    $data['current']    = $val * $cfg['power']['volt'];
    unset($row);

  }

  $data['avg'] = round($tmp['sum'] / $tmp['ct']);
  $data['max'] = $tmp['max'];
  $data['min'] = $tmp['min'];
  $data['ct']  = $tmp['ct'];
  unset($tmp);

  return($data);
}