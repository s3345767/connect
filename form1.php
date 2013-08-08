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
//start of the form
echo '<form action="'.$_SERVER['PHP_SELF'].'" method="GET">';
echo '<select name="tableName">';
while ($row = mysql_fetch_row($result)) {
   for ($i = 0; $i < mysql_num_fields($result); $i++) {
      echo '<option value="'.$row[0].'">'.$row[0].'</option>';
   }
   // Print a carriage return to neaten the output
   echo "\n";
  }

echo '</select>';
echo '<input type="submit" name="submitTable" value="Run Query">';
echo '</form>';

if(isset($_GET['submitTable'])){
$selected = $_GET['tableName'];
$select = $_GET['submitTable'];

echo "<p>The user has selected $selected (using button name)</p>";
//echo "2.The user has select $select";
}

if(isset($_GET['tableName'])){
$selected = $_GET['tableName'];
//$select = $_GET['submitTable'];

echo "<p>The user has selected $selected (using drop-down name)</p>";
//echo "2.The user has select $select";
}

mysql_close($dbconn);
echo '<p>Database closed</p>';
?>
</body>
</html>
