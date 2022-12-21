<?php
if(isset($_POST['data']))
{
    $del = $_POST['data'];

    $con=mysqli_connect('localhost','root','','medics');
    if($con)
    {
        $result=mysqli_query($con,"delete from stock where stock_id =$del");
        if( $result){
            echo " deleted successfully";
        }
        else{
            echo " not deleted something wrong";
        }
    }
    else{
        echo " request not granted";
    }
}