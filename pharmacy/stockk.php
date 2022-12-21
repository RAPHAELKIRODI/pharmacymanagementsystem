<?php

$con=mysqli_connect('localhost','root','','medics');
  
  $result=mysqli_query($con,"SELECT * FROM stock");
?>
<!DOCTYPE html>

<html>
<head>
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="project.css"> -->

    <script src ="tools/jquery-3.6.0.min.js" ></script>
    <script src ="tools/bootstrap.js" defer></script>
    <script src="tools/sweetAlert.js"  ></script>
  <title>view stock</title>
</head>

<style>
  body{
  background-color: rgba(0,100,40,0.5);
}
.alink a{
 width: 15%;
  padding: 2px 5px;
  margin: 4px 0;
  display: inline-block;
  border: 3.6px solid green;
  border-radius: 2px;
  box-sizing: border-box;
  background-color: rgba(95,99,255,0.5);
  text-decoration: none;
  color: black;

}
</style>
<!-- creating a modal for editing -->
<!-- Modal -->
<div class="modal fade" id="updatemodelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
<form   class="modal-content"  id ="formupdate">
<div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <div class="container-fluid" >
            <input type="hidden" name="id" id="id">
    <div class="form-group">
      <label for="name">Name</label>
<input type="text" name="name" id="nameupdate"   class="form-control" >
    </div>
  
    <div class="form-group">
      <label for="Quantity">Quantity</label>
      <input type="text" name="quantity" id="Quantityupdate"  class="form-control">
    </div>
    
    <div class="form-group">
      <label for="Price">Price(Tsh)</label>
<input type="text" name="price" id="Priceupdate"  class="form-control">
    </div>
  
    <div class="form-group">
 <label for="Amount">Amount</label>
<input type="text" name="amount" id="Amountupdate"  class="form-control">
    </div>
  
    <div class="form-group">
    <label for="Date">Date</label>

<input type="text" name="date" id="Dateupdate"  class="form-control">
    </div>
  
    <div class="form-group">
 <label for="Supplier">Supplier</label>
<input type="text" name="Supplier"  class="form-control" id="Supplierupdate" >
    </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" value ="update" class="btn btn-success" id ="submitUpdates">
      </div>
</form>
</div>
      </div>
  
    </div>
  </div>
</div>

<!-- deleting model -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="deletemodelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">delete item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid text-center">
          Are you sure want to delete?!
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id ="deleteitem">Yes delete</button>
      </div>
    </div>
  </div>
</div>
       
      
      
        
      
<script>
  $('#exampleModal').on('show.bs.modal', event => {
    var button = $(event.relatedTarget);
    var modal = $(this);
    // Use above variables to manipulate the DOM
    
  });
</script>



<body >
  <h1>Hope medics & cosmetics</h1><div class="btn-default">
   <p style="text-align: center;color: green;font-size: 18px;"><b>Manage your available stock</p></b>  
</div>
<div class="container-fluid">
  <span class ="alink">

    <a href="stocksale.php" class ="btn">Back</a>
  </span>
    <table border="1" align="center" class ="  table  text-center">
      <tr class="btn-success">
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price(Tsh)</th>
        <th>Amount(Tsh)</th>
        <th>Date</th>
        <th>Supplier</th>
        <th>Edit</th>
        <th>Delete</th>

      </tr>
      <?php
      // while($row=mysqli_num_rows($result));
      $increment =1;
        while($row=mysqli_fetch_array($result)){
        
        ?>
        
        <tr class="btn-default">
        <td><?php echo $increment;?><br></td>
       
        <td><?php echo  $row['item_name'];?><br></td>
        <td><?php echo $row['quantity'];?><br></td>
        <td><?php echo $row['price'] ;?></td>
        <td><?php echo $row['total_amount'];?><br></td>
        <td><?php echo  $row['date_supplied'] ;?><br></td>
        <td><?php echo $row['supplier'] ;?><br></td>

        <!--creating edit and update button-->
        <td><button  onclick="getid(<?php echo $row['stock_id']; ?>)" class="btn btn-primary btn-default" data-toggle="modal" data-target="#updatemodelId">Edit</butto></td>
        <td><button onclick ="getdeleted(<?php echo $row['stock_id']; ?>)" class="btn btn-danger btn-default" data-toggle="modal" data-target="#deletemodelId" >Delete </button></td>
        
      </tr>
      <?php 
   $increment++;
    } ?>
    </table>
    </div>
</body>
<script>
 var thevalue ;
  function getid(id)
  {
      $.ajax({
        type:"post",
        url:"updateItem.php",
        data: {data:id},
        success:function(data){
            var items=  $.parseJSON(data);
            $("#id").val(items.stock_id);
            $("#nameupdate").val(items.item_name);
            $("#Quantityupdate").val(items.quantity);
            $("#Priceupdate").val(items.price);
            $("#Amountupdate").val(items.total_amount);
            $("#Dateupdate").val(items.date_supplied);
            $("#Supplierupdate").val(items.supplier);
        }
      });
  }
  $("#submitUpdates").click(function(event)
  {
    event.preventDefault();
    $.ajax({
      url:"updationProcess.php",
      type:"post",
      data:$("#formupdate").serialize(),
      success:function(data){
        swal({
          title:data,
          icon:"success"
        }).then(function()
            {
              $("#updatemodelId").modal('hide');
               window.location ="stockk.php";
            });
      }
      
    });
    });

    function getdeleted(id)
  {
    // alert(" deleted");
    thevalue = id;
  }

      $("#deleteitem").click(function()
      {

        // alert("deleting  value " + thevalue );
        $.ajax({

          url:"deleteItme.php",
          type:"post",
          data:{data:thevalue},
          success:function(resp){
            swal({
              title:resp,
              icon:"warning"
            }).then(function(){
              window.location ="stockk.php";

            });
          }


        });

      }
      )
  

</script>
</html> 