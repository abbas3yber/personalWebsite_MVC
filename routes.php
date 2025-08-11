<?php

use App\controller\Admin\AdminController;
use App\controller\Admin\ArticleController;
use App\controller\Admin\CategoryController;
use App\controller\Admin\CommentsController;
use App\controller\Admin\CoursesController;
use App\controller\Admin\DashboardController;
use App\controller\Admin\UsersController;
use App\controller\HomeController;
use App\middleware\AdminAuthMiddleware;
use Core\Router;

Router::get("/", HomeController::class,"index");
Router::get("/blog/{id}", HomeController::class,"singleBloge");
Router::post("/blog/{id}", HomeController::class, "storeComment");
Router::post("/feedback", HomeController::class,"feedback");
Router::get("/admin", AdminController::class,"login");
Router::post("/admin", AdminController::class, "auth");
Router::get("/admin/logout", AdminController::class, "logout", AdminAuthMiddleware::class);
Router::get("/admin/dashboard", AdminController::class, "dashboard", AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Articles", ArticleController::class, "Article" , AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Articles/{id}", ArticleController::class, "DeleteArtic" ,AdminAuthMiddleware::class);
Router::post("/admin/dashboard/NewArticle", ArticleController::class, "AddBlog" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/EditBlog/{id}", ArticleController::class, "EditBlog" ,AdminAuthMiddleware::class);
Router::post("/admin/dashboard/EditBlog/{id}", ArticleController::class, "UpdateBlog" , AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Comments", CommentsController::class, "Comments",AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Comments/{id}", CommentsController::class, "DeleteFeedback" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Courses", CoursesController::class, "Courses" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Users", UsersController::class, "Users" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/NewUser", UsersController::class, "NewUser" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Users/{id}", UsersController::class, "DeleteUser" ,AdminAuthMiddleware::class);
Router::post("/admin/dashboard/NewUser", UsersController::class, "AddUser" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/EditUser/{id}", UsersController::class, "EditUser" ,AdminAuthMiddleware::class);
Router::post("/admin/dashboard/EditUser/{id}", UsersController::class, "UpdateUser" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/NewCourse", CoursesController::class, "NewCourse" ,AdminAuthMiddleware::class);
Router::post("/admin/dashboard/NewCourse", CoursesController::class, "AddCourse" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Courses/{id}", CoursesController::class, "DeleteCourse" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/NewArticle", ArticleController::class, "NewArticle" ,AdminAuthMiddleware::class);
Router::get("/SingleCourse/{id}", CoursesController::class, "Show");
Router::get("/admin/dashboard/EditCourse/{id}", CoursesController::class, "EditCourse" , AdminAuthMiddleware::class);
Router::post("/admin/dashboard/EditCourse/{id}", CoursesController::class, "UpdateCourse" ,AdminAuthMiddleware::class);
Router::get("/admin/dashboard/Categories", CategoryController::class, "index", AdminAuthMiddleware::class);
Router::get("/admin/dashboard/NewCategory", CategoryController::class, "create", AdminAuthMiddleware::class);
Router::post("/admin/dashboard/NewCategory", CategoryController::class, "store", AdminAuthMiddleware::class);



Router::dispatch();

?>