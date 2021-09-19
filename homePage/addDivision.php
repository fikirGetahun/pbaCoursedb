<head>
    <script src="../modules/jquery.js"></script>
    <script>
        //  $i = 1

        // function divHandler(){
        //     newObj = document.createElement('div')
        //     newObj.id = "sh"+ $i
        //     newObj.style.visibility="show"
        //     newContent = document.createTextNode("<button onclick='divHandler()>Add Another Division</button> "); 
        //     newObj.appendChild(newObj)
        //     old = document.getElementById('sh0')
        //     document.body.insertBefore("sh0")

        //     $(newObj.id).load('addDivisionForm.php')
        //     $i++
            
        // }
            $(document).ready(function(){
                $('#f1').on('submit', function(){

                    $div = $('#inputPassword5').val()
                    document.getElementById('show1').innerHTML += '<br>'+ $div
                    return false
                })
            })
    </script>
</head>
<?php
require('../dbSetup/mannageSchool.php');

$obj = $manageSchool-> toStartYear();
?>
    <div id="sh0">
    <lable>Add Division.</lable>
    <form id="f1" action="../homePage/addDivision.php"   method="GET" >
    <input required  type="text" id="inputPassword5" name="divv" class="form-control" aria-describedby="passwordHelpBlock">
    <input type="submit" onclick="divHandler()"  value="Add Division">
    </form>
    </div>
    <div id="show1">

    </div>
