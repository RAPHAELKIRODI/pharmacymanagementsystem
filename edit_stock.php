<?php
$con=mysqli_connect('localhost','root','','medics');


$db= $con;
$tableName="developers";

if(isset($_GET['edit'])){
$id = validate($_GET['edit']);
$condition= ['id' =>$id];
$columns= ['id', 'fullName','gender','email','mobile', 'address','city','state'];
$editData = edit_data($db, $tableName, $columns, $condition);


}

function edit_data($db, $tableName, $columns, $condition){

if(empty($db)){
 $msg= "Database connection error";
}elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
}elseif (!is_array($condition)) {
  $msg= "Condition data must be an associative array";
}
elseif(empty($tableName)){
  $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);

    $conditionData='';
    $i=0;
    foreach($condition as $index => $data){
        $and = ($i > 0)?' AND ':'';
         $conditionData .= $and.$index." = "."'".$data."'";
         $i++;
    }

$query = "SELECT ".$columnName." FROM $tableName";
$query .= " WHERE ".$conditionData;
$result = $db->query($query);
$row= $result->fetch_assoc();
return $row;

if($row== true){
  
 if ($result->num_rows > 0) {

    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
    

 } else {
    $msg= "No Data Found";
  
 }

}else{
  $msg= mysqli_error($db);
}
}

return $msg;

}

// update data
extract($_POST);
if(isset($update) && isset($_GET['edit'])){

$updateDate = date("Y-m-d H:i:s");
$inputData = [
'fullName' => validate($fullName) ?? "",
'gender'   => $_POST['gender']?? "",
'email'    => validate($email) ?? "",
'mobile'   => validate($mobile) ?? "",
'address'  => validate($address) ?? "",
'city'     => validate($city) ?? "",
'state'    => validate($state)?? "",
'created_at' => $updateDate ?? ""
];

$id = validate($_GET['edit']);
$condition= ['id' =>$id];

$result= update_data($db, $tableName, $inputData, $condition);
header("location:form.php");
}

function update_data($db, $tableName, $inputData, $condition){

 $data = implode(" ",$inputData);
if(empty($db)){
 $msg= "Database connection error";
}elseif(empty($tableName)){
  $msg= "Table Name is empty";
}elseif(trim( $data ) == ""){
  $msg= "Empty Data not allowed to update";
}elseif(!is_array($inputData) && !is_array($condition)){
  $msg= "Input data & condition must be in array"; 
}else{

// dynamic column & input value
    $cv=0;
    $columnsAndValue='';
    foreach ($inputData as $index => $data) {
      $comma= ($cv>0)?', ':'';
      $columnsAndValue .= $comma.$index." = "."'".$data."'";
    $cv++;
    }
   
// dynamic condition       
    $conditionData='';
    $c=0;
    foreach($condition as $index => $data){
        $and = ($c>0)?', ':'';
        $conditionData .= $and.$index." = "."'".$data."'";
        $c++;
    }

// update query        
    $query   =  "UPDATE ".$tableName;
    $query  .= " SET ".$columnsAndValue;
    $query  .= " WHERE ".$conditionData;

    $execute= $db->query($query);
   
   if($execute=== true){
      $msg= "Data was updated successfully";
  }else{
      $msg= $query;
  }
}
 return $msg;

}

 function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
 }

?>