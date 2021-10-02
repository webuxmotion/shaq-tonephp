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

<!-- one product -->
<?php 
    $curr = \core\Tone::$app->getProperty('currency');
    $cats = \core\Tone::$app->getProperty('cats');
    $category = $cats[$product['category_id']];
?>
<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="item-entry">

            <?php if($gallery): ?>
                <div class="flexslider">
                    <ul class="slides">
                        <?php foreach($gallery as $item): ?>
                        <li data-thumb="/images/<?=$item->img;?>">
                            <div class="thumb-image"> <img src="/images/<?=$item->img;?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php else: ?>
                <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="/images/<?=$product->img;?>" alt="Image" class="img-fluid">
                </a>
            <?php endif; ?>
            
        </div>

        </div>
        <div class="col-md-6">
        <h2 class="text-black"><?=$product->title;?></h2>
        <?=$product->content;?>
        <p>
        Category - <a href="/category/<?=$category['alias']?>"><?=$category['title']?></a>
        </p>
        <p>
            <?php if ($product->old_price) : ?>
                <del><?=$curr['symbol_left']?><?=$product->old_price * $curr['value']?><?=$curr['symbol_right']?></del>
            <?php endif; ?>
            <strong class="text-primary h4" >
            <?=$curr['symbol_left']?><span class="js-base-price" data-base-price="<?=$product->price * $curr['value']?>"><?=$product->price * $curr['value']?></span><?=$curr['symbol_right']?>
            </strong>
        </p>
        <div class="mb-5">
            <h3>Модификации:</h3>
            <?php if ($mods) :?>
                <label>Цвет</label>
                <select class="js-product-select-color">
                    <option value="">Выбрать цвет</option>
                    <?php foreach ($mods as $mode_item) :?>
                    <option data-title="<?=$mode_item->title?>" data-price="<?=$mode_item->price * $curr['value']?>" value="<?=$mode_item->id?>"><?=$mode_item->title?></option>
                    <?php endforeach;?>  
                </select>
            <?php endif;?>  
            
        </div>
        <div class="mb-1 d-flex">
            <label for="option-sm" class="d-flex mr-3 mb-3">
            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
            </label>
            <label for="option-md" class="d-flex mr-3 mb-3">
            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
            </label>
            <label for="option-lg" class="d-flex mr-3 mb-3">
            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
            </label>
            <label for="option-xl" class="d-flex mr-3 mb-3">
            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
            </label>
        </div>
        <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" class="js-quantity-input form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
        </div>

        </div>
        <p><a id="productAdd" data-id="<?=$product->id?>" href="/cart/add?id=<?=$product->id?>" class="js-add-to-cart buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p>

        </div>
    </div>
    </div>
</div>
<!-- END. one product -->

<?php if ($viewed) : ?>
<!-- viewed -->   
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="title-section mb-5 col-12">
        <h2 class="text-uppercase">Recently Viewed</h2>
      </div>
    </div>
    <div class="row">
    
      <?php $curr = \core\Tone::$app->getProperty('currency');?>
      <?php foreach ($viewed as $item) : ?>
        <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="/product/<?=$item->alias?>" class="product-item md-height bg-gray d-block">
              <img src="/images/<?=$item->img?>" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="/product/<?=$item->alias?>"><?=$item->title?> (ID:<?=$item->id?>)</a></h2>
            <strong class="item-price">
              <?php if ($item->old_price) : ?>
                <del><?=$curr['symbol_left']?><?=$item->old_price * $curr['value']?><?=$curr['symbol_right']?></del>
              <?php endif; ?>
              <?=$curr['symbol_left']?><?=$item->price * $curr['value']?><?=$curr['symbol_right']?>
            </strong>
          </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>
<!-- END. viewed -->  
<?php endif; ?>

<?php if ($related) : ?>
<!-- related products -->
<div class="site-section block-3 site-blocks-2">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Related Products</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 block-3">
        <div class="nonloop-block-3 owl-carousel">

            <?php foreach ($related as $item) : ?>
            <div class="item">
            <div class="item-entry">
                <a href="/product/<?=$item['alias']?>" class="product-item md-height bg-gray d-block">
                <img src="/images/<?=$item['img']?>" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="/product/<?=$item['alias']?>"><?=$item['title']?></a></h2>
                <strong class="item-price">
                    <?php if ($item['old_price']) : ?>
                    <del><?=$curr['symbol_left']?><?=$item['old_price'] * $curr['value']?><?=$curr['symbol_right']?></del>
                    <?php endif; ?>
                    <?=$curr['symbol_left']?><?=$item['price'] * $curr['value']?><?=$curr['symbol_right']?>
                </strong>
                <div class="star-rating">
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                </div>
            </div>
            </div>
            <?php endforeach; ?>

        </div>
        </div>
    </div>
    </div>
</div>
<!-- END. featured products -->
<?php endif; ?>