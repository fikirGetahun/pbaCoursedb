<?php
require('../dbSetup/connect.php');

if(isset($_POST['auth2'])){
    $auth2 = $_POST['auth2'];
}

?>
   <head>
        <script src="../modules/jquery.js" ></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="../modules/jquery.js"></script>
        <script>
            $(document).ready(function(){

                
                $('#error').hide()
// but when the user searchs empty seartch
                $('form').on('submit', function(){
                    return false;
                })
                // the concept is, when user enters a word to search, then the keyup event will trigger, and it searches. but when the user clicks the search button it will never return to reload thats whay we inserted the form on subit evernt in side the key up event
                $('input').keyup(function(){
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
                             $('#content').load('viewPage.php', {searchData : $req[0], division: $req[1], auth2: $auth2, student: false })
                   
                        }
                    })

                    $('form').on('submit', function(){
                        return false
                    })

                })



                
            })

        </script>
    </head>
    <div>
        <form action="viewTeacher.php" enctype="multipart/form-data">
        <label>Search</label>
        <input type="text" id="inputPassword5" name="searchData" class="form-control" aria-describedby="passwordHelpBlock">

        <label>Division:</label><br>
        <select class="form-select" style="float:left;" id="division"  name="division" aria-label="Default select example">
        <option value="All" selected>ALL</option>
        <option value="kg">KG</option>
        <option value="PM">PRIMERY SCHOOL</option>
        <option value="MD" >MIDDLE SCHOOL</option>
        </select>

        <input  type="submit" value="Search">
        </form>
        <div id="error" >ERROR ON DATABASE CONNECTION!!</div>
        <div id="content">
           

        </div>
        <input id="auth2" hidden value="<?php echo $auth2; ?>">
    </div>