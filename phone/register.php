<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đăng ký</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
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
            #user_register form{
                width: 200px;
                margin: 40px auto;
            }
            #user_register form input{
                margin: 5px 0;
            }
            .hidden {
            display: none;
            }
        </style>
    </head>
    <body>
        <?php
        include './connect_db.php';
        include './function.php';
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'reg') 
        {
            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) 
            {
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
                    $result = mysqli_query($con, "INSERT INTO `user` (`fullname`,`username`, `password`, `phone`, `role`, `status`, `created_time`, `last_updated`) 
                    VALUES ('" . $_POST['fullname'] . "', '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'), '" . $phone . "','" . $role . "', 1, " . time() . ", '" . time() . "');");
                    if (!$result) 
                    {
                        if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) 
                        {
                            $error = "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
                        }
                    }
                    mysqli_close($con);
                if ($error !== false) 
                { ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./register.php">Quay lại</a>
                    </div>
          <?php } else 
                    { ?> 
                    <div id="edit-notify" class="box-content">
                        <h1><?= ($error !== false) ? $error : "Đăng ký tài khoản thành công" ?></h1>
                        <a href="./login.php">Mời bạn đăng nhập</a>
                    </div>
              <?php } ?>
            <?php }
            else 
            { ?>
                <div id="edit-notify" class="box-content">
                    <h1>Vui lòng nhập đủ thông tin để đăng ký tài khoản</h1>
                    <a href="./register.php">Quay lại đăng ký</a>
                </div>
                <?php
            }
        } 
        else 
        {
            ?>
            <div id="user_register" class="box-content">
                <h1>Đăng ký tài khoản</h1>
                <form action="./register.php?action=reg" method="Post" autocomplete="off">
                    <label>Username</label></br>
                    <input type="text" name="username" value=""><br/>
                    <label>Password</label></br>
                    <input type="password" name="password" value="" /></br>
                    <label>Họ tên</label></br>
                    <input type="text" name="fullname" value="" /><br/>
                    <label>Số điện thoại</label></br>
                    <input type="text" name="phone" value="" /><br/>
                    </br>
                    </br>
                    <input type="submit" value="Đăng ký"/> <br>
                    <a href="./index.php">Quay lại</a>
                    <select name="role" class="hidden">
                        <option value="user">User</option>
                    </select>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>
