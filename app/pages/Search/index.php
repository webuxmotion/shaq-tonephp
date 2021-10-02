<!-- breadcrumbs -->
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0">
            <a href='<?=siteUrl()?>'>Home</a><span class='mx-2 mb-0'>/</span>
            <strong class='text-black'><?=h($query)?></strong>        
        </div>
      </div>
    </div>
</div>  
<!-- END. breadcrumbs -->

<!-- products -->   
<div class="site-section">
  <div class="container">
    <div class="row">
    
      <?php $curr = \core\Tone::$app->getProperty('currency');?>
      <?php foreach ($products as $product) : ?>
        <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="/product/<?=$product->alias?>" class="product-item md-height bg-gray d-block">
              <img src="/images/products/<?=$product->img?>" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="/product/<?=$product->alias?>"><?=$product->title?> (ID:<?=$product->id?>)</a></h2>
            <strong class="item-price">
              <?php if ($product->old_price) : ?>
                <del><?=$curr['symbol_left']?><?=$product->old_price * $curr['value']?><?=$curr['symbol_right']?></del>
              <?php endif; ?>
              <?=$curr['symbol_left']?><?=$product->price * $curr['value']?><?=$curr['symbol_right']?>
            </strong>
          </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>
<!-- END. products --> 