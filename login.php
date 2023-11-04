<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
             body{
                font-family:arial;
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
                /*.login-button 
                {
                    background-color: green ;
                    padding: 10px;
                    color: white;
                }*/
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
                #show-hide {
                    cursor: pointer;
                        }

        </style>
    </head>
    <body>
        <?php
        session_start();
        include './connect_db.php';
        $error = false;
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $result = mysqli_query($con, "Select `id`,`username`,`fullname`,`phone`, `role` from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = md5('" . $_POST['password'] . "'))");
            if (!$result) {
                $error = mysqli_error($con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($con);
            if ($error !== false || $result->num_rows == 0) {
                ?>
                <div id="login-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
                    <a href="./index.php">Quay lại</a>
                </div>
                <?php
                exit;
            }
            ?>
        <?php } ?>
        <?php if (empty($_SESSION['current_user'])) { ?>
            <div id="user_login" class="box-content">
                <h1>Đăng nhập tài khoản</h1>
                <form action="./login.php" method="Post" autocomplete="off">
                    <label style="font-size: 20px;">Username</label></br>
                    <input type="text" name="username" value="" placeholder="Nhập tài khoản"/><br/>
                    <label style="font-size: 20px;" for="password">Password</label><br>
                    <div class="input-password">
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                    <span class="an-hien-password" id="show-hide" onclick="showPassword()">🙈</span>
                    </div>
                    <input type="submit" value="Đăng nhập" style="text-decoration: none; background-color: green; color: white; padding: 8px; margin: 20px 6px; "> 
                    <a href="./register.php" style="text-decoration: none;">Đăng ký</a><br><br>
                    <a href="./index.php" style="text-decoration: none;">Quay lại</a>
                </form>
            </div>
        <?php } else {
            $currentUser = $_SESSION['current_user'];
            if ($currentUser['role'] === 'admin') { ?>
            <!-- nếu role là admin ==> vô dc màn hình sp, đơn hàng, tài khoản -->
            <?php   header("Location: admin/product_listing.php"); ?>
            <?php } else if ($currentUser['role'] === 'staff') { ?>
                <!-- nếu role là staff ==> vô dc màn hình sp, đơn hàng -->
            <?php   header("Location: admin/product_listing.php"); ?>
        <?php  }else if ($currentUser['role'] === 'user'){
            header("Location: ./index.php");
        ?><!-- nếu role là staff ==> vào màn hình trang chủ -->
        <!-- <a href="./index.php">Trang chủ</a><br/> -->
       <?php } } ?>
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