<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Cookies</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>Cookies</h1>
		
		<h3>Introduction to Deliciousness</h3>
		<p>According to Google, a cookie is "a small sweet cake, typically round, flat, and crisp." Wait, that's not the right type of cookie. The cookie we are going to cover in this lesson is the cookie of the web. An HTTP cookie or web cookie is a piece of data stored in the user's browser. It is used by websites to identify the user as well as recall information stored regarding the user.<p> 
		
		<h3>History</h3>
		<p>You might be wondering why a cookie is named after food. Truthfully, I have no idea what the creator of the term "cookie" thought of while he was creating it. However, research shows that the most consistent story of the origin of the term "cookie" comes from "magic cookie", a term coined by Lou Montulli while developing an e-commerce application.<p>
		
		<h3>How Cookies Work</h3>
		<p>Before we get into the details of the code used to implement cookies, let's follow the life of a cookie. First, the browser will send a request to get the page.</p>	
		<pre class="language-none" data-src="001.txt"></pre>
		<p>Now the server will respond. Notice how the cookie is being set.</p>
		<pre class="language-markup line-numbers" data-line="9, 10" data-src="002"></pre>
		<p>Now every time the browser wants to get more data, it will send an additional line including the cookies.</p>
		<pre class="language-markup line-numbers" data-line="9" data-src="003"></pre>
		
		<h3>Components of a Cookie</h3>
		<p>A cookie has multiple parts. If you looked at the second cookie above, you will see that it has an attribute 'Path='. Let's look at a few examples of attributes.</p>
		<pre class="language-markup line-numbers" data-src="004"></pre>
		<p>The cookie on a line 1 is a basic name-value pair cookie. The cookie on line 2 has a basic path property. This means that the cookie applies only to the main domain path and no other paths. The cookie on on line 3 only applies to the domain bar.org. The cookie on line 4 applies to all domains and subdomains of bar.org. The cookie on line 5 expires at the given date and time. The cookie on line 5 has two additional attributes. The secure attribute means that the cookie will only be sent through encrypted methods (via secure transmissions). The HttpOnly attribute forces the browser to only send cookies through the HTTP and HTTPS channels.</p>
		
		<h3>Implementation</h3>
		<p>Enough about the intricate details about cookies. We shall now proceed to the fun part - implementation.</p>
		<pre class="line-numbers language-php" data-src="005"></pre>
		<p>I'll quickly explain how the code works. The code above is basically a separate login function that is called by another page when the user submits his/her credentials. Let's just assume that this file is called login.php. Another file will post a username and password to login.php. First, the script will get the values and pass it to a login function. The login function checks the username and password values against the SQL database. If the query was successful and the user exists, the function will return true. A true from the login function will cause login.php to set two session variables and print out 'Success!'. Otherwise, it will exit with the message 'Failure'.</p>
		<p>You may be wondering, what does this have to do with cookies? I'm sure you can't find the word 'cookie' in the script. PHP has a session feature. When the script called session_start(), PHP will create a small session file that helps identify the user. In addition, it will also send back a cookie named PHPSESSID followed by a 32 character hash. You may have noticed the presence of $_SESSION['']. $_SESSION is a PHP superglobal array that contains information linked to the current session. Notice that when the user has successfully logged in, his/her $_SESSION['authenticated'] gets set to true. Other scripts such as the one below can call on session array values at any time.</p>
		<pre class="line-numbers language-php" data-src="006"></pre>
		
		<h3>Other PHP Cookies</h3>
		<p>PHP also supports other cookies with different names. The one below sets some custom cookies.</p>
		<pre class="line-numbers language-php" data-src="007"></pre>
		<p>basic() will set a basic cookie with a name value pair of: name=Barr. secure() on the other hand will set the same cookie that expires 1 hour later, works only on bar.org/, and is secure and HttpOnly.</p>
		
		<h3>Who Took The Cookie?</h3>
		<p>Did you take the Cookie? I'm just kidding. You don't know how yet. But to be completely honest, the actually stealing part is just as easy as getting up on the counter and reaching for the cookie jar. Let me teach you a few ways.</p>

		<h3>Session Hijacking</h3>
		<p>Session hijacking occurs with PHP sessions or any server-side language that includes sessions really. We will refer to the login script shown in Implementation. Let's pretend that a user has just logged in. This is what the browser would receive: (this actually comes from ctf.camscsc.org).</p>
		<pre class="language-markup line-numbers" data-line="8" data-src="008"></pre>
		<p>As of now, the browser will send back Cookie: PHPSESSID=82d97fa55120b4661b7335b664a98ce3. What if we managed to steal this cookie and set it as our own? If the user never logged out, we would now be logged in as the user because PHP still identifies that SESSION ID as authenticated.</p>
		<figure>
			<img src="sesshijack.png" />
			<figcaption>Figure 1: PHPSESSID hijacking in Chrome</figcaption>
		</figure>
		<p>You can actually try this on ctf.camscsc.org!</p>
		
		<h3>JavaScript and Cookies</h3>
		<p>Did you know JavaScript can also access and store cookies? JavaScript cookies are not any different from PHP cookies. However, JavaScript does not store cookies as an array. (HTML5 does offer the localStorage object, which is much more similar to PHP's $_COOKIE. More information can be found in further readings.) Instead, JavaScript access cookies as a string. Therefore, if you wanted to modify or delete an individual cookie, you would need to write a function. But we are not going to concern ourselves with such things. We will look at the basics and then the fun part.</p>
		<p>To access all of the cookies, one can simply type document.cookie into the console.</p>
		<figure>
			<img src="cookieconsole.png" />
			<figcaption>Figure 2: Using document.cookie in the Firefox Console</figcaption>
		</figure>
		<p>We will now look at a few ways to manipulate cookies using JavaScript. Again, we are going to operate with the assumption that we are only dealing with one cookie.</p>
		<pre data-src="009.js"></pre>
		
		<h3>The Fun Part</h3>
		<p>When does the fun part start? Right now. You might be wondering how one would "steal" a cookie in the first place. I mean, it's not like you can go over to someone and kindly ask them to type document.cookie into the console while you sit there with a piece of paper and a pencil jotting down information. Well, maybe if you had a not so smart friend :p. Did you notice that JavaScript can access cookies? Good. Let's proceed to steal some cookies.</p>
		
		<h3>False Sub-domain and Proxy</h3>
		<p>One method to steal cookies is by exploiting the weakness found in the Domain attribute. Let's assume the following cookie is currently in the user's browser:</p>
		<pre><code class="language-markup">Cookie: Domain=.foo.org; Path=/</code></pre>
		<p>The attacker would first need to fabricate a DNS entry pointing a new fake "subdomain" such as bar.foo.org to his/her own IP address. All the attacker needs to do then is simply post any content (an image or file) to foo.org linking to bar.foo.org. What happens when the user attempts to get that content is the browser assumes bar.foo.org is a subdomain of foo.org, thus it will submit all foo.org related cookies. However, this attack is easily preventable. Most modern DNS servers are able to stop DNS poisoning before this can happen.</p>
		<p>Another uncommon method of stealing cookies comes from a proxy using XMLHttpRequests. This of course, has already been patched long ago. A script will execute on the user's browser, creating a request to foo.org but using the attacker's IP as a proxy. The cookies will obviously pass thorugh and be seen. This can also be prevented using HTTPS, since SSL encryption makes data nearly impossible for man-in-the-middle attacks.</p>
		
		<h3>Cross-site Scripting</h3>
		<p>This attack is possible and quite easy to execute on earlier versions of Wordpress or sites with insecure user forms. All the user needs to do is post something like the following:</p>
		<pre data-src="010.html"></pre>
		<p>To an unsuspecting user, the link will simply look like a regular link. </p>
		<a href="#" onclick="alert('I took your cookies');">Suspicious Link</a>
		<p>However, when the user clicks the link, a JS code will execute that sends the user's cookies to the attacker. This can be prevented if a cookie was set similar to the secure() function used earlier. An HttpOnly cookie cannot be accessed using document.cookie.</p>
		
		<h3>Further Readings and References</h3>
		<p>Tool: EditThisCookie - <a href="https://chrome.google.com/webstore/detail/editthiscookie/fngmhnnpilhplaeedifhccceomclgfbg?hl=en" target="_blank">https://chrome.google.com/webstore/detail/editthiscookie/fngmhnnpilhplaeedifhccceomclgfbg?hl=en</a></p>
		<p>Tool: CookieManager+ - <a href="https://addons.mozilla.org/en-US/firefox/addon/cookies-manager-plus/" target="_blank">https://addons.mozilla.org/en-US/firefox/addon/cookies-manager-plus/</a></p>
		<p>"HTML5 LocalStorage - <a href="http://diveintohtml5.info/storage.html" target="_blank">http://diveintohtml5.info/storage.html</a></p>
		<p>"PHP Session Handling - <a href="http://php.net/manual/en/book.session.php" target="_blank">http://php.net/manual/en/book.session.php</a></p>
		<p>"PHP Cookies - <a href="http://us2.php.net/manual/en/features.cookies.php" target="_blank">http://us2.php.net/manual/en/features.cookies.php</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>