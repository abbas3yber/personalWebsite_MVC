<?php

namespace App\middleware;

class AdminAuthMiddleware {

    public function handle() {
        if (isset($_SESSION["MyAdminAuth"]) AND !empty($_SESSION["MyAdminAuth"])) {
            return true;
        } else {
            return redirect("/admin");
        }
    }

}