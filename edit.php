<!DOCTYPE html>

<?php
header('Content-Type: text/html; charset=utf-8');
require './inc/database.php';
$row=array();
if(isset($_GET['id'])){
    $id=(int)$_GET['id'];
    $mysqli=new mysqli($host, $username, $passwd, $dbname);
    if(!$mysqli){
        die();
    }
   $mysqli->query("set names 'utf8'");
    $result=$mysqli->query("SELECT * FROM customer WHERE id='".$id."'");
    if($result){
       $row=$result->fetch_assoc();
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            <input type="hidden" name="_id" value="<?php if(isset($row['id'])) echo $row['id']; ?>"> <br>
            name <input type="text" name="_name" value="<?php if(isset($row['name'])) echo $row['name']; ?>"> <br>
            address <input type="text" name="_address" value="<?php if(isset($row['address'])) echo $row['address']; ?>"> <br>
            <input type="submit" name="SAVE" value="SAVE">
            
        </form>
        
        <?php
        if(isset($_POST['SAVE'])){
            $id=$_POST['_id'];
            $name= strip_tags($_POST['_name']);
            $address= strip_tags($_POST['_address']);
            $count=$mysqli->query("UPDATE customer SET name='".$name."' , address='".$address."' WHERE id='".$id."'");
            
        }
        if(isset($mysqli)){
        $mysqli->close();}
        ?>
        
        
        
        
            </body>
</html>
