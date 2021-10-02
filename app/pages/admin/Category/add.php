<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список категорий
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN?>/category"><i class="fa fa-dashboard"></i> Список категорий</a></li>
        <li class="active"><i class="fa fa-shopping-cart"></i> Новая категория</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/category/add" method="POST" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Наименование категории</label>
                            <input
                                    name="title"
                                    type="text"
                                    class="form-control"
                                    placeholder="Наименование категории"
                                    id="title"
                                    required>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Родительская категория</label>
                            <div>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cacheTime' => 0,
                                    'cacheKey' => 'admin_select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'parent_id',
                                        'id' => 'parent_id'
                                    ],
                                    'prepend' => '<option value="0">Самостоятельная категория</option>'
                                ]);?>
                            </div>

                        </div>
                        <div class="form-group has-feedback">
                            <label for="keywords">Ключевые слова</label>
                            <input
                                    name="keywords"
                                    type="text"
                                    class="form-control"
                                    placeholder="Ключевые слова"
                                    id="keywords">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="description">Описание</label>
                            <input
                                    name="description"
                                    type="text"
                                    class="form-control"
                                    placeholder="Описание"
                                    id="description">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->