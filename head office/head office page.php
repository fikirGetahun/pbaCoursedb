<?php 
require('../dbSetup/connect.php');
global $class;
$class1 = array(); //according to normalization, a single cell must have a single data so we insert assignd class per row
// to filter out the admin and teacher as thery are to show what is autherized for both
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $query="SELECT * FROM `teacherslist` WHERE `id` LIKE '$id'";
    $ask = $mysql->query($query);
    if($ask){
        while($row = $ask->fetch_assoc()){
            array_push($class1, $row['assignedClass'].''.$row['section']);
            $auth = $row['auth'];
            $name= $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];
            $dep = $row['department'];
        }

    
    }


}



?>

<html>
    <head>
        <title>Head Office Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="../modules/jquery.js"  ></script>
        <script>
            $(document).ready(function(){
                $('#home').click(function(event){
                    $('#v-pills-tabContent').show().load('tabsManageStudents.php')
                    $('#home').addClass('active')
                    $('.nav-link').not('#home').removeClass('active')
                })
                $('#headOffice').click(function(event){
                    $('#headOffice').addClass('active')
                    $('.nav-link').not('#headOffice').removeClass('active')
                })
                $('#student').click(function(event){
                    $auth = $('#auth').val()
                    $('#v-pills-tabContent').show().load('tabsManageStudents.php', {auth: $auth })
                    $('#student').addClass('active')
                    $('.nav-link').not('#student').removeClass('active')
                })
                $('#teacher').click(function(){
                    $auth = $('#auth').val()
                    $('#teacher').addClass('active')
                    $('.nav-link').not('#teacher').removeClass('active')
                    $('##v-pills-tabContent').load('tabsManageTeacher.php', {auth: $auth } )
                })
                $('#class').click(function(){
                    $('#class').show().addClass('active')
                    $('.nav-link').not('#class').removeClass('active')
                })
                $('#report').click(function(){
                    $('#report').addClass('active')
                    $('.nav-link').not('#report').removeClass('active')
                })
            });

        </script>
    </head>
    
    

    <body>
    <div><h1>Wellcome! MR. <?php echo $name; ?></h1></div>

    <!-- vertical tabs to go to manage students, manage teachers.. -->
    <div id="vertical" style="float: left;">
            
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="home" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                    <button class="nav-link" id="student" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Manage Student</button>
                    <?php 
                    if($auth == 'ADMIN'){
                    ?>
                    <button class="nav-link" id="teacher" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Manage Teacher</button>
                    <?php
                    }
                    ?>            
                    <button class="nav-link" id="class" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Manage Class</button>
                    <button class="nav-link" id="headOffice" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Manage Course Material</button>
                    <?php
                        if($auth == 'ADMIN'){
                    ?>
                    <button class="nav-link" id="report" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Report Card</button>
                    <?php
                        }
                    ?>

                </div>

                <!-- a div tag to display the tabs of manage student, manage teachers... -->
                <!-- also here there will be a tabs only php file.. inside the tabs only file will be the main topics showed -->
                <div class="tab-content" id="v-pills-tabContent">

                </div>
                <input id="auth" hidden value="<?php echo $auth;?>"
        </div>
    </div>




    </div>

    <a href="../dbSetup/logout.php"> logout</a>
    </body>
</html>




