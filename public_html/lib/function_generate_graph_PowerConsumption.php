<?
function generate_graph_PowerConsumption($cfg, $data) {

// -------
// Generate Graph.
// -------

  $data_graph = '';

  // x,y matrix table
  $data_graph_ary = '';

  $ftime = 0;
  foreach($data as $key => $val) {
    // X軸
    if ( $ftime == 0 ) { $ftime = $key; $time = 0; }
    else { $time = $key - $ftime; }

    // Y軸
    $watt = $val * $cfg['power']['volt'];
    
    // JSON Array
    $data_graph_ary .= sprintf("{ x:%s , y:%s },", $time, $watt);
  }

  // Erase last ',' and formatting
  $data_graph_ary = substr($data_graph_ary, 0, -1);
  $data_graph_ary .= "\n";

  $json = file_get_contents($cfg['graph']['PowerConsumption']['json']);

  $json = str_replace('__DATA__', $data_graph_ary, $json);
  $json = str_replace('__SCALES_X__', (1 * 60 * 60), $json);
  $json = str_replace('__SCALES_Y__', 500, $json);

  // Init QuickChart
  $qc = new QuickChart($cfg['graph']['qc']);

  $qc->setConfig($json);

  // Print the chart URL
  $url = $qc->getUrl();

  return($url);
}
