<?php

//CREDENTIALS FOR DB
define ('DBSERVER', '127.0.0.1');
define ('DBUSER', 'root');
define ('DBPASS','root');
define ('DBNAME','store');

//LET'S INITIATE CONNECT TO DB
$connection = mysql_connect(DBSERVER, DBUSER, DBPASS) or die("Can't connect to server. Please check credentials and try again");
$result = mysql_select_db(DBNAME) or die("Can't select database. Please check DB name and try again");

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = mysql_query ("SELECT name FROM productos WHERE name LIKE '%{$query}%'");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['name'],
	    'value' => $row['name'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>
