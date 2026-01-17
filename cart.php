<?php
session_start();

$products = [
    1 => "Sách",
    2 => "Bút",
    3 => "Vở"
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $_SESSION['cart'][] = $_GET['add'];
}
?>

<h2>Sản phẩm</h2>
<ul>
<?php foreach ($products as $id => $name): ?>
    <li>
        <?= $name ?> -
        <a href="?add=<?= $id ?>">Thêm</a>
    </li>
<?php endforeach; ?>
</ul>

<h2>Giỏ hàng</h2>
<ul>
<?php foreach ($_SESSION['cart'] as $item): ?>
    <li><?= $products[$item] ?></li>
<?php endforeach; ?>
</ul>
