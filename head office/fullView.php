<?php
require('../dbSetup/connect.php');

?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#backk').click(function(){
                $('#container4').load('viewPage.php')
            })
        })

    </script>
</head>


<?php



if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT `firstName`, `middleName`, `lastName`, `sex`, `class`, `section`,
     `fatherName`, `motherName`, `fatherPhone`, `motherPhone`, `address`, `status`, `photoPath`,
      `note` FROM `studentslist` WHERE `id` LIKE '$id'";

    $ask = $mysql->query($query);
    if($ask->num_rows != 0){
        while($row = $ask->fetch_assoc()){

    ?>
        <div id="container4">
        <div id="editForm"></div>

        <span id="name">Name: <?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];  ?></span>
        <div id="studentName"></div>

        <div id="gender">Gender: <?php echo $row['sex']; ?>  </div>
        <div id="sex"></div>

        <span id="class"> Class: <?php echo $row['class']; ?> </span>
        <div id="classE"></div>

        <span id="class"> Section: <?php echo  $row['section']; ?> </span>
        <div id="sectionE"></div>

        <div id="fatherName"> Father's Name: <?php echo $row['fatherName']; ?> </div>
        <div id="fatherNameE"></div>

        <div id="motherName"> Mother's Name: <?php echo $row['motherName']; ?> </div>
        <div id="motherNameE"></div>
        
        

        <div id="fatherPhone"> Father's Phone: <?php echo $row['fatherPhone']; ?> </div>
        <div id="fatherPhoneE"></div>

        <div id="motherPhone"> Mother's Phone: <?php echo $row['motherPhone']; ?> </div>
        <div id="motherPhoneE"></div>

        <div id="address"> Address: <?php echo $row['address']; ?> </div>
      
        <div id="addressE"></div>

        <div id="status"> Note: <?php echo $row['note']; ?> </div>
        
        <div id="note"></div>
        <div id="backk">Back</div>
    </div>
    
            
    <?Php
        }
    }
}



?>