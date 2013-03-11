Included folders and files:
group1_datacollection -> Data_Collection.php
group2_persistence
group3_administration
group4_reporting
group5_researchcol
group6_dataviz
readme.txt


X. Database requirements

	1x. Creating a database
		1. Create a database with your program of choice
		2. Locate persistence.sql in the folder group2_persistence
		3. Add this schema to your new database

		To do this using phpmyadmin and xampp, do the following:
		Run Xampp and type “localhost” into your browser’s address bar
		Click “phpmyadmin” on the left and log in
		Create a new database and upload the schema from the group2_persistence folder, the schema is titled “persistence.sql”
		
		

	2x. Login 
		1. Access the "db_connection_info.txt" page in the twittergoggles folder
		2. The variables "$dbhost" "$dbuser" "$dbpass" and "$dbname" are 				specific to the user. To change these variables do the following:
		 
		$dbhost = "YOUR HOST NAME HERE";
		$dbuser = "YOUR DATABASE USERNAME HERE";
		$dbpass = "YOUR DATABASE PASSWORD HERE";
		$dbname = "YOUR DATABASE SCHEMA NAME HERE"; (that you created in                       		 step 1x)
		
		For example, the login should look like the following:
		$dbhost = "host";
		$dbuser = "root";
		$dbpass = "password"; 
		$dbname = "adhoc_database";
		
Note: If you do not have a password, delete information in $dbpass, but keep the quotation marks. For example, $dbpass = “”;

3x. Running “Data_Collection.php” on a server
	1. Deploy the entire application onto your Apache server

	2. Data_Collection.php needs to run periodically on a server.
You can do this any server, the following is an example of a UNIX Server using Cron:

		2a. Create a folder called logs in the home directory (this will be for logging activity and errors)
		2b. type “crontab -e” into server command line (without the quotes)
		3b. type “*/1 * * * * /usr/bin/php 
/var/www/html/twitterGogglesTest/Data_Collection.php -h1 -d30 >> ~/logs/zombielog-head-5-1.txt” into server command line (without the quotes)

		The “*/1 * * * *” tells the program to collect data once a minute

		The path /usr/bin/php points to where php is locally installed on your
 machine

		The path “/var/www/html/twitterGogglesTest/Data_Collection.php” 
specifies the location of the file to be run (Data_Collection.php)

The “-h1” stands for the head, use a different head # per job

The “-d30” is the delay, which is set at 30 seconds

“>> ~/logs/zombielog-head-5-1.txt” Creates the .txt file that tracks activity


		
