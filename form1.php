<html>
<head>
<title>Winestore Sample Form </title>
</head>

<body>
<?php
        require_once('db.php');
        if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) {
                echo 'Could not connect to mysql on '.DB_HOST.'\n';
                exit;
        }
        echo 'Connected to mysql <br />';

        if(!mysql_select_db(DB_NAME, $dbconn)) {
                echo 'Could not user database '. DB_NAME . "\n";
                echo mysql_error() . '\n';
                exit;
        }

        echo 'Connected to database ' . DB_NAME . '<br />';
		
		$query = "use winestore";
		$result = mysql_query($query, $dbconn);
if (!$result) {
    echo 'Could not use winestore: ' . mysql_error();

}

$query = "show tables";
                $result = mysql_query($query, $dbconn);
if (!$result) {
    echo 'Could not show tables: ' . mysql_error();

}
echo '<select value="tableName">';
while ($row = mysql_fetch_row($result)) {
   for ($i = 0; $i < mysql_num_fields($result); $i++) {
      echo '<option value="'.$row[0].'">'.$row[0].'</option>';
   }
   // Print a carriage return to neaten the output
   echo "\n";
  }

echo '</select>';

mysql_close($dbconn);
echo '<p>Database closed</p>';
?>
</body>
</html>
