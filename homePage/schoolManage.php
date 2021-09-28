<?php
require('../dbSetup/mannage teacher.php');

global $uidd;
if(isset($_POST['tidf'])){
    $uidd = $_POST['tidf'];
}

$outr = $teacher->teacherInfo($uidd);
$row = $outr->fetch_assoc();

?>
<head>
    <link rel="../css/schoolManage.php" type="stylesheet" >
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#startYear').click(function(){
                $('#showw').load('../homePage/startYear.php')
            })
        })
    </script>
    <style>
        .panal {
            border: 1px black solid;
            float: left;
            width: 10%;
            margin: 6px;
            padding: 10px;
        }
        p {
            font-size:12px;
        }
    </style>

</head>
<div>


    <div class='panal'>
        <h5>Command Teachers</h5>
        <p>
            here you command teachers to submit the current quarters assisments.
            <button>Command</button>
        </p>
    </div>
    
    <div class='panal'>
        <h5>End Quarter</h5>
        <p>
            Here, the button below will end the current quarter by checking if all the teachers has submited <br>
            all the quarters assisments. and it will start the next quarter
            <button>End Q1 and Start Q2</button>
        </p>
    </div>
    
    <div class='panal'>
        <h5>Change Year</h5>
        <p>
            here you can change year to see archived data of previous years.
            <select class="form-select" style="float:left;" id="division"  name="autherization" aria-label="Default select example">
            <option value="2013">2013</option>
            <option value="2014" >2014</option>    
            </select>       
        </p>
    </div>
    <!-- // end year or this block will only show if current year and chosen year is true else its on previous year that already endded-->
    <?php
        if()
    
    ?>
    <div class='panal'>
        <h5>End Year</h5>
        <p>
            here, the button below will end the current year. after checking that all quarters are ended and<br>
            every mark assisment has been submited         
        </p>
    </div>

    <div class='panal'>
        <h5>Start Year</h5>
        <p>
            here you start the next year of the academy
            <button id="startYear" >Start Year</button>

        </p>
    </div>

    
</div>
<div style="clear: both;"></div>
<div id="showw">
<p>
        <?php
        if($row['sex'] == 'M'){
            $label = "MR";
        }else{
            $label = "Ms";
        }
        ?>
        <?php echo $label.' '.$row['firstName'].' '.$row['middleName']; ?> 
        There will be note here explaining the system and lists all the admins.

    </p><br>
</div>