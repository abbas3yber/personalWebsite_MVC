<?php

namespace App\controller;

use App\Model\ArticleModel;
use App\Model\BlogComment;
use Core\Controller;
use App\model\FeedbackModel;

class HomeController extends Controller
{
    public function index()
    {
        // $blogs = ArticleModel::select();
        $lastBlogs = ArticleModel::getLatestArticles();
        view("home", compact("lastBlogs"));
    }

        public function singleBloge($id)
    {
        $data = ArticleModel::find($id);
        $comments = BlogComment::selectWhere("blog_id", $id);
        view("Blog", compact("data" , "comments"));
    }

    public function feedback()
    {
        if (isset($_POST["name"]) and !empty($_POST["name"]) and isset($_POST["email"]) and !empty($_POST["email"]) and isset($_POST["message"]) and !empty($_POST["message"])) {
            $data = ["name" => $_POST["name"], "email" => $_POST["email"], "message" => $_POST["message"], "ip" => ip(), "time" => time()];
            if (FeedbackModel::insert($data)) {
                $_SESSION["success"] = "پیام شما با موفقیت ثبت گردید.";
            } else {
                $_SESSION["fail"] = "خطا در ثبت پیام!";
            }
        } else {
            $_SESSION["fail"] = "تکمیل کردن کلیه موارد الزامی است.";
        }
        redirect("/#feedback");
    }

    public function storeComment($blog_id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])) {
                $data = [
                    "blog_id" => $blog_id,
                    "name" => $_POST["name"],
                    "email" => $_POST["email"],
                    "message" => $_POST["message"],
                    "created_at" => time()
                ];
                $inserted = BlogComment::insert($data);
                if ($inserted) {
                    redirect("/Blog/$blog_id");
                } else {
                    echo "خطا در ثبت نظر!";
                }
            } else {
                echo "تمام فیلدها الزامی هستند!";
            }
        }
    }

    

}
