<?php

//for filtering autherization
if(isset($_POST['auth'])){
    $authT = $_POST['auth'];
}



?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>


    </script>
</head>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Home</button>
    <?php
    if($auth2 == 'ADMIN'){
      ?>
      <button class="nav-link" id="add-student" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Add Student</button>
      <?php
    }
    ?>
    <button class="nav-link" id="view" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">View Student</button>

  </div>
</nav>
<div class="tab-content" id="tabContent">
Home
</div>