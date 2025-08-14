<?php

namespace App\controller\Admin;

use Core\Controller;
use App\model\AdminModel;
use App\Model\ArticleModel;
use App\Model\CoursesModel;
use App\model\FeedbackModel;
use App\Model\UsersModel;

class AdminController extends Controller
{
 
    public function login()
    {
        view("Admin/Login");
    }
    public function auth()
    {
        if (isset($_POST["email"]) and !empty($_POST["email"]) and isset($_POST["password"]) and !empty($_POST["password"])) {
            $admin = AdminModel::find_by_email($_POST["email"]);
            if ($admin and password_verify($_POST["password"], $admin["password"])) {
                AdminModel::update($admin["id"], ["last_login" => time(), "last_ip" => ip()]);
                $_SESSION["MyAdminAuth"] = $admin;
                redirect("/admin/dashboard");
            } else {
                $_SESSION["fail"] = "اطلاعات کاربری اشتباه است.";
                redirect("/admin");
            }
        } else {
            $_SESSION["fail"] = "تکمیل کردن کلیه موارد الزامی است.";
            redirect("/admin");
        }
    }

    public function logout()
    {
        $_SESSION["MyAdminAuth"] = NULL;
        unset($_SESSION["MyAdminAuth"]);
        redirect("/admin");
    }

    public function dashboard()
    {
        $blog_info = ArticleModel::select(["id","title","date","author"]);
        $blogCount = ArticleModel::countAll();
        $courseCount = CoursesModel::countAll();
        $feedbackCount = FeedbackModel::countAll();
        $usersCount = UsersModel::countAll();
        view("/admin/dashboard", compact("blog_info" , "blogCount" , "courseCount" , "feedbackCount" , "usersCount" ));

    }



    
}
