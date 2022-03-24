<header>
    <div>
        <div id="header">
            <div id="authBlock">
                <button class="openModal" data-modal="signIn">Register</button>
                <button class="openModal" data-modal="logIn">Log In</button>
            </div>

            <div id="authUser" style="">
                <p id="userName"><?php echo($_SESSION['user_id'])?></p>
                <a href="../routes/auth.php?action=logout" id="logoutBtn"class="">Log Out</a>
            </div>
        </div>

        <!-- Modal -->
<!--        register-->
        <? include_once('views/layouts/components/sign.html')  ?>
<!--        Log In-->
        <? include_once('views/layouts/components/log.html')  ?>

    </div>
</header>

