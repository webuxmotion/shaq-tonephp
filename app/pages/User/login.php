<!-- breadcrumbs -->
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0">
            <a href='<?=siteUrl()?>'>Home</a><span class='mx-2 mb-0'>/</span>
            <strong class='text-black'>Вход</strong>        
        </div>
      </div>
    </div>
</div>  
<!-- END. breadcrumbs -->


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-one login">
                    <div class="register-top heading">
                        <h2>Вход</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="/user/login" id="login" role="form" data-toggle="validator">
                                <div class="form-group has-feedback">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="pasword">Password</label>
                                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Вход</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>