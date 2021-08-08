<?php 
require('../dbSetup/connect.php');

?>

<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            //here

        })
        function formCaller(idName, type){
                const ash = '#'
                $(ash + idName).load('editForm.php', { 
                    type: type
                })
            }
    </script>
</head>


<?php


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
                <span id="photo"></span> <span class="edit" id="photo" onclick="formCaller('editForm', 'photo' );" >Edit</span>
                <div id="editForm"></div>

                <span id="name"><?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];  ?></span>
                <span id="name" class="edit"  onclick="formCaller('studentName', 'name' );" >Edit</span>
                <div id="studentName"></div>

                <div id="gender">Gender: <?php echo $row['sex']; ?>  </div>
                <span onclick="formCaller('sex', 'sex' );" class="edit" id="gender">Edit</span>
                <div id="sex"></div>

                <span id="class"> Class: <?php echo $row['class'].''. $row['section']; ?> </span>
                <span id="photo" class="edit" onclick="formCaller('class', 'class' );" >Edit</span>
                <div id="class"></div>

                <div id="fatherName"> Father's Name: <?php echo $row['fatherName']; ?> </div>
                <span class="edit" onclick="formCaller('fatherName', 'fatherName' );" id="fatherName">Edit</span>
                <div id="fatherName"></div>

                <div id="motherName"> Mother's Name: <?php echo $row['motherName']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('motherName', 'motherName' );" >Edit</span>
                <div id="motherName"></div>
                
                

                <div id="fatherPhone"> Father's Phone: <?php echo $row['fatherPhone']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('fatherPhone', 'fatherPhone' );" >Edit</span>
                <div id="fatherPhone"></div>
    
                <div id="motherPhone"> Mother's Phone: <?php echo $row['motherPhone']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('motherPhone', 'motherPhone' );" >Edit</span>
                <div id="fatherPhone"></div>

                <div id="address"> Address: <?php echo $row['address']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('address', 'address' );" >Edit</span>
                <div id="address"></div>

                <div id="status"> Note: <?php echo $row['note']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('note', 'note' );" >Edit</span>
                <div id="fatherPhone"></div>
            </div>
            
            
<?php   }
?>
        <div id="back">Back</div>

<?php 
        
    }else{
        ?>
        <div style="color: red;" > Data base ERROR!! OR REQUEST IS INVALID.</div>
        
        <?php
    }
}

?>