<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đổi thông tin thành viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                font-family:arial;
                font-size:14px;
            }
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
            #edit_user form{
                    width: 100%;
                    margin: 20px auto;
                    width: 300px;
            }
            #edit_user form input{
                margin: 10px 0;
                    padding: 10px;
                    width: 100%; 
                    border-radius: 7px;
            }
            .button-edit
            {
                text-decoration: none; background-color: green; color: white; padding: 8px; margin: 20px 6px;
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
            #show-hide1
            {
                cursor: pointer;
            }
            .an-hien-password1 /*căn chỉnh cho nút ẩn/hiện mật khẩu vô ô input */
            {
                position: absolute; 
                top: 50%;
                right: 5px;
                transform: translateY(-50%);
            }
            .input-password1 /*căn chỉnh cho nút ẩn/hiện mật khẩu vô ô input */
            {
                position: relative;
            }

        </style>
    </head>
    <body>
        <?php
        include '../connect_db.php';
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])
            ) {
                $userResult = mysqli_query($con, "Select * from `user` WHERE (`id` = " . $_POST['user_id'] . " AND `password` = '" . md5($_POST['old_password']) . "')");
                if ($userResult->num_rows > 0) {
                    $result = mysqli_query($con, "UPDATE `user` SET `password` = MD5('" . $_POST['new_password'] . "'), `last_updated`=" . time() . " WHERE (`id` = " . $_POST['user_id'] . " AND `password` = '" . md5($_POST['old_password']) . "')");
                    if (!$result) {
                        $error = "Không thể cập nhật tài khoản";
                    }
                } else {
                    $error = "Mật khẩu cũ không đúng";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thông báo</h2>
                        <h4><?= $error ?></h4>
                        <a href="./edit.php" style="text-decoration: none;">Quay lại</a> 
                    </div>
                <?php } else { ?>
                    <div id="edit-notify" class="box-content">
                        <h2><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h2>
                        <a href="../login.php"style="text-decoration: none;" >Quay lại tài khoản</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div id="edit-notify" class="box-content">
                    <h2>Vui lòng nhập đủ thông tin để sửa tài khoản</h2>
                    <a href="./edit.php" style="text-decoration: none;">Tiếp tục</a>
                </div>
                <?php
            }
        } else {
            session_start();
            $user = $_SESSION['current_user'];
            if (!empty($user)) {
                ?>
                <div id="edit_user" class="box-content">
                    <h1>Đổi mật khẩu</h1>
                    <form action="./edit.php?action=edit" method="Post" autocomplete="off">
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                        <label style="font-size: 20px;">Old password</label></br>
                        <?php //  <input type="password" name="old_password" value="" /></br>?>
                        <div class="input-password">
                            <input type="password" name="old_password" id="password" placeholder="Nhập mật khẩu cũ">
                            <span class="an-hien-password" id="show-hide" onclick="showPassword()">🙈</span>
                        </div>
                        <label style="font-size: 20px;">New password</label></br>
                        <?php // <input type="password" name="new_password" value="" /></br> ?>
                        <div class="input-password1">
                            <input type="password" name="new_password" id="password1" placeholder="Nhập mật khẩu mới">
                            <span class="an-hien-password1" id="show-hide1" onclick="showPassword1()">🙈</span>
                        </div>
                        <br><br>
                        <input type="submit" value="Lưu" style="text-decoration: none; background-color: green; color: white; padding: 8px; margin: 1px 10px;" />
                    </form>
                </div>
                <?php
            }
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
                function showPassword1() 
                {
                    var passwordField = document.getElementById("password1");
                    var showHideIcon = document.getElementById("show-hide1");
                    
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