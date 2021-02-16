<?
function generate_sheet_PowerBill($cfg, $data) {
  // -------
  // Generate Table.
  // -------
  // $data['hour'] - 直近1時間の電気代 
  // $data['month'] - 今月の消費した電気代
  
  $output['1h']       = $data['hour'];
  $output['1d']       = $data['hour'] * 24;
  $output['7d']       = $data['hour'] * 24 * 7;
  $output['month']    = $data['hour'] * 24 * date('t');
  $output['monthdays']= date('t');

  $output['current']  = $data['month'];

  $output['name'] = select_power($cfg, time())['name'];
  $output['url'] = select_power($cfg, time())['url'];
  $output['price'] = select_power($cfg, time())['price'];
  
  return($output);
}