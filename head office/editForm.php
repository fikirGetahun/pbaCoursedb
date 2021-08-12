<?php
require('../dbSetup/mannage student.php');
global $id;
if(isset( $_POST['id'])){
    $id = $_POST['id'];
    
}
?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>

        $(document).ready(function(){
            $('#done').hide()
            $('form').on('submit', function(){
            $.ajax({
                url: 'editForm.php',
                type: 'post',
                data: $('form').serialize(),
                success: function(res, text){
                    if(text == 'success'){
                        // alert(text)
                        $('#editedName').show()
                    }else{
                        alert('DATA BASE ERROR')
                    }
                }
                
            })
            $('#done').show()
            return false
        })
            $('#done').click(function(){
                $('#load').empty()
            })
            $('#n').click(function(){
                $('#name1').empty()
            })
            $('#s').click(function(){
                $('#sex').empty()
            })
            $('#c').click(function(){
                $('#class1').empty()
            })
            $('#sc').click(function(){
                $('#section').empty()
            })
            $('#fatherN').click(function(){
                $('#fatherNameE').empty()
            })
            $('#motherN').click(function(){
                $('#motherNameE').empty()
            })
            $('#fatherP').click(function(){
                $('#fatherPhoneE').empty()
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


    </script>
</head>

<?php

// for name edit form api
if(isset($_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['id'])){
    $first = $_POST['firstName'];
    $id3= $_POST['id'];
    $ask = $manageStudent->studentEdit($first, 'firstName', $id3 );
    $ask = $manageStudent->studentEdit($first, 'middleName', $id3 );
    $ask = $manageStudent->studentEdit($first, 'lastName', $id3 );
}

// for gender edit form api
if(isset($_POST['sex'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['sex'], 'sex', $_POST['id']);
}

// for class edit form api
if(isset($_POST['class'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['class'], 'class', $_POST['id']);
}

// for section edit form api
if(isset($_POST['section'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['section'], 'section', $_POST['id']);
}

// for father name edit form api
if(isset($_POST['fatherName'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['fatherName'], 'fatherName', $_POST['id']);
}

// for mothers name edit form api
if(isset($_POST['motherName'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['motherName'], 'motherName', $_POST['id']);
}

// for fathers phone edit form api
if(isset($_POST['fatherPhone'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['fatherPhone'], 'fatherPhone', $_POST['id']);
}

// for mothers phone edit form api
if(isset($_POST['motherPhone'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['motherPhone'], 'motherPhone', $_POST['id']);
}

// for address edit form api
if(isset($_POST['address'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['address'], 'address', $_POST['id']);
}

// for note edit form api
if(isset($_POST['note'], $_POST['id'])){
    $ask = $manageStudent->studentEdit($_POST['note'], 'note', $_POST['id']);
}
?>

  <!-- this will load back to editpage.php -->
    <div id="load">
<?php
// form to edit the name 
if(isset($_POST['type'])){
    if($_POST['type'] == 'name' ){
        ?>
        <div id="name1">
            <form action="editForm.php" method="POST">
            <label>First Name:</label>
                <input type="text" id="inputPassword5" name="firstName" class="form-control" aria-describedby="passwordHelpBlock"> 
                <label>Middle Name:</label>
                <input type="text" id="inputPassword5" name="middleName" class="form-control" aria-describedby="passwordHelpBlock"> 
                <label>Last Name:</label>
                <input type="text" id="inputPassword5" name="lastName" class="form-control" aria-describedby="passwordHelpBlock">  
                <input hidden name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Edit">
            </form>
            <div id="done" >Done</div>
            <div id='n'>Exit</div>
        </div>
        <div id="editedName">Edited. </div>
        
        <?php
    }
}

// form to edit sex
if(isset($_POST['type'])){
    if($_POST['type'] == 'sex'){
        ?>
        <div id="sex"> 
            <form action="editForm.php" method="POST">
            <label>Gender:</label><br>
            <select class="form-select" style="float:left;" name="sex" aria-label="Default select example">
                <option value="m">M</option>
                <option value="f">F</option>
            </select> 
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
            </form>
            <div id="done" >Done</div>
            <div id='s'>Exit</div>
            </div>
            <div id="editedName">Edited. </div>
        <?php
    }
}

//form to edit class
if(isset($_POST['type'])){
    if($_POST['type'] == 'class'){
        ?>
        <div id="class1">
        <form action="editForm.php" method="POST">

        <label>Class:</label><br>
        <select class="form-select" style="float:left;" name="class" aria-label="Default select example">
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
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='c'>Exit</div>
        </div>
        <div id="editedName">Edited. </div>
        <?php
    }
}

//form to edit section
if(isset($_POST['type'])){
    if($_POST['type'] == 'section'){
        ?>
        <div id="section">
        <form action="editForm.php" method="POST">
            <label>Section:</label><br>
            <select class="form-select" style="float:left;" name="sex" aria-label="Default select example">
                <option value="a">A</option>
                <option value="b">B</option>
            </select> 
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='sc'>Exit</div>
        </div>
        <div id="editedName">Edited. </div>
        <?php
    }
}

// form to edit fathers name
if(isset($_POST['type'])){
    if($_POST['type'] == 'fatherName' ){
        ?>
        <div id="fatherNameE">
        <form action="editForm.php" method="POST">
            <label>Father's Name: </label>
            <input type="text" id="inputPassword5" name="fatherName" class="form-control" aria-describedby="passwordHelpBlock">  
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='fatherN'>Exit</div>        
        </div>
        <div id="editedName">Edited. </div>
        
        
        <?php
    }
}
// form to edit mothers name
if(isset($_POST['type'])){
    if($_POST['type'] == 'motherName'){
        ?>
      <div id="motherNameE">
        <form action="editForm.php" method="POST">
            <label>Mother's Name: </label>
            <input type="text" id="inputPassword5" name="motherName" class="form-control" aria-describedby="passwordHelpBlock">  
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='motherN'>Exit</div>        
        </div>        
        <div id="editedName">Edited. </div>
        <?php
    }
}

// form to edit father phone no
if(isset($_POST['type'])){
    if($_POST['type'] == 'fatherPhone'){
        ?>
      <div id="fatherPhoneE">
        <form action="editForm.php" method="POST">
            <label>Father's Phone: </label>
            <input type="text" id="inputPassword5" name="fatherPhone" class="form-control" aria-describedby="passwordHelpBlock">  
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='fatherP'>Exit</div>        
        </div>         
        <div id="editedName">Edited. </div>
        
        <?php
    }
}

// form to edit mothers phone no
if(isset($_POST['type'])){
    if($_POST['type'] == 'motherPhone'){
?>
      <div id="motherPhoneE">
        <form action="editForm.php" method="POST">
            <label>Mother's Phone: </label>
            <input type="text" id="inputPassword5" name="motherPhone" class="form-control" aria-describedby="passwordHelpBlock">  
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='motherP'>Exit</div>        
        </div>         
        <div id="editedName">Edited. </div>
        
<?php        
    }
}

// form to edit address 
if(isset($_POST['type'])){
    if($_POST['type'] == 'address'){
        ?>
      <div id="addressE">
        <form action="editForm.php" method="POST">
            <label>Address: </label>
            <textarea class="form-text" id="address" name="address"></textarea> 
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='addressEX'>Exit</div>        
        </div>         
        <div id="editedName">Edited. </div>      
        
        <?php
    }
}

// form to edit note
if(isset($_POST['type'])){
    if($_POST['type'] == 'note'){
        ?>
      <div id="noteE">
        <form action="editForm.php" method="POST">
            <label>Address: </label>
            <textarea class="form-text" id="address" name="note"></textarea> 
            <input hidden name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit">
        </form>
        <div id="done" >Done</div>
        <div id='noteEX'>Exit</div>        
        </div>         
                 
        <div id="editedName">Edited. </div>
        <?php
    }
}
?>


</div>
<?php




?>