<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Models\MainCategory;
use App\Models\SecondCategory;
use App\Models\Good;

$main_categories = (new MainCategory())::getAll();
$second_categories = (new SecondCategory())::getAll();
$goods = (new Good())::getAll();
?>
<section>
    <ul>
        <?php foreach ($main_categories as $main_category) { ?>
            <li><?php echo $main_category['name'];
            $second_all = (new SecondCategory())->getByMainId($main_category['id']);
            if ($second_all){?>
                <a class="mainLi link" data-main="<?=$main_category['id']?>" href=""> + </a>
                <?php }?>

                <?php if ($user['role'] == 'admin') {?>
                    <a href="../routes/actions.php?action=main&id=<?=$main_category['id']?>">Удалить</a>
                <?php }?>
                <ul>
                    <?php foreach ($second_all as $item) {?>
                    <li class="secondLi hidden" data-target="second_<?=$main_category['id']?>"><?php echo $item['name'];
                        $goods_all = (new Good())->getByCategorieId($item['id']);
                        if ($goods_all){?>
                        <a class="secondlink link" data-second="<?=$item['id']?>"  data-main="<?=$main_category['id']?>" href=""> + </a>
                        <?php }?>

                        <?php if ($user['role'] == 'admin') {?>
                        <a href="../routes/actions.php?action=second&id=<?=$item['id']?>">Удалить</a>
                        <?php }?>
                        <ul>
                            <?php foreach ($goods_all as $good) { ?>
                            <li class="goodLi hidden" data-target="good_<?=$item['id']?>">
                                <?php echo $good['name']; ?>
                                <?php if ($user['role'] == 'admin') {?>
                                    <a href="../routes/actions.php?action=good&id=<?=$good['id']?>">Удалить</a>
                                    <a href="editor.php?action=updategood&id=<?=$good['id']?>">Редактировать</a>
                                <?php }?>
                            </li>
                            <?php }?>
                        </ul>

                    </li>
                    <?php } ?>
                </ul>
            </li>
        <?php }?>
    </ul>
</section>

<section class="adminSection" style="display: <?=($user['role'] == 'admin') ? 'block' : 'none'?>">
    <h3 style="text-align: center">Admin dashboard</h3>
    <p>Форма загрузки Main Categories</p>
    <form action="../routes/actions.php" method="POST">
        <fieldset class="createForm">
            <input type="hidden" name="action" value="main"><br>
            <input type="text" name="name" placeholder="Название" autofocus>
            <textarea name="description" placeholder="Описание"></textarea>
        </fieldset>
        <input type="submit" value="Добавить">
    </form>

    <p>Форма загрузки Second Categories</p>
    <form action="../routes/actions.php" method="POST">
        <fieldset class="createForm">
            <input type="hidden" name="action" value="second">
            <input type="text" name="name" placeholder="Название" autofocus>
            <textarea name="description" placeholder="Описание"></textarea>
            <input name="main_category_id" list="<main_category>" placeholder="Выберите главную категорию">
            <datalist id="<main_category>">
                <?php foreach ($main_categories as $main_category) {
                    echo ('<option value="'.$main_category['id'].'">');
                } ?>
            </datalist>
        </fieldset>
        <input type="submit" value="Добавить">
    </form>

    <p>Форма загрузки Товаров</p>
    <form action="../routes/actions.php" method="POST">
        <fieldset class="createForm">
            <input type="hidden" name="action" value="good"><br>
            <input type="text" name="name" placeholder="Название" autofocus>
            <input type="text" name="art" placeholder="Артикул">
            <textarea name="description" placeholder="Описание"></textarea>

            <input name="second_category_id" list="<second_category>" placeholder="Выберите категорию второго уровня">
            <datalist id="<second_category>">
                <?php foreach ($second_categories as $second_category) {
                    echo ('<option value="'.$second_category['id'].'">');
                } ?>
            </datalist>
        </fieldset>
        <input type="submit" value="Добавить">
    </form>
</section>
