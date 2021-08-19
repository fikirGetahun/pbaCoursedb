<?php 
require('../dbSetup/connect.php');
require('../dbSetup/mannage teacher.php');


?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#old').hide()
            $('#editForm').hide()
        })
        function editor(cid, classs){
            $('#old').show()
            $('#editForm').show()
            document.getElementById('old').innerHTML = '<h5>Edit This Class</h5><br> <h6>Class: '+classs+'</h6>';
            $('#editForm').load('editAssignClassForm.php', {cid: cid})
        }


    </script>
</head>
    <div id="old"></div>
    <div id="editForm"></div>

<?php

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
    ?>



    </div>
    
    
    <?php
    while($row = $ask->fetch_assoc()){
        ?>
        <div>
        <h6>Assigned Class: <?php echo $I ?></h6>
        <h5>Class: <?php echo $row['class'].''.$row['section']; ?></h5>
        <button onclick="editor(<?php echo $row['id'] ?>, '<?php echo $row['class'].''.$row['section']; ?>' )" >Edit Assigned Class</button>
        </div>
        

        <?php
        $I = $I + 1;
    }
    

}

// $('#id option[value="0"]').attr('selected', 'selected')

?>