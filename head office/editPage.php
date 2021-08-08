<?php 
require('../dbSetup/connect.php');

?>

<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            //here

        })
        function formCaller(idName, type, id){
                const ash = '#'
                $(ash + idName).load('editForm.php', { 
                    type: type,
                    id: id
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
                <span id="photo"></span> <span class="edit" id="photo" onclick="formCaller('editForm', 'photo', <?php echo $id ?> );" >Edit</span>
                <div id="editForm"></div>

                <span id="name"><?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];  ?></span>
                <span id="name" class="edit"  onclick="formCaller('studentName', 'name', <?php echo $id ?> );" >Edit</span>
                <div id="studentName"></div>

                <div id="gender">Gender: <?php echo $row['sex']; ?>  </div>
                <span onclick="formCaller('sex', 'sex', <?php echo $id ?> );" class="edit" id="gender">Edit</span>
                <div id="sex"></div>

                <span id="class"> Class: <?php echo $row['class'].''. $row['section']; ?> </span>
                <span id="photo" class="edit" onclick="formCaller('classE', 'class', <?php echo $id ?> );" >Edit</span>
                <div id="classE"></div>

                <div id="fatherName"> Father's Name: <?php echo $row['fatherName']; ?> </div>
                <span class="edit" onclick="formCaller('fatherNameE', 'fatherName', <?php echo $id ?> );" id="fatherName">Edit</span>
                <div id="fatherNameE"></div>

                <div id="motherName"> Mother's Name: <?php echo $row['motherName']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('motherNameE', 'motherName', <?php echo $id ?> );" >Edit</span>
                <div id="motherNameE"></div>
                
                

                <div id="fatherPhone"> Father's Phone: <?php echo $row['fatherPhone']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('fatherPhoneE', 'fatherPhone', <?php echo $id ?> );" >Edit</span>
                <div id="fatherPhoneE"></div>
    
                <div id="motherPhone"> Mother's Phone: <?php echo $row['motherPhone']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('motherPhoneE', 'motherPhone', <?php echo $id ?> );" >Edit</span>
                <div id="motherPhoneE"></div>

                <div id="address"> Address: <?php echo $row['address']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('addressE', 'address', <?php echo $id ?> );" >Edit</span>
                <div id="addressE"></div>

                <div id="status"> Note: <?php echo $row['note']; ?> </div>
                <span id="photo" class="edit" onclick="formCaller('note', 'note', <?php echo $id ?> );" >Edit</span>
                <div id="note"></div>
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