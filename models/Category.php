<?php

class Category
{
    public $id;
    public $name;
    public $description;
    public $photo;

    public function __construct($id = 0, $name = "", $description = "", $photo = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->photo = $photo;
    }

    public static function all()
    {
        $categories = [];
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $result = $db->query("SELECT * FROM categories");

        while ($row = $result->fetch_assoc()) {
            $categories[] = new Category($row['id'], $row['name'], $row['description'], $row['photo']);
        }

        $db->close();
        return $categories;
    }

    public static function find($id)
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $stmt = $db->prepare("SELECT id, name, description, photo FROM categories WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $category = new Category($row['id'], $row['name'], $row['description'], $row['photo']);
        $stmt->close();
        $db->close();

        return $category;
    }

    public function save()
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $stmt = $db->prepare("INSERT INTO categories (name, description, photo) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->name, $this->description, $this->photo);
        $success = $stmt->execute();
        $stmt->close();
        $db->close();

        return $success;
    }

    public function update()
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $stmt = $db->prepare("UPDATE categories SET name = ?, description = ?, photo = ? WHERE id = ?");
        $stmt->bind_param("sssi", $this->name, $this->description, $this->photo, $this->id);
        $success = $stmt->execute();
        $stmt->close();
        $db->close();

        return $success;
    }

    public static function destroy($id)
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $stmt = $db->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        $stmt->close();
        $db->close();

        return $success;
    }
}
