<?php
session_start();
//$_SESSION['session_id'] = 'session_id: '.rand(1, 1000);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test MVC</title>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

<? include_once('views/layouts/header.php')  ?>

    <section id="main" class="p-4 main">
        <button style="display: none" id="button" type="button" class="btn btn-success mt-5">...Нажми</button>
        <button style="display: none" id="showUsers" type="button" class="btn btn-primary mt-5">All Users...</button>
        <div id="resp-block"></div>
    </section>

<? include_once('views/layouts/footer.php')  ?>

   <script src="js/script.js"></script>
</body>
</html>
