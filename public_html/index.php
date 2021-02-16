<?
// -------
// Rig__cs Status Page.
// index.php
// -------
$FLG_debug = true;

// Load Configure
require_once('./lib/config.php');

// for Dev.
if($FLG_debug) $cfg['file']['datafile'] = './testdata/wattlog.csv';

// Input hour from GET
if(isset($_GET['h']) && $_GET['h'] <= 6 && $_GET['h'] >= 1) $cfg['hour'] = (int)floor($_GET['h']);

// Configure graph X scale
//$cfg['graph']['x_scales']  = $cfg['hour'] * 60 * 60;
$cfg['graph']['x_scales']  = 1 * 60 * 60;

// Load lib - QuickChart.
require_once ('./lib/QuickChart.php');

// Load lib - DataPack
require_once ('./lib/class_datapack.php');
$DP = new DataPack();
$DP->init($cfg['file']['datafile']);

// Load Functions
require_once ('./lib/function_generate_data_current_hour.php');
require_once ('./lib/function_generate_data_current_month.php');

require_once ('./lib/function_calc_bill_hour.php');
require_once ('./lib/function_calc_bill_month.php');

require_once ('./lib/function_generate_graph_PowerConsumption.php');
require_once ('./lib/function_generate_sheet_PowerConsumption.php');

//require_once ('./lib/function_generate_graph_PowerBill.php');
require_once ('./lib/function_generate_sheet_PowerBill.php');

// Generage Data array.
$data['currenet_hour']  = generate_data_current_hour($cfg, $DP);
$data['currenet_month'] = generate_data_current_month($cfg, $DP);

$output['bill']['hour'] = calc_bill_hour($cfg, $data['currenet_hour']);
$output['bill']['month'] = calc_bill_month($cfg, $data['currenet_month']);

// *** Currenet Hour
// Generate Graph URL.
$output['graph']['PowerConsumption']['url'] = generate_graph_PowerConsumption($cfg, $data['currenet_hour']);
// Generate Sheet Data.
$output['sheet']['PowerConsumption'] = generate_sheet_PowerConsumption($cfg, $data['currenet_month']);

// Generate Graph URL.
//$data['graph']['PowerBill']['url'] = generate_graph_PowerBill($cfg, $data['currenet_month']);
// Generate Sheet Data.
$data['sheet']['PowerBill'] = generate_sheet_PowerBill($cfg, $output['bill']);

// Output.
require_once('./lib/view_index.php');

exit(0);