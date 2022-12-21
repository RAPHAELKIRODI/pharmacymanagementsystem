<?php
$name     =  $_POST['name'];
$id       =  $_POST['id'];
$price    =  $_POST['price'];
$quanti   =  $_POST['quantity'];
$date     =  $_POST['date'];
$amount   =  $_POST['amount'];
$suppl    =  $_POST['Supplier'];



 
$con=mysqli_connect('localhost','root','','medics');
    if($con)
    {


        $result=mysqli_query($con,"update stock set item_name = '$name', quantity = $quanti ,price =$price,total_amount =$amount,date_supplied ='$date', supplier = '$suppl'  where stock_id= $id ");
        if( $result){
            echo " updated successfully";
        }
        else{
            echo " not updated something wrong";
        }
    }
    else{
        echo " request not granted ";
    }

