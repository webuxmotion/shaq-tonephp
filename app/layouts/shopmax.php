<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if (!empty($canonical)) :?>
      <link rel="canonical" href="<?=$canonical?>" />
    <?php endif; ?>
    <?=$this->getMeta()?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />


    <link rel="stylesheet" href="/css/aos.css">

    <link rel="stylesheet" href="/css/style.css">

  </head>
  <body>

  <div class="site-wrap">


    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="/search" method="get" autocomplete="off">
            <input type="text" name="s" class="form-control js-typeahead" placeholder="Search keyword and hit enter...">
            <button>Search</button>
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="<?=siteUrl()?>" class="js-logo-clone">Bshop</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">

            <nav class="site-navigation text-right text-md-center" role="navigation">
              <?php new \Menu([
                'tpl' => WWW . '/menu/menu.php',
                'class' => 'site-menu js-clone-nav d-none d-lg-block',
                'attrs' => [
                  'data-menu-type' => 'header-menu'
                ],
                'upend' => '
                  <li><a href="/new-arrivals">New Arrivals</a></li>
                  <li><a href="/contact">Contact</a></li>'
              ]);?>
            </nav>
          </div>
          <div class="icons">
            <div class="btn-group">
                <a class="dropdown-toggle" data-toggle="dropdown">Account</a>
                <ul class="dropdown-menu">
                  <?php if (!empty($_SESSION['user'])) : ?>
                    <li>Welcome, <?=h($_SESSION['user']['name'])?></li>
                    <li><a href="/user/cabinet">Profile</a></li>
                    <li><a href="/user/logout">Logout</a></li>
                  <?php else: ?>
                    <li><a href="/user/login">Login</a></li>
                    <li><a href="/user/signup">Registration</a></li>
                  <?php endif; ?>

                </ul>
            </div>
            <?php new \Currency();?>
            <?php new \Lang();?>
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="/cart/view" onclick="getCart(); return false;" class="icons-btn d-inline-block bag js-header-cart c-header-cart <?=empty($_SESSION['cart']) ? 'is-empty' : '';?>">
              <span class="icon-shopping-bag"></span>
              <span class="number js-cart-total c-header-cart__number">
                <?php if (!empty($_SESSION['cart'])) : ?>
                  <?=$_SESSION['cart.qty']?>
                <?php endif; ?>
              </span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?=$this->component('session-messages'); ?>
            </div>
        </div>
    </div>
    <?=$content;?>

    <footer class="site-footer custom-border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="/images/about_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Shirts This Summer</h3>
              <p>Promo from  July 15 &mdash; 25, 2019</p>
            </a>
          </div>
          <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Quick Links</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <div class="preloader"><img src="/images/ring.svg" alt=""></div>

  <!-- Modal -->
  <div class="modal" id="cart-modal" style="z-index: 2000;" tabindex="-1" role="dialog"></div>



  <script>
    var path = '<?=siteUrl();?>',
        course = <?=$curr['value'];?>,
        symboleLeft = '<?=$curr['symbol_left'];?>',
        symboleRight = '<?=$curr['symbol_right'];?>';
  </script>
  <!-- END. Modal -->
  <script src="/js/global-functions.js"></script>
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/validator.min.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/aos.js"></script>
  <script defer src="/js/jquery.flexslider.js"></script>
  <script src="/js/typeahead.bundle.js"></script>

  <script src="/js/main.js"></script>

  </body>
</html>
