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
CURRENT: <? echo($output['sheet']['PowerConsumption']['current']); ?>W<br />
<br />
AVERAGE: <? echo($output['sheet']['PowerConsumption']['avg']); ?>W<br />
MAX: <? echo($output['sheet']['PowerConsumption']['max']); ?>W<br />
MIN: <? echo($output['sheet']['PowerConsumption']['min']); ?>W<br />
Power Source: AC <? echo($cfg['power']['volt']); ?>V<br />
</p>

<p>
 <img src="<? echo($output['graph']['PowerConsumption']['url']);?>"><br />
</p>

<hr>
<a name="PowerBilling">
<h2>Power Billing</h2>
<p>
【今月の電気代】<br />
<? echo(sprintf('%.2f',$output['sheet']['PowerBill']['current'])); ?> JPY<br />
</p>
<p>
【予測値】<br />
1Month:(<?php echo($output['sheet']['PowerBill']['monthdays']); ?>Days): <? echo(sprintf('%.2f',$output['sheet']['PowerBill']['month'])); ?> JPY<br />
1Week: <? echo(sprintf('%.2f',$output['sheet']['PowerBill']['7d'])); ?> JPY<br />
1Day: <? echo(sprintf('%.2f',$output['sheet']['PowerBill']['1d'])); ?> JPY<br />
1Hour: <? echo(sprintf('%.2f',$output['sheet']['PowerBill']['1h'])); ?> JPY<br />
</p>

<p>
【現在の電気プラン】<br />
<a href="<? echo($output['sheet']['PowerBill']['url']); ?>" target="_blank">
<? echo($output['sheet']['PowerBill']['name']); ?><br />
</a>
Price: <? echo($output['sheet']['PowerBill']['price']); ?> JPY / KWh<br />
</p>

<p>
 <img src="<? echo($output['graph']['PowerBill']['url']);?>"><br />
</p>

<hr>
<a name="DataSource">
<h2>DataSource</h2>
<p>
Last Update: <? echo(date(DATE_ATOM, $output['sheet']['PowerConsumption']['lastupdate'])); ?><br />
Data Count: <? echo($output['sheet']['PowerConsumption']['ct']);?> / <? echo($cfg['hour']); ?> Hours<br />
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
CPU : Intel Core-i5 750 (Disable TurboBoost)
Memory : 8GB (DDR3 2GB x4)
MotherBoard : MSI P55-SD50
SSD : SATA SSD 120GB (HIDISC)
GPU1 : nVidia GeForce GTX 1060 6GB (PALIT GeForc® GTX 1060 Dual)
GPU2 : nVidia GeForce GTX 1060 6GB (玄人志向 GF-GTX1060-6GB/OC/DF)
GPU2 : nVidia GeForce GTX 1060 6GB (ZOTAC GeForce GTX 1060 AMP! Edition)
Power : 800W 80PLUS PowerUnit (INFINITI)
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
