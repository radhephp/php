<?php
include_once 'connect.php';
function insert($eid,$ename,$salary,$did)
{
    $conn=connection();
    $sql="insert into emp (eid,name,salary,did) values ($eid,'$ename','$salary','$did')";
   
    $conn->query($sql);
    $conn->close(); 

}
function update($eid,$ename,$salary,$did)
{
    $conn=connection();
    $sql="update emp set name='$ename', salary='$salary', did='$did' where eid=$eid";
    $status=$conn->query($sql);
    $conn->close(); 
    return $status;

}
function display()
{
   $conn=connection();
   $sql="select * from emp,dept where emp.did=dept.did ";
   $result=$conn->query($sql);
   $conn->close();
   return $result;
}
function delete($eid)
{
   $conn=connection();
   $sql="delete from emp where eid=$eid";
   $conn->query($sql);
   $conn->close();   
}
function search_emp($eid)
{
    $conn=connection();
   $sql="select * from emp,dept  where emp.did=dept.did and eid=$eid";
   $result=$conn->query($sql);
   $conn->close();
   return $result;
}

?>
