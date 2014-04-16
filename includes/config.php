<?php
/* Single file for database configuration. Defining some constants to connect with MySQL database */
//ostrich cms configuration by Joseph Rex ==> http://ostrich-dev.com
//Database configurations/settings
define('DBHOST', 'localhost'); //Localhost is my host on my local server
define('DBUSER', 'root'); // Your MySQL username. In my case, it's root
define('DBAUTH', ''); // Your MySQL database (if one exists)! IF (none){ leave the quote blank; }
define('DBNAME', 'ostrich'); //Your database name
?>


<?php
// Your website settings here!
	define('WEBSITE', 'OSTRICH CMS'); //Enter a name for your website
	define('SITE_URL', 'http://localhost/projects/ostrich'); //Enter your website location here. If it's on localhost, specify its path
	//Meta Data
	define('KEYWORDS', 'content management system, web development, ostrich');
	define('DESCRIPTION', 'ostrich content management system');
	
?>