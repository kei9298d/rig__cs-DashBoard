<?
// -------
// Generate Power Bill Graph.
// -------
  function generate_graph_PowerBill($cfg, $data) {


    //$data['bill'] = array();
    $tmp['ct'] = 0;
    $tmp['sum'] = 0;


    foreach($data as $key => $val) {
      if( $ct == 0 ) { 
        $tmp['difftime'] = $key;
        $tmp['ct']++;
        continue;
      }

    // Calc Billing
    // $val = AMP.
    $tmp['sec'] = $key - $tmp['difftime'];
    $tmp['price'] = select_power($cfg, $key)['price']; // Yen/Kwn
    $tmp['kWatt'] = $val * $cfg['power']['volt'] / 1000; // KWh
    $tmp['bill'] =  $tmp['price'] / 60 / 60 * $tmp['kWatt'] * $tmp['sec']; // Yen

    $data['bill'][] = array($key ,$tmp['bill']);
    $tmp['sum'] = $tmp['sum'] + $val;

    $tmp['difftime'] = $key;
    $tmp['ct']++;
  }
  
  $bill = 0;
  $data_graph_ary = '';

  foreach($data['bill'] as $row) {
    $time = $key - $cfg['time']['current']['start'];
    $bill = $bill + $val;
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