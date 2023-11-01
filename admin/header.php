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
        <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
        <style>
        .account-dropdown {
            position: relative;
        }

        .account-name { /*Thay đổi thao tác con trỏ chuột */
            cursor: pointer;
        }

        .account-dropdown-taikhoan {
            display: none; /* ẩn đi danh sách liên kết đăng nhập và đổi mật khẩu*/
            position: absolute;
            background-color:#F5F5F5 ;
            width: 127px;
            border-radius: 5px;
        }

        .account-dropdown:hover .account-dropdown-taikhoan {
            display: block;
        }

        .account-dropdown-taikhoan a {
            padding: 8px 8px;
            text-decoration: none;
            display: block;
        }

        .account-dropdown-taikhoan a:hover {
            background-color: #f1f1f1;
        }
    </style>
    </head>
    <body>
        <?php
        session_start();
        include '../connect_db.php';
        include '../function.php';
        if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập chưa?
            ?>
            <div id="admin-heading-panel">
                <div class="container">
                    <div class="left-panel">
                    <?php $currentUser = $_SESSION['current_user']; ?>
                    Xin chào <?= $currentUser['fullname'] ?><br/>
                    </div>
                    <div class="right-panel" >
                        <img height="24" src="../images/home.png" />
                        <a href="../index.php">Trang chủ</a>
                        <div class="right-panel">
                            <?php // Liên kết dropdown ?>
                            <div class="account-dropdown" > 
                                <span class="account-name">📁 Tài khoản</span>
                                <div class="account-dropdown-taikhoan">
                                    <a href="logout.php" style ="color:black;">🕹️  Đăng xuất</a>
                                    <a href="edit.php"style ="color:black;">🔐  Đổi mật khẩu</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div id="content-wrapper">
                <div class="container">
                    <div class="left-menu">
                        <div class="menu-heading">Admin Menu</div>
                        <div class="menu-items">
                            <ul>
                                <li><a href="product_listing.php">Sản phẩm</a></li>
                                <li><a href="order_listing.php">Đơn hàng</a></li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>