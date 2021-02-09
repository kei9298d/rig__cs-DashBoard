<?
function generate_graph_PowerConsumption($cfg, $data) {

// -------
// Generate Graph.
// -------

  $data_graph = '';

  // x,y matrix table
  $data_graph_ary = '';

  foreach($data['watt']['current'] as $row) {
    $time = $row[0] - $cfg['time']['start'];
    $watt = $row[1] * $cfg['power']['volt'];
    $data_graph_ary .= sprintf("{ x:%s , y:%s },", $time, $watt);
  }

  // Erase last ',' and formatting
  $data_graph_ary = substr($data_graph_ary, 0, -1);
  $data_graph_ary .= "\n";

  $json = file_get_contents($cfg['graph']['PowerConsumption']['json']);

  $json = str_replace('__DATA__', $data_graph_ary, $json);
  $json = str_replace('__SCALES_X__', ($cfg['hour'] * 60 * 60), $json);
  $json = str_replace('__SCALES_Y__', 500, $json);

  // Init QuickChart
  $qc = new QuickChart($cfg['graph']['qc']);

  $qc->setConfig($json);

  // Print the chart URL
  $url = $qc->getUrl();

  return($url);
}
