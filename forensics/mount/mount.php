<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Exploring Linux Virtual Machine Files</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>Exploring Linux Virtual Machine Files</h1>
		
		<h3>Super Fast Procedure</h3>
		<ol>
			<li>Get <a target="_blank" href="http://www.diskinternals.com/linux-reader/">Linux Reader</a>.</li>
			<li>Install Linux Reader.</li>
			<li>Extract all .vmdk files you want to mount in a folder. (No need to combine them, Linux Reader will do it automatically!)</li>
			<li>Run Linux Reader.</li>
			<li>Click "Drives" in the upper hand corner.</li>
			<li>Click "Mount Image."</li>
			<li>Select "Containers" -> VMware virtual disk (*.vmdk)</li>
			<li>Select the folder you created in step 3.</li>
			<li>Select the containers that you want to mount (uncheck or check).</li>
			<li>Click Mount.</li>
			<li>Double Click the red drive(s) in in "Hard Disk Drives" section (NOT Linux Swap Volume).</li>
			<li>Enjoy.</li>
		</ol>
		
		<h3>Further Readings and References</h3>
		<p>Tool: Linux Reader - <a href="http://www.diskinternals.com/linux-reader/">http://www.diskinternals.com/linux-reader/</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>