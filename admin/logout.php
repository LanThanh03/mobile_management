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
            .box-content{
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
            #user_login form 
            {
                width: 100%;
                margin: 20px auto;
                width: 300px;
            }

            #user_login form input 
            {
                margin: 10px 0;
                padding: 10px;
                width: 100%; 
                border-radius: 7px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['current_user']);
        ?>
        <div id="user_logout" class="box-content">
            <h2>Đăng xuất tài khoản thành công</h2>
            <a href="./index.php" style=" text-decoration: none;"> Đăng nhập lại</a>
        </div>
    </body>
</html>
