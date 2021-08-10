<?php 
require('../dbSetup/connect.php');

//to fetch the teachers id to be viewd here
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT  `id`, `firstName`, `middleName`, `lastName`, `sex`, `assignedClass`, `department`, `section`,
     `profession`, `photoPath`, `username`, `password`, `phone`, `division`, `auth`
     FROM `teacherslist` WHERE `id` LIKE '$id'";
     $ask = $mysql->query($query);
     $assClass = array();
     while($row = $ask->fetch_assoc()){
        $id = $row['id'];
        $name = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];
        $sex = $row['sex'];
        $department = $row['department'];
        array_push($assClass, $row['assignedClass'].''.$row['section']); //because i will assign more than one class for the teacher so i will place it in to db besd on 1NF normalizing, therefor i will place the class and section in an array 
        $pro = $row['profession'];
        $photoP = $row['photoPath'];
        $phone = $row['phone'];
        $division = $row['division'];
        $auth = $row['auth'];
    }

//when teachers edit is true
if(isset($_POST['edit'])){
    $edit = true;
}else{
    $edit = false;
}

    
}

?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready()
        $('#back2').click(function(){
            $('#cont').empty()


        })
        function teacherEditForm(idName,id, type){
            $ash = '#'
            $($ash + idName).load('teacherEditForm.php', {id: id, type: type})
        }
    </script>
</head>
<div id="cont">
    <h6>--------------------------------------------------- </h6><br>
    <h6><?php echo $auth; ?></h6>
    <h6>Name: </h6><br>
    <h6><?php echo $name ?></h6><span class="ed" onclick="teacherEditForm('namet',<?php echo $id; ?>, 'name')">Edit</span><span class="del">Delete</span>
    <div id="namet"></div>

    <h6>Gender: </h6><br>
    <h6><?php echo $sex ?></h6><span class="ed" onclick="teacherEditForm('sext',<?php echo $id; ?>, 'sex')">Edit</span><span class="del">Delete</span>
    <div id="sext"></div>

    <h6>Division: </h6><br>
    <h6><?php echo $division; ?></h6><span class="ed" onclick="teacherEditForm('divisiont',<?php echo $id; ?>, 'division')">Edit</span><span class="del">Delete</span>
    <div id="divisiont"></div>

    <h6>Department: </h6><br>
    <h6><?php echo $department; ?></h6><span class="ed" onclick="teacherEditForm('departmentt',<?php echo $id; ?>, 'department')">Edit</span><span class="del">Delete</span>
    <div id="departmentt"></div>

    <h6>Teaching Class: </h6><br>
    <?php
    foreach($assClass as $val ){
    ?>
        <h6 style="float:left;" ><?php echo $val ?></h6><span class="ed" onclick="teacherEditForm('classt',<?php echo $id; ?>, 'assignClass')">Edit</span><span class="del">Delete</span>
        <div id="classt"></div>
    <?php
    }
    ?>
    <h6>Profession: </h6><br>
    <h6><?php echo $pro; ?></h6><span class="ed" onclick="teacherEditForm('prot',<?php echo $id; ?>, 'profession')">Edit</span><span class="del">Delete</span>
    <div id="prot"></div>
    
    <h6>Phone Number: </h6><br>
    <h6><?php echo $phone; ?></h6><span class="ed" onclick="teacherEditForm('phonet',<?php echo $id; ?>, 'phone')">Edit</span><span class="del">Delete</span>
    <div id="phonet"></div>

    <div id='back2'>GO BACK</div>
</div>