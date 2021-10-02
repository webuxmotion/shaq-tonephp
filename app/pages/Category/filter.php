<?php if ($products) : ?>

    <?php require __DIR__ . '/shared/products-list.php';?>

<?php else : ?>
    <h2>Товаров не найдено...</h2>
<?php endif; ?>