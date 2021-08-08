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
        })


    </script>
</head>

<?php

// for name edit form api
if(isset($_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['id'])){
    $first = $_POST['firstName'];
    $id3= $_POST['id'];
    $ask = $manageStudent->studentEdit($first, 'firstName', $id3 );
}

// for gender edit form api
if(isset($_POST['sex'], $_POST['id'])){
    echo 'in';
    $ask = $manageStudent->studentEdit($_POST['sex'], 'sex', $_POST['id']);
}
?>
  <!-- this will load back to editpage.php -->
    <div id="load">
<?php
if(isset($_POST['type'])){
    if($_POST['type'] == 'name' ){
        ?>
        <div id="name">
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
        </div>
        
        <?php
    }
}

if(isset($_POST['type'])){
    if($_POST['type'] == 'sex'){
        ?>
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
        
        <?php
    }
}
?>

</div>
<?php




?>