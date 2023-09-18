<?php
include_once 'connect.php';
function display_dept()
{
    $conn=connection();
   $sql="select * from dept";
   $result=$conn->query($sql);
   $conn->close();
   return $result;

}
?>
