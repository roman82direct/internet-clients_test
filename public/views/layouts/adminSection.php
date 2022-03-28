<?php ?>

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
            <input name="upper_item_id" list="<main_category>" placeholder="Выберите главную категорию">
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

            <input name="upper_item_id" list="<second_category>" placeholder="Выберите категорию второго уровня">
            <datalist id="<second_category>">
                <?php foreach ($second_categories as $second_category) {
                    echo ('<option value="'.$second_category['id'].'">');
                } ?>
            </datalist>
        </fieldset>
        <input type="submit" value="Добавить">
    </form>
</section>
