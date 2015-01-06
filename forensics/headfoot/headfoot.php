<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>File Structure</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>File Structure</h1>
		
		<h3>File Basics</h3>
		<p>Have you ever wondered what exactly makes up a file on your computer? How does the computer distinguish between one file type and another file type? Most operating systems (even Macs) use a file extension to distinguish between files. I really hope you know what a file extension is but just in case, it's the last part of the file name after the dot. I'll even show you an example.</p>
		<figure>
			<img src="ext.png"/>
			<figcaption>Figure 1: The file extension part of the file</figcaption>
		</figure>
		<p>As you can see, .txt is the file extension. Currently, my computer recognizes a .txt file as a Text Document. This can of course be modified. Windows has a tendency to hide file extensions by default. You can enable it using Folder Options.</p>
		<figure>
			<img src="unhide.png"/>
			<figcaption>Figure 2: Enabling view all extension feature in Windows 8</figcaption>
		</figure>
		
		<h3>File - Program Interaction</h3>
		<p>When you want to view a file on a computer, the OS will direct a preassigned program to read the data from the file. Changing the file extension will only change the program used to open the file and not the file itself. I had to add this in here in case you didn't know. but I really hope you knew this already.</p>

		<h3>The Magic Number</h3>
		<p>Like it or not, file extensions are not absolute or conclusive when it comes to defining a file type. I could easily change the file name and the extension to whatever I want. I could even remove the extension. Then what are you going to do? You could cry (which is what 50% of computer users would do in this case), or you could continue reading and learn the more conclusive way of defining a file type.</p>
		<p>Everything on your computer is stored in binary on the HDD. We will not discuss binary too much in this introductory lesson to prevent you from running away in fear. Even though everything is in binary, we need a more condensed method of representing 1s and 0s. In computer science, we frequently use hexadecimal characters to represent raw data. Two hexadecimal characters make up a byte and one byte is 8 bits. A bit is a 1 or a 0. Let's view the hexadecimal data of an image file using HxD (a hex editor).</p>
		<figure>
			<img src="ex1.jpg"/>
			<figcaption>Figure 3: Example image</figcaption>
		</figure>
		<figure>
			<img src="ex1head.png"/>
			<figcaption>Figure 4: Hex view of ex1.jpg (header)</figcaption>
		</figure>
		<p>Notice the 3 bytes at the start of the JPG file. Every single JPG file, whether created by Photoshop or a Digital Camera, will have the same 3 bytes at the start of a file. We call this the "magic number" of file header signature. Different file types have different headers. A comprehensive list can be found on the <a href="http://www.garykessler.net/library/file_sigs.html" target="_blank">File Signatures Table</a>.</p>
		
		<h3>Footers</h3>
		<p>Files that have headers often contain footers as well. A footer usually indicates the end of a file. In JPG images, the footer (or End of Image) is defined by the bytes FF D9. No image data will be present after those bytes. Remember that not all files have footers. In addition, some encrypted files may not have identifiable headers or footers at all.</p> 
		<figure>
			<img src="ex1foot.png"/>
			<figcaption>Figure 5: Hex view of ex1.jpg (footer)</figcaption>
		</figure>
		
		<h3>Binary Signature Analysis</h3>
		<p>We know that we can make people cry when we remove the file extensions. However, we need to learn how to not cry when we are given files with incorrect extensions or no extensions. One monotonous method of doing this would be to open up the file in HxD and looking for the proper header signature in the File Signatures Table. Another faster and more precise way of doing this is using a tool called TrID. You can download the tool in the "Further Readings and References" section. TrID is a binary signature analyzer. When we change the extension of a file, we are not modifying its binary contents. TrID is powerful and comprehensive. It even has the ability to learn and recognize new file formats. To use TrID, you will need to download the Linux or Windows version as well as the TrIDDefs package (which contains definitions for over 5000 common file types). Place both trid.exe and triddefs.trd in the same directory. Use CMD or the Linux Terminal to access TrID. The basic usage in Windows is:</p>
		<pre class="language-none">trid.exe [filename]</pre>
		<p>Let's analyze ex1.jpg using TrID.</p>
		<figure>
			<img src="trid1.png"/>
			<figcaption>Figure 6: Using TrID on ex1.jpg</figcaption>
		</figure>
		<p>Generally, the file type and extension with the highest percentage of composition is correct. However, there may be false positives for certain extensions as some file types are quite similar.</p>
		
		<h3>Advantages and Disadvantages of Binary Analysis</h3>
		<p>Aside from the obvious advantage of time saving and efficiency, binary signature analysis also surpasses manual analysis in terms of precision. Binary signature analyzers like TrID can produce consistent results every time with absolutely no error (unlike a human). However, binary analysis is not always accurate. TrID does not take into account the entirety of the file. It tends to put a greater emphasis on file headers. However, file headers and footers can be very deceptive. Manual analysis of tampered files tends to be much more accurate when compared with the same TrID analysis.</p>
		
		<h3>File Tampering</h3>
		<p>Speaking of tampering with files, let's tamper with the image file. I've modified the header of ex1.jpg and renamed it <a href="ex2" download>ex2</a>. As you can see in the image below, I've altered the first 4 bytes to correspond to a WAV file (Windows audio file).</p>
		<figure>
			<img src="ex2head.png"/>
			<figcaption>Figure 7: Hex view of ex2 (header)</figcaption>
		</figure>
		<p>Here is what TrID has to say about the file.</p>
		<figure>
			<img src="trid2.png"/>
			<figcaption>Figure 8: Using TrID on ex2</figcaption>
		</figure>
		<p>Clearly, TrID failed at detecting the proper file type. The term generic implies that while a header was found, the content and/or data after the header was not a specific match to any know file type. This should be very suspicious to the analyzer because most files should have a slight similarity to other file types. An example of a TrID analysis on an actual wav file is shown below.</p>
		<figure>
			<img src="actual.png"/>
			<figcaption>Figure 9: Using TrID on a wav file</figcaption>
		</figure>
		<p>When TrID or heuristics fail, it is necessary for manual analysis. In the case of ex2, the existence of Exif data pointing to "Photoshop" gives away the true nature of the file.</p>
		<figure>
			<img src="photos.png"/>
			<figcaption>Figure 10: Manual Analysis of ex2</figcaption>
		</figure>
		
		<h3>Further Readings and References</h3>
		<p>"File Signatures Table" - <a href="http://www.garykessler.net/library/file_sigs.html" target="_blank">http://www.garykessler.net/library/file_sigs.html</a></p>
		<p>Tool: TrID - <a href="http://mark0.net/soft-trid-e.html" target="_blank">http://mark0.net/soft-trid-e.html</a></p>
		<p>Tool: HxD - <a href="http://mh-nexus.de/en/hxd/" target="_blank">http://mh-nexus.de/en/hxd/</a></p>		
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>