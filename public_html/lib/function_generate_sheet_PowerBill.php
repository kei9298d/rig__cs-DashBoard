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

  $output['month']    = $data['month'] / date('d') * date('t');
  $output['monthdays']= date('t');

  $output['current']  = $data['month'];

  $powercompany = select_power($cfg, time());
  $output['name']   = $powercompany['name'];
  $output['url']    = $powercompany['url'];
  $output['price']  = $powercompany['price'];
  
  return($output);
}