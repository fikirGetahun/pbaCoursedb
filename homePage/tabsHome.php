<?php

//to identify the autherization of the user
if(isset($_POST['auth'])){
  $authu = $_POST['auth'];
}
if(isset($_POST['tid'])){
  $uid = $_POST['tid'];
}

?>


<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
          $('#schoolManage').click(function(){
            $tid = $('#outid').val()
            $('#tabContent3').load('../homePage/schoolManage.php', {tidf: $tid })
          })
        })

    </script>
</head>
<nav>
  <input id="outid" hidden value="<?php echo $uid; ?>">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="homeA" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Home</button>
    <?php
      if($authu == 'ADMIN'){
        ?>
    <button class="nav-link" id="schoolManage" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Manage School</button>
    <button class="nav-link" id="viewAssisment" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">View All Assisments</button>
    <button class="nav-link" id="reportCard" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Report Card</button>        
        <?php
      }
    ?>

  </div>
</nav>
<div class="tab-content" id="tabContent3">
Home
</div>