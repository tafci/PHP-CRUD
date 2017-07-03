<?php
if(isset($_GET['id'])){
    require './inc/database.php';
    $id=(int)$_GET['id'];
    $mysqli = new mysqli($host, $username, $passwd, $dbname);
    if($mysqli){
       $count = $mysqli->query("delete from customer where id='".$id."'");
        if($count>0){
            echo 'Törlés sikeres!';
            echo '<a href="http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI']).'/index.php'.'"></a>';
        }
    }
    $mysqli->close();
}



?>

