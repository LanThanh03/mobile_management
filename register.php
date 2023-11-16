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
            #user_register form 
            {
                width: 100%;
                margin: 20px auto;
                width: 300px;
            }

            #user_register form input
            {
                margin: 10px 0;
                padding: 10px;
                width: 100%; 
                border-radius: 7px;
            }
            .role-user
            {
                margin: 10px 0;
                padding: 10px;
                width: 100%; 
                border-radius: 7px;
            }
            .input-password /*căn chỉnh cho nút ẩn/hiện mật khẩu vô ô input */
            {
                position: relative;
            }
            .an-hien-password /*căn chỉnh cho nút ẩn/hiện mật khẩu vô ô input */
            {
                position: absolute; 
                top: 50%;
                right: 5px;
                transform: translateY(-50%);
            }
            #show-hide 
            {
                cursor: pointer;
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
                <label style="font-size: 20px;">Username</label></br>
                        <input type="text" name="username" value="" placeholder="Nhập tài khoản"><br/>
                    <label style="font-size: 20px;">Password</label></br>
                        <div class="input-password">
                            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                            <span class="an-hien-password" id="show-hide" onclick="showPassword()">🙈</span>
                        </div>
                    <label style="font-size: 20px;">Họ tên</label></br>
                        <input type="text" name="fullname" value="" placeholder="Nhập họ tên"/><br/>
                    <label style="font-size: 20px;">Số điện thoại</label></br>
                        <input type="text" name="phone" value="" placeholder="Nhập số điện thoại" /><br/>
                    <input type="submit" value="Đăng ký" style="text-decoration: none; background-color: green; color: white; padding: 8px; margin: 20px 6px; ">
                    <a href="./index.php" style="text-decoration: none;">Quay lại</a><br>
                    <select name="role" class="hidden">
                        <option value="user">User</option>
                    </select>
                </form>
            </div>
            <?php
        }
        ?>
        <script>
                function showPassword() 
                {
                    var passwordField = document.getElementById("password");
                    var showHideIcon = document.getElementById("show-hide");
                    
                    if (passwordField.type === "password") 
                            {
                                passwordField.type = "text"; // Hiển thị mật khẩu
                                showHideIcon.textContent = "🙉"; // Biểu tượng khi hiên mật khẩu
                            } else {
                                passwordField.type = "password"; // Ẩn mật khẩu
                                showHideIcon.textContent = "🙈"; // Biểu tượng khi ẩn mật khẩu
                            }
                }
            </script>
    </body>
</html>
