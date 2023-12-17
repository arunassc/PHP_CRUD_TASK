<?php

include "../../models/Category.php";

class CategoryController
{
    public static function getAll()
    {
        return Category::all();
    }

    public static function find($id)
    {
        return Category::find($id);
    }

    public static function store()
    {
        $category = new Category();
        $category->name = $_POST['name'];
        $category->description = $_POST['description'];
        $category->photo = $_POST['photo'];

        return $category->save();
    }

    public static function update($id)
    {
        $category = Category::find($id);
        $category->name = $_POST['name'];
        $category->description = $_POST['description'];
        $category->photo = $_POST['photo'];

        return $category->update();
    }

    public static function destroy($id)
    {
        return Category::destroy($id);
    }
}
