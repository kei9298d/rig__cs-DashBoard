<?
// -------
// Generate Power Bill Graph.
// -------
  function generate_graph_PowerBill($cfg, $data, $max) {
    $bill = 0;
    $data_graph_ary = '';
  
    // 月初 00:00:00
    $tmp['start'] = strtotime('first day of this month');
    $tmp['start'] = floor($tmp['start'] / 86400) * 86400;  // 日付を丸める

    // 月末 23:59:59
    $tmp['end']  = strtotime('last day of this month');
    $tmp['end'] = floor($tmp['end'] / 86400) * 86400; // 日付を丸める
    $tmp['end'] = $tmp['end'] + (((( 23 * 60 ) + 59 ) * 60 ) + 59); // 23:59:59

    $avg['flag'] = false;
    $avg['ct']=0;
    $avg['day_ct']=0;
    // データを丸める
    foreach($data as $key => $val) {
      if ( $avg['flag'] === false) {
        $avg['flag'] = true;
        $avg['start'] = $tmp['start'] + ($avg['day_ct'] * 24 * 60 * 60);
        $avg['end'] = $avg['start'] + ( 24 * 60 * 60 );
        $avg['ct'] = 0;
        $avg['sum'] = 0;


      } else if( $avg['flag'] === true && $key >= $avg['start'] && $key <= $avg['end']) {
        // データため込む
        $avg['sum'] += $val; 
        $avg['ct']++;

      } else {
        // 配列に吐き出す
        $avg['flag'] = false;
        $avg['output'][$avg['day_ct']] = ( $avg['sum'] / $avg['ct'] );
        $avg['day_ct']++;
      }
    }

    // Init
    $tmp['ct'] = 0;
    $tmp['sum'] = 0;
    $tmp['FLG'] = false;
    $data_graph_ary = '';

    foreach($avg['output'] as $key => $val) {
      // X軸
      $tmp['calcsec'] = 24 * 60 * 60;
      $tmp['day'] =  $key + 1;

      // Y軸
      $tmp['price'] = select_power($cfg, $key)['price']; // Yen-Kwn
      $tmp['kWatt'] = $val * $cfg['power']['volt'] / 1000; // KWh
      $tmp['bill'] =  $tmp['price'] / 60 / 60 * $tmp['kWatt'] * $tmp['calcsec']; // Yen
      $tmp['sum'] += $tmp['bill'];

      // JSON生成
      $data_graph_ary .= sprintf("{ x:%s , y:%s },", $tmp['day'], $tmp['sum']);
    }

  // Erase last ',' and formatting
  $data_graph_ary = substr($data_graph_ary, 0, -1)."\n";

  // make JSON
  $json = file_get_contents($cfg['graph']['PowerBill']['json']);

  $json = str_replace('__DATA__', $data_graph_ary, $json);
  $json = str_replace('__SCALES_X__', date('t'), $json);
  $json = str_replace('__SCALES_Y__', (int)$max, $json);

  // Init QuickChart
  $qc = new QuickChart($cfg['graph']['qc']);

  $qc->setConfig($json);

  // Print the chart URL
  $url = $qc->getUrl();

  return($url);
}