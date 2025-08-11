<?php
require "Layouts/Header.php";
?>
<div id="main-wrapper" class="oxyy-login-register">
    <div class="hero-wrap min-vh-100">
        <div class="hero-mask opacity-4 bg-secondary"></div>
        <div class="hero-content d-flex min-vh-100">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-md-9 col-lg-7 col-xl-5 mx-auto">
                        <div class="hero-wrap rounded shadow-lg p-4 py-sm-5 px-sm-5 my-4">
                            <div class="hero-mask opacity-9 bg-dark"></div>
                            <div class="hero-content">
                                <div class="logo mb-4"> <a class="d-flex justify-content-center" href="/admin" title="login"><h2 class="text-white text-bold">صفحه لاگین</h2></a></div>
                                <?php
                                if (isset($_SESSION["fail"]) and !empty($_SESSION["fail"])) {
                                ?>
                                    <div class="alert alert-danger"><?= $_SESSION["fail"] ?></div>
                                <?php
                                    unset($_SESSION["fail"]);
                                }
                                ?>
                                <form action="/admin" class="form-dark" method="POST">
                                    <div class="form-group icon-group">
                                        <input type="email" name="email" class="form-control" id="email" required placeholder="آدرس ایمیل">
                                        <span class="icon-inside"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <div class="form-group icon-group">
                                        <input type="password" name="password" class="form-control" id="password" required placeholder="رمز عبور">
                                        <span class="icon-inside"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                                    <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">ورود</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <?php
            require "Layouts/Footer.php";
            ?>