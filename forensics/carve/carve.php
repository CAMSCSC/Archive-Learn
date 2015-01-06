<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>File Carving</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>File Carving 1</h1>
		
		<h3>Intro to File Carving</h3>
		<p>File carving is the process of searching for files on the basis of binary content rather than metadata. You should read the lesson on File Structures before continuing. As we know, file are composed of binary data. The only way a computer knows where each file is and how big a file is is through the use of metadata. Metadata, like those stored by the Windows Master File Table (MFT) tells exactly where a file is, how large a file is, when the file was last modified, and other related information. File carving is necessary when metadata is not available to the investigator or that the metadata is corrupt</p>
		
		<h3>The Three Methods of Carving</h3>
		<p>There are three main ways that file carvers operate.</p>
		<p id="highlight">1. Header -> Trailer or Header -> Size search.</p>
		<p>A common way to crave files is to search for headers and carve to the trailers. This is present in JPGs and other file formats with identifiable headers and trailers.</p>
		<figure>
			<img src="header.png"/>
			<img src="footer.png"/>
			<figcaption>Figure 1: JPG header and trailer</figcaption>
		</figure>
		<p>A file carver will simply scan for the hex signature FF D8 FF (E0) and then carve to FF D9. In the example below, the file carver will only scan from the header of the PNG to the EOF. It will ignore any data following the EOF.</p>
		<figure>
			<img src="pnghead.png"/>
			<img src="pngfoot.png"/>
			<figcaption>Figure 2: PNG header and EOF</figcaption>
		</figure>
		<p>However, some files don't have set trailers. In the case of BMPs (which have headers and no trailers), a file carver may simply choose to estimate a maximum file size or to complete a check to see if an image is completely carved based on size information.</p>
		<p id="highlight">2. Structure based carving.</p>
		<p>This method is more applicable to files that do not have a trailer. File carvers will often read the header and attempt to use information following the header to determine how large a file is or when to stop carving.</p>
		<p id="highlight">3. Content based carving.</p>
		<p>This is one of the more advanced methods of carving employed by file carvers. This will use content structure like html tags, language recognition, chi-squared analysis, and information entropy to determine the start and end of a file.</p>
		
		<h3>Using File Carvers</h3>
		<p>There are many file carvers available for use. Some of them are made specifically for images. The two carvers that have proved to be especially useful are Scalpel and Foremost. They are very easy to install on Linux but require compiling on Windows. Being a nice person, I compiled them for you and even included a larger and more comprehensive signature list. You can download them here - <a href="carvers.7z" download>carvers.7z</a>.</p>
		<p>Using file carvers is very easy. The common commands are shown below. Also, you can run cmd.bat in the respective folders to spawn CMD in the current directory.</p>
		<pre class="language-none" data-src="commands.txt"></pre>
		
		<h3>Further Readings and References</h3>
		<p>"File Carving" - <a href="http://www.forensicswiki.org/wiki/File_Carving" target="_blank">http://www.forensicswiki.org/wiki/File_Carving</a></p>
		<p>Tool: Scalpel 2.0 - <a href="https://github.com/machn1k/Scalpel-2.0" target="_blank">https://github.com/machn1k/Scalpel-2.0</a></p>
		<p>Tool: Foremost - <a href="http://foremost.sourceforge.net/" target="_blank">http://foremost.sourceforge.net/</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>