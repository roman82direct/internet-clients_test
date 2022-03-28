<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Request\Request;
use App\Models\Good;
use App\Models\SecondCategory;
use App\Models\MainCategory;


$request = new Request();

switch ($request->action) {
    case 'main':
        $item = (new MainCategory())->get($request->id);
        break;
    case 'second':
        $item = (new SecondCategory())->get($request->id);
        $upper_item = (new MainCategory())::getAll();
        break;
    case 'good':
        $item = (new Good())->get($request->id);
        $upper_item = (new SecondCategory())::getAll();
        break;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internet Clients</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<p>Форма редактирования</p>
<form action="../routes/actions.php" method="POST">
    <fieldset class="createForm">
        <input type="hidden" name="action" value="update<?=$request->action?>"><br>
        <input type="hidden" name="id" value="<?=$item['id']?>"><br>
        <label for="name">name</label>
        <input type="text" name="name" placeholder="<?=$item['name']?>" autofocus>

        <?php if ($request->action == 'good'){?>
            <label for="art">art</label>
            <input type="text" name="art" placeholder="<?=$item['art']?>">
        <?php }?>
        <label for="description">description</label>
        <textarea name="description" placeholder="<?=$item['description']?>"></textarea>

        <?php if (!is_null($upper_item)){?>
            <label for="upper_item">upper_category</label>
            <input name="upper_item_id" list="<upper_item>" placeholder="">
            <datalist id="<upper_item>">
                <?php foreach ($upper_item as $category) {
                    echo ('<option value="'.$category['id'].'">'.'-'.$category['name'].'</option>');
                } ?>
            </datalist>
        <?php }?>

    </fieldset>
    <input type="submit" value="Update">
</form>

<script src="js/script.js"></script>
</body>
</html>
