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

// Load lib - QuickChart.
require_once ('./lib/QuickChart.php');

// Load lib - DataPack
require_once ('./lib/class_datapack.php');
$DP = new DataPack();
$DP->init($cfg['file']['datafile']);

// Load Functions
require_once ('./lib/function_generate_data_current_hour.php');
require_once ('./lib/function_generate_data_current_month.php');

require_once ('./lib/function_generate_graph_PowerConsumption.php');
require_once ('./lib/function_generate_sheet_PowerConsumption.php');

require_once ('./lib/function_generate_graph_PowerBill.php');
require_once ('./lib/function_generate_sheet_PowerBill.php');

// Configure graph X scale
$cfg['graph']['x_scales']  = $cfg['hour'] * 60 * 60;

// Generate Original Dataset.
list($cfg, $data) = generate_original_dataset($cfg);

// Generate Graph URL.
$data['graph']['PowerConsumption']['url'] = generate_graph_PowerConsumption($cfg, $data);
// Generate Sheet Data.
$data['sheet']['PowerConsumption'] = generate_sheet_PowerConsumption($cfg, $data);

// Generate Graph URL.
$data['graph']['PowerBill']['url'] = generate_graph_PowerBill($cfg, $data);
// Generate Sheet Data.
$data['sheet']['PowerBill'] = generate_sheet_PowerBill($cfg, $data);

// Output.
require_once('./lib/view_index.php');

exit(0);