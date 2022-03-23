<header>
    <div>
        <div id="header">
            <div>
                <p><?php echo $_SESSION['session_id']?></p>
            </div>
            <div id="authBlock">
                <button style="margin-right: 15px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    Register
                </button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Log In
                </button>
            </div>

            <div id="authUser" style="display: none">
                <p id="userName"></p>
                <button id="logoutBtn" type="button" class="btn btn-secondary">
                    Log Out
                </button>
            </div>
        </div>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-auto">
                                <label for="staticName2" class="sr-only">Name</label>
                                <input type="text" class="form-control" id="staticName2">
                            </div>
                            <div class="col-auto">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                <input type="text" class="form-control" id="staticEmail2" value="email@example.com">
                            </div>
                            <div class="col-auto">
                                <label for="inputPassword2" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="authButton" class="btn btn-primary">Регистрация</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-auto">
                                <label for="staticEmail1" class="sr-only">Email</label>
                                <input type="text" class="form-control" id="staticEmail1">
                            </div>
                            <div class="col-auto">
                                <label for="inputPassword1" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="loginButton" class="btn btn-primary">Вход</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div id="login"></div>
        </div>
    </div>
</header>
