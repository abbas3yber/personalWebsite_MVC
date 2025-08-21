<?php

namespace App\controller\Admin;

use App\Model\CoursesModel;
use Core\Controller;


class CoursesController extends Controller
{

    public function Courses()
    {
        $Courses = CoursesModel::select(["id", "title", "teacher", "price", "status", "category"]);
        view("/Admin/Courses", compact("Courses"));
    }

    public function NewCourse()
    {
        view("/Admin/NewCourse");
    }

    public function Show($id)
    {
        $data = CoursesModel::find($id);
        if (!$data) {
            echo " دوره ای پیدا نشد  ";
            return;
        } else {
            view("/SingleCourse", compact("data"));
        }
    }

    public function EditCourse($id)
    {
        $course = CoursesModel::find($id);
        if (!$course) {
            echo "دوره‌ای یافت نشد.";
            return;
        }
        view("/Admin/EditCourse", compact("course"));
    }

    public function UpdateCourse($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["teacher"]) &&
                !empty($_POST["price"]) &&
                !empty($_POST["category"]) &&
                !empty($_POST["date"])
            ) {
                $title = $_POST["title"];
                $teacher = $_POST["teacher"];
                $price = $_POST["price"];
                $category = $_POST["category"];
                $date = $_POST["date"];

                $data = [
                    "title" => $title,
                    "teacher" => $teacher,
                    "price" => $price,
                    "category" => $category,
                    "date" => $date
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
                    $uploadPath = __DIR__ . "/../../../Public/Uploads/images/course/" . $filename;
                    $relativePath = "/Uploads/images/course/" . $filename;

                    if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                        $data["image"] = $relativePath;
                    } else {
                        echo "خطا در آپلود فایل.";
                        return;
                    }
                }

                $updated = CoursesModel::update($id, $data);
                if ($updated) {
                    echo " دوره با موفقیت اپدیت شد ! ";
                    var_dump($data);
                    redirect("/admin/courses");
                    exit;
                } else {
                    echo "خطا در ویرایش اطلاعات.";
                }
            } else {
                echo "لطفاً تمام فیلدها را پر کنید.";
            }
        }
    }

    public function DeleteCourse($id)
    {
        if (!is_numeric($id)) {
            echo "آیدی معتبر نیست ";
            return;
        }
        $deleted = CoursesModel::delete($id);
        if ($deleted) {
            redirect("/admin/courses");
            echo "<div class='alert alert-success'> دروه با موفقیت حذف شد  </div>";
            exit;
        } else {
            echo "حذف دوره با خطا مواجه شد ";
        }
    }

    public function AddCourse()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["teacher"]) &&
                !empty($_POST["price"]) &&
                !empty($_POST["date"]) &&
                !empty($_POST["category"]) && 
                !empty($_FILES["image"]["name"])
            ) {
                $title = $_POST["title"];
                $teacher = $_POST["teacher"];
                $price = $_POST["price"];
                $time = $_POST["date"];
                $category = $_POST["category"]; 
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
                $uploadPath = __DIR__ . "/../../../Public/Uploads/images/course/" . $filename;
                $relativePath = "/Uploads/images/course/" . $filename;

                if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                    $data = [
                        "title" => $title,
                        "teacher" => $teacher,
                        "price" => $price,
                        "date" => $time,
                        "category" => $category, 
                        "image" => $relativePath
                    ];

                    $success = CoursesModel::insert($data);

                    if ($success) {
                        redirect("/admin/courses");
                        echo "<div class='alert alert-success'> دوره با موفقیت اضافه شد </div>";
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
