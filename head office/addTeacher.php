<?php 
require('../dbSetup/mannage student.php');

if(isset($_POST['firstName'], $_POST['middleName'], $_POST['lastName'],
$_POST['sex2'], $_POST['division'], $_POST['department'], $_POST['profession'],
 $_POST['phone'], $_POST['username'], $_POST['password'], $_POST['autherization'])){

    $insert = $manageStudent->teacherAdder($_POST['firstName'], $_POST['middleName'], $_POST['lastName'],
    $_POST['sex2'], $_POST['department'], $_POST['profession'], $_POST['username'],
     $_POST['password'], $_POST['phone'], $_POST['division'], $_POST['autherization']);

    echo $insert;
 }


?>
<head>
    <script src="../modules/jquery.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('#show').hide()
            $('#lost').hide()
            document.getElementById('division').addEventListener('change', function() {
            if(this.value == 'MD'){
                $('.primery').hide()
            }
            if(this.value == 'PM'){
                $('.mddleS').hide()
            }
        });
        $('form').on('submit', function(){
            $.ajax({
                url: 'addTeacher.php',
                type: 'post',
                data: $('form').serialize(),
                success: function(res, text){
                    if(text != 'success'){
                        $('#lost').show()
                        setTimeout(function() {
                        $('#lost').hide();
                        }, 3000);
                    }else{
                        $('#show').show()
                        setTimeout(function() {
                        $('#show').hide();
                        }, 3000);
                    }
                }
                
            })
 
            return false;
        })   


        


        })




    </script>
</head>
<form  action="addTeacher.php" method="POST" enctype="multipart/form-data">
        <label for="inputPassword5" class="form-label">First Name</label>
        <input type="text" id="inputPassword5" name="firstName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Middle Name</label>
        <input type="text" id="inputPassword5" name="middleName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Last Name</label>
        <input type="text" id="inputPassword5" name="lastName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        
        <label>Gender:</label><br>
        <select class="form-select" style="float:left;" name="sex2" aria-label="Default select example">
        <option selected>Section :</option>
        <option value="M">M</option>
        <option value="F">F</option>
        </select>


        <input type="file" name="photo"> <br>
        
        <label>Division:</label><br>
        <select class="form-select" style="float:left;" id="division"  name="division" aria-label="Default select example">
        <option selected>NONE</option>
        <option value="kg">KG</option>
        <option value="PM">PRIMERY SCHOOL</option>
        <option value="MD" >MIDDLE SCHOOL</option>
        </select>

        <label>Department:</label><br>
        <select class="form-select" style="float:left;" name="department" aria-label="Default select example">
            <option selected>NONE </option>
            <option class="mddleS" value="maths">BIOLOGY</option>
            <option class="mddleS" value="chemistriy">CHEMISTRY</option>
            <option class="mddleS" value="physics">PHYSICS</option>
            <option class="primery" value="scinceInEnglish">SCINCE IN ENGLISH</option>
            <option class="primery" value="scinceInAmharic">SCINCE IN AMHARIC</option>
            <option value="maths">MATHS</option>
            <option value="english">ENGLISH</option>
            <option value="amharic">AMHARIC</option>
            <option value="civics">CIVICS</option>
            <option value="socialStudies">SOCIAL STUDIES</option>
        </select>
        <label for="inputPassword5" class="form-label">Profession</label>
        <textarea class="form-text" id="address" name="profession"></textarea> 
        <div id="passwordHelpBlock" class="form-text">
        </div>

        <label for="inputPassword5" class="form-label">Phone Number: </label>
        <input type="number" id="inputPassword5" name="phone" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>

        <label for="inputPassword5" class="form-label">Username: </label>
        <input type="text" id="inputPassword5" name="username" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" id="inputPassword5" name="password" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label>Autheriztion :</label><br>
        <select class="form-select" style="float:left;" id="division"  name="autherization" aria-label="Default select example">
        <option value="TEACHER">TEACHER</option>
        <option value="ADMIN" >ADMIN</option>
        </select>
        <!-- <label for="inputPassword5" class="form-label">Status</label>
        <input type="text" id="inputPassword5" name="status" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div> -->
 
        <input type="submit" value="Add Teacher"> 
        <div id="show">Teacher Added</div>
        <div id="lost">DATABASE ERROR</div>
</form>