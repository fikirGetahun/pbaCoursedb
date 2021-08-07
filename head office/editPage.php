<?php 
require('../dbSetup/connect.php');


if($_POST['id'] && !empty($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT `firstName`, `middleName`, `lastName`, `sex`, `class`, `section`,
     `fatherName`, `motherName`, `fatherPhone`, `motherPhone`, `address`, `status`, `photoPath`,
      `note` FROM `studentslist` WHERE `id` LIKE '$id'";

    $ask = $mysql->query($query);
    if($ask->num_rows != 0){
        while($row = $ask->fetch_assoc()){
            ?>
            <div id="container">
                <span id="photo"></span>
                <span id="name"><?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];  ?></span>
                <div id="gender">Gender: <?php echo $row['sex']; ?>  </div>
                <div id="fatherName"> Father's Name: <?php echo $row['fathersName']; ?> </div>
                <div id="motherName"> Mother's Name: <?php echo $row['mothersName']; ?> </div>
                <span id="class"> Class: <?php echo $row['class'].''. $row['section']; ?> </span>
                <div id="fatherPhone"> Father's Phone: <?php echo $row['fatherPhone']; ?> </div>
                <div id="motherPhone"> Mother's Phone: <?php echo $row['motherPhone']; ?> </div>
                <div id="address"> Address: <?php echo $row['address']; ?> </div>
                <div id="status"> Status: <?php echo $row['status']; ?> </div>
            </div>
            
<?php   }
    }else{
        ?>
        <div style="color: red;" > Data base ERROR!! OR REQUEST IS INVALID.</div>
        
        <?php
    }
}

?>