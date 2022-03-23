<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoloader.php');

use App\Models\User;
use App\Models\Good;

$user = new User($_GET['user'],'', 'user','123');

$good = new Good();
$good->setName('STORY');

echo '<div class="resp">
        <h1>'.$user->getName().'</h1>
        <h3>'.$_SERVER['DOCUMENT_ROOT'].'</h3>
        <h5>'.$good->getName().'</h5>
        <p>'.$data = date('d:m:Y').'</p>
      </div>';
