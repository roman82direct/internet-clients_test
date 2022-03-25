<?php

session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Request\Request;
use App\Models\Good;
use App\Models\SecondCategory;

$request = new Request();
$method = $_SERVER['REQUEST_METHOD'];

$good = (new Good())-> get($request->id);
$second_categories = (new SecondCategory())::getAll();

?>

    <p>Форма редактирования Товаров</p>
    <form action="../routes/actions.php" method="POST">
        <fieldset class="createForm">
            <input type="hidden" name="action" value="updategood"><br>
            <input type="hidden" name="id" value="<?=$good['id']?>"><br>
            <label for="name">name</label>
            <input type="text" name="name" placeholder="<?=$good['name']?>" autofocus>
            <label for="art">art</label>
            <input type="text" name="art" placeholder="<?=$good['art']?>">
            <label for="description">description</label>
            <textarea name="description" placeholder="<?=$good['description']?>"></textarea>
            <label for="second_category_id">second_category_id</label>
            <input name="second_category_id" list="<second_category>" placeholder="<?=$good['second_category_id']?>">
            <datalist id="<second_category>">
                <?php foreach ($second_categories as $second_category) {
                    echo ('<option value="'.$second_category['id'].'">');
                } ?>
            </datalist>
        </fieldset>
        <input type="submit" value="Update">
    </form>
