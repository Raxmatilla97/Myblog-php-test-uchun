<?PHP if (count($errMsg) > 0): ?>
    <div style="text-align: center; width: 100%" class="alert alert-danger">
    <h2>Xatolik mavjud!</h2>
        <?php foreach($errMsg as $key):?>
            <li><?=$key?></li>
            <?php endforeach ?>
        </div>
<?php endif ?>