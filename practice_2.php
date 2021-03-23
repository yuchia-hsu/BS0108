<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5">
                <div class="form-group">
                    <label for="username">帳號</label>
                    <input type="text" id="username" name="username" class="form-control">
                    <div id="error_username" style="color:red;">帳號不得少於5個字數</div>
                </div>
                <div class="form-group">
                    <label for="password">密碼</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <div id="error_password"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                    <div id="error_email"></div>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-outline-primary">取消</a>
                    <a href="#" class="btn btn-primary" id="ok_btn">確認</a>
                </div>
                <div id="showmsg"></div>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <script>

        var flag_username = false;
        var flag_password = false;
        var flag_email = false;

        $(function () {
            //btn 監聽
            $("#ok_btn").bind("click", function () {
                console.log($("#username").val());
                console.log($("#password").val());
                console.log($("#email").val());
                if (flag_username && flag_password && flag_email) {
                    // $("#showmsg").html("<p>帳號: " + $("#username").val() + "</p><p>密碼: " + $("#password").val() + "</p><p>Email: " + $("#email").val() + "<p>");

                    $.ajax({
                        type: "POST",
                        url: "practice_2_bd.php",
                        data: {username: $("#username").val(), password: $("#password").val(),email: $("#email").val()},
                        success:showdata,
                        error: function(){
                            alert("error-practice_2_bd.php");
                        }
                    });
                } else {
                    alert("欄位有錯誤!請修正!");
                }

            });

            //即時監聽username
            $("#username").bind("input propertychange", function () {
                console.log($(this).val().length);
                if ($(this).val().length < 5) {
                    //不符合規定
                    $("#error_username").html("帳號不得少於5個字數");
                    $("#error_username").css("color", "red");
                    flag_username = false;
                } else {
                    //符合規定
                    $("#error_username").html("");
                    flag_username = true;
                }
            });

            //即時監聽password
            $("#password").bind("input propertychange", function () {
                if ($(this).val().length < 8) {
                    //不符合規定
                    $("#error_password").html("密碼不得少於8個字數");
                    $("#error_password").css("color", "red");
                    flag_password = false;
                } else {
                    //符合規定
                    $("#error_password").html("");
                    flag_password = true;
                }
            });

            //即時監聽email
            $("#email").bind("input propertychange", function () {
                if ($(this).val().length < 10) {
                    //不符合規定
                    $("#error_email").html("email不得少於10個字數");
                    $("#error_email").css("color", "red");
                    flag_email = false;
                } else {
                    //符合規定
                    $("#error_email").html("");
                    flag_email = true;
                }
            });
        });//END Funtion

        function showdata(data){
            console.log(data);
        }

    </script>
</body>

</html>