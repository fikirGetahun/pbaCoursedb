<?php 
require('../dbSetup/mannage teacher.php');

global $cidr;
if(isset($_POST['cid'])){
    $cidr = $_POST['cid'];
}

if(isset($_POST['class5r'], $_POST['cid'])){
    $asks = $teacher->classEditor($_POST['class5r'], $_POST['section5r'], $_POST['cid']);
}


?>
<head>
<script src="../modules/jquery.js"></script>
<script>
        $(document).ready(function(){
            $('form').on('submit', function(){
                
                $.ajax({
                    url:'editAssignClassForm.php',
                    type:'post',
                    data: $('form').serialize(),
                    success: function(x, y){
                        $('#br').load('editAssignClass.php', {id: id})
                    }
                    
                })
                return false;
            })
        })

    </script>

</head>


<div id="br">
<form action='editAssignClassForm.php' method="POST">
    <h5>Select Class & Section:</h5>
    <label>Class: </label><br>
    <select  class="form-select" style="float:left;" name="class5r" aria-label="Default select example">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <label>Section:</label><br>
    <select class="form-select" style="float:left;" name="section5r" aria-label="Default select example">
    <option value="a">A</option>
    <option value="b">B</option>
    </select>
    <input hidden name="cid" value="<?php echo $cidr; ?>">
    <input type="submit" value="Edit">

</form>
</div>
