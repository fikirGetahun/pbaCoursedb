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
                $i = 1
                function toAddDivision(){
                    $('#f1').on('submit', function(e){
                        e.preventDefault()
                        $.ajax({
                            url: '../homePage/addDivision.php',
                            type: 'GET',
                            data: $('form').serialize(),
                            success: function(){

                            }
                        })
                    $div = $('#divisionw').val()
                    document.getElementById('shj'+$i).innerHTML = `
                        <h5>New Division Added</h5>
                        <h6> >> `+ $div + ` </h6>
                    `
                    document.getElementById('show1').innerHTML += '<br>'+ $div
                    return false
                })
                }

            })
    </script>
</head>
<?php
require('../dbSetup/mannageSchool.php');

$obj = $manageSchool-> toStartYear();
?>
    <div id="allTo">
    <div id="shj1">
    <lable>Add Division.</lable>
    <form id="f1" action="../homePage/addDivision.php"   method="GET" >
    <input required  type="text" id="divisionw" name="divv" class="form-control" aria-describedby="passwordHelpBlock">
    <input type="submit" onclick="toAddDivision()"  value="Add Division">
    </form>
    </div>
    </div>
    <div id="show1">

    </div>
