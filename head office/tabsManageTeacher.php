<?php

//for filtering autherization
if(isset($_POST['auth'])){
    $authT = $_POST['auth'];
}



?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $('#addTeacher').click(function(){
            $('#tabContent2').load('addTeacher.php')
            $('.nav-link').not(this).removeClass('active')
        })
        $('#viewTeacher').click(function(){
            $('#tabContent2').load('viewTeacher.php')
            $('.nav-link').not(this).removeClass('active')
        })
    </script>
</head>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Home</button>
    <button class="nav-link" id="addTeacher" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Add Teacher</button>
    <button class="nav-link" id="viewTeacher" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">View Teacher</button>
  </div>
</nav>
<div class="tab-content" id="tabContent2">
Home
</div>