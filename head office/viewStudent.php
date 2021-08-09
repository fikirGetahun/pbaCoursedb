<?php
global $auth2;
if(isset($_POST['auth'])){
    $auth2 = $_POST['auth'];
  }
  


 ?>

    <head>
        <script src="../modules/jquery.js" ></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="../modules/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $('#error').hide()
                $('form').on('submit', function(){

                    $.ajax({
                        url: 'viewStudent.php',
                        method: 'post',
                        data: $('form').serialize(),
                        success: function(res, mo){
                            $req = []
                            $('form').find('[name]').each(function(){
                                $req.push($(this).val())
                             })
                             $auth2 = $('#auth2').val()
                             $('#content').load('viewPage.php', {searchData : $req[0], class: $req[1], section: $req[2], auth2: $auth2, student: true })
                   
                        }
                    })

                
                    return false
                })

                
            })

        </script>
    </head>
    <div>
        <form action="viewStudent.php" enctype="multipart/form-data">
        <label>Search</label>
        <input type="text" id="inputPassword5" name="searchData" class="form-control" aria-describedby="passwordHelpBlock">
        <label>Class:</label>
        <select class="form-select" style="float:left;" name="class" aria-label="Default select example">
            <option value="All" selected>All </option>
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
        <label>Section:</label><br>
        <select class="form-select" style="float:left;" name="section" aria-label="Default select example">
        <option value="All" selected>All</option>
        <option value="a">A</option>
        <option value="b">B</option>
        </select>

        <input  type="submit" value="Search">
        </form>
        <div id="error" >ERROR ON DATABASE CONNECTION!!</div>
        <div id="content">
           

        </div>
        <input id="auth2" hidden value="<?php echo $auth2; ?>">
    </div>

