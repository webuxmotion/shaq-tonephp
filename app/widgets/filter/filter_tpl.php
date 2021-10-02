<?php foreach($this->groups as $group_id => $group_item): ?>

    <?php if (isset($this->attrs[$group_id])) : ?>

        <div class="border p-4 rounded mb-4">
            <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block"><?=$group_item;?></h3>

                <?php foreach($this->attrs[$group_id] as $attr_id => $value): ?>
                    <?php 
                        $checked = null;
                        if (!empty($filter) && in_array($attr_id, $filter)) {
                            $checked = 'checked';
                        }
                    ?>
                    <label for="<?=$attr_id;?>" class="d-flex">
                        <input 
                            type="checkbox" 
                            name="checkbox" 
                            id="<?=$attr_id;?>" 
                            value="<?=$attr_id;?>" 
                            class="mr-2 mt-1"
                            <?=$checked;?>> <span class="text-black"><?=$value;?></span>
                    </label>
                <?php endforeach; ?>

            </div>
        </div>

    <?php endif; ?>
    
<?php endforeach; ?>

