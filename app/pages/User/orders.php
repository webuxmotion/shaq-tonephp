
<!-- breadcrumbs -->
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0">
            <a href='<?=siteUrl()?>'>Home</a><span class='mx-2 mb-0'>/</span>
            <a href='<?=siteUrl()?>/user/cabinet'>Личный кабинет</a><span class='mx-2 mb-0'>/</span>
            <strong class='text-black'>История заказов</strong>        
        </div>
      </div>
    </div>
</div>  
<!-- END. breadcrumbs -->

<div class="site-section">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <?php if($orders): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 20%">Статус</th>
                                <th style="width: 20%">Сумма</th>
                                <th style="width: 20%">Дата создания</th>
                                <th style="width: 20%">Дата изменения</th>
                                <th style="width: 10%">Комментарий</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <?php
                                if($order['status'] == '1'){
                                    $class = 'success';
                                    $text = 'Завершен';
                                }elseif($order['status'] == '2'){
                                    $class = 'info';
                                    $text = 'Оплачен';
                                }else{
                                    $class = '';
                                    $text = 'Новый';
                                }
                                ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order['id'];?></td>
                                    <td><?=$text;?></td>
                                    <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                    <td><?=$order['date'];?></td>
                                    <td><?=$order['update_at'];?></td>
                                    <td><?=$order['note'];?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-danger">Вы пока не совершали заказов...</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
