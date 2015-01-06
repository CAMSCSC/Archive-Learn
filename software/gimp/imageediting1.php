<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Image Editing 1</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>Image Editing Software</h1>
		
		<h3>What is the best software to edit images?</h3>
		<p>The two most popular image editing software suites are Photoshop and GIMP<p> 
		
		<h3>Photoshop</h3>
		<ul>
			<li>Developed by Adobe</li>
			<li>Costs $10 a month</li>
			<li>Attractive UI</li>
			<li>Relatively low learning curve</li>
			<li>Refined algorithms</li>
		</ul>
		
		<h3>GIMP</h3>
		<figure>
			<img src="gimp.png"/>
			<figcaption>Fig. 1 The GNU Image Manipulation Program logo</figcaption>
		</figure>
		<ul>
			<li>Free</li>
			<li>Open Source</li>
			<li>Plenty of add-ons</li>
			<li>Higher learning curve</li>
			<li>Python scripts</li>
		</ul>
		
		<h1>Image Types</h1>
		<h3>Bitmap versus GIF</h3>
		<figure>
			<img src="bmpvsgif.png"/>
			<figcaption>Fig. 2 GIF has a smaller color palette leading to reduced size</figcaption>
		</figure>
		<p>Both file types are lossless but you will notice that GIF only has a 256 color palette</p>
		
		<h3>GIF versus JPEG</h3>
		<figure>
			<img src="gifvsjpg.png"/>
			<figcaption>Fig. 3 GIF is at an advantage again because JPEG is a lossy image type</figcaption>
		</figure>
		<p>JPEG is a lossy file type so it will lose image data in order to reduce file size. Facebook uses JPEG in order to maximize server space.</p>
		
		<h3>JPEG versus GIF</h3>
		<figure>
			<img src="jpgvgif.png"/>
			<figcaption>Fig. 4 In images with lots of color GIF starts to look lossy</figcaption>
		</figure>
		<p>Because of the reduced color palette, GIF appears lossy while in fact it is not.</p>
		
		<h3>PNG vs GIF</h3>
		<figure>
			<img src="pngvsgif.png"/>
			<figcaption>Fig. 5 PNG is much better with Alpha channels</figcaption>
		</figure>
		<p>An alpha channel is the A component in RGBA data. RGB is red blue green and it determines every color combination possible. RGB is a system in which each value is assigned a number between 0 and 255. The Alpha channel determines the transparency.</p>
		
		<h3>What should I use?</h3>
		<p>Use these concepts to inform your decision. Remember, when in doubt use PNG.</p>
		
		<h3>Further Readings and References</h3>
		<p>"PNG vs BMP vs GIF vs JPEG" by Chuck - <a href="http://stackoverflow.com/questions/2336522/png-vs-gif-vs-jpeg-when-best-to-use" target="_blank">http://stackoverflow.com/questions/2336522/png-vs-gif-vs-jpeg-when-best-to-use</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>