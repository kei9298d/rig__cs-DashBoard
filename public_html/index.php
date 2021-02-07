<?
// -------
// Rig__cs Status Page.
// index.php
// -------

// Load Configure
require_once('./lib/config.php');

// Load lib - QuickChart.
require_once ('./lib/QuickChart.php');

// Load Functions
require_once ('./lib/function_generate_original_dataset.php');
require_once ('./lib/function_generate_graph_PowerConsumption.php');
require_once ('./lib/function_generate_sheet_PowerConsumption.php');

// Input hour from GET
if(isset($_GET['h']) && $_GET['h'] <= 6 && $_GET['h'] >= 1) $cfg['hour'] = (int)floor($_GET['h']);

// Configure graph X scale
$cfg['graph']['x_scales']  = $cfg['hour'] * 60 * 60;

// Generate Original Dataset.
list($cfg, $data) = generate_original_dataset($cfg);
// Generate Graph URL.
$data['graph']['url'] = generate_graph_PowerConsumption($cfg, $data);
// Generate Sheet Data.
$data['sheet'] = generate_sheet_PowerConsumption($cfg, $data);

// Output.
require_once('./lib/view_index.php');

exit(0);