<?php


namespace app\controllers\admin;


use app\models\admin\Product;
use app\models\AppModel;
use core\Tone;
use app\libs\Pagination;

class ProductController extends AdminController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('product');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $products = \R::getAll("
            SELECT product.*, category.title AS cat 
            FROM product
            JOIN category ON category.id = product.category_id 
            LIMIT $start, $perpage
        ");
        $this->set(compact('products', 'pagination', 'count'));
        $this->setMeta('List of products');
    }

    public function addImageAction(){
        if(isset($_GET['upload'])){
            if($_POST['name'] == 'single'){
                $wmax = Tone::$app->getProperty('img_width');
                $hmax = Tone::$app->getProperty('img_height');
            }else{
                $wmax = Tone::$app->getProperty('gallery_width');
                $hmax = Tone::$app->getProperty('gallery_height');
            }
            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            $product = new Product();
            $data = $_POST;
            $product->load($data);

            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';
            $product->attributes['old_price'] = $product->attributes['old_price'] ? $product->attributes['old_price'] : '0';
            $product->getImg();

            if (!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            \R::exec("
                INSERT INTO product (title, category_id, brand_id, alias, keywords, description, price, old_price, content, img) VALUES (?,?,?,?,?,?,?,?,?,?)"
                , [
                    $product->attributes['title'],
                    $product->attributes['category_id'],
                    $product->attributes['brand_id'],
                    password_hash('aaa', PASSWORD_DEFAULT),
                    $product->attributes['keywords'],
                    $product->attributes['description'],
                    $product->attributes['price'],
                    $product->attributes['old_price'],
                    $product->attributes['content'],
                    $product->attributes['img']
                  ]);
            ;

            if ($id = \R::getInsertID()) {
                $product->saveGallery($id);
                $alias = AppModel::createAlias('product', 'alias', $product->attributes['title'], $id);
                $status = $product->attributes['status'];
                $hit = $product->attributes['hit'];

                \R::exec("
                    UPDATE product SET alias=? WHERE id=?"
                    , [$alias, $id]);

                \R::exec("UPDATE `product` SET `status` = '$status', `hit` = '$hit' WHERE `product`.`id` = $id;");

                $product->editFilter($id, $data);
                $product->editRelatedProduct($id, $data);

                $_SESSION['success'] = 'Товар добавлен';
            }

            redirect();
        }

        $this->setMeta('Новый товар');
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = getRequestID(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';
            $product->getImg();
            $db_product = \R::getRow('SELECT title FROM product WHERE id=?', [$id]);
            
            if(!$product->validate($data)){
                $product->getErrors();
                redirect();
            }

            if (isset($product->attributes['img'])) {
                \R::exec("
                    UPDATE product SET title=?, category_id=?, brand_id=?, keywords=?, description=?, price=?, old_price=?, content=?, img=? WHERE id=$id"
                    , [
                        $product->attributes['title'],
                        $product->attributes['category_id'],
                        $product->attributes['brand_id'],
                        $product->attributes['keywords'],
                        $product->attributes['description'],
                        $product->attributes['price'],
                        $product->attributes['old_price'],
                        $product->attributes['content'],
                        $product->attributes['img']
                  ]);
            } else {
                \R::exec("
                    UPDATE product SET title=?, category_id=?, brand_id=?, keywords=?, description=?, price=?, old_price=?, content=? WHERE id=$id"
                    , [
                        $product->attributes['title'],
                        $product->attributes['category_id'],
                        $product->attributes['brand_id'],
                        $product->attributes['keywords'],
                        $product->attributes['description'],
                        $product->attributes['price'],
                        $product->attributes['old_price'],
                        $product->attributes['content']
                  ]);
            }

            $product->editFilter($id, $data);
            $product->editRelatedProduct($id, $data);
            $product->saveGallery($id);

            $status = $product->attributes['status'];
            $hit = $product->attributes['hit'];

            \R::exec("UPDATE `product` SET `status` = '$status', `hit` = '$hit' WHERE `product`.`id` = $id;");

            if ($db_product['title'] != $product->attributes['title']) {
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);

                \R::exec("
                    UPDATE product SET alias=? WHERE id=?"
                    , [$alias, $id]);
            }

            $_SESSION['success'] = 'Изменения сохранены';
            redirect();
        }

        $id = getRequestID();
        $product = \R::load('product', $id);
        Tone::$app->setProperty('parent_id', $product->category_id);
        $filter = \R::getCol('SELECT attr_id FROM attribute_product WHERE product_id = ?', [$id]);
        $related_product = \R::getAll("SELECT related_product.related_id, product.title FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$id]);
        $gallery = \R::getCol('SELECT img FROM gallery WHERE product_id = ?', [$id]);
        $this->setMeta("Редактирование товара {$product->title}");
        $this->set(compact('product', 'filter', 'related_product', 'gallery'));
    }

    public function relatedProductAction(){
        /*$data = [
            'items' => [
                [
                    'id' => 1,
                    'text' => 'Товар 1',
                ],
                [
                    'id' => 2,
                    'text' => 'Товар 2',
                ],
            ]
        ];*/

        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $data['items'] = [];
        $products = \R::getAssoc('SELECT id, title FROM product WHERE title LIKE ? LIMIT 10', ["%{$q}%"]);
        if($products){
            $i = 0;
            foreach($products as $id => $title){
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        echo json_encode($data);
        die;
    }

    public function deleteGalleryAction(){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if(!$id || !$src){
            return;
        }
        if(\R::exec("DELETE FROM gallery WHERE product_id = ? AND img = ?", [$id, $src])){
            @unlink(WWW . "/images/$src");
            exit('1');
        }
        return;
    }
}