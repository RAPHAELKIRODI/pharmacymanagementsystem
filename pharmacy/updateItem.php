<?php
if(isset($_POST['data']))
{
  $data =$_POST['data'];
    $con=mysqli_connect('localhost','root','','medics');
    $result=mysqli_query($con,"SELECT * FROM stock where stock_id = $data");
    if($result)
    {
         $values =mysqli_fetch_assoc($result);
       echo json_encode($values);
 
    }
    
}
?>      