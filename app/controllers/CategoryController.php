<?php

namespace app\controllers;

use app\models\Category;
use app\views\Viewer;

class CategoryController extends AuthController {
    private $model;
    public function __construct()
    {
        $this->model = new Category();
    }

    public function index()
    {
        $this->authorize();
        $categories = $this->model->getCategories();
        $viewer = new Viewer();
        $viewer->render("/categories/index.php",['categories'=>$categories]);
        
    }

    public function create()
    {
        $this->authorize();
        $viewer = new Viewer();
        $viewer->render("/categories/create.php");
    }

    public function store($data)
    {
      $this->authorize();
      $title = trim($_POST['title']);
      $errors = [];
      if (empty($title)){
          $errors+=['title'=>'Title is required'];
      }
      if(empty($errors)){
          //create category
          try {
              $this->model->creteCategory($title);
              redirect("/categories",['success'=>'category is created successfully']);
          }catch (\PDOException $e){
              redirect("/categories/create",['error'=>'some errors has happened']);
          }

      }else{
         redirect("/categories/create",['form_errors'=>$errors]);
      }
    }

    public function update($data,$id)
    {
        $this->authorize();
        $viewer  =new Viewer();
        $title = trim($_POST['title']);
        $errors = [];
        if (empty($title)){
            $errors+=['title'=>'Title is required'];
        }
        if(empty($errors)){
            $category = $this->model->getCategory($id);
            if (empty($category)) {
                $viewer->render("/errors/404.php");
                exit;
            }
            $this->model->updateCategory($title,$id);
            redirect("/categories",['success'=>'category is updated successfully']);

        }else{
            redirect("/categories/edit/$id",['form_errors'=>$errors]);
        }
    }


    public function edit($id)
    {
      $this->authorize();
     $viewer = new Viewer();
    $category = $this->model->getCategory($id);
    if (empty($category)){
        $viewer->render("/errors/404.php");
        exit;
    }else{
        $viewer->render("/categories/edit.php",['category'=>$category]);
    }
    }
    public function delete($data,$id)
    {
        $this->authorize();
        $viewer = new Viewer();
        $category = $this->model->getCategory($id);
        if (empty($category)){
            $viewer->render("/errors/404.php");
            exit;
        }else{
           $this->model->deleteCategory($id);
            redirect("/categories",['success'=>'Category deleted successfully']);
        }
    }

}