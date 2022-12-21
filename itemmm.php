<?php
$con=mysqli_connect('localhost','root','','medics');
  
  $result=mysqli_query($con,"SELECT * FROM sold, stock WHERE sold.item = stock.stock_id");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="project.css">

     <script src ="tools/jquery-3.6.0.min.js" ></script>
    <script src ="tools/bootstrap.js" defer></script>
    <script src="tools/sweetAlert.js"  ></script>
  <title>view stock</title>
</head>

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
      <label for="name">Item Name</label>
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
    <label for="Date">Date</label>
    <input type="text" name="date" id="Dateupdate"  class="form-control">
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

<body>
   <h1>Hope medics & cosmetics</h1><div class="btn-default">
   <p style="text-align: center;color: green;font-size: 18px;"><b>Manage sales on your items</p></b>  
</div>
     <a href="stocksale.php">Back</a>
       <table border="1" align="center">
      <tr class="btn-success">
        <th>No</th>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>

      </tr>
      <?php
      // while($row=mysqli_num_rows($result));
      $increment=1;
        while($row=mysqli_fetch_array($result)){
        ?>
        <tr class="btn-default">
        <td><?php echo $increment;?><br></td>
        <td><?php echo $row['item_name'];?><br></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['quantity'];?><br></td>
        <td><?php echo $row['price'] * $row['quantity'];?><br></td>
        <td><?php echo $row['today'];?><br></td>


        <!--creating edit and update button-->
        <td><button  onclick="getid(<?php echo $row['stock_id']; ?>)" class="btn btn-primary btn-default" data-toggle="modal" data-target="#updatemodelId">Edit</button></td>
        <td><button onclick ="getdeleted(<?php echo $row['stock_id']; ?>)" class="btn btn-danger btn-default" data-toggle="modal" data-target="#deletemodelId" >Delete </button></td>
        
         </tr>

      <?php
        $increment++;
    } ?>
    </table>

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
            $("#Dateupdate").val(items.date_supplied);
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
               window.location ="itemmm.php";
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
              window.location ="itemmm.php";

            });
          }


        });

      }
      )
  

</script>
</html>