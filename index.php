<?php session_start();
/*      == Ostrich content management system == 
	Designed by: Joseph Rex
	Email: joseph@ostrich-dev.com
	website: http://josephrex.com
	Ostrich website: http://ostrich-dev.com

*/
require_once('includes/dbconnection.php');

require_once('includes/functions.php');

//Getting the web page from the theme
require_once('themes/darkwood/index.php');

//closing the database connection
$conn = null; 

?>