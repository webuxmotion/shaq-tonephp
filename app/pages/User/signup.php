<!-- breadcrumbs -->
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0">
            <a href='<?=siteUrl()?>'>Home</a><span class='mx-2 mb-0'>/</span>
            <strong class='text-black'>Регистрация</strong>        
        </div>
      </div>
    </div>
</div>  
<!-- END. breadcrumbs -->

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>REGISTER</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form data-toggle="validator" method="post" action="/user/signup" id="signup" role="form">
                                <div class="form-group has-feedback">
                                    <label for="login">Login</label>
                                    <input 
                                        type="text" 
                                        name="login" 
                                        class="form-control" 
                                        id="login" 
                                        value="<?=h($form_login);?>" 
                                        placeholder="Login" 
                                        data-error="Это обязательное поле"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="pasword">Password</label>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        class="form-control" 
                                        id="pasword" 
                                        placeholder="Password"
                                        data-error="Пароль должен быть больше 6 символов"
                                        data-minlength="6"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        class="form-control" 
                                        id="name" 
                                        value="<?=h($form_name);?>" 
                                        placeholder="Имя"
                                        data-error="Нам важно знать, как вас зовут"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        class="form-control" 
                                        id="email" 
                                        value="<?=h($form_email);?>" 
                                        placeholder="Email"
                                        data-error="Введите правильный email"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input 
                                        type="text" 
                                        name="address" 
                                        class="form-control" 
                                        id="address" 
                                        value="<?=h($form_address);?>" 
                                        placeholder="Address"
                                        data-error="Это обязательное поле"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Зарегистрировать</button>
                            </form>
                            <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>