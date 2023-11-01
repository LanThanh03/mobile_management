<!DOCTYPE html>
<html>
    <head>
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <title>Phone Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            
            body{
                font-family: arial;
            }
            .container{
                width: 1200px;
                margin: 0 auto;
            }
            h1{
                text-align: center;
            }
            .product-items{ 
               
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
         
            /*css icon và tìm kiem*/
            .cart-icon{ 
                font-size:38px;
                padding-right: 20px;
                padding-left:10px;
            }
            
           #wrapper-product{
               border:1px solid #ccc;

           }
           #product-search{
               margin:0 40px;
               padding:10px;
               padding-bottom:10px;
               padding-top:10px;
                box-sizing: border-box;
               border: 1px solid #ccc
           }
        </style>
    </head>
    <body>
        <?php
        
        //search 
        $search = isset($_GET['name']) ? $_GET['name'] : "";
               
        include './connect_db.php';
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
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
        <div id ="wrapper-product" class="container">
            <h1>Danh sách sản phẩm</h1>
        <table >
  <!--product search -->  
            <td width="50%">
            <form id="product-search"  method="GET">
                        <label>Tìm kiếm sản phẩm:</label>
                        <input type="text"  value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" />
                        <input type="submit" value="Tìm kiếm" />
            </form>
            </td>
  <!-- Tạo icon giỏ hàng -->
            <td style=" text-align: right;">Giỏ hàng của bạn:  </td>
            <td class="cart-icon" > 
                <a href='cart.php' ><i class="fa fa-shopping-cart" ></i><a> </td>
        </table>

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