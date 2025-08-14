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
                    redirect("/admin/categories");
                } else {
                    echo "خطا در ذخیره‌سازی!";
                }
            } else {
                echo "تمام فیلدها الزامی هستند.";
            }
        }
    }

     public function EditCategory($id)
    {
        $category = CategoryModel::find($id);
        if (!$category) {
            echo "دسته بندی یافت نشد.";
            return;
        }
        view("Admin/EditCategory", compact("category"));
    }

    public function UpdateCategory($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = trim($_POST["name"]);
            $slug = trim($_POST["slug"]);

            if (!empty($name) && !empty($slug)) {
                $data = [
                    "name" => $name,
                    "slug" => $slug,
                    "updated_at" => time()
                ];

                $updated = CategoryModel::update($id, $data);
                if ($updated) {
                    redirect("/admin/categories");
                } else {
                    echo "خطا در به‌روزرسانی دسته‌بندی!";
                }
            } else {
                echo "تمام فیلدها الزامی هستند.";
            }
        }
    }

    public function DeleteCategory($id)
    {
        if (!is_numeric($id)) {
            echo "آیدی نامعتبر است.";
            return;
        }

        $deleted = CategoryModel::delete($id);
        if ($deleted) {
            redirect("/admin/categories");
        } else {
            echo "حذف دسته‌بندی با خطا مواجه شد.";
        }
    }
}