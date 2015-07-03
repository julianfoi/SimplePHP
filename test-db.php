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
$result_row=0;
try {
   $conn = DB::getConnection('read');
   // Perform SQL query
   $sql = "SELECT * FROM fwrules";
   $result = $conn->query($sql);
   $result_row = $result->rowCount();
}
catch (Exception $err) {
// Catch Expcetions from the above code for our Exception Handling
    $trace = '<table border="0">';
    foreach ($err->getTrace() as $a => $b) {
        foreach ($b as $c => $d) {
            if ($c == 'args') {
                foreach ($d as $e => $f) {
                    $trace .= '<tr><td><b>' . strval($a) . '#</b></td><td align="right"><u>args:</u></td> <td><u>' . $e . '</u>:</td><td><i>' . $f . '</i></td></tr>';
                }
            } else {
                $trace .= '<tr><td><b>' . strval($a) . '#</b></td><td align="right"><u>' . $c . '</u>:</td><td></td><td><i>' . $d . '</i></td>';
            }
        }
    }
    $trace .= '</table>';
   echo '<br /><br /><br /><h2>[</b> DB Connection Error ' . strval($err->getCode()) . '<b>]</h2> <table border="0"><tr><td align="right"><b><u>Message:</u></b></td><td><i>' . $err->getMessage() . '</i></td></tr><tr><td align="right"><b><u>Code:</u></b></td><td><i>' . strval($err->getCode()) . '</i></td></tr><tr><td align="right"><b><u>File:</u></b></td><td><i>' . $err->getFile() . '</i></td></tr><tr><td align="right"><b><u>Line:</u></b></td><td><i>' . strval($err->getLine()) . '</i></td></tr><tr><td align="right"><b><u>Trace:</u></b></td><td><br /><br />' . $trace . '</td></tr></table>';    
}    

if ($result_row > 0) {
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
    echo "<h3> 0 results </h3>";
}

?>
</body>
</html>
