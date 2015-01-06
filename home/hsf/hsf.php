<?php

if(session_id() == '' || !isset($_SESSION))
{
    session_start();
}

if( !isset( $_SESSION['authorized'] ) )
{
	$_SESSION['authorized'] = 0;
}
else
{
	if( sha1( $_POST['key'] ) === 'eb5821769fcf5187c8d25e2a14d4de66bf90bc37' ) // CSC_HSF_#@!
	{
		$_SESSION['authorized'] = 1;
	}
}

if( $_SESSION['authorized'] === 1 ) {

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>CSAW HSF</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>CSAW HSF</h1>
		
		<h3>What is HSF</h3>
		<p>High School Forensics or CSAW HSF is a national (now international) competition hosted by NYU School of Engineering for its Cyber Security Awareness Week. Every year, 8 - 12 teams of finalists from the United States and UAE are selected to participate in a finalist competition in New York. This competition centers around forensics topics such as live system forensics, steganography, log analysis, networking, and website analysis. All finalists receive a scholarship to NYU and NYU School of Engineering.</p>
		
		<h3>I'm Interested</h3>
		<p>We are proud to say that CAMS CSC is the first school in California and the Western half of the United States to send a winning team to NYU. We hope to continue this legacy with your interest and enthusiasm. Every year, CAMS CSC will train and prepare students for this competition. If you are interested, form a team of one to three and join us to learn more about forensics and computer science topics that will help you succeed in this competition. Remember, knowledge takes time to obtain. Don't worry if things appear unclear when you first learn them.</p>
		
		<h3>How to Get Started</h3>
		<p>The best way to learn is simply to come to CSC meetings and do the CTF challenges. However, you can get additional supplemental information on <a href="http://cyfor.isis.poly.edu" target="_blank">CyFor</a>, CSAW's forensics learning site. In our opinion, our club is more fun, more comprehensive, and more pertinent to the competition than CyFor. Don't tell anyone. They do have video walk-throughs of past CSAW challenges.</p>
		
		<h3>Software List</h3>
		<p>These are the must have software for CSAW HSF. No one will ever tell you this except us. I promise. We have collected these through experience. In fact, you could do pretty much all of HSF with just these tools. Most of these tools are for Windows and Linux. Try not to use only Macs for the competition okay?</p>
		<ul>
			<li>AlternateStreamView - <a href="http://www.nirsoft.net/utils/alternate_data_streams.html" target="_blank">http://www.nirsoft.net/utils/alternate_data_streams.html</a></li>
			<li>Android SDK - <a href="https://developer.android.com/sdk/index.html?hl=i" target="_blank">https://developer.android.com/sdk/index.html?hl=i</a></li>
			<li>AstroGrep - <a href="http://astrogrep.sourceforge.net/" target="_blank">http://astrogrep.sourceforge.net/</a></li>
			<li>Autopsy - <a href="http://www.sleuthkit.org/autopsy/" target="_blank">http://www.sleuthkit.org/autopsy/</a></li>
			<li>ccrypt - <a href="http://ccrypt.sourceforge.net/" target="_blank">http://ccrypt.sourceforge.net/</a></li>
			<li>Ext2Fsd - <a href="http://www.ext2fsd.com/" target="_blank">http://www.ext2fsd.com/</a></li>
			<li>Foremost - <a href="http://foremost.sourceforge.net/" target="_blank">http://foremost.sourceforge.net/</a></li>
			<li>HxD - <a href="http://mh-nexus.de/en/hxd/" target="_blank">http://mh-nexus.de/en/hxd/</a></li>
			<li>Kali Linux - <a href="http://www.offensive-security.com/kali-linux-vmware-arm-image-download/" target="_blank">http://www.offensive-security.com/kali-linux-vmware-arm-image-download/</a></li>
			<li>OSFMount - <a href="http://www.osforensics.com/tools/mount-disk-images.html" target="_blank">http://www.osforensics.com/tools/mount-disk-images.html</a></li>
			<li>Python 3 - <a href="https://www.python.org/downloads/" target="_blank">https://www.python.org/downloads/</a></li>
			<li>Quick Hash - <a href="http://sourceforge.net/projects/quickhash/" target="_blank">http://sourceforge.net/projects/quickhash/</a></li>
			<li>TestDisk - <a href="http://www.cgsecurity.org/wiki/TestDisk" target="_blank">http://www.cgsecurity.org/wiki/TestDisk</a></li>
			<li>TrID - <a href="http://mark0.net/soft-trid-e.html" target="_blank">http://mark0.net/soft-trid-e.html</a></li>
			<li>VMware Player - <a href="https://my.vmware.com/web/vmware/downloads" target="_blank">https://my.vmware.com/web/vmware/downloads</a></li>
			<li>Volatility - <a href="http://www.volatilityfoundation.org/" target="_blank">http://www.volatilityfoundation.org/</a></li>
			<li>Wireshark - <a href="https://www.wireshark.org/" target="_blank">https://www.wireshark.org/</a></li>
		</ul>
		
		<h3>How to Write a Digital Forensic Report</h3>
		<p>While we understand that CAMS does not focus on writing, there is a proper way to write digital forensic reports. More detailed instructions will be provided later. For now, emulate the style of \x43\x41\x4d\x53's report in 2014.</p>
		
		<h3>Report Archive</h3>
		<p>No other school does this but for the sake of keeping CAMS CSC amazing, we have created an archive of all the teams' reports over the years. It is highly recommended that you read some of these reports and see if you can replicated these teams' steps in previous years' challenges. Please do not share this with other schools.</p>
		
		<h3>CSAW HSF 2014 Reports</h3>
		<ul>
			<li>2014 Preliminary Round - <a href="http://archive.camscsc.org/download.php?f=-x43-x41-x4d-x53_Report.zip&s=hsf">\x43\x41\x4d\x53</a></li> 
			<li>2014 Preliminary Round - <a href="http://archive.camscsc.org/download.php?f=Anonymous_Report.zip&s=hsf">Anonymous</a></li> 
			<li>2014 Preliminary Round - <a href="http://archive.camscsc.org/download.php?f=aTaKR_Report.zip&s=hsf">aTaKR</a></li> 
			<li>2014 Preliminary Round - <a href="http://archive.camscsc.org/download.php?f=Helix=True_Report.zip&s=hsf">Helix=True</a></li> 
		</ul>
		
		<h3>CSAW HSF 2013 Reports</h3>
		<ul>
			<li>2013 Preliminary Round - <a href="http://archive.camscsc.org/download.php?f=The%20CAMS%20Nugget_Report.zip&s=hsf">The CAMS Nugget</a></li>
			<li>2013 Final Round - It's somewhere on my computer, hopefully.</li>
		</ul>
		
		<h3>Further Readings and References</h3>
		<p>"CSAW HSF" - <a href="https://hsf.isis.poly.edu/" target="_blank">https://hsf.isis.poly.edu/</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>
<?php

} else {

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>CSAW HSF</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<h1>Private Area</h1>
	
	<figure>
	<form action="#" method="post">
		Password: <input type="password" name="key" formenctype="multipart/form-data" autofocus>
		<input type="submit" value="Submit">
	</form>
	</figure>
	
	<!-- Ask club members or Ms. Barnett for the password. -->
</html>
<?php

}

?>