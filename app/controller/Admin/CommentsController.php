<?php 

namespace App\controller\Admin;

use App\Model\CommentsModel;
use App\model\FeedbackModel;
use Core\Controller;

class CommentsController extends Controller {

    public function Comments() {
        $feedback = FeedbackModel::select(["id", "name", "email" , "message" , "ip" , "time" , "status"]);
        view("/admin/Comments" , compact("feedback"));
    }

    public function DeleteFeedback($id)
    {
        if (!is_numeric($id)) {
            echo "آیدی معتبر نیست ";
            return;
        }
        $deleted = CommentsModel::delete($id);
        if ($deleted) {
            redirect("/admin/dashboard/Commnets");
            echo "<div class='alert alert-success'> کاربر با موفقیت حذف شد  </div>";
            exit;
        } else {
            echo "حذف دوره با خطا مواجه شد ";
        }
    }


}



?>