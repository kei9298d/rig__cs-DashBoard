<html>
<head>
<title>リグしぃの様子</title>
</head>

<body>
<h1>Rig__cs Status.</h1>

<h2>Index</h2>
<ul>
<li><a href="#PowerConsumption">Power Consumption</a></li>
<li><a href="#PowerBilling">Power Billing</a></li>
<li><a href="#DataSource">DataSorce</a></li>
<li><a href="#About">About Rig__cs</a></li>
</ul>

<hr>
<a name="PowerConsumption">
<h2>Power Consumption</h2>
<p>
CURRENT: <? echo($data['sheet']['PowerConsumption']['current']); ?>W<br />
AVERAGE: <? echo($data['sheet']['PowerConsumption']['avg']); ?>W<br />
MAX: <? echo($data['sheet']['PowerConsumption']['max']); ?>W<br />
MIN: <? echo($data['sheet']['PowerConsumption']['min']); ?>W<br />
Power Source: AC <? echo($cfg['power']['volt']); ?>V<br />
</p>

<p>
 <img src="<? echo($data['graph']['PowerConsumption']['url']);?>"><br />
View : <a href="./?h=1#PowerConsumption">1H</a> / 
<a href="./?h=3#PowerConsumption">3H</a> / 
<a href="./?h=6#PowerConsumption">6H</a><br />
</p>

<hr>
<a name="PowerBilling">
<h2>Power Billing</h2>
<p>
CURRENT: <? echo(sprintf('%.2f',$data['sheet']['PowerBill']['current'])); ?> JPY / <?php echo($cfg['hour']);?> Hours<br />
1Hour: <? echo(sprintf('%.2f',$data['sheet']['PowerBill']['1h'])); ?> JPY<br />
1Day: <? echo(sprintf('%.2f',$data['sheet']['PowerBill']['1d'])); ?> JPY<br />
1Week: <? echo(sprintf('%.2f',$data['sheet']['PowerBill']['7d'])); ?> JPY<br />
1Month(28Days): <? echo(sprintf('%.2f',$data['sheet']['PowerBill']['28d'])); ?> JPY<br />
1Month(30Days): <? echo(sprintf('%.2f',$data['sheet']['PowerBill']['30d'])); ?> JPY<br />
<br />
Power Plan: 
<a href="<? echo($data['sheet']['PowerBill']['url']); ?>" target="_blank">
<? echo($data['sheet']['PowerBill']['name']); ?><br />
</a>
Price: <? echo($data['sheet']['PowerBill']['price']); ?> JPY / KWh<br />
</p>

<p>
 <img src="<? echo($data['graph']['PowerBill']['url']);?>"><br />
View : <a href="./?h=1#PowerBilling">1H</a> / 
<a href="./?h=3#PowerBilling">3H</a> / 
<a href="./?h=6#PowerBilling">6H</a><br />
</p>

<hr>
<a name="DataSource">
<h2>DataSource</h2>
<p>
Last Update: <? echo(date(DATE_ATOM, $data['sheet']['PowerConsumption']['lastupdate'])); ?><br />
Data Count: <? echo($data['sheet']['PowerConsumption']['ct']);?> / <? echo($cfg['hour']); ?> Hours<br />
</p>

<hr>
<a name="About">
<h2>About Rig__cs</h2>
<p>
Name : Rig__cs（リグしぃ）<br />
<img src="./img/Rig__cs.jpg"><br />
</p>
<p>

Specs: <br />
<pre>
CPU : Intel Core-i5 750 ( Disable TurboBoost )
Memory : 8GB ( DDR3 2GB x4 )
MotherBoard : MSI P55-SD50
SSD : SATA SSD 120GB (HIDISC)
GPU1 : nVidia GeForce GTX 1060 6GB (PALIT)
GPU2 : nVidia GeForce GTX 1060 6GB (玄人志向)
GPU2 : nVidia GeForce GTX 1060 6GB (ZOTAC)
OS : Windows 10 Professional
</pre>

Special Thanks : <a href="http://www.mayu-cs.xyz/" target="_blank">わんころメソッド();</a><br />
</p>

<hr />
Powerd by
<a href="https://quickchart.io/" target="_blank">QuickChart</a>
 on <a href="https://www.xrea.com/" target="_blank">XREA(Free)</a>
</body>
</html>
