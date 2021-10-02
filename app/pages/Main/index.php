<div class="site-blocks-cover" data-aos="fade">
<div class="container">
<div class="row">
    <div class="col-md-6 ml-auto order-md-2 align-self-start">
    <div class="site-block-cover-content">
    <h2 class="sub-title">#New Summer Collection 2019</h2>
    <h1>Santa Cruz</h1>
    <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
    </div>
    </div>
    <div class="col-md-6 order-1 align-self-end">
    <img src="/images/santa-cruz.png" alt="Image" class="img-fluid">
    </div>
</div>
</div>
</div>

<!-- brands -->
<div class="site-section">
      <div class="container">
        <div class="title-section mb-5">
          <h2 class="text-uppercase"><span class="d-block">Most Popular</span> Brands</h2>
        </div>
        <div class="row align-items-stretch">
          
          <div class="col-lg-8">

            <?php foreach ($brands as $brand) : ?>
              
                <div class="product-item sm-height full-height bg-gray">
                  <a href="/category/<?=$brand->alias?>" class="product-category"><?=$brand->title?> <span>25 items</span></a>
                  <img src="/images/brands/<?=$brand->img?>" alt="Image" class="img-fluid">
                </div>
                
            <?php break; endforeach; ?>

          </div>

          <div class="col-lg-4">

            <?php $index = 0; foreach ($brands as $brand) : ?>
              <?php if ($index > 0) : ?>

                <div class="product-item sm-height bg-gray <?=$index === 1 ? 'mb-4' : ''?>">
                  <a href="/category/<?=$brand->alias?>" class="product-category"><?=$brand->title?> <span>25 items</span></a>
                  <img src="/images/brands/<?=$brand->img?>" alt="Image" class="img-fluid">
                </div>

              <?php endif; ?>

              <?php $index++?>
            <?php endforeach; ?>

          </div>
        
        </div>
      </div>
    </div>
<!-- END. brands -->



    

<!-- hits -->   
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="title-section mb-5 col-12">
        <h2 class="text-uppercase">Popular Products</h2>
      </div>
    </div>
    <div class="row">
    
      <?php $curr = \core\Tone::$app->getProperty('currency');?>
      <?php foreach ($hits as $hit) : ?>
        <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="/product/<?=$hit->alias?>" class="product-item md-height bg-gray d-block">
              <img src="/images/products/<?=$hit->img?>" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="/product/<?=$hit->alias?>"><?=$hit->title?> (ID:<?=$hit->id?>)</a></h2>
            <strong class="item-price">
              <?php if ($hit->old_price) : ?>
                <del><?=$curr['symbol_left']?><?=$hit->old_price * $curr['value']?><?=$curr['symbol_right']?></del>
              <?php endif; ?>
              <?=$curr['symbol_left']?><?=$hit->price * $curr['value']?><?=$curr['symbol_right']?>
            </strong>
          </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>
<!-- END. hits -->   

<div class="site-blocks-cover inner-page py-5" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>New Shoes</h1>
            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
            </div>
          </div>
          <div class="col-md-6 order-1 align-self-end">
            <img src="/images/model_6.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

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
              <img src="/images/products/<?=$item->img?>" alt="Image" class="img-fluid">
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

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center mb-5 col-12">
            <h2 class="text-uppercase">Most Rated</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="/images/model_1.png" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Smooth Cloth</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>
                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="/images/prod_3.png" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Blue Shoe High Heels</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>

                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="/images/model_5.png" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Denim Jacket</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>

                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="/images/prod_1.png" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Leather Green Bag</a></h2>
                  <strong class="item-price"><del>$46.00</del> $28.00</strong>
                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item-entry">
                  <a href="#" class="product-item md-height bg-gray d-block">
                    <img src="/images/model_7.png" alt="Image" class="img-fluid">
                  </a>
                  <h2 class="item-title"><a href="#">Yellow Jacket</a></h2>
                  <strong class="item-price">$58.00</strong>
                  <div class="star-rating">
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                    <span class="icon-star2 text-warning"></span>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    