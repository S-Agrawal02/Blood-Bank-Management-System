<?php
define('username','root');
define('database','blood');
define('server','127.0.0.1');
define('password','');
$conn=mysql_connect(server,username,password);
if($conn)
{
mysql_select_db(database,$conn);
echo"connection set";
}

echo mysql_error($conn);

?>