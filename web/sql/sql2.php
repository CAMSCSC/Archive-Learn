<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>SQL Injections 2</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>SQL Injections 2</h1>
		
		<h3>More Advanced SQL</h3>
		<p>Where does MySQL store information about databases and tables? Can we retrieve the information? MySQL and other SQL servers store metadata about objects in a database called INFORMATION_SCHEMA. Before proceeding however, we need to understand an SQL syntax. SQL works in a hierarchy structure (database, table, column). To simply some processes, a period is used in place of qualifiers. This allows us to select a column without the need of a complex query.<p> 
		<pre class="language-sql" data-src="sample005"></pre>
		<p>Let's get back to the magical metadata storing database called INFORMATION_SCHEMA. The database contains many tables that contain crucial information about the structure and format of tables in other databases. There are two tables that we are particularly going to focus on. The table INFORMATION_SCHEMA.COLUMNS contains data regarding the column names and column position of databases. The table INFORMATION_SCHEMA.TABLES contains data regarding table names. For more information (that you definitely will need), view the <a href="http://dev.mysql.com/doc/refman/5.5/en/information-schema.html" target="_blank">MySQL Documentation</a> on the structure of INFORMATION_SCHEMA.</p>
		
		<h3>New Lesson, New Table</h3>
		<p>The last lesson's table is not realistic enough for the purpose of this lesson. I mean, who would actually make a table like that (aside from me)? Let's create a new database called <span id="highlight">tutorial_2</span> and a table named <span id="highlight">userinfo</span>. The data below shows the structure of the table.</p>
		<pre class="language-none" data-src="table002"></pre>
		<p>What is wrong with this table?</p>
		<ol>
			<li>'bobbyluig' used an easy password</li>
			<li>'nobias123' used his birthday, another easy password</li>
			<li>'andies98' used his username, the worst idea ever</li>
			<li>The passwords are stored in raw format (never do this)</li>
		</ol>
		
		<h3>Some Basic PHP for Basic Things</h3>
		<p>Here is another basic PHP script that takes a posted username value as the input and outputs the email address associated with the username.</p>
		<pre class="language-php" data-src="sample006"></pre>
		<p>We already know how to make this code output all of the email addresses at once without knowing any of the usernames. But that's no fun. I want the passwords. How might one do that you ask? The query clearly selects 'Email' and prints out the email. However, we can use the <span id="highlight">UNION</span> operator in MySQL to "combine the result from multiple SELECT statements into a single result set" (MySQL par. 1). I have no idea why I cited that. Anyway, we can now play around and steal some information with our new assistant the UNION operator.</p>
		<pre class="language-none" data-src="sample007"></pre>
		<p>How the query looks now:</p>
		<pre class="language-sql" data-src="sample008"></pre>
		<p>The first part of the query returns nothing. However, the second part of the query returns all of the usernames or passwords. And there we have it. It's as easy as stealing candy from a baby. Or an SQL server.</p>
		
		<h3>Being Malicious</h3>
		<p>So far, we've only discussed how to recon for information. What if we wanted to add a user to the database or delete something? In MySQL, a semicolon indicates the end of a statement. Therefore, we can terminate one statement and start another to perform a different function all within the same query. You might notice the annoying ' at the end which forced us in the previous example to use WHERE ''=' to consumed the final single quote. However, you may have also noticed that # or -- is used to define the start of a comment. We can use this knowledge to our adavantage.</p>
		<pre class="language-none" data-src="sample009"></pre>
		<p>The resultant queries:</p>
		<pre class="language-sql" data-src="sample010"></pre>
		<p>You can see how dangerous and malicious this is. Please DO NOT try this on actual websites. However, you do have full permission to engage CAMS CSC servers in any way you like.</p>
		
		<h3>Logging In</h3>
		<p>Many websites employ some form of a login system. Most of those login systems utilize SQL. Let's look at an example of a simple login system. I have highlighted the flaws.</p>
		<pre class="language-php line-numbers" data-src="sample011"></pre>
		<p>The username and password values from lines 14 and 15 are not escaped. In addition, the code only checks for whether there is one or more rows of data (line 24). This leaves a wide opening for SQL Injections. A second and more secure version is shown below.</p>
		<pre class="language-php" data-src="sample012"></pre>
		<p>However, even the more secure version cannot save you. If someone knows a username, he/she could easily get into the account by injecting the username field with the following:</p>
		<pre><code class="language-sql">bobby' #</code></pre>
		<p>The resulting query would skip the password check.</p>
		<pre><code class="language-sql">SELECT * FROM userinfo WHERE Username='bobby' #' AND Password='$pass'</code></pre>
		
		<h3>Advanced Injections</h3>
		<p>We will analyze the flawed PHP login code where more than one row will still result in a successful login. The same concepts can also be applied to the more secure version as long as the variables are not sanitized. We will now take a realistic standpoint by assuming that we do not know any users on the database nor do we have access to any of the code. The first step is to check whether the system is flawed. This can be done by using some of the SQL Injection methods. Once that is completed, begin reconstructing the query and the PHP code involved. Finally, construct the necessary attacks.</p>
		<p>The first two steps have already been explained. We will focus on the attack constructions. Let's assume that we constructed the following server-side code.</p>
		<pre class="language-php" data-src="sample013"></pre>
		<p>There is a lot of stuff that can be found. But how can they be found? The code we have constructed only shows to possibilities. The login either fails or succeeds. Believe it or not, a true or false is all we need to find out all the data we need. Brute-forcing by pure combination is one possibility. Another type of brute-forcing that saves much more time (maybe a few trillion years?) can be performed with the assistance of the <span id="highlight">LIKE</span> operator. Let's first look at the power of LIKE.</p>
		<pre class="language-sql" data-src="sample014"></pre>
		<p>We can now use this magical operator to ask the server yes or no questions and find out all the information we need. We can input anything into the username that doesn't mess with the query. I'll be using 'bar' without quotes. The following password queries were sent. The results are shown them.</p>
		<pre class="language-none" data-src="sample015"></pre>
		<p>Resultant queries:</p>
		<pre class="language-sql" data-src="sample016"></pre>
		<p>Results:</p>
		<pre class="language-none" data-src="sample017"></pre>
		<p>Based on those queries, we know that the first two letters of the database name is 'tu'. The same concept can be applied to everything else as well.</p>
		
		<h3>Further Readings and References</h3>
		<p>"SQL Injection Attacks by Example" - <a href="http://www.unixwiz.net/techtips/sql-injection.html" target="_blank">http://www.unixwiz.net/techtips/sql-injection.html</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>		
	</body>
</html>