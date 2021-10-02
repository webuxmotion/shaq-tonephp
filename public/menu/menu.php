<?php $parent = isset($category['childs']);?>
<li <?=$parent ? 'class="has-children"' : '';?>>
    <a href="/category/<?=$category['alias'];?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul class="dropdown">
            <?= $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>