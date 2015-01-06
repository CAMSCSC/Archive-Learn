<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Web Browsers</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>Web Browsers</h1>
		
		<h3>Internet Explorer</h3>
		<p>Yes. You read correctly. The subtitle says Internet Explorer. That must have gotten your attention. Although IE is sufficient for many of our every day browsing purposes, it is not sufficient for other purposes that we will discuss later on. Internet Explorer version 9 and above have similar capabilities to Chrome and Firefox but it is simply recommended that you do not use IE because the only time I ever use it is to get another browser. This means that I:<p>
		<ol>
			<li>Do not know how to use it very well</li>
			<li>Cannot answer any questions regarding IE</li>
			<li>Suggest that you get Chrome or Firefox</li>
		</ol>
		
		<h3>The Power and Diversity of Browsers</h3>
		<p>Before we go on, we should understand how browsers work. The exact process of how browsers manage to retrieve data then turn it into the interactive page you see is actually quite complicated. However, most browsers follow a similar process. First, you enter a url or perform a search using the sidebar.  The information is passed from the User Interface to the Browser Engine (who is like a guy in the middle that manages things). The Browser Engine tells the Rendering Engine where to get the data and how to get it. UPon receiving instructions, the Rendering Engine will begin to retrieve data (usually in 8kB chunks). Once that's done, it goes through another complex process of processing the CSS, HTML, and finally outputting the page. Did I also mention that each browser has a different way of doing this?</p>
		<figure>
			<img src="webkitflow.png" />
			<figcaption>Figure 1: WebKit rendering flow</figcaption>
		</figure>
		<p>Once the HTML page is all nicely rendered and displayed, the browser's JavaScript interpreter kicks in to continue processing user interactions. You can read about all of this in more detail using the links in the Further Readings and References section.</p>
		<p>If you've ever view a website from two different browsers, you may have noticed that some things look slightly different. This is inevitably caused by the differences in the browsers' rendering engines. The browser that shall not be named uses Trident, Firefox uses Gecko, Safari uses WebKit, and Chrome uses Blink (forked from WebKit). The variations in browsers don't create that much of a difference in functionality with the exception of cough cough cough IE cough.</p>
		
		<h3>Uncovering the Prowess of Browsers</h3>
		<p>At one point or another, we have probably done some "fun" things with our browsers like setting contenteditable to true :p. However, browsers have the capacity to do so much more that temporarily allowing us to change our grades. I use Firefox more frequently, so most of the things covered are going to be done through Firefox. Similar (nearly exact) functions or tools are available in Chrome.</p>
		<p>Let's discuss a few advanced functionalities of Firefox.</p>
		
		<p>View Page Source: Right clicking on a page and selecting View Page Source or pressing CTRL+U will bring the <span id="highlight">STATIC</span> source code of the web page. I emphasize static because most web sites nowadays are NOT static. They may utilize jQuery and CSS to dynamically add or remove content from the page. View Page Source may not provide the same code used to render the web page that you are viewing.</p>
		<figure>
			<img src="viewsource.png" />
			<figcaption>Figure 2: Page source of a new Firefox tab</figcaption>
		</figure>
		
		<p>View Page Info: Right clicking on a page and selecting View Page Info will bring up the Page Info window. This window contains useful information regarding the web page's encoding, meta, media, security, cookies, and saved passwords.</p>
		<figure>
			<img src="pageinfo.png" />
			<figcaption>Figure 3: General Info of camscsc.org</figcaption>
		</figure>
		
		<h3>Web Developer</h3>
		<p>Firefox has a section filled with Web Developer tools that can be used to analyze every component of the website. We will go over a few important features.</p>
		
		<p>Web Console: Accessed using Ctrl+Shift+K or using the Developer menu. The console is a JavaScript console that acts as the output for console.log() commands. It also tracks errors and warnings. You can access the page's JS variables and run the page's JS functions directly using the console.</p>
		<figure>
			<img src="console.png" />
			<figcaption>Figure 4: Sample commands in the console</figcaption>
		</figure>
		
		<p>Inspector: Accessed using Ctrl+Shift+C or using the Developer menu. The inspector show the dynamic HTML page including any changes that are currently occurring. This is useful for getting the full picture of the code used to render the page. You can also designate a specific element on the page with your mouse to analyze.</p>
		<figure>
			<img src="inspector.png" />
			<figcaption>Figure 5: Inspector detecting dynamic changes in ctf.camscsc.org</figcaption>
		</figure>
		
		<p>Network: Accessed using Ctrl+Shift+Q or using the Developer menu. The Network tab shows all requests and responses. Use this to track server-client interactions. It also allows the user to edit request methods, headers, and bodies. This can become extremely useful in some situations ;). The type of data can be filtered using the buttons at the bottom of the panel.</p>
		<figure>
			<img src="network.png" />
			<figcaption>Figure 6: Using Network to analyze a past challenge</figcaption>
		</figure>
		
		<p>ScratchPad: Accessed using Shift+F4 or using the Developer menu. The ScratchPad is a JS testing area similar to the console that allows you to execute JS code. However, it is more powerful and organized than using the console.</p>
		<figure>
			<img src="scratchpad.png" />
			<figcaption>Figure 7: Writing a simple JS program using ScratchPad</figcaption>
		</figure>
		
		<p>Many additional tools can be obtained. We will not go over in detail how these tools function. The best way to learn how to use these tools is to simply try them out and experiment with them.</p>
		
		<h3>Further Readings and References</h3>
		<p>"How Browsers Work" - <a href="http://www.html5rocks.com/en/tutorials/internals/howbrowserswork/" target="_blank">http://www.html5rocks.com/en/tutorials/internals/howbrowserswork/</a></p>
		<p>"How Browsers Work (alternative)" - <a href="http://taligarsiel.com/Projects/howbrowserswork1.htm" target="_blank">http://taligarsiel.com/Projects/howbrowserswork1.htm</a></p>
		<p>"Firefox Developer Tools" - <a href="https://developer.mozilla.org/en-US/docs/Tools" target="_blank">https://developer.mozilla.org/en-US/docs/Tools</a></p>
		<p>"Chrome Developer Tools" - <a href="https://developer.chrome.com/devtools/index" target="_blank">https://developer.chrome.com/devtools/index</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>