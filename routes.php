<?php

use App\controller\Admin\AdminController;
use App\controller\Admin\ArticleController;
use App\controller\Admin\CategoryController;
use App\controller\Admin\CommentsController;
use App\controller\Admin\CoursesController;
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
Router::get("/admin/articles", ArticleController::class, "Article" , AdminAuthMiddleware::class);
Router::get("/admin/articles/new_article", ArticleController::class, "NewArticle" ,AdminAuthMiddleware::class);
Router::post("/admin/articles/new_article", ArticleController::class, "AddBlog" ,AdminAuthMiddleware::class);
Router::get("/admin/articles/edit_blog/{id}", ArticleController::class, "EditBlog" ,AdminAuthMiddleware::class);
Router::post("/admin/articles/edit_blog/{id}", ArticleController::class, "UpdateBlog" , AdminAuthMiddleware::class);
Router::get("/admin/articles/{id}", ArticleController::class, "DeleteArtic" ,AdminAuthMiddleware::class);
Router::get("/admin/comments", CommentsController::class, "Comments",AdminAuthMiddleware::class);
Router::get("/admin/comments/{id}", CommentsController::class, "DeleteFeedback" ,AdminAuthMiddleware::class);
Router::get("/admin/users", UsersController::class, "Users" ,AdminAuthMiddleware::class);
Router::get("/admin/users/new_user", UsersController::class, "NewUser" ,AdminAuthMiddleware::class);
Router::post("/admin/users/new_user", UsersController::class, "AddUser" ,AdminAuthMiddleware::class);
Router::get("/admin/users/{id}", UsersController::class, "DeleteUser" ,AdminAuthMiddleware::class);
Router::get("/admin/users/edit_user/{id}", UsersController::class, "EditUser" ,AdminAuthMiddleware::class);
Router::post("/admin/users/edit_user/{id}", UsersController::class, "UpdateUser" ,AdminAuthMiddleware::class);
Router::get("/admin/courses", CoursesController::class, "Courses" ,AdminAuthMiddleware::class);
Router::get("/single_course/{id}", CoursesController::class, "Show");
Router::get("/admin/courses/new_course", CoursesController::class, "NewCourse" ,AdminAuthMiddleware::class);
Router::post("/admin/courses/new_course", CoursesController::class, "AddCourse" ,AdminAuthMiddleware::class);
Router::get("/admin/courses/edit_course/{id}", CoursesController::class, "EditCourse" , AdminAuthMiddleware::class);
Router::post("/admin/courses/edit_course/{id}", CoursesController::class, "UpdateCourse" ,AdminAuthMiddleware::class);
Router::get("/admin/courses/{id}", CoursesController::class, "DeleteCourse" ,AdminAuthMiddleware::class);
Router::get("/admin/categories", CategoryController::class, "index", AdminAuthMiddleware::class);
Router::get("/admin/categories/new_category", CategoryController::class, "create", AdminAuthMiddleware::class);
Router::post("/admin/categories/new_category", CategoryController::class, "store", AdminAuthMiddleware::class);
Router::get("/admin/categories/edit_category/{id}", CategoryController::class, "EditCategory", AdminAuthMiddleware::class);
Router::post("/admin/categories/edit_category/{id}", CategoryController::class, "UpdateCategory", AdminAuthMiddleware::class);
Router::get("/admin/categories/delete_category/{id}", CategoryController::class, "DeleteCategory", AdminAuthMiddleware::class);



Router::dispatch();

?>