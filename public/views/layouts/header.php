<header>
    <div>
        <div id="header">
            <div id="authBlock">
                <button class="openModal" data-modal="signIn">Register</button>
                <button class="openModal" data-modal="logIn">Log In</button>
            </div>

            <div id="authUser" style="display: none">
                <p id="userName"></p>
                <button id="logoutBtn" type="button" class="">
                    Log Out
                </button>
            </div>
        </div>

        <!-- Modal -->
<!--        register-->
        <? include_once('views/layouts/components/sign.html')  ?>
<!--        Log In-->
        <? include_once('views/layouts/components/log.html')  ?>

    </div>
</header>
