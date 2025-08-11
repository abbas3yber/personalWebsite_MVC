<?php

namespace App\controller\Admin;

use App\Model\CategoryModel;
use Core\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryModel::select();
        view("Admin/Categories", compact("categories"));
    }

    public function create()
    {
        view("Admin/NewCategory");
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = trim($_POST["name"]);
            $slug = trim($_POST["slug"]);

            if (!empty($name) && !empty($slug)) {
                $data = [
                    "name" => $name,
                    "slug" => $slug,
                    "created_at" => time()
                ];

                if (CategoryModel::insert($data)) {
                    redirect("/admin/dashboard/Categories");
                } else {
                    echo "خطا در ذخیره‌سازی!";
                }
            } else {
                echo "تمام فیلدها الزامی هستند.";
            }
        }
    }
}