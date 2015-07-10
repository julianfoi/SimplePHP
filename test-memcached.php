<?php



#include('db.php');

include_once("./config/linked-db-config.php");

$conn = DB::getConnection('read');



include_once("./memcached-config.php");

$memcache = false;
//Valudate host first
// if( Memchd::getStats() )
try{
  //Memchd::initMemcache();
  $memcache = Memchd::connect();
}catch(Exception $e){
    ///Handle expection when connecting
   error_log($e->getMessage(),0);
}


$key = md5('memcached demo');

$cache_result = array();

$cache_result = $memcache->get($key); // Memcached object



if($cache_result)

{

// Second User Request

$demos_result=$cache_result;

}

else

{



// First User Request

$sql = "select * from demos order by id desc";
//$sql = "select * from fwrules order by id desc";

$v = $conn->query($sql);



while($row = $v->fetch(PDO::FETCH_ASSOC))

$demos_result[]=$row; // Results storing in array

$memcache->set($key, $demos_result, MEMCACHE_COMPRESSED, 600);

// 10 minutes expiry



// Result

foreach($demos_result as $row)

{

echo '<a href='.$row['link'].'>'.$row['title'].'</a>';

}
}


?>
