<?php

namespace App\controller\Admin;

use App\Model\ArticleModel;
use App\Model\CategoryModel;
use Core\Controller;

class ArticleController extends Controller
{

    public function Article()
    {
        $Artic = ArticleModel::rawQuery("
        SELECT blog.id, blog.title, blog.summary, blog.image, blog.author, blog.date,
        categories.name AS category_name
        FROM blog
        JOIN categories ON blog.category_id = categories.id");

        view("Admin/Articles", compact("Artic"));
    }
    public function NewArticle()
    {
        $categories = CategoryModel::select(['id', 'name']);
        view("Admin/NewArticle", compact("categories"));
    }


    public function EditBlog($id)
    {
        $data = ArticleModel::find($id);
        if (!$data) {
            echo "مقاله‌ای یافت نشد.";
            return;
        }
        $categories = CategoryModel::select(['id', 'name']);
        view("Admin/EditBlog", compact("data", "categories"));
    }

    public function UpdateBlog($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["author"]) &&
                !empty($_POST["summary"]) &&
                !empty($_POST["content"]) &&
                !empty($_POST["date"])
            ) {
                $title = $_POST["title"];
                $author = $_POST["author"];
                $summary = $_POST["summary"];
                $content = $_POST["content"];
                $time = $_POST["date"];
                $category_id = $_POST["category_id"];

                $data = [
                    "title" => $title,
                    "author" => $author,
                    "summary" => $summary,
                    "content" => $content,
                    "category_id" => $category_id,
                    "date" => $time

                ];


                if (!empty($_FILES["image"]["name"])) {
                    $file = $_FILES["image"];
                    $allowed = ["jpg", "png"];
                    $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

                    if (!in_array($extension, $allowed)) {
                        echo "پسوند فایل مناسب نیست!";
                        return;
                    }

                    if ($file["size"] > 1 * 1024 * 1024) {
                        echo "حجم فایل زیاد است!";
                        return;
                    }

                    $filename = time() . '.' . $extension;
                    $uploadPath = __DIR__ . "/../../../Public/Uploads/images/blog/" . $filename;

                    if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                        $data["image"] = $filename;
                    } else {
                        echo "خطا در آپلود فایل.";
                        return;
                    }
                }

                $updated = ArticleModel::update($id, $data);
                if ($updated) {
                    echo " دوره با موفقیت اپدیت شد ! ";
                    redirect("/admin/Articles");
                    exit;
                } else {
                    echo "خطا در ویرایش اطلاعات.";
                }
            } else {
                echo "لطفاً تمام فیلدها را پر کنید.";
            }
        }
    }

    public function DeleteArtic($id)
    {
        if (!is_numeric($id)) {
            echo "آیدی معتبر نیست ";
            return;
        }
        $deleted = ArticleModel::delete($id);
        if ($deleted) {
            redirect("/admin/articles");
            echo "<div class='alert alert-success'> دروه با موفقیت حذف شد  </div>";
            exit;
        } else {
            echo "حذف دوره با خطا مواجه شد ";
        }
    }

    public function AddBlog()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["author"]) &&
                !empty($_POST["summary"]) &&
                !empty($_POST["content"]) &&
                !empty($_POST["category_id"]) &&
                !empty($_POST["date"]) &&
                !empty($_FILES["image"]["name"])
            ) {
                $title = $_POST["title"];
                $author = $_POST["author"];
                $summary = $_POST["summary"];
                $category_id = $_POST["category_id"];
                $content = $_POST["content"];
                $time = $_POST["date"];
                $file = $_FILES["image"];

                $allowed = ["jpg", "png"];
                $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

                if (!in_array($extension, $allowed)) {
                    echo "پسوند فایل مناسب نیست!";
                    return;
                }

                if ($file["size"] > 1 * 1024 * 1024) {
                    echo "حجم فایل بالا است!";
                    return;
                }

                $filename = time() . '.' . $extension;
                $uploadPath = __DIR__ . "/../../../Public/Uploads/images/blog/" . $filename;

                if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                    $data = [
                        "title" => $title,
                        "author" => $author,
                        "summary" => $summary,
                        "category_id" => $category_id,
                        "content" => $content,
                        "date" => $time,
                        "image" => $filename
                    ];

                    $success = ArticleModel::insert($data);

                    if ($success) {
                        redirect("/admin/articles");
                        echo "<div class='alert alert-success'> دروه با موفقیت اضافه شد  </div>";
                        exit;
                    } else {
                        echo "خطا در ثبت اطلاعات.";
                    }
                } else {
                    echo "خطا در آپلود فایل.";
                }
            } else {
                echo "لطفا همه فیلدها را پر کنید.";
            }
        }
    }
}
