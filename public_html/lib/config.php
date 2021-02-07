<?
$cfg['hour']
        = 3;
$cfg['file']['datafile']
        = '/virtual/kei9298d/data_watt/wattlog.csv';
$cfg['graph']['qc']['width']
        = 800;
$cfg['graph']['qc']['height']
    = 480;

$cfg['view']['index']
        = './lib/view_index.php';
$cfg['graph']['PowerConsumption']['json']
        = './lib/json_graph_PowerConsumption.php';
$cfg['graph']['PowerBill']['json']
        = './lib/json_graph_PowerBill.php';

$cfg['power']['volt']
        = 100;

$cfg['power'][0]['price']
        = 30.57; // KWh/yen
$cfg['power'][0]['name']
        = 'PinTでんきB';
$cfg['power'][0]['url']
        = 'https://pintinc.jp/pint_price';
$cfg['power'][0]['start']
        = 0;

/**
 * $cfg['power'][start_unixtime]['price']
 *         = 26.40; // KWh/yen
 * $cfg['power'][start_unixtime]['name']
 *      = 'EverGreen ニフティ会員特別プラン 関東エリア B';
 * $cfg['power'][start_unixtime]['url']
 *      = 'https://csoption.nifty.com/denki/price/';
 * $cfg['power'][start_unixtime]['start']
 *      = 0;
 * **/


// Shardfunction - Select Power company
function select_power($cfg, $time) {
        foreach ($cfg['power'] as $row) {
                if ( $row['start'] <= $time ) $ret = $row;
                }
        return ($ret);
}
