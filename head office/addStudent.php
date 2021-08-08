
<?php
require '../dbSetup/mannage student.php';
global $state;

if(isset($_POST['firstName']) || isset($_POST['middleName']) || 
    isset($_POST['lastName']) || isset($_POST['fathersName']) ||
    isset($_POST['mothersName']) || isset($_POST['fathersPhone']) ||
    isset($_POST['mothersPhone']) || isset($_POST['address']) ||
    isset($_POST['class']) || isset($_POST['section']) ||
    isset($_POST['status']) || isset($_POST['note']) || isset($_POST['sex'])){
        
        $firstName = $_POST['firstName']; $middleName = $_POST['middleName']; $lastName = $_POST['lastName'];
        $class = $_POST['class'];  $section = $_POST['section']; $fatherName = $_POST['fathersName'];
        $motherName = $_POST['mothersName']; $fatherPhone = $_POST['fathersPhone'];  $motherPhone = $_POST['mothersPhone'];
        $address = $_POST['address']; $status = $_POST['status']; $note = $_POST['note']; $sex = $_POST['sex'];

        $x = "tebed";

        $insert = $manageStudent->studentAdder($firstName,$middleName
        ,$lastName, $sex, $class, $section, $fatherName, $motherName,
        $fatherPhone, $motherPhone, $address, $status, $x, $note );
        
        
        // if($insert){
        //     echo 'succc';
        // }else{
        //     echo 'no';
        // }
        
}


?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="../modules/jquery.js"></script>
<script >
$(document).ready(function(){
    $('#win').hide()
    $('#loss').hide()
    $('form').on('submit', function(){
        
        $.ajax({
            url: 'addStudent.php',
            type: 'post',
            data: $('form').serialize(),
            success: function(res, mo, re){
                alert(mo)

        if(mo == 'success'){
            $('#win').show('slow').delay('10000')
            $('form').find('input:text').val('');     
            $('form').find('input:number').val('');   
            $('textarea').find('input:text').val(''); 
        }else{
            $('#loss').show('slow')
        }
        
            }
            
        })

        return false;
    }) 
})
  
</script>

</head>
<div>
<!-- "succses.php?type=addStudnet" -->
    <form  action="addStudent.php" method="POST" enctype="multipart/form-data">
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
        <select class="form-select" style="float:left;" name="sex" aria-label="Default select example">
        <option selected>Section :</option>
        <option value="m">M</option>
        <option value="f">F</option>
        </select>

        <label>Class:</label><br>
        <select class="form-select" style="float:left;" name="class" aria-label="Default select example">
            <option selected>Class: </option>
            <option value="-1">Kg-1</option>
            <option value="-2">Kg-2</option>
            <option value="-3">Kg-3</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        
        <label>Section:</label><br>
        <select class="form-select" style="float:left;" name="section" aria-label="Default select example">
        <option selected>Section :</option>
        <option value="a">A</option>
        <option value="b">B</option>
        </select>

        <input type="file" name="photo"> <br>
        

        <label for="inputPassword5" class="form-label">Father's Name</label>
        <input type="text" id="inputPassword5" name="fathersName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Mother's Name</label>
        <input type="text" id="inputPassword5" name="mothersName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Father's Phone</label>
        <input type="number" id="inputPassword5" name="fathersPhone" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Mother's Phone</label>
        <input type="number" id="inputPassword5" name="mothersPhone" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Address</label><br>
        <textarea class="form-text" id="address" name="address"></textarea> 
        <div id="passwordHelpBlock" class="form-text"> 
        </div>
        <!-- <label for="inputPassword5" class="form-label">Status</label>
        <input type="text" id="inputPassword5" name="status" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div> -->
        <label for="inputPassword5" class="form-label">Note about student</label><br>
        <textarea class="form-text" id="address" name="note"></textarea> 
        <div id="passwordHelpBlock" class="form-text"> 
        </div>       
        <input type="submit" value="Add Student"> 
        
               
                <div id="win"  style="border: 1px solid black; color: green;">
                    <h4>Student Added Succussfully!</h4>
                </div>
                

                
                <div id="loss"  style="border: 1px solid black; color: read;">
                    <h4>not succusfull! db ERROR</h4>
                </div>
               
            
      


    </form>
</div>