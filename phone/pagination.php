<div id="pagination">
<?php
//search sp phần user
$param="";
$search = isset($_GET['name']) ? $_GET['name'] : "";
if ($search){
    $param ="name=".$search."&";
}
if ($current_page > 2) {
    $first_page = 1;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>
    <?php
}
if ($current_page > 1) {
    $prev_page = $current_page - 1;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>
<?php }
?>
<?php for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page) { ?>
        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
            <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
        <?php } ?>
    <?php } else { ?>
        <strong class="current-page page-item"><?= $num ?></strong>
    <?php } ?>
<?php } ?>
<?php 
if ($current_page < $totalPages - 1) {
    $next_page = $current_page + 1;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>
<?php
}
if ($current_page < $totalPages ) {
    $end_page = $totalPages;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>
    <?php
}
?>
</div>