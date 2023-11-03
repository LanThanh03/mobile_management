<!DOCTYPE html>
<html>
    <head>
        <title>Phone Store</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css" >
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .container{
                width: 1200px;
                margin: 0 auto;
            }
            strong{
                font-size: 20px;
            }
            .hello{
                color: white;
                margin-left: 90px;
            }
            .hello-name{
                color: yellow;
            }
            h1{
                text-align: center;
                color: darkcyan;
                font-weight: bold;
            }
            h2 {
                float: left;
                color: white;
            }
            .product-items{ 
                border: 1px solid #ccc;
                padding: 20px;
            }
            .product-item{
                float: left;
                height: 400px;
                width: 18%;
                margin: 1%;
                padding: 10px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                line-height: 26px;
                transition: background-color 0.3s ease;
                transition: transform 0.3s ease;
                
            }
            .product-item:hover {
            transform: scale(1.1);
            background-color: lightgray;
            }
            .banner{
                transition: transform 0.3s ease;
            }
            .banner:hover{
                transform: scale(0.9);
            }
            .product-item label{
                font-weight: bold;
            }
            .product-item p{
                /* margin: 0; */
                /* line-height: 26px; */
                max-height: 50px;
                overflow: hidden;
            }
            .product-price{
                color: red;
                font-weight: bold;
            }
            .product-img{
                padding: 5px;
                border: 1px solid #ccc;
                margin-bottom: 5px;
            }
            .product-item img{
                max-width: 100%;
            }
            .product-item ul{
                margin: 0;
                padding: 0;
                border-right: 1px solid #ccc;
            } 
            .product-item ul li{
                float: left;
                width: 33.3333%;
                list-style: none;
                text-align: center;
                border: 1px solid #ccc;
                border-right: 0;
                box-sizing: border-box;
            }
            .clear-both{
                clear: both;
            }
            a{
                text-decoration: none;
            }
        /*css phan trang*/
            #pagination {
        text-align: center;
        margin-top: 15px;
        margin-bottom: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
            .page-item{
                border: 1px solid #ccc;
                padding: 5px 9px;
                color: #000;
            }
            .current-page{
                background: #000;
                color: #FFF;
            }
            .tk input{
                height: 40px;
                border-radius: 5px;
                padding-left: 5px;
            
            }
        </style>
    </head>
    <body>
    <?php
        include './connect_db.php';
        session_start();
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
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $search = isset($_GET['name']) ? $_GET['name'] : "";
        //tìm kiếm theo tên sp 
        if($search){
             $products = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%".$search."%' ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
             $totalRecords = mysqli_query($con, "SELECT * FROM `product` WHERE `name` LIKE '%".$search."%'");
         } else {
             $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
             $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
         }
        $totalRecords = $totalRecords->num_rows;
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