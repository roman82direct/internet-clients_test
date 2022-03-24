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
    <?php
    foreach ($main_categories as $main_category){
        echo '</br>'.$main_category['name'].' id = '.$main_category['id'].
            '<a href="../routes/actions.php?action=main&id='.$main_category['id'].'">Удалить</a>'. '</br>';

            foreach ((new SecondCategory())->getByMainId($main_category['id']) as $second_category){
                echo '_ _ _'.$second_category['name'].' id = '.$second_category['id'].
                    '<a href="../routes/actions.php?action=second&id='.$second_category['id'].'">Удалить</a>'.'</br>';

                foreach ((new Good())->getByCategorieId($second_category['id']) as $item){
                        echo '_ _ _ _ _'.$item['name'].' id = '.$item['id'].
                            '<a href="../routes/actions.php?action=good&id='.$item['id'].'">Удалить</a>'.'</br>';
                }
            }
    }

    ?>
</section>

<section style="display: <?=($user['role'] == 'admin') ? 'block' : 'none'?>">
    <div>
        <h5>Форма загрузки Main Categories</h5>
        <div>
            <form action="../routes/actions.php" method="POST">
                <fieldset class="createForm">
                    <input type="hidden" name="action" value="main"><br>
                    <input type="text" name="name" placeholder="Название" autofocus>
                    <textarea name="description" placeholder="Описание"></textarea>
                </fieldset>
                <input type="submit" value="Добавить">
            </form>
        </div>
    </div>

    <div>
        <h5>Форма загрузки Second Categories</h5>
        <div>
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
        </div>
    </div>

    <div>
        <h5>Форма загрузки Товаров</h5>
        <div>
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
        </div>
    </div>

</section>
