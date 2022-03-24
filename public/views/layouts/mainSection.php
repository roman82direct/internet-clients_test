
<section class="p-4 main">
    <div id="resp-block">This is main SECTION. Welcome, <?=$user['name'].' Access: '. $user['role']?> </div>

    <div>
        <h5>Форма загрузки Main Categories</h5>
        <div>
            <form action="../routes/categories.php" method="POST">
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
            <form action="../routes/categories.php" method="POST">
                <fieldset style="border: none; width: 500px; margin: 0 auto; padding: 0px">
                    <input type="hidden" name="action" value="second"><br>
                    <input type="text" name="name" placeholder="Название" autofocus>
                    <textarea name="description" placeholder="Описание"></textarea>
                    <input name="mainCategory" list="mainCategories" placeholder="Выберите главную категорию">
                    <datalist id="mainCategories">
                        <option value="Internet Explorer">
                        <option value="Firefox">
                    </datalist>
                    <input type="submit" value="Добавить">
                </fieldset>
            </form>
        </div>
    </div>

    <div>
        <h5>Форма загрузки Товаров</h5>
        <div>
            <form action="../routes/good.php" method="POST">
                <fieldset style="border: none; width: 500px; margin: 0 auto; padding: 0px">
                    <input type="text" name="name" placeholder="Название" autofocus>
                    <textarea name="description" placeholder="Описание"></textarea>
                    <input name="mainCategory" list="mainCategories" placeholder="Выберите главную категорию">
                    <datalist id="mainCategories">
                        <option value="Internet Explorer">
                        <option value="Firefox">
                    </datalist>

                    <input name="secondCategory" list="secondCategories" placeholder="Выберите категорию второго уровня">
                    <datalist id="secondCategories">
                        <option value="Internet Explorer">
                        <option value="Firefox">
                    </datalist>


                    <input type="submit" value="Добавить">
                </fieldset>
            </form>
        </div>
    </div>


</section>
