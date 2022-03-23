<?php
session_start();
//$_SESSION['session_id'] = 'session_id: '.rand(1, 1000);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internet Clients</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <? include_once('views/layouts/header.php')  ?>

    <section id="main" class="p-4 main">
        <div id="resp-block"></div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>
