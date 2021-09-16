<?php
global $auth2; 
if(isset($_POST['auth'])){
  $auth2 = $_POST['auth'];
}

?>


<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="../modules/jquery.js"  ></script>
        <script>
          $(document).ready(function(){
              $('#add-student').click(function(){
                $('#add-student').addClass('active')
                $('.nav-link').not('#add-student').removeClass('active')
                $('#tabContent').load('addStudent.php', {addStudent: 'true'})
              })
              $('#view').click(function(){
                $auth2 = $('#auth2').val()
                $('#tabContent').load('viewStudent.php', {auth: $auth2})
                $(this).addClass('active')
                $('.nav-link').not(this).removeClass('active')
              })
          })
        </script>
      </head>
    <body>
    <nav>
      <div style="clear:both;"></div>
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
</div>
<input id="auth2" hidden value="<?php echo $auth2; ?>">

    </body>
</html>