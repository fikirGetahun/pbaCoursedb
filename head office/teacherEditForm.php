<?php
require('../dbSetup/mannage student.php');

if(isset($_POST['id'])){
    $idd = $_POST['id'];
}


/////////  api for updating edited files /////////
if(isset($_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['id'])){
    $id = $_POST['id'];
    $ask = $manageStudent->teacherEdit($id, 'firstName', $_POST['firstName']);
    $ask = $manageStudent->teacherEdit($id, 'middleName', $_POST['middleName']);
    $ask = $manageStudent->teacherEdit($id, 'lastName', $_POST['lastName']);
}

?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
          $(document).ready(function(){
            $('#done').hide()
            $('form').on('submit', function(){
            $.ajax({
                url: 'teacherEditForm.php',
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
                $('#loadt').empty()
            })
            $('#n').click(function(){
                $('#nameT').empty()
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

<div id="loadt">

<?php
if(isset($_POST['type'])){
    $type = $_POST['type'];
    if($type == 'name'){
        ?>
        <div id="nameT">
            <form action="teacherEdit.php" method="POST">
            <label>First Name:</label>
                <input type="text" id="inputPassword5" name="firstName" class="form-control" aria-describedby="passwordHelpBlock"> 
                <label>Middle Name:</label>
                <input type="text" id="inputPassword5" name="middleName" class="form-control" aria-describedby="passwordHelpBlock"> 
                <label>Last Name:</label>
                <input type="text" id="inputPassword5" name="lastName" class="form-control" aria-describedby="passwordHelpBlock">  
                <input hidden name="id" value="<?php echo $idd; ?>">
                <input type="submit" value="Edit">
            </form>
            <div id="done" >Done</div>
            <div id='n'>Exit</div>
            </form>
        </div>
        
        
        <?php
    }
}

?>
</div>
<?php
?>