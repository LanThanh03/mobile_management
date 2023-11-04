<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đăng xuất tài khoản</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                font-family:arial;
                font-size:14px;
            }
            .box-content {
                    position: absolute;
                    top: 42%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 400px;
                    padding: 20px;
                    border: 1px solid #ccc;
                    text-align: center;
                    background-color: #F0FFF0;
                    box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);/* đổ bóng*/
                    border-radius: 20px;
            }
            #user_logout form{
                width: 200px;
                margin: 40px auto;
            }
            #user_logout form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['current_user']);
        ?>
        <div id="user_logout" class="box-content">
            <h1>Đăng xuất tài khoản thành công</h1>
            <a href="../login.php">Đăng nhập lại</a><br>
            <a href="../index.php">Trang chủ</a>
        </div>
    </body>
</html>
