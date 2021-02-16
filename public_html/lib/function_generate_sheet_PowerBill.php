<?
function generate_sheet_PowerBill($cfg, $data) {
  // -------
  // Generate Table.
  // -------
  // $data['watt']['current'][0] - UNIX Time
  // $data['watt']['current'][1] - AMP

  $tmp = array();

  // Start-Stop Time.
  $data['sheet']['current']['time']['start'] = ceil($cfg['time']['current']['start'] / 300) * 300;
  $data['sheet']['current']['time']['end'] = floor($cfg['time']['current']['end'] / 300) * 300;

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
  
  $data['sheet']['current']['PowerBill']['current'] = $bill;
  $data['sheet']['current']['PowerBill']['1h'] = $bill / $cfg['hour'];
  $data['sheet']['current']['PowerBill']['24h'] = $bill / $cfg['hour'] * 24;
  $data['sheet']['current']['PowerBill']['1d'] = $bill / $cfg['hour'] * 24;
  $data['sheet']['current']['PowerBill']['7d'] = $bill / $cfg['hour'] * 24 * 7;
  $data['sheet']['current']['PowerBill']['28d'] = $bill / $cfg['hour'] * 24 * 28;
  $data['sheet']['current']['PowerBill']['30d'] = $bill / $cfg['hour'] * 24 * 30;
  $data['sheet']['current']['PowerBill']['31d'] = $bill / $cfg['hour'] * 24 * 31;
  
  $data['sheet']['current']['PowerBill']['name'] = select_power($cfg, time())['name'];
  $data['sheet']['current']['PowerBill']['url'] = select_power($cfg, time())['url'];
  $data['sheet']['current']['PowerBill']['price'] = select_power($cfg, time())['price'];
  
  return($data['sheet']['current']['PowerBill']);
}