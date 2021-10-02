<div class="modal-dialog js-modal-dialog modal-lg <?php empty($_SESSION['cart']) ? 'is-empty' : '' ?>" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php if (!empty($_SESSION['cart'])) : ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
                            <tr>
                                <td>
                                    <a href="/product/<?=$item['alias'];?>">
                                        <img width="100" src="/images/products/<?=$item['img'];?>">
                                    </a>
                                </td>
                                <td>
                                    <a href="/product/<?=$item['alias'];?>">
                                        <?=$item['title'];?>
                                    </a>
                                </td>
                                <td><?=$item['qty'];?></td>
                                <td><?=currency($item['price']);?></td>
                                <td><span class="btn btn-danger js-cart-delete-item" type="button" data-id="<?=$id;?>" aria-hidden="true">×</span></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td>Количество товаров:</td>
                            <td colspan="4" class="text-right js-cart-qty"><?=$_SESSION['cart.qty'];?></td>
                        </tr>
                        <tr>
                            <td>На сумму:</td>
                            <td colspan="4" class="text-right js-cart-sum"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <h3>Cart is empty</h3>
            <?php endif; ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary js-hide-card-popup">Продолжить покупки</button>
            <a href="/cart/view" type="button" role="button" class="btn btn-primary is-hide-when-empty">Оформить заказ</a>
            <button type="button" class="btn btn-danger is-hide-when-empty" onclick="clearCart()">Очистить корзину</button>
        </div>
    </div>
</div>