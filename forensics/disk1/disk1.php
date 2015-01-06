<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>File System 1</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>File System 1</h1>
		
		<h3>What is a File System?</h3>
		<p>We know that files have a header and a footer. If you do not know that, the please read File Structure before continuing. However, computers need an organized and efficient way to store and access files. Putting files together in a storage area without properly organizing them is about as pointless as having a library where all of the books had blank covers and were scattered in no particular order all over the floor. The lack of an identifying feature or location for the files would make storage and access nearly impossible. Different file systems were created to store, organize, and manage information on a hard drive. Before we go on to talk about analyzing individual file systems, we first need to understand some basics that all file systems generally have in common.</p>
		
		<h3>Common Aspects of File Systems</h3>
		<ul>
			<li>File names - Most file systems have a way to store file names. Usually, the file system also restricts the length and character set of the file names. In select file systems, file names are not case sensitive.</li>
			<li>Directories - Folders allow for organization of data into groups. Most modern and high end file systems allow subdirectories with a hierarchy structure. Windows uses indexes on file names to indicate the hierarchy position while Unix/Linux uses an inode.</li>
			<li>Allocation Unit - For efficiency purposes, most file systems do not process each byte on the hard drive separately. Instead, during formatting, the file system separates the entire drive into clusters (512 bytes to 64 kB). Clusters smaller than 512 bytes are too inefficient to manage. However, larger clusters often translates to more wasted space.</li>
			<li>Metadata - Other information about the file, such as user permissions or file attributes, are stored in the metadata. Some attributes are specifically associated with one file system.</li>
		</ul>
		
		<h3>NTFS</h3>
		<p>NTFS, or New Technology File System, is a file system created by Microsoft. If you are running Windows, your main partition is most likely NTFS. NTFS uses the aforementioned allocation units or clusters. A common example of slack space or unused space is shown below. It should be evident that my file system is using 4kB clusters.</p>
		<figure>
			<img src="waste.png"/>
			<figcaption>Figure 1: A text file under the 4kB cluster size</figcaption>
		</figure>
		<p>As you can see, the file is only 759 bytes. However, it takes up 4096 bytes. That's over 80% of unused space. If there were 100 of the same files, each would take up the same 4kB chunk and waste 80%. However, utilizing chunks makes the file system much much faster.</p>
		<p>NTFS stores file and folder information in something called a Master File Table (MFT). There is at least one MFT entry for every file or folder on the drive. Basic information such as name, size, time/date stamps, and data content are stored in the MFT. NTFS reserves a contiguous space (usually at the beginning of the HDD) for the MFT. Without the file table, you would just have a bunch of random data.</p>
		
		<h3>NTFS File-Recovery</h3>
		<p>Sometimes, laziness causes one to shift-delete things rather than sending them to the recycle bin. No need for tear drops quite yet. Like most file systems, files are not actually deleted when they are removed from the recycle bin. Likewise, deleted files from removable drives are not truly removed upon deletion.</p>
		<figure>
			<img src="diff.png"/>
			<figcaption>Figure 2: A 1 byte difference marks for deletion</figcaption>
		</figure>
		<p>As shown in the image above, 1 byte of difference in the MFT from 01 to 00 will mark the file for deletion. However, the file is still detectable by scanning the MFT and recoverable with its original metadata. Using recovery tools like TestDisk and OSForensics, deleted files from NTFS partitions can be accurately recovered using MFT information rather than file carving.</p>
		
		<h3>Alternate Data Stream</h3>
		<p>NTFS partitions contain a special "feature" known as the Alternate Data Stream (ADS). ADS was originally implemented for fork support. However, most programs, including Windows Explorer, will kindly ignore any ADS. The data in an alternate stream is specified by a ":" following the original file name of the "cover file." ADS impregnated files show no difference in their metadata.</p>
		<figure>
			<img src="ads1.png"/>
			<figcaption>Figure 3: Insertion of notepad.exe into aes.py:ads.exe</figcaption>
		</figure>
		<p>One way to view ADS is to enter the file name followed by a colon. Another way is to scan and extract using tools like Nirsoft's AlternateStreamView.</p>
		<figure>
			<img src="ads2.png"/>
			<figcaption>Figure 4: Scan for ADS using dir command</figcaption>
		</figure>
		
		<h3>Extended File System</h3>
		<p>ext2, ext3, and ext4 and versions of the Extended File System commonly used by Linux. Similar to NTFS, Linux has data which represents a system objects and its metadata. The data is known as the index node or inode. When files are deleted in a Linux system, the entry regarding the file is deleted and the system marks the area containing the file and its inode as free space. Again, neither the file nor its inode is actually removed. A common tool used to recover deleted files in Linux is extundelete.</p>
		<figure>
			<img src="inode.png"/>
			<figcaption>Figure 5: Running extundelete on a mounted /dev/sda1</figcaption>
		</figure>
		
		<h3>Further Readings and References</h3>
		<p>"Alternate Data Streams in NTFS" - <a href="http://blogs.technet.com/b/askcore/archive/2013/03/24/alternate-data-streams-in-ntfs.aspx" target="_blank">http://blogs.technet.com/b/askcore/archive/2013/03/24/alternate-data-streams-in-ntfs.aspx</a></p>
		<p>"Linux File Systems: Ext2 vs Ext3 vs Ext4" - <a href="http://www.thegeekstuff.com/2011/05/ext2-ext3-ext4/" target="_blank">http://www.thegeekstuff.com/2011/05/ext2-ext3-ext4/</a></p>
		<p>"Overview of FAT, HPFS, and NTFS File Systems" - <a href="http://support.microsoft.com/kb/100108" target="_blank">http://support.microsoft.com/kb/100108</a></p>
		<p>Tool: ADS Viewer - <a href="http://www.nirsoft.net/utils/alternate_data_streams.html" target="_blank">http://www.nirsoft.net/utils/alternate_data_streams.html</a></p>
		<p>Tool: extundelete - <a href="http://extundelete.sourceforge.net/" target="_blank">http://extundelete.sourceforge.net/</a></p>
		<p>Tool: Test Disk - <a href="http://www.cgsecurity.org/wiki/TestDisk" target="_blank">http://www.cgsecurity.org/wiki/TestDisk</a></p>
		<p>Tool: OSForensics - <a href="http://www.osforensics.com/" target="_blank">http://www.osforensics.com/</a></p>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>