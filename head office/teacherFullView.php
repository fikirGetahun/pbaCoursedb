<?php 
require('../dbSetup/connect.php');

//to fetch the teachers id to be viewd here
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT   `firstName`, `middleName`, `lastName`, `sex`, `assignedClass`, `department`, `section`,
     `profession`, `photoPath`, `username`, `password`, `phone`, `division`, `auth`
     FROM `teacherslist` WHERE `id` LIKE '$id'";
     $ask = $mysql->query($query);
     $assClass = array();
     while($row = $ask->fetch_assoc()){

        $name = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];
        $sex = $row['sex'];
        $department = $row['department'];
        array_push($assClass, $row['class'].''.$row['section']); //because i will assign more than one class for the teacher so i will place it in to db besd on 1NF normalizing, therefor i will place the class and section in an array 
        $pro = $row['profession'];
        $photoP = $row['photoPath'];
        $phone = $row['phone'];
        $division = $row['division'];
        $auth = $row['auth'];
    }
     

    
}

?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>

    </script>
</head>
<div>
    <h5>--------------------------------------------------- </h5><br>
    <h6><?php echo $auth; ?></h6>
    <h5>Name: </h5><br>
    <h6><?php echo $name ?></h6>

    <h5>Gender: </h5><br>
    <h6><?php echo $sex ?></h6>
    <h5>Division: </h5><br>
    <h6><?php echo $division; ?></h6>
    <h5>Department: </h5><br>
    <h6><?php echo $department; ?></h6>
    <h5>Teaching Class: </h5><br>
    <?php
    foreach($assClass as $val ){
    ?>
        <h6 style="float:left;" ><?php echo $val ?></h6>
    <?php
    }
    ?>
    <h5>Profession: </h5><br>
    <h6><?php echo $pro; ?></h6>
    <h5>Phone Number: </h5><br>
    <h6><?php echo $phone; ?></h6>
</div>