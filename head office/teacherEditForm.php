<?php
require('../dbSetup/mannage student.php');

if(isset($_POST['id'])){
    $idd = $_POST['id'];
}


/////////  api for updating edited files /////////

if(isset($_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['id'])){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'firstName', $_POST['firstName']);
}

if(isset($_POST['middleName'], $_POST['id'])){
    $id= $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'middleName', $_POST['middleName']);
}

if(isset($_POST['lastName'], $_POST['id'])){
    $id= $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'lastName', $_POST['lastName']);

}

////// api for gender edite file///
if(isset($_POST['sex'],$_POST['id']) ){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'sex', $_POST['sex']);   
}

/////api for division
if(isset($_POST['division'],$_POST['id']) ){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'division', $_POST['division']);   
}

//// api for department
if(isset($_POST['department'],$_POST['id']) ){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'department', $_POST['department']);   
}

//// api for profession
if(isset($_POST['profession'],$_POST['id']) ){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'profession', $_POST['profession']);   
}

///// api for phone number
if(isset($_POST['phone'],$_POST['id']) ){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'phone', $_POST['phone']);   
}

//// api admin change
if(isset($_POST['auth'],$_POST['id']) ){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'auth', $_POST['auth']);   
}
?>
<head>
    <script src="../modules/jquery.js"  type="text/javascript" ></script>
    <script>
          $(document).ready(function(){
            $('#editedName').hide()

            $('#done').click(function(){
                $('#loadt').empty()
            })
            $('#n').click(function(){
                $('#nameT').empty()
            })
            $('#gg').click(function(){
                $('#sexx').empty()
            })
            $('#divg').click(function(){
                $('#divisiontt').empty()
            })
            $('#depg').click(function(){
                $('#deppar').empty()
            })
            $('#proffg').click(function(){
                $('#proff').empty()
            })
            $('#phoneEE').click(function(){
                $('#phoneTT').empty()
            })
            $('#authEE').click(function(){
                $('#authv').empty()
            })
            $('#motherP').click(function(){
                $('#motherPhoneE').empty()
            })
            $('#addressE').click(function(){
                $('#addressEX').empty()
            })
            $('#noteE').click(function(){
                $('#noteEX').empty()
            })
        })
     function onup(formId, valueId ){
        $('#'+ formId).on('submit', function(){

            $.ajax({
                url: 'teacherEditForm.php',
                type: 'post',
                data: $('form').serialize(),
                success: function(res, text){
                    if(text == 'success'){
                        // alert(text)
            
                    // document.getElementById("editedName").innerHTML = $form[2];
                }else{
                        alert('DATA BASE ERROR')
                    }
                }
                
            })

            document.getElementById('done').innerHTML = "Edited To: " + $('#'+ valueId).val()

            return false


            })
     }

    </script>
</head>

<div id="loadt">

<?php
// name edit
if(isset($_POST['type'])){
    if($_POST['type'] == 'name' ){
        ?>
        <div id="name1">
            <form id="s1" action="editForm.php"    method="POST">
            <label>First Name:</label>
                <input type="text" id="firstname" name="firstName" class="form-control" aria-describedby="passwordHelpBlock"> 
                <input hidden name="id" value="<?php echo $idd; ?>">
                <input type="submit" onclick="onup('s1', 'firstname')"   value="Edit">
            </form>
        </div>
        <div id="editedName">Edited. </div>
        <!-- middle name  -->
        <div id="namem">
            <form id="mname" action="editForm.php" method="post">
            <label>Middle Name:</label>
            <input type="text" id="middlename" name="middleName" class="form-control" aria-describedby="passwordHelpBlock"> 
            <input hidden name="id" value="<?php echo $idd; ?>">
            <input type="submit" onclick="onup('mname', 'middlename')"   value="Edit">
            </form>
        </div>

        <!-- last name -->
        <div id="nameml">
            <form id="lname" action="editForm.php" method="post">
            <label>Last Name:</label>
            <input type="text" id="lastname" name="lastName" class="form-control" aria-describedby="passwordHelpBlock">  
            <input hidden name="id" value="<?php echo $idd ?>">
            <input type="submit" onclick="onup('lname', 'lastname')"   value="Edit">
            </form>
            <div id="done" ></div>
            <div id='n'>Exit</div>
        </div>
        <?php
    }
}

// gender edit
if(isset($_POST['type'])){
    $type = $_POST['type'];
    if($type == 'sex'){
?>
    <div id="sexx">
    <form id="th1" action="teacherEditForm.php" method="POST">
        <label>Gender:</label><br>
        <select id="tsex" class="form-select" style="float:left;" name="sex" aria-label="Default select example">
        <option selected>Section :</option>
        <option value="M">M</option>
        <option value="F">F</option>
        </select>
        <input hidden name="id" value="<?php echo $idd; ?>">
        <input type="submit" onclick="onup('th1', 'tsex')" value="Edit">
</form>
        <div id="done" ></div>
        <div id='gg'>Exit</div>
    </div>
    <div id="editedName">Edited. </div>
<?php       
    }
}

//division edit
if(isset($_POST['type'])){
    if($_POST['type'] == "division"){
?>
    <div id="divisiontt">
        <form id="th2" action="teacherEditForm.php" method="POST">
        <label>Division:</label><br>
        <select id="tdiv" class="form-select" style="float:left;" id="division"  name="division" aria-label="Default select example">
        <option selected>NONE</option>
        <option value="kg">KG</option>
        <option value="PM">PRIMERY SCHOOL</option>
        <option value="MD" >MIDDLE SCHOOL</option>
        </select>     
        <input hidden name="id" value="<?php echo $idd; ?>">
        <input type="submit" onclick="onup('th2', 'tdiv')" value="Edit">  
        </form>
        <div id="done" ></div>
        <div id='divg'>Exit</div>
    </div>
    <div id="editedName">Edited. </div>
<?php
    }
}

//department edit
if(isset($_POST['type'])){
    if($_POST['type'] == "department"){
        ?>
        <div id="deppar">
            <form id="th3" action="teacherEditForm.php" method="POST">
            <label>Department:</label><br>
        <select id="tdepp" class="form-select" style="float:left;" name="department" aria-label="Default select example">
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
            <input hidden name="id" value="<?php echo $idd; ?>">
            <input type="submit" onclick="onup('th3', 'tdepp')" value="Edit">  
            </form>
            <div id="done" ></div>
            <div id='depg'>Exit</div>
        </div>
        <div id="editedName">Edited. </div>
    <?php
        }
}

//profession edit
if(isset($_POST['type'])){
    if($_POST['type'] == "profession"){
        ?>
        <div id="proff">
            <form id="th4" action="teacherEditForm.php" method="POST">
            <label for="inputPassword5" class="form-label">Profession</label>
        <textarea class="form-text" id="addressxs" name="profession"></textarea> 
        <div id="passwordHelpBlock" class="form-text">
        </div>
            <input hidden name="id" value="<?php echo $idd; ?>">
            <input type="submit" onclick="onup('th4', 'addressxs')" value="Edit">  
            </form>
            <div id="done" ></div>
            <div id='proffg'>Exit</div>
            
        </div>
        <div id="editedName">Edited. </div>
    <?php
    }
}

//edit phone number
if(isset($_POST['type'])){
    if($_POST['type'] == "phone"){
        ?>
        <div id="phoneTT">
            <form id="th5" action="teacherEditForm.php" method="POST">
            <label for="inputPassword5" class="form-label">Phone Number: </label>
        <input type="number" id="tphone" name="phone" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
            <input hidden name="id" value="<?php echo $idd; ?>">
            <input type="submit" onclick="onup('th5', 'tphone')" value="Edit">  
            </form>
            <div id="done" ></div>
            <div id='phoneEE'>Exit</div>
        </div>
        <div id="editedName">Edited. </div>
    <?php        
    }
}

// edit admin or teacher
if(isset($_POST['type'])){
    if($_POST['type'] == "auth"){
        ?>
        <div id="authv">
            <form id="th6" action="teacherEditForm.php" method="POST">
            <label for="inputPassword5" class="form-label">Phone Number: </label>
        <input type="number" id="tadmin" name="admin" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
            <input hidden name="id" value="<?php echo $idd; ?>">
            <input type="submit" onclick="onup('th6', 'tadmin')" value="Edit">  
            </form>
            <div id="done" ></div>
            <div id='authEE'>Exit</div>
        </div>
        <div id="editedName">Edited. </div>
    <?php            
    }
}

    
    

?>

</div>
 
<?php
?>