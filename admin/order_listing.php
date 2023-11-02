<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (!empty($_SESSION['current_user'])) {
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION['order_filter'] = $_POST;
        header('Location: order_listing.php');exit;
    }
    if(!empty($_SESSION['order_filter'])){
        $where = "";
        foreach ($_SESSION['order_filter'] as $field => $value) {
            if(!empty($value)){
                $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value.""; 
            }
        }
        extract($_SESSION['order_filter']);
        
    }
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `orders` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `orders`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $orders = mysqli_query($con, "SELECT * FROM `orders` where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $orders = mysqli_query($con, "SELECT * FROM `orders` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Danh sách đơn hàng</h1>
        <div class="listing-items">
            <div class="listing-search">
                <form id="order-search-form" action="order_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm đơn hàng:</legend>
                        ID: <input type="number" name="id" value="<?= !empty($id) ? $id : "" ?>" />
                        Số điện thoại: <input type="number" name="phone" value="<?= !empty($phone) ? $phone : "" ?>" />
                        <input type="submit" value="Tìm kiếm" />
                    </fieldset>
                </form>
            </div>
            <?php 
            if (isset ($_SESSION['product_filter']) && ($_SESSION['order_filter']["id"] != "" || $_SESSION['order_filter']["phone"] != "")){?>
                <div class="total-items">
                    <span>Tìm thấy <strong><?=$totalRecords?></strong> đơn hàng</span>
                </div>
            <?php } ?>
            <ul>
                <li class="listing-item-heading">
                    <div class="listing-prop listing-id">ID</div>
                    <div class="listing-prop listing-name">Tên người nhận</div>
                    <div class="listing-prop listing-address">Địa chỉ</div>
                    <div class="listing-prop listing-phone">Điện thoại</div>
                    <div class="listing-prop listing-button">
                        In đơn
                    </div>
                    <div class="listing-prop listing-time">Ngày tạo</div>
                    <div class="clear-both"></div>
                </li>
                <?php  while ($row = mysqli_fetch_array($orders)) { ?>
                <li>
                    <div class="listing-prop listing-id"><?=$row['id']?></div>
                    <div class="listing-prop listing-name"><?=$row['name']?></div>
                    <div class="listing-prop listing-address"><?=$row['address']?></div>
                    <div class="listing-prop listing-phone"><?=$row['phone']?></div>
                    <div class="listing-prop listing-button">
                        <a href="order_printing.php?id=<?=$row['id']?>" target="_blank">In</a>
                    </div>
                    <div class="listing-prop listing-time"><?=date('d/m/Y H:i', $row['created_time'])?></div>
                    <div class="clear-both"></div>
                </li>
                <?php  } ?>
            </ul>
            <?php /*
              include './pagination.php';
             */ ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
?>
