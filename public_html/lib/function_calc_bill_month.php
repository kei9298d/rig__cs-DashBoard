<?
function calc_bill_month($cfg, $data) {
  // $data['UNIXTIME'] = AMP

  $ct = 0;
  $out['bill'] = 0;
  foreach($data as $key => $val) {
    // 初回は時間をdiffに取得するだけ
    if ($ct == 0) { $ct++; $diff = $key; continue; }
    // 本番
    else {
      $time = $key - $diff; // sec
      $amp = $val;
      $price = select_power($cfg, $key)['price']; // KWh / JPY
      $price = $price /1000 / $cfg['power']['volt']; // Ah / JPY
      $price = $price / 60 / 60 * $time * $amp;

      $out['bill'] += $price;
    }

  }

  return($out['bill']);
}
