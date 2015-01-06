<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Steganography 1</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
		<script>MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']],processEscapes: true}});</script>
	</head>
	
	<body>
		<h1>Steganography 1</h1>
		<figure>
			<img src="header.png"/>
			<img src="header_s.png"/>
			<figcaption>Figure 1: Do you see a difference?</figcaption>
		</figure>
		
		<h3>What is Steganography?</h3>
		<p>What exactly is steganography? Steganography is the art of concealing information. Unlike cryptography, steganography does not stand out. Take a look at the two images above. The first one is the original image but the second one contains the hidden message <span id="highlight">'Do you notice the subtle difference?'</span>. The difference is definitely not noticeable by the human eye. Now let's look at an encrypted version of the same message.<p>
		<pre class="language-none">Gcwco acmqei moi kocmwi gqkkiiiaei?</pre>
		<p>The message above was encoded using Vigenére Autokey and the message itself as a password. Notice how blatantly it begs to be solved.</p>
		
		<h3>Image Steganography</h3>
		<p>In steganography 1, we will be focusing on image steganography. Before we even get to how the information is hidden, we need to understand how the message carriers (the images) function. There are four main types of images: JPEG, GIF, BMP, and PNG.</p>
		<p>JPEG (extension .jpg) uses lossy compression methods to make the image size smaller. It is the most common format for photos and pictures. JPEG supports 8-bit grayscale to 24-bit color images. The quality of JPEGs slowly decrease the more times you edit it and save it.</p>
		<p>GIF (extension .gif) is limited to 8-bit (256 colors). But hey, it supports animation.</p>
		<p>BMP (extension .bmp) is Microsoft Window's graphic file format. BMPs are not compressed.</p>
		<p>PNG (extension .png) is the alternative to GIF. It supports 8-bit (with optional transparency), 24-bit, or even 48-bit (which becomes 64-bit with the alpha channel). PNGs are widely used due to it's transparency capability.</p>
		
		<h3>Bits and Bytes</h3>
		<p>You're probably frustrating over this concept of a "bit" right now if you've never studied image color depth. Let's start with the basics. First of all, what is a bit? A <span id="highlight">bit</span> is the most basic unit of information in computing. It can either be a 0 or a 1. A <span id="highlight">byte</span> on the other hand, is a group of bits (usually 8). Most image formats apply compression and peculiar storage formats. We cannot determine pixel values just by looking at a hex editor :p. If you look at the image below, would you be able to tell that it is a blank 100x100 bmp without spending a lot of time manually decoding it? Probably not.</p>
		
		<figure>
			<img src="hexeditor.png"/>
			<figcaption>Figure 2: A blank bmp image in HxD</figcaption>
		</figure>
		
		<p>Have you ever looked at a hex editor before? You may have noticed how hex values are grouped in pairs. The reason for this is our human defined definition of a byte.</p>
		<figure>
			<span>$(AA)_{16} = (170)_{10} = (10101010)_{2}$</span>
		</figure>
		<p>Similarly in Python as:</p>
		<pre class="language-none">0xAA = 170 = 0b10101010</pre>
		<p>0xAA (where 0x defines the start of a hexadecimal number in python) is equivalent to the number 170 (in base 10) which is also equivalent to 0b10101010 (where 0b defines the start of a binary). If you are not familiar with hexadecimal or binary, please study them before proceeding.</p>
		<p>Do you notice that the binary contains contains 8 bits? Gasp. It appears that a byte, the basic unit of grouping, is described by a two digit hexadecimal number or an 8 bit binary.</p>
		
		<h3>Color Depth</h3>
		<p>The aforementioned 8-bit, 24-bit, and 48-bit refer to the color depth of the image. In the previous subsection, we took a look at the byte. Notice that color depth only go as low as 8-bit (or 1 byte). Now is the time to pull out some of those artistic knowledge that I know most of you who actually read this do not have. Most image formats store colors in an additive format, making the primary colors red, green, and blue. From now on, they will be referred to as R, G, and B. This is different from the subtractive combination of colors that printers often use (cyan, magenta, and yellow). You may have seen from paint of other photo editing tools that these R, G, and B values range only from 0 - 255. That is because most normal color depth images only use 1 byte to store a color.</p>
		<pre class="language-none" data-src="001.txt"></pre>
		<p>For 8-bit images, that one byte has to store all three values (thus the horrific 256 colors). 24-bit JPGs use one byte for each R, G, and B color value. I hope you have now made the connection that it's called 24-bit because 3*8 = 24. PNGs and other transparency capable formats are slightly different. They can have an addition alpha channel (A) that defines the opacity of the pixel. R, G, B, and A makes a PNG 32-bit. Finally, we have the ultra high 48-bit and 64-bit color depths. Those contain millions of colors because each R, G, B, and A value take up 2 bytes (16 bits) rather than 1 byte. This is detailed below.</p>
		<pre class="language-none" data-src="002.txt"></pre>
		<p>Yes. This is pertinent to what we are about to learn and do.</p>
		
		<h3>Least Significant Bit</h3>
		<p>The least significant bit (LSB) is the most important when it comes to steganography. Why is it called "least significant" then? The LSB is the last or trailing bit in a byte. Changing the LSB would make no significant changes to the image data. Don't believe me? Asking why we don't use the most significant bit (MSB) for steganography? I'll show it to you mathematically and visually.</p>
		<pre data-src="003.py"></pre>
		<figure>
			<img src="original.png"/>
			<img src="lsb_s.png"/>
			<img src="msb_s.png"/>
			<figcaption>Figure 3: Original vs LSB vs MSB</figcaption>
		</figure>
		<p>The Python up there shows that changing the LSB will only modify a pixel's R, G, or B value by 1 while an MSB change will modify it by over 100. If mathematics didn't do it, I'm sure the visual did. When we want to hide data, all we need to is convert it into binary and replace the LSB of each R, G, B, (or A) with a bit of the data. We will discuss this more later. Notice that if steganography used MSB or something that's not LSB, the difference will be much more noticeable. The message hidden was: 'Do you notice the difference? Yeah. I think you notice the difference now. Why? Because I told you that LSB is the least significant and will not cause a lot of change to the image.'</p>
		
		<h3>Not Unlimited</h3>
		<p>Remember when I said that color depth is pertinent to steganography? I am about to explain why. Before you hide data in something, you'll probably want to make sure that it can actually store everything and not run out of storage space :p. This is where color depth comes in. Each pixel in an 8-bit image contains 8 bits (if you haven't figured that out yet). Each 8 bits or byte can store one bit of information using LSB. That means a 24-bit JPG has the capacity to store 3 bits of information per pixel. The maximum storage capacity of a carrier can be defined as:</p>
		<figure>
			<span>$capacity = width \times height \times \dfrac{bitdepth}{8} $</span>
		</figure>
		
		<h3>Putting It Together</h3>
		<p>We can put all that we've learned into play to actually perform steganography. There are many steganography tools available. Some of those tools do not utilize LSB to hide information. No, they don't use MSB. They use other more complex algorithms. We will take a look at the text steganography portion of a Python stegnography module called Stéganô. I've rewritten and combined important parts of the code so I can explain how the they work. Let's look at how we can hide information in images. The code below comes from the file <a href="hide.py" download>hide.py</a> (a better custom version that fixes a bug is available for download in a later section).</p>
		<pre class="language-python line-numbers" data-src="hide.py"></pre>
		<p>We can begin analyzing this script line by line.</p>
		
		<h3>Python: Importing PIL</h3>
		<pre class="language-python line-numbers" data-src="004.py"></pre>
		<p>First we need to import Image from the PIL library. If you don't have it yet, you can get it by running the following in CMD or terminal:
		<pre class="language-none">pip3 install pillow</pre>
		
		<h3>Setting the LSB</h3>
		<pre class="language-python line-numbers" data-start="3" data-src="005.py"></pre>
		<p>The function takes in an R, G, or B value as <span id="highlight">component</span> and the bit to be hidden as <span id="highlight">bit</span>. The function uses a smart bitwise method to alter the LSB of the component and return it as an integer value. Let's look at how it works. If you forgot bitwise operations, please review that concept.</p>
		<p>Component is 201 and the bit we are trying to hide is 1.</p>
		<pre class="language-python" data-src="006.py"></pre>
		
		<h3>Converting to Binary</h3>
		<pre class="language-python line-numbers" data-start="6" data-src="007.py"></pre>
		<p>The function takes the ASCII value of each character, converts it into an 8 bit binary, and appends it to the list. The return operation is simplified to a one line list comprehension. The function can be rewritten as the following.</p>
		<pre class="language-python" data-src="008.py"></pre>
		
		<h3>Hiding the Data</h3>
		<pre class="language-python line-numbers" data-start="9" data-src="009.py"></pre>
		<p>Line 9: Accepts the input image file name and the message to hide.</p>
		
		<pre class="language-python line-numbers" data-start="11" data-src="010.py"></pre>
		<p>Lines 11-14: Open the image and create a copy for output. Get the image size. Set pixel index to 0 (we need to know where we are in the image to know what index of the message binary to hide in the LSB.</p>
		
		<pre class="language-python line-numbers" data-start="16" data-src="011.py"></pre>
		<p>Lines 16-17: Get the length of the message and add it to the beginning of the message. This is done so that for non-text files, the revealer knows when to stop.</p>
		
		<pre class="language-python line-numbers" data-start="19" data-src="012.py"></pre>
		<p>Lines 19-21: Checks if the max length of the message exceeds the capacity of the carrier.</p>
		
		<pre class="language-python line-numbers" data-start="23" data-src="013.py"></pre>
		<p>Lines 23-38: For every pixel (it goes range(height) and then range(width) because we want to encode left-right. Think about it.), if the message has not been completely encoded, get the R, G, and B value of the pixel at the location (col, row). Set the LSB values of each R, G, and B to a bit in the message. Put the new pixel values in our encoded file (a copy of the original image). Add 3 to the index counter because we process 3 bits. Notice a problem here. It only goes by sets of 3s, which can cause incomplete data to be encoded. A fix will be shown later. Finally, return the encoded image.</p>
		
		<pre class="language-python line-numbers" data-start="40" data-src="014.py"></pre>
		<p>Lines 40-42: If the file is not being imported, use the carrier 'carrier.png', hide the message 'The secret message.', and save the output to 'output.png'.</p>
		
		<h3>Bug Fix</h3>
		<p>The aforementioned issue of "sets of 3s" incomplete data hiding results when one bit of the message is left out at the end. This results from the set of three check. A fixed version is available for download - <a href="hide_fix.py" download>hide_fix.py</a>. Figure out what has been fixed and why the fix works.<p>
		
		<h3>Retrieving the Data</h3>
		<p>Now that we have hidden the data, we want a way to get it back. Stéganô also includes a function to do that. I have simplified the source into <a href="reveal.py" download>reveal.py</a>. The reveal function works by working on the image in 8 bit (1 byte) chunks. Therefore, it can recover the hidden messages from images of different color depths and transparency options.</p>
		<pre class="language-python line-numbers" data-src="reveal.py"></pre>
		
		<h3>Hiding in the Alpha Channel</h3>
		<p>32-bit PNGs also have an 8 bit alpha channel that can be used to hide information. Below is a modified program that hides additional data in the alpha channel. reveal.py can still extract the data without modification. The code below is from <a href="rgba_steg.py" download>rgba_steg.py</a>.</p>
		<pre class="language-python line-numbers" data-src="rgba_steg.py"></pre>
		<p>Now, why don't you try to extract the hidden message from the second image of the CAMS CSC logo at the top of the page?</p>
		
		<h3>Hiding Elsewhere</h3>
		<p>Is the only type of image steganography LSB? No. There are many other types of image steganography as well. Let's see a few.</p>
		
		<h3>EOF Steganography</h3>
		<p>We can hide data after the footer of some image formats. JPG images read only from header to footer. Thus, we can safely put any data we want after the footer without disrupting the image at all. However, this method is easily detectable when viewing the contents of the file in a text editor or hex editor.</p>
		<figure>
			<img src="eof.jpg"/>
			<img src="eof_s.jpg"/>
			<figcaption>Figure 4: Original JPG vs JPG with EOF steganography</figcaption>
		</figure>
		<p>Let's look at how easy it is to detect EOF Steganography.</p>
		<figure>
			<img src="blatanteof.png" />
			<figcaption>Figure 5: EOF steganography viewed using HxD</figcaption>
		</figure>
		<p>More steganography carriers, algorithms, and methods will be discussed in another lesson.</p>
		
		<h3>Further Readings and References</h3>
		<p>"Steganography: Hiding Data Within Data" - <a href="http://www.garykessler.net/library/steganography.html" target="_blank">http://www.garykessler.net/library/steganography.html</a></p>
		<p>Tool: Stéganô - <a href="https://bitbucket.org/cedricbonhomme/stegano" target="_blank">https://bitbucket.org/cedricbonhomme/stegano</a></p>
		<p>Tool: LSB-Steganography - <a href="https://github.com/RobinDavid/LSB-Steganography" target="_blank">https://github.com/RobinDavid/LSB-Steganography</a></p>
		<p>Tool: HxD - <a href="http://mh-nexus.de/en/hxd/" target="_blank">http://mh-nexus.de/en/hxd/</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>