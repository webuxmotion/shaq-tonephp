<!-- breadcrumbs -->
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <?=$breadcrumbs?>
            </div>
        </div>
    </div>
</div>
<!-- END. breadcrumbs -->

<!-- products -->

<div class="site-section">
    <div class="container">
        <div class="row">
            <?php if ($products) : ?>
                <div class="col-md-9 order-1">
                    <div class="row mb-5 js-products">

                        <?php require __DIR__ . '/shared/products-list.php';?>

                    </div>
                </div>
                <div class="col-md-3 order-2 mb-5 mb-md-0 js-filter">
                    <?php new \app\widgets\filter\Filter(); ?>
                </div>

            <?php else : ?>
                <h2>В этой категории товаров пока нет...</h2>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- END. products -->