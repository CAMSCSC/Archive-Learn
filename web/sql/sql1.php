<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>SQL Injections 1</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>SQL Injections 1</h1>
		
		<h3>What is SQL?</h3>
		<p>SQL or Structured Query Language is a special language used to communicate with a database (usually located on the web server). It is specifically designed to manage data located in a relational database management system (DBMS). Most web servers or database systems utilize SQL databases. Each version of the SQL databases is different and some versions are proprietary. However, all of them contain quite a few inherent commands.<p> 
		
		<h3>What can SQL do?</h3>
		<ul>
			<li>Retrieve records from a database (articles, posts, comments, etc.)</li>
			<li>Insert records into a database (registration, grades, survey response, etc.)</li>
			<li>Update pre-existing records (change of address, preference change, Le Fail Counter, etc.)</li>
			<li>Create new databases and tables</li>
			<li>Execute malicious queries to DROP all of the tables (it's very possible)</li>
			<li>Many other useful tasks not mentioned here</li>
		</ul>
		
		<h3>Basic Structure</h3>
		<p>A server contains databases. Each database contains tables. Each table contains rows and columns. I hope you know what a table looks like. But to be safe, I'll show you an example. For the purpose of this lesson, let's create an imaginary database called <span id="highlight">tutorial_1</span> with a table named <span id="highlight">secrets</span>. The data below shows the structure of the table.</p>
		<pre class="language-none" data-src="table001"></pre>
		<p>As you can see, the table contains three columns and five rows. I explicitly stated this so you do not get confused when I refer to columns or rows later on.</p>
		
		<h3>Queries</h3>
		<p>Queries allow users to tell the DBMS what the desired data is. The DBMS will plan and optimize the search operations, which makes this extremely easy for the users. Note: most queries take under a few milliseconds. The most common and crucial (might be debatable?) statement in SQL is <span id="highlight">SELECT</span>. Examples and general formatting is shown below. Quotes are there for clarification purposes. Database and column names do no need single quotes around them (unless you want case sensitivity). However, text values, especially those after WHERE optional clause do require single quotes.</p>
		<pre><code class="language-sql">SELECT 'column_name(s)' FROM 'table(s)' WHERE 'criterion'</code></pre>
		<p>Below are some sample queries.</p>
		<pre class="language-sql" data-src="sample001"></pre>
		
		<h3>MySQL and PHP</h3>
		<p>The fun part begins here. You can execute queries on an SQL server, but it would be pointless if there was no integration or interaction with website viewers and physical web pages. Here is where PHP and MySQL comes into play. As I mentioned before, there are many versions of SQL databases (Oracle, MySQL, Microsoft SQL Server, PostgreSQL, DB2, SQlite, etc.). However, the one we will be focusing on is MySQL. MySQL is open source and it functions well with PHP. What makes it even better is that the syntax is easy to understand and horrible queries leave a lot of room for exploitations.</p>
		<p>We already looked at basic queries. Now let's look at how those queries are used with PHP.</p>
		<pre class="language-php" data-src="sample002"></pre>
		<p>The code above is a basic PHP script that prints out the secrets. However, there is no user interaction. Let's look at one which allows for user interaction (with a twist).</p>
		<pre class="language-php" data-src="sample003"></pre>
		<p>You might be asking: what is the twist? Well, if the code detects that you are trying to get the secret from the name 'Karina', it will exit without executing the query. In addition, the query will only output one result at a time. But what if I desperately wanted Karina's secret? We can use the quotes to our advantage.</p>
		<p>The following would be the query if we posted <span id="highlight">name=Bob</span>:</p>
		<pre><code class="language-sql">SELECT Secret FROM secrets WHERE User='Bob'</code></pre>
		<p>I wonder what would happen if we posted <span id="highlight">name=a' OR 'a'='a</span>:</p>
		<pre><code class="language-sql">SELECT Secret FROM secrets WHERE User='a' OR 'a'='a'</code></pre>
		<p>What does this result in? We know that there is no user named 'a' so the first part would evaluate to False. However, 'a' definitely equals 'a'. Therefore, the second part would evaluate to True. False or True is True. Wait, so what happens? The always true statement causes the query to select EVERY SINGLE Secret from the database, bypassing the original user check. This is the basis of SQL injection. We will go into more advanced and more malicious injections in the next lesson.</p>
		
		<h3>Preventing SQL Injections</h3>
		<p>Obviously, no one wants visitors to perform SQL Injections on his/her server. To prevent this, PHP has included a simple function to escape dangerous and malicious things from the input such as newline characters (\n), return characters (\r), single and double quotes (', "), and Control-Z. Don't forget to also set the character set for added safety.</p>
		<pre class="language-php" data-src="sample004"></pre>
		
		<h3>Further Readings and References</h3>
		<p>"Back to Basics: Writing SQL Queries" - <a href="http://robots.thoughtbot.com/back-to-basics-sql" target="_blank">http://robots.thoughtbot.com/back-to-basics-sql</a></p>
		<p>"SQL Injection" - <a href="http://www.w3schools.com/sql/sql_injection.asp" target="_blank">http://www.w3schools.com/sql/sql_injection.asp</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>