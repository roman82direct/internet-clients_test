<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Models\MainCategory;
use App\Models\SecondCategory;

$main_categories = (new MainCategory())::getAll();
$second_categories = (new SecondCategory())::getAll();
?>

<section style="display: <?=($user['role'] == 'admin') ? 'block' : 'none'?>" class="p-4 main">
    <div id="resp-block">This is main SECTION. Welcome, <?=$user['name'].' Access: '. $user['role']?> </div>

    <div>
        <h5>Форма загрузки Main Categories</h5>
        <div>
            <form action="../routes/actions.php" method="POST">
                <fieldset style="border: none; width: 500px; margin: 0 auto; padding: 0px">
                    <input type="hidden" name="action" value="main"><br>
                    <input type="text" name="name" placeholder="Название" autofocus>
                    <textarea name="description" placeholder="Описание"></textarea>
                    <input type="submit" value="Добавить">
                </fieldset>
            </form>
        </div>
    </div>

    <div>
        <h5>Форма загрузки Second Categories</h5>
        <div>
            <form action="../routes/actions.php" method="POST">
                <fieldset style="border: none; width: 500px; margin: 0 auto; padding: 0px">
                    <input type="hidden" name="action" value="second">
                    <input type="text" name="name" placeholder="Название" autofocus>
                    <textarea name="description" placeholder="Описание"></textarea>
                    <input type="text" name="main_category_id" placeholder="Выберите главную категорию">
                    <?php foreach ($main_categories as $main_category) {
                        echo '</br>'.$main_category['name']. ' ID: '. $main_category['id'].'</br>';
                    } ?>
                    <input type="submit" value="Добавить">
                </fieldset>
            </form>
        </div>
    </div>

    <div>
        <h5>Форма загрузки Товаров</h5>
        <div>
            <form action="../routes/actions.php" method="POST">
                <fieldset style="border: none; width: 500px; margin: 0 auto; padding: 0px">
                    <input type="hidden" name="action" value="good"><br>
                    <input type="text" name="name" placeholder="Название" autofocus>
                    <input type="text" name="art" placeholder="Артикул">
                    <textarea name="description" placeholder="Описание"></textarea>
                    <input type="text" name="main_category_id" placeholder="Выберите главную категорию">
                    <?php foreach ($main_categories as $main_category) {
                        echo '</br>'.$main_category['name']. ' ID: '. $main_category['id'].'</br>';
                    } ?>
                    <input type="text" name="second_category_id" placeholder="Выберите категорию второго уровня">
                    <?php foreach ($second_categories as $category) {
                        echo '</br>'.$category['name']. ' ID: '. $category['id'].'</br>';
                    } ?>
                    <input type="submit" value="Добавить">
                </fieldset>
            </form>
        </div>
    </div>

</section>
