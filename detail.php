<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Chi tiết sản phẩm</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .error{
                color: red;
                font-weight: bold;
            }
             .container{
                width: 1200px;
                margin: 0 auto;
                border: 1px solid #000;
                padding: 35px;
            }
            h2{
                color: darkcyan;
            }
            label{
                font-size: 20px;
            }
            .product-items{
                border: 1px solid #ccc;
                padding: 30px;
            }
            .product-item{
                float: left;
                width: 23%;
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
                margin: 0;
                line-height: 26px;
                max-height: 52px;
                overflow: hidden;
            }
            .product-price{
                color: red;
                font-weight: bold;
                font-size: 20px;
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
            #pagination{
                text-align: right;
                margin-top: 15px;
            }
            .page-item{
                border: 1px solid #ccc;
                padding: 5px 9px;
                color: #000;
            }
            #product-detail{
                border-top: 1px solid #000;
                padding: 15px 0 0 0;
            }
            #product-img{
                width: 30%;
                float: left;
            }
            #product-info{
                float: right;
                width: 70%;
                text-align: left;
                padding-left: 30px;
            }
            #product-img img{
                max-width: 100%;
                padding: 5px;
                border: 1px solid #000;
                background: #eee;
            }
            h1{
                text-align: left;
                margin-top: 0;
                font-weight: bold;
            }
            #add-to-cart{
                margin-top: 15px;
                padding: 15px;
                display: inline-block;
                color: #fff;
            }
            #gallery{
                margin-top: 10px;
            }
            #gallery ul{
                margin: 0;
                padding: 0;
            }
            #gallery ul li{
                width: 150px;
                float: left;
                list-style: none;
                margin-right: 5px;
                margin-bottom: 5px;
                height: 100px;
                text-align: center;
                padding: 5px;
                border: 1px solid #000;
                background: #eee;
            }
            #gallery ul li img{
                max-width: 100%;
                max-height: 100%;
                vertical-align: middle;
            }
            .quantity-button {
                width: 50px;
                padding: 7px;
                border: 1px solid #ccc;
            }
            .submit-button {
            background-color: darkcyan;;
            color: white;
            padding: 10px 20px;
            border: none;
            }
        </style>
    </head>
    <body>
        <?php
        include './connect_db.php';
        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
        $product = mysqli_fetch_assoc($result);  
        $imgLibrary = mysqli_query($con, "SELECT * FROM `image_library` WHERE `product_id` = ".$_GET['id']);
        $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
        ?>
        <div class="container">
            <h2>Chi tiết sản phẩm</h2>
            <div id="product-detail">
                <div id="product-img">
                    <img src="<?=$product['image']?>" />
                </div>
                <div id="product-info">
                    <h1><?=$product['name']?></h1>
                    <label>Giá: </label><span class="product-price"><?= number_format($product['price'], 0, ",", ".") ?> VND</span><br/>
                    <?php if ($product['quantity'] > 0) { ?>
                        <div><label>Tồn kho:  </label><strong><?= $product['quantity'] ?></strong></div>
                    <form id="add-to-cart" action="cart.php?action=add" method="POST">
                        <input type="number" min="1" value="1" name="quantity[<?= $product['id'] ?>]" size="2" class="quantity-button" />
                        <input type="submit" value="Mua sản phẩm" class="submit-button" />
                    </form>
                    <?php } else { ?>
                        <span class="error">Hết hàng</span>
                    <?php } ?>
                    <?php if(!empty($product['images'])){ ?>
                    <div id="gallery">
                        <ul>
                            <?php foreach($product['images'] as $img) { ?>
                                <li><img src="<?=$img['path']?>" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                <div class="clear-both"></div>
                <br><span style="font-size: 22px;"><?=$product['content']?></span>
            </div>
        </div>
    </body>
    <?php include './slider.php'; ?>
</html>