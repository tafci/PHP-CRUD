<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
header('Content-Type: text/html; charset=utf-8');
require './inc/database.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $mysqli = new mysqli($host, $username, $passwd, $dbname);
        if (!$mysqli) {
            die();
        }
        $mysqli->query("set names 'UTF8'");
        $result = $mysqli->query("SELECT * FROM customer");
        if ($result) {
            ?>
            <table>
                <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>LINK</th>
            </thead>   
            <tbody>

                <?php
                while ($row = $result->fetch_assoc()) {
                    ?> 
                    <tr>    
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><a href="http://<?php echo $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/edit.php?id=<?php echo $row['id'] ?>">EDIT</a> <a href="http://<?php echo $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/delete.php?id=<?php echo $row['id'] ?>">DELETE</a></td>
                    </tr>



                    <?php
                }
                ?>
            </tbody>
        </table>
        <form method="POST">
            <input type="hidden" name="_id" > <br>
            name <input type="text" name="_name" > <br>
            address <input type="text" name="_address" > <br>
            <input type="submit" name="SAVE" value="SAVE">

        </form>
        <?php
        if(isset($_POST['SAVE'])){
                   $name= strip_tags($_POST['_name']);
            $address= strip_tags($_POST['_address']);
            $count=$mysqli->query("INSERT INTO customer (name, address) values('".$name."','".$address."')");
        }
    }else {
        echo 'Valami gebasz';
    }
    $mysqli->close();
    ?>
</body>
</html>
