<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <title>Slick Slider</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet"
         type="text/css" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
        body{ background-color: #fffff;color: black; }
        .wap-ss-img{
            text-align: center;
            width: 800px;
            margin-left: -40px;
        }
        .wap-ss-img img{
            height: 170px;
            margin: 0 auto; 
        }
        .textleft{ text-align: center; }
        .slick-prev:before, .slick-next:before{
            font-family: fontawesome;
            font-size: 30px;
            color: black;
        }
        .slick-prev:before{
            content:'\f100';
        }
        .slick-next:before{
            content:'\f101';
        }
        .container_one{
            margin-left: -200px;
            margin-right:100px;
        }
        .product-item p{
            margin: 0;
            line-height: 26px;
            max-height: 52px;
            overflow: hidden;
}
        .product-item{
            height: 300px;
            transition: background-color 0.3s ease;
            transition: transform 0.3s ease;
        }
        .product-item:hover {
            transform: scale(0.9);
            background-color: lightgray;
            }
    </style>

 </head>
 <body>
 <?php
include './connect_db.php';
$products = mysqli_query($con, "SELECT * FROM `product`");
?>
<div class="container">
    <div id="wapper">
        <div class="row autoplay">
            <div class="container_one">
                    <div class="wap-ss-img">
                                <div class="autoplay">
                                    <?php
                                    while ($row = mysqli_fetch_array($products)) {
                                    ?>
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="detail.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a>
                                            </div>
                                            <strong><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong><br />
                                            <label>Giá: </label><span class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ</span><br />
                                            <p><?= $row['content'] ?></p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
            </div>
    </div>
</div>
 <script type="text/javascript" src="frontend/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$('.autoplay').slick({
  slidesToShow: 4,
  slidesToScroll: 2,
  autoplay: true,
  autoplaySpeed: 2000,
});
</script>

 </body>
 </html>
 