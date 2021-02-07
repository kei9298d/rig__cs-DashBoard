<html>
<head>
<title>リグしぃの様子</title>
</head>

<body>
<h1>Rig__cs Status.</h1>

<h2>Index</h2>
<ul>
<li><a href="#PowerConsumption">Power Consumption</a></li>
<li><a href="#About">About Rig__cs</a></li>
</ul>

<a name="PowerConsumption">
<h2>Power Consumption</h2>
<p>
CURRENT: <? echo($data['sheet']['current']); ?>W<br />
AVERAGE: <? echo($data['sheet']['avg']); ?>W<br />
MAX: <? echo($data['sheet']['max']); ?>W<br />
MIN: <? echo($data['sheet']['min']); ?>W<br />
Power Source: AC <? echo($cfg['volt']); ?>V<br />
</p>

<p>
 <img src="<? echo($data['graph']['url']);?>"><br />
View : <a href="./?h=1#PowerConsumption">1H</a> / 
<a href="./?h=3#PowerConsumption">3H</a> / 
<a href="./?h=6#PowerConsumption">6H</a><br />
</p>

<p>
Last Update: <? echo(date(DATE_ATOM, $data['sheet']['lastupdate'])); ?><br />
Data Count: <? echo($data['sheet']['ct']);?> / <? echo($cfg['hour']); ?> Hours<br />
</p>

<a name="About">
<h2>About Rig__cs</h2>
<p>
<img src="./img/Rig__cs.jpg"><br />
<br />

Name : Rig__cs（リグしぃ）<br />

Specs: <br />
<pre>
CPU : Intel Core-i5 750 (no TurboBoost)
Memory : DDR3 2GB x2 (DualChannel)
MotherBoard : MSI P55-SD50
SSD : HIDISC SSD 120GB
GPU1 : nVidia GeForce GTX 1060 6GB
GPU2 : nVidia GeForce GTX 1060 6GB
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
