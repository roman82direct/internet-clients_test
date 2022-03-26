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
    <div class="treeViewer">
        <ul>
            <?php foreach ($main_categories as $main_category) { ?>
                <li>
                    <div class="listItem">
                        <p class="mainListName" data-id="<?=$main_category['id']?>"> <?php echo $main_category['name'];?></p>

                        <?php $second_all = (new SecondCategory())->getByMainId($main_category['id']);

                        if ($second_all){?>
                            <a class="mainPlus link" data-id="<?=$main_category['id']?>" href=""> + </a>
                        <?php }?>
                    </div>

                    <div id="descrMainBlock_<?=$main_category['id']?>" class="none"><?= $main_category['description'] ?></div>

                    <?php if ($user['role'] == 'admin') {?>
                        <a href="../routes/actions.php?action=main&id=<?=$main_category['id']?>">Удалить</a>
                    <?php }?>

                    <ul>
                        <?php foreach ($second_all as $item) {?>
                            <li class="secondList none" data-target="second_<?=$main_category['id']?>">
                                <div class="listItem">
                                    <p class="secondListName" data-id="<?=$item['id']?>"><?php echo $item['name'];?></p>

                                    <?php $goods_all = (new Good())->getByCategorieId($item['id']);

                                    if ($goods_all){?>
                                        <a class="secondPlus link" data-id="<?=$item['id']?>" href=""> + </a>
                                    <?php }?>
                                </div>

                                <div id="descrSecondBlock_<?=$item['id']?>" class="none"><?= $item['description'] ?></div>

                                <?php if ($user['role'] == 'admin') {?>
                                    <a href="../routes/actions.php?action=second&id=<?=$item['id']?>">Удалить</a>
                                <?php }?>

                                <ul>
                                    <?php foreach ($goods_all as $good) { ?>
                                        <li class="goodList none" data-target="good_<?=$item['id']?>">
                                            <div class="">
                                                <p class="goodName" data-id="<?=$good['id']?>" ><?php echo $good['name'];?></p>

                                                <div id="descrGoodBlock_<?=$good['id']?>" class="none"><?= $good['description'] ?></div>

                                                <?php if ($user['role'] == 'admin') {?>
                                                    <a href="../routes/actions.php?action=good&id=<?=$good['id']?>">Удалить</a>
                                                    <a href="editor.php?action=updategood&id=<?=$good['id']?>">Редактировать</a>
                                                <?php }?>
                                            </div>

                                        </li>
                                    <?php }?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php }?>
        </ul>
        <article>
            <p id="descView"></p>
        </article>
    </div>
</section>
<hr>

<?php include_once ('adminSection.php')?>
