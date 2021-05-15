<?php 
$db = mysql_connect("localhost","db_username","db_password");
mysql_set_charset($db,"UTF-8");
if(mysqli_connect_errno($db)){
    die("error");
}else{
    echo "succesfull";
}
$query = mysql_query($db,"SHOW TABLE");
if($query){
    while($tablename = mysql_fetch_array($query)){
        $query1 = mysql_query($db,"CHECK TABLE ". $tablename[0]);
        $query2 = mysql_query($db,"ANALYZE TABLE ". $tablename[0]);
        $query3 = mysql_query($db,"REPAIR TABLE ". $tablename[0]);
        $query4 = mysql_query($db,"OPTIMIZE TABLE ". $tablename[0]);
        if(($query1 == true) and ($query2 == true) and ($query3 == true) and ($query4 == true)){
            echo $tablename[0]." the table named has been repaired.";
        }else{echo "error";}
    }
}
?>