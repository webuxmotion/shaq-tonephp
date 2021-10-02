<!-- breadcrumbs -->
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0">
            <a href='<?=siteUrl()?>'>Home</a><span class='mx-2 mb-0'>/</span>
            <strong class='text-black'>Корзина</strong>        
        </div>
      </div>
    </div>
</div>  
<!-- END. breadcrumbs -->

<?php if (!empty($_SESSION['cart'])) : ?>
<div class="site-section">
    <div class="container">
    <div class="row mb-5">
        <form class="col-md-12" method="post">
        <div class="site-blocks-table">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
                    <tr>
                        <td class="product-thumbnail">
                            <img src="/images/products/<?=$item['img'];?>" alt="Image" class="img-fluid">
                        </td>
                        <td class="product-name">
                            <h2 class="h5 text-black">
                            <a href="/product/<?=$item['alias'];?>"><?=$item['title'];?></a></h2>
                        </td>
                        <td style="white-space: nowrap;"><?=currency($item['price']);?></td>
                        <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="<?=$item['qty'];?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                        </td>
                        <td style="white-space: nowrap;"><?=currency($item['price'] * $item['qty']);?></td>
                        <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="row mb-5">
            <div class="col-md-6">
                <a href="<?=siteUrl()?>" class="btn btn-black rounded-0">Продолжить покупки</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="/cart/checkout" role="form" data-toggle="validator">
                    <?php if(!isset($_SESSION['user'])): ?>
                        <div class="form-group has-feedback">
                            <label for="login">Login</label>
                            <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="pasword">Password</label>
                            <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" value="<?= isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '' ?>" data-minlength="6" data-error="Пароль должен включать не менее 6 символов" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Имя</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?= isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="address">Note</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Оформить</button>
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>
        </div>
        </div>
        <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                    <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                    
                    <strong class="text-black"><?=currency($_SESSION['cart.sum'])?></strong>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<?php endif; ?>