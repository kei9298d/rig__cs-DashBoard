<?
function generate_sheet_PowerBill($cfg, $data) {
  // -------
  // Generate Table.
  // -------
  // $data['watt']['current'][0] - UNIX Time
  // $data['watt']['current'][1] - AMP

  // Start-Stop Time.
  $data['sheet']['time']['start'] = ceil($cfg['time']['start'] / 300) * 300;
  $data['sheet']['time']['end'] = floor($cfg['time']['end'] / 300) * 300;

  foreach($data['watt']['current'] as $row) {
    if( $tmp['ct'] == 0 ) { 
      $tmp['difftime'] = $row[0];
      $tmp['ct']++;
      continue;
    }
    
    // Calc Billing
    // $row[1] = AMP.
    $tmp['sec'] = $row[0] - $tmp['difftime'];
    $tmp['price'] = select_power($cfg, $row[0])['price']; // Yen/Kwn
    $tmp['kWatt'] = $row[1] * $cfg['power']['volt'] / 1000; // KWh
    $tmp['bill'] =  $tmp['price'] / 60 / 60 * $tmp['kWatt'] * $tmp['sec']; // Yen

    $data['bill'][] = array($row[0] ,$tmp['bill']);
    $tmp['sum'] = $tmp['sum'] + $row[1];

    $tmp['difftime'] = $row[0];
    $tmp['ct']++;
    $bill = $bill + $tmp['bill'];
  }
  
  $data['sheet']['PowerBill']['current'] = $bill;
  $data['sheet']['PowerBill']['1h'] = $bill / $cfg['hour'];
  $data['sheet']['PowerBill']['24h'] = $bill / $cfg['hour'] * 24;
  $data['sheet']['PowerBill']['1d'] = $bill / $cfg['hour'] * 24;
  $data['sheet']['PowerBill']['7d'] = $bill / $cfg['hour'] * 24 * 7;
  $data['sheet']['PowerBill']['28d'] = $bill / $cfg['hour'] * 24 * 28;
  $data['sheet']['PowerBill']['30d'] = $bill / $cfg['hour'] * 24 * 30;
  $data['sheet']['PowerBill']['31d'] = $bill / $cfg['hour'] * 24 * 31;
  
  $data['sheet']['PowerBill']['name'] = select_power($cfg, time())['name'];
  $data['sheet']['PowerBill']['url'] = select_power($cfg, time())['url'];
  $data['sheet']['PowerBill']['price'] = select_power($cfg, time())['price'];
  
  return($data['sheet']['PowerBill']);
}