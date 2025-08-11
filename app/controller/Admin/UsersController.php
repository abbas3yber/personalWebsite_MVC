<?php

namespace App\controller\Admin;

use App\Model\UsersModel;
use Core\Controller;

class UsersController extends Controller
{

    public function Users()
    {
        $users = UsersModel::select(["id", "name", "email", "time", "last_login", "last_ip"]);
        view("/admin/Users", compact("users"));
    }

    public function NewUser()
    {
        view("/admin/NewUser");
    }

    public function DeleteUser($id)
    {
        if (!is_numeric($id)) {
            echo "آیدی معتبر نیست ";
            return;
        }
        $deleted = UsersModel::delete($id);
        if ($deleted) {
            redirect("/admin/dashboard/Users");
            echo "<div class='alert alert-success'> کاربر با موفقیت حذف شد  </div>";
            exit;
        } else {
            echo "حذف دوره با خطا مواجه شد ";
        }
    }

    public function EditUser($id)
    {
        $data = UsersModel::find($id);
        if (!$data) {
            echo "دوره‌ای یافت نشد.";
            return;
        }
        view("/admin/EditUser", compact("data"));
    }

    public function UpdateUser($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !isset($_POST["name"]) and !empty($_POST["name"]) &&
                !isset($_POST["email"]) and !empty($_POST["email"]) &&
                !isset($_POST["password"]) and !empty($_POST["password"]) &&
                !isset($_POST["time"]) and !empty($_POST["time"])
            ) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $time = $_POST["time"];

                $data = [
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "time" => $time,
                ];

                $success = UsersModel::update($id, $data);

                if ($success) {
                    redirect("/admin/dashboard/Users");
                    echo "<div class='alert alert-success'> کاربر با موفقیت ویرایش شد  </div>";
                    exit;
                } else {
                    echo "خطا در ثبت اطلاعات.";
                }
            }
        }
    }

    public function AddUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !isset($_POST["name"]) and !empty($_POST["name"]) &&
                !isset($_POST["email"]) and !empty($_POST["email"]) &&
                !isset($_POST["password"]) and !empty($_POST["password"]) &&
                !isset($_POST["time"]) and !empty($_POST["time"])
            ) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $time = $_POST["time"];

                $data = [
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "time" => $time,
                ];

                $success = UsersModel::insert($data);

                if ($success) {
                    redirect("/admin/dashboard/Users");
                    echo "<div class='alert alert-success'> دروه با موفقیت اضافه شد  </div>";
                    exit;
                } else {
                    echo "خطا در ثبت اطلاعات.";
                }
            }
        }
    }
}
