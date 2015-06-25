<!DOCTYPE html>
<html lang="en">
<head>
    <title>Firewall Rules Stored in DB</title>
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-family: sans-serif;
        padding: 5px;
      }
      table tr:nth-child(even) td {
        background-color: #95c7ea;
      }
    </style>
</head>
<body>
<?php
include_once("./config/linked-db-config.php");
$conn = DB::getConnection('read');
// Perform SQL query
$sql = "SELECT * FROM fwrules";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    echo "<h2>You have successfully deployed LAMP. </h2>";
    echo "<br>";
    echo "<h3>This a list of Firewall rules stored in your demo db. </h3>";
    echo "<table>\n";    
// Output data of each row
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "\t<tr>\n";
      foreach ($row as $col_value) {
          print "\t\t<td>$col_value</td>\n";
      }
      echo "\t</tr>\n";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>
</body>
</html>
