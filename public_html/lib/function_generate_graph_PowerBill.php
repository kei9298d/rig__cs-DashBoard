<?
function generate_graph_PowerBill($cfg, $data) {

// -------
// Generate Power Bill Graph.
// -------

  $data['bill'] = array();
  $tmp['ct'] = 0;
  $tmp['sum'] = 0;

  foreach($data['watt'] as $row) {
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
  }
  
  $bill = 0;
  $data_graph_ary = '';

  foreach($data['bill'] as $row) {
    $time = $row[0] - $cfg['time']['start'];
    $bill = $bill + $row[1];
    $data_graph_ary .= sprintf("{ x:%s , y:%s },", $time, $bill);
  }


  // Erase last ',' and formatting
  $data_graph_ary = substr($data_graph_ary, 0, -1);
  $data_graph_ary .= "\n";

$json = file_get_contents($cfg['graph']['PowerBill']['json']);

  $json = str_replace('__DATA__', $data_graph_ary, $json);
  $json = str_replace('__SCALES_X__', ($cfg['hour'] * 60 * 60), $json);
  $json = str_replace('__SCALES_Y__', 100, $json);

  // Init QuickChart
  $qc = new QuickChart($cfg['graph']['qc']);

  $qc->setConfig($json);

  // Print the chart URL
  $url = $qc->getUrl();

  return($url);
}