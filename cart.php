<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Giỏ hàng</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css" >
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
            strong{
                font-size: 20px;
            }
            .hello-name{
                color: blue;
            }
            .submit-button{
                background-color: darkcyan;
                height:20px;
                width: 80px;
                color: white;
                border-radius: 10px;
            }
            h1{
                color:darkcyan;
            }
        </style>
    </head>
    <body>
        <?php
        include './connect_db.php';
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $result = mysqli_query($con, "Select `id`,`username`,`fullname`,`phone`, `role` from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = md5('" . $_POST['password'] . "'))");
            if (!$result) {
                $error = mysqli_error($con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($con);
        }
        if (empty($_SESSION['current_user'])) { ?>
            <div id="login-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4>BẠN CHƯA ĐĂNG NHẬP!!VUI LÒNG ĐĂNG NHẬP <a href="./login.php">TẠI ĐÂY</a></h4>
            </div>
        <?php } else {
            $currentUser = $_SESSION['current_user'];
            ?>

        <?php
            if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }
        $error = false;
        $success = false;
        if (isset($_GET['action'])) {

            function update_cart($add = false) {
                foreach ($_POST['quantity'] as $id => $quantity) {
                    if ($quantity == 0) {
                        unset($_SESSION["cart"][$id]);
                    } else {
                        if ($add) {
                            $_SESSION["cart"][$id] += $quantity;
                        } else {
                            $_SESSION["cart"][$id] = $quantity;
                        }
                    }
                }
            }

            switch ($_GET['action']) {
                case "add":
                    update_cart(true);
                    header('Location: ./cart.php');
                    break;
                case "delete":
                    if (isset($_GET['id'])) {
                        unset($_SESSION["cart"][$_GET['id']]);
                    }
                    header('Location: ./cart.php');
                    break;
                case "submit":
                    if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
                        update_cart();
                        header('Location: ./cart.php');
                    } elseif ($_POST['order_click']) { //Đặt hàng sản phẩm
                        if (empty($_POST['name'])) {
                            $error = "Bạn chưa nhập tên của người nhận";
                        } elseif (empty($_POST['phone'])) {
                            $error = "Bạn chưa nhập số điện thoại người nhận";
                        } elseif (empty($_POST['address'])) {
                            $error = "Bạn chưa nhập địa chỉ người nhận";
                        } elseif (empty($_POST['quantity'])) {
                            $error = "Giỏ hàng rỗng";
                        }
                        if ($error == false && !empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                             $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                            $total = 0;
                            $orderProducts = array();
                            while ($row = mysqli_fetch_array($products)) {
                                $orderProducts[] = $row;
                                $total += $row['price'] * $_POST['quantity'][$row['id']];
                            }
                            $insertOrder = mysqli_query($con, "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "', '" . time() . "');");
                            $orderID = $con->insert_id;
                            $insertString = "";
                            foreach ($orderProducts as $key => $product) {
                                $insertString .= "(NULL, '" . $orderID . "', '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $product['price'] . "', '" . time() . "', '" . time() . "')";
                                if ($key != count($orderProducts) - 1) {
                                    $insertString .= ",";
                                }
                            }
                            $insertOrder = mysqli_query($con, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
                            $success = "Đặt hàng thành công";
                            unset($_SESSION['cart']);
                        }
                    }
                    break;
            }
        }
        if (!empty($_SESSION["cart"])) {
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
        }
        ?>
        <div class="container">
            <?php if (!empty($error)) { ?> 
                <div id="notify-msg">
                    <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
                </div>
            <?php } elseif (!empty($success)) { ?>
                <div id="notify-msg">
                    <?= $success ?>. <a href="index.php">Tiếp tục mua hàng</a>
                </div>
            <?php } else { ?>
                <strong class="hello">Xin chào <strong class = "hello-name"><?= $currentUser['fullname'] ?></strong></strong>
                <a href="index.php">Trang chủ</a>
                <h1>Giỏ hàng</h1>
                <form id="cart-form" action="cart.php?action=submit" method="POST">
                    <table>
                        <tr>
                            <th class="product-number">STT</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-img">Ảnh sản phẩm</th>
                            <th class="product-price">Đơn giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="total-money">Thành tiền</th>
                            <th class="product-delete">Xóa</th>
                        </tr>
                        <?php
                        if (!empty($products)) {
                            $total = 0;
                            $num = 1;
                            while ($row = mysqli_fetch_array($products)) {
                                ?>
                                <tr>
                                    <td class="product-number"><?= $num++; ?></td>
                                    <td class="product-name"><?= $row['name'] ?></td>
                                    <td class="product-img"><img src="<?= $row['image'] ?>" /></td>
                                    <td class="product-price"><?= number_format($row['price'], 0, ",", ".") ?></td>
                                    <td class="product-quantity"><input type="number" min="1" class="form-control text -center" value="<?= $_SESSION["cart"][$row['id']] ?>" name="quantity[<?= $row['id'] ?>]" /></td>
                                    <td class="total-money"><?= number_format($row['price'] * $_SESSION["cart"][$row['id']], 0, ",", ".") ?></td>
                                    <td class="product-delete"><a href="cart.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>
                                </tr>
                                <?php
                                $total += $row['price'] * $_SESSION["cart"][$row['id']];
                                $num++;
                            }
                            ?>
                            <tr id="row-total">
                                <td class="product-number">&nbsp;</td>
                                <td class="product-name">Tổng tiền</td>
                                <td class="product-img">&nbsp;</td>
                                <td class="product-price">&nbsp;</td>
                                <td class="product-quantity">&nbsp;</td>
                                <td class="total-money"><?= number_format($total, 0, ",", ".") ?></td>
                                <td class="product-delete">Xóa</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div id="form-button">
                        <input type="submit" name="update_click" class="submit-button" value="Cập nhật" />
                    </div>
                    <hr>
                    <div><label>Người nhận: </label><input type="text" value="" name="name" /></div>
                    <div><label>Điện thoại: </label><input type="text" value="" name="phone" /></div>
                    <div><label>Địa chỉ: </label><input type="text" value="" name="address" /></div>
                    <div><label>Ghi chú: </label><textarea name="note" cols="50" rows="7" ></textarea></div>
                    <input type="submit" name="order_click" class = "submit-button" value="Đặt hàng" />
                </form>
            <?php } } ?>
        </div>
    </body>
</html>