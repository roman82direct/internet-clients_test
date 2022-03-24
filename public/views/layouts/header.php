<header>
    <div>
        <div id="header">
            <div style="display: <?=($user) ? 'none' : 'block'?>" id="authBlock">
                <button class="openModal" data-modal="signIn">Register</button>
                <button class="openModal" data-modal="logIn">Log In</button>
            </div>

            <div id="authUser" style="">
                <p id="userName"><?php echo($user['name'])?></p>
                <a style="display: <?=(!$user) ? 'none' : 'block'?>" href="../routes/auth.php?action=logout" id="logoutBtn"class="">Log Out</a>
            </div>
        </div>

        <!-- Modal -->
<!--        register-->
        <? include_once('views/layouts/components/sign.html')  ?>
<!--        Log In-->
        <? include_once('views/layouts/components/log.html')  ?>

    </div>
</header>

