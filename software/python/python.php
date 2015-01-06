<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Install and Using Python</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>Install and Using Python</h1>
		
		<h3>What is Python?</h3>
		<p>Python is a general-purpose interpreted language. It emphasizes code readability and simplicity. As a result, we like to use Python for a wide variety of purposes (because you wouldn't want to compile code every time you wanted to code another program). The original version of Python, CPython, is of course, written in C. There are other versions of Python interpreters written in other languages.<p>
		
		<h3>PEP 20 -- The Zen of Python</h3>
		<p>Can also be found <a href="http://legacy.python.org/dev/peps/pep-0020/" target="_blank">here</a>.</p>
		<pre class="language-none" data-src="pep20.txt"></pre>
		
		<h3>Installing Python</h3>
		<p>There are two major versions of Python - version 2 and version 3. We will be using version 3. At the time of writing this guide, the version of Python is 3.4.1. Most Linux distributions come pre-packaged with the latest version of Python. However, you can also manually install the latest version of Python.</p>
		<pre class="language-bash" data-src="installlinux.txt"></pre>
		<p>For Windows and Mac, simply download an installer from <a href="https://www.python.org/download/" target="_blank">https://www.python.org/download/</a>. However, please remember to add Python.exe to your environmental path. It will make your life so much easier. This is not enabled by default.</p>
		<figure>
			<img src="path.png" />
			<figcaption>Figure 1: Adding python.exe to Path for Windows</figcaption>
		</figure>
		
		<h3>Installing Modules</h3>
		<p>Python runs on modules. Modules are files composed of Python code mostly with predefined functions or generators that save you time. Python makes it very easy to install modules. Simply using the command pip3 install followed by the module name. You can install the following modules that we will be using right now.</h3>
		<pre class="language-none" data-src="pip.txt"></pre>
		<p>Some modules require you to compile before installing. For Linux, you're set. For Windows, you need to install Visual C++ 2010 Express (must be 2010 because that's what Python 3 was compiled using) from <a href="http://www.visualstudio.com/downloads/download-visual-studio-vs" target="_blank">http://www.visualstudio.com/downloads/download-visual-studio-vs</a>. After that, obtain the source code for the Python module. After extracting, you will notice that it contains a file called setup.py. Run the following to compile and install the modules.</p>
		<pre class="language-none" data-src="compilem.txt"></pre>
		<p>If you're lucky and someone has already compiled a version for the processor and Python versions you are using, you can always find a Windows installer for those modules at <a href="https://pypi.python.org" target="_blank">https://pypi.python.org</a>. Usually, I will compile them for you if I reference them in a lesson but it may not match your processor version.</p>
		
		<h3>Using Python's IDLE</h3>
		<p>Python has included an GUI to test code in called IDLE. You can copy and paste code into the GUI and press enter to execute. If you are using a multi-line code, press Shift+Enter to execute the code.</p>
		<figure>
			<img src="idle.png" />
			<figcaption>Figure 2: Testing single and mulit-line code in IDLE</figcaption>
		</figure>
		
		<h3>Python Files</h3>
		<p>Python files have the extension of .py or .pyc for compile files. All .py files are simply text files. You can run your code by creating using your favorite code editor and saving it as a .py file. To execute a file, it is suggested that you first cd into the directory containing your Python file and executing it using:</p>
		<pre class="language-none" data-src="execute.txt"></pre>
		<p>You're wondering if I'm joking about the existence of the shebang. Please look <a href="http://en.wikipedia.org/wiki/Shebang_%28Unix%29" target="_blank">here</a>.</p>
		
		<h3>Leaning Python</h3>
		<p>Python is a very straightforward language. In fact, you don't need any prior programming knowledge to get stated with it. Look at a few samples and write a few lines. You'll be on your way to becoming a good Python coder in no time. As always, the <a href="https://docs.python.org/3/">documentation</a> teaches much better and more thoroughly than I ever could.</p>
		
		<h3>Important</h3>
		<p>There is one thing you MUST know about Python. Python does not have any statement terminators (you know, the semicolon at the end of most lines). This is because Python runs on spacing and tabs. However, you can only choose one in your code (thank you Python 3). If you use tab, then you must use tab throughout the whole code. If you choose to use spaces instead, then you must be consistent.</p>
				
		<h3>Further Readings and References</h3>
		<p>"Python Indentation" - <a href="http://legacy.python.org/dev/peps/pep-0008/#indentation" target="_blank">http://legacy.python.org/dev/peps/pep-0008/#indentation</a></p>
		<p>Tool: Python - <a href="https://www.python.org/download/" target="_blank">https://www.python.org/download/</a></p>
		<p>Tool: Notepad++ - <a href="http://notepad-plus-plus.org/" target="_blank">http://notepad-plus-plus.org/</a></p>
		<p>"HowTo: Install Python on Linux" - <a href="http://www.cyberciti.biz/faq/install-python-linux/" target="_blank">http://www.cyberciti.biz/faq/install-python-linux/</a></p>
		<p>"Python Package Index" - <a href="https://pypi.python.org/pypi" target="_blank">https://pypi.python.org/pypi</a></p>
		<p>"Python Tutorial" - <a href="https://docs.python.org/3.4/tutorial/" target="_blank">https://docs.python.org/3.4/tutorial/</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>