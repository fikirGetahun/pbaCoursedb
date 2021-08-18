<?php 
require('../dbSetup/connect.php');
require('../dbSetup/mannage teacher.php');

if(isset($_POST['class'], $_POST['section'], $_POST['id'])){
    $class = $_POST['class'];
    $sec = $_POST['section'];
    $cid = $_POST['id'];
    $out = $teacher->classEditor($class, $sec, $cid);
}



// getting the teachers id
if(isset($_POST['id'])){
    $id = $_POST['id'];
    // to gather the classes that the teacher teaches
    $query="SELECT `id`, `class`, `section` FROM `classtable` WHERE `teacherid` LIKE '$id'";
    // to gather info about the teacher
    $query2 = "SELECT  `firstName`, `middleName`, `lastName`, `sex`,  `department`, `division`
     FROM `teacherslist` WHERE `id` LIKE '$id' ";
    $ask = $mysql->query($query);   // about the class
    $ask2 = $mysql->query($query2); // about the teacher
    $I = 1;
    while($row = $ask->fetch_assoc()){
        ?>
        <div>
        <h6>Assigned Class: <?php echo $I ?></h6>
        <h5>Class: <?php echo $row['class'].''.$row['section']; ?></h5>
        </div>

        <?php
        $I = $I + 1;
    }
    
    $class = $row['class'];
    $sec = $row['section'];
}

// $('#id option[value="0"]').attr('selected', 'selected')

?>