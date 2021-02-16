<?
function generate_sheet_PowerBill($cfg, $data) {
  // -------
  // Generate Table.
  // -------
  // $data['hour'] - 直近1時間の電気代 
  // $data['month'] - 今月の消費した電気代
  
  $data['1h']       = $data['hour'];
  $data['1d']      = $data['hour'] * 24;
  $data['7d']       = $data['hour'] * 24 * 7;
  $data['Month']    = $data['hour'] * 24 * date('t');
  $data['MonthDays']= date('t');
  
  $data['name'] = select_power($cfg, time())['name'];
  $data['url'] = select_power($cfg, time())['url'];
  $data['price'] = select_power($cfg, time())['price'];
  
  return($data);
}