<?php
 include 'header.php';
$config_name = "account";
$config_title = "tài khoản";
if (!empty($_SESSION['current_user'])) { //kiểm tra người dùng đã đăng nhập chưa
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION['account_filter'] = $_POST;
        header('Location: manage_account.php');exit;
    }
        if(!empty($_SESSION['account_filter'])){ //có lưu dữ liệu tìm kiếm nào hay không
            $where = "";
            foreach ($_SESSION['account_filter'] as $field => $value) {
            if(!empty($value)){
                switch ($field) {
                    case 'username':
                    $where .= (!empty($where))? " AND "."`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                    break;
                    default:
                    $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value."";
                    break;
                }
            }
        }
        extract($_SESSION['account_filter']);
    }
    //phân trang
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `user` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `user`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $products = mysqli_query($con, "SELECT * FROM `user` where (".$where.") ORDER BY `id` LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $products = mysqli_query($con, "SELECT * FROM `user` ORDER BY `id`  LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>

    <div class="main-content">
        <h1>Danh sách <?=$config_title?></h1>
        <div class="listing-items">
            <div class="buttons">
                <a href="./manage_<?=$config_name?>.php">Thêm <?=$config_title?></a>
            </div>  
            <div class="listing-search">
                <form id="<?=$config_name?>-search-form" action="manage_<?=$config_name?>.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm <?=$config_title?>:</legend>
                        ID: <input type="text" name="id" value="<?=!empty($id)?$id:""?>" />
                        Tên <?=$config_title?>: <input type="text" name="username" value="<?=!empty($username)?$username:""?>" />
                        <input type="submit" value="Tìm" />
                    </fieldset>
                </form>
            </div>
            <div class="total-items">
                <span>Có tất cả <strong><?=$totalRecords?></strong> <?=$config_title?> trên <strong><?=$totalPages?></strong> trang</span>
            </div>
            <ul>
                <li class="listing-item-heading">
                    <div class="listing-prop listing-id">ID</div>
                    <div class="listing-prop listing-accounts">Tên tài khoản</div>
                    <div class="listing-prop listing-accounts">Họ tên </div>
                    <div class="listing-prop listing-accounts">Phân quyền</div>
                    

                    <div class="clear-both"></div>

                </li>
                <?php
                while ($row = mysqli_fetch_array($products)) {
                   
                    ?>
                    <li>
                        <div class="listing-prop listing-id"><?= $row['id'] ?></div>
                        <div class="listing-prop listing-accounts"><?= $row['username'] ?></div>
                        <div class="listing-prop listing-accounts"><?= $row['fullname'] ?></div>
                        <div class="listing-prop listing-accounts"><?= $row['role'] ?></div>

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
