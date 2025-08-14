<?php 

namespace App\ErrorController;

use Core\Controller;

class ErrorController extends Controller {

    public function notFound()
    {
        http_response_code(404);
        view("/errors/404");
    }

}



?>