<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');//admin sua
$config_name = "product";
$config_title = "sản phẩm";
if (!empty($_SESSION['current_user'])) { //kiểm tra người dùng đã đăng nhập chưa
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION['product_filter'] = $_POST;
        header('Location: product_listing.php');exit;
    }
        if(!empty($_SESSION['product_filter'])){ //có lưu dữ liệu tìm kiếm nào hay không
            $where = "";
            foreach ($_SESSION['product_filter'] as $field => $value) {
            if(!empty($value)){
                switch ($field) {
                    case 'name':
                    $where .= (!empty($where))? " AND "."`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                    break;
                    default:
                    $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value."";
                    break;
                }
            }
        }
        extract($_SESSION['product_filter']);
    }
    //phân trang
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `product` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $products = mysqli_query($con, "SELECT * FROM `product` where (".$where.") ORDER BY `id` LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id`  LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>

    <div class="main-content">
        <h1>Danh sách sản phẩm</h1>
        <div class="listing-items">
            <div class="buttons">
                <a href="./product_editing.php">Thêm sản phẩm</a>
            </div>  
            <div class="listing-search">
                <form id="product-search-form" action="product_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm sản phẩm:</legend>
                        ID: <input type="number" name="id" value="<?=!empty($id)?$id:""?>" />
                        Tên sản phẩm: <input type="text" name="name" value="<?=!empty($name)?$name:""?>" />
                        <input type="submit" value="Tìm kiếm" />
                    </fieldset>
                </form>
            </div>
            <?php 
            if (isset ($_SESSION['product_filter']) && ($_SESSION['product_filter']["id"] != "" || $_SESSION['product_filter']["name"] != "")){?>
                <div class="total-items">
                    <span>Tìm thấy <strong><?=$totalRecords?></strong> sản phẩm</span>
                </div>
            <?php } ?>
            

            <ul>
                <li class="listing-item-heading">
                    <div class="listing-prop listing-id">ID</div>
                    <div class="listing-prop listing-quantity"> Danh mục</div>
                    <div class="listing-prop listing-name">Tên sản phẩm </div>
                    <div class="listing-prop listing-quantity"> Số Lượng</div>
                    <div class="listing-prop listing-time">Ngày tạo</div>
                    <div class="listing-prop listing-time">Ngày cập nhật</div>
                    <div class="listing-prop listing-button">Sửa</div>
                    <div class="listing-prop listing-button">Xóa</div>
                    <div class="clear-both"></div>
                </li>
                <?php
                
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <li>
                        <div class="listing-prop listing-id"><?= $row['id'] ?></div>
                        <div class="listing-prop listing-quantity"><?= $row['category'] ?></div>
                        <div class="listing-prop listing-name"><?= $row['name'] ?></div>
                        <div class="listing-prop listing-quantity"><?= $row['quantity'] ?></div>
                        <div class="listing-prop listing-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
                        <div class="listing-prop listing-time"><?= date('d/m/Y H:i', $row['last_updated']) ?></div>
                        <div class="listing-prop listing-button">
                            <a href="./product_editing.php?id=<?= $row['id'] ?>">Sửa</a>
                        </div>
                        <div class="listing-prop listing-button">
                            <a href="./product_delete.php?id=<?= $row['id'] ?>">Xóa</a>
                        </div>

                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <?php
            include './pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
?>

