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
                $('#tabContent').load('viewStudent.php')
                $(this).addClass('active')
                $('.nav-link').not(this).removeClass('active')
              })
          })
        </script>
      </head>
    <body>
    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Home</button>
    <button class="nav-link" id="add-student" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Add Student</button>
    <button class="nav-link" id="view" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">View Student</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Delete Student</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Edit Students Info</button>

  </div>
</nav>
<div class="tab-content" id="tabContent">

</div>
    </body>
</html>