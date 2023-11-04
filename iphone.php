<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Phone Store</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" >
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <link rel="icon" href="https://static.xx.fbcdn.net/images/emoji.php/v9/tc1/1.5/32/1f435.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            }
            if (!empty($_SESSION['current_user'])){
            $currentUser = $_SESSION['current_user'];
            }   
        //search 
        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $search = isset($_GET['name']) ? $_GET['name'] : "";
        $param = "";
        $sortParam = "";
        $orderConditon = "";
        
        // Tìm kiếm theo tên sản phẩm
        if ($search) {
            $where = "WHERE `name` LIKE '%" . $search . "%'";
            $param .= "name=" . $search . "&";
            $sortParam = "name=" . $search . "&";
        }
        
        // Sắp xếp
        $orderField = isset($_GET['field']) ? $_GET['field'] : "";
        $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
        if (!empty($orderField) && !empty($orderSort)) {
            $orderConditon = "ORDER BY `product`.`" . $orderField . "` " . $orderSort;
            $param .= "field=" . $orderField . "&sort=" . $orderSort . "&";
        }
        
        // Lấy dữ liệu sản phẩm
        if ($search) {
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' " . $orderConditon . "  LIMIT " . $item_per_page . " OFFSET " . $offset);
            $totalRecords = mysqli_query($con, "SELECT COUNT(*) as total FROM `product` WHERE `name` LIKE '%" . $search . "%'");
        } else {
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE category = 'Iphone' " . $orderConditon . " LIMIT " . $item_per_page . " OFFSET " . $offset);
            $totalRecords = mysqli_query($con, "SELECT COUNT(*) as total FROM `product` WHERE category = 'Iphone'");
        }
        
        $totalRecords = mysqli_fetch_assoc($totalRecords)['total'];
        $totalPages = ceil($totalRecords / $item_per_page);
        ?>
        <nav>
        <?php if (!empty($_SESSION['current_user'])) { ?>
                <strong class="hello">Xin chào <strong class = "hello-name"><?= $currentUser['fullname'] ?></strong></strong>
        <?php } ?>
            <ul>
                    <form class = 'tk' method = 'GET' >
                        <input type = 'text' value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" placeholder = "Tìm sản phẩm" style = "margin-left:1000px; width: 300px;">
                        <input type = 'submit' value = 'Tìm' style = "width: 80px; border: none; margin-left: 10px;">
                    </form>
                <!-- kiểm tra nếu có đăng nhập thì xin chào -->
                <?php if (!empty($_SESSION['current_user'])) { ?>
                    <li><a href = "admin/logout.php"><button>Đăng xuất</button></a></li>
                <?php } else { ?>
                    <li><a href = "./login.php"><button>Đăng nhập</button></a></li>
                <?php } ?>
                    <li><a href = "./register.php"><button>Đăng ký</button></a></li>
                    <li><a href = "cart.php"><button><i class = "fa fa-shopping-cart"></i>Giỏ hàng</button></a></li>
            </ul>
        </nav>
        
        <section class = "menu-bar">
            <div class = "menu-bar-content">
                <ul>
                    <li><a href = "index.php">Trang chủ</a></li>
                    <li><a href = "iphone.php">Iphone</a></li>
                    <li><a href = "samsung.php">Samsung</a></li>
                    <li><a href = "oppo.php">Oppo</a></li>
                    <li><a href = "xiaomi.php">Xiaomi</a></li>
        </ul>
        </div>
        </section>
        
        <section >
            
                    <div>
                    <?php include './slider1.php';?>
               
                    <div class="content-right">
                    <li class="banner" ><a href = "./iphone.php"><img src = "images/ip14.png" alt = ""></a></li>
                    <li class="banner" ><a href = "./samsung.php"><img src = "images/zflip.png" alt = ""></a></li>
                    <li class="banner" ><a href = "./oppo.php"><img src = "images/oppo.jpg" alt = ""></a></li>
                    <li class="banner" ><a href = "./xiaomi.php"><img src = "images/redmi.png" alt = ""></a></li>
                    </div>
                    <div>
            
        </section>


        <div class="container">
            <h1>Danh sách sản phẩm</h1>
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Sắp xếp giá</option>
                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=price&sort=desc">Cao đến thấp</option>
                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=price&sort=asc">Thấp đến cao</option>
            </select>
            <div class="product-items">
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <div class="product-item">
                        <div class="product-img">
                            <a href="detail.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a>
                        </div>
                        <strong><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong><br/>
                        <label>Giá: </label><span class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ</span><br/>
                        <p><?= $row['content'] ?></p>
                    </div>
                <?php } ?>
                <div class="clear-both"></div>
                <?php
                include './pagination.php'; //chức năng phân trang
                ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </body>
</html>