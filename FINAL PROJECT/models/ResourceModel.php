<?php

class ResourceModel {

    private static $_table = "Books";

    public static function findAll () {
        $table = self::$_table;
        $conn = get_connection();

        $sql = "SELECT * FROM {$table}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $books = $stmt->fetchAll(PDO::FETCH_OBJ);
        $conn = null;

        return $books;
    }

    public static function find ($id) {
        $table = self::$_table;
        $conn = get_connection();

        $sql = "SELECT * FROM {$table} WHERE book_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $book = $stmt->fetch(PDO::FETCH_OBJ);
        $conn = null;

        return $book;
    }

    public static function create ($book) {
        $table = self::$_table;
        $conn = get_connection();

        $sql = "INSERT INTO {$table} (title, author, isbn) VALUES (:title, :author, :isbn)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":title", $book['title'], PDO::PARAM_STR);
        $stmt->bindParam(":author", $book['author'], PDO::PARAM_STR);
        $stmt->bindParam(":isbn", $book['isbn'], PDO::PARAM_STR);
        $stmt->execute();

        $book_id = $conn->lastInsertId();
        $conn = null;

        return $book_id;
    }

    public static function update ($book) {
        $table = self::$_table;
        $conn = get_connection();

        $sql = "UPDATE {$table} SET title = :title, author = :author, isbn = :isbn WHERE book_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $book['book_id'], PDO::PARAM_INT);
        $stmt->bindParam(":title", $book['title'], PDO::PARAM_STR);
        $stmt->bindParam(":author", $book['author'], PDO::PARAM_STR);
        $stmt->bindParam(":isbn", $book['isbn'], PDO::PARAM_STR);
        $stmt->execute();

        $conn = null;
    }

    public static function delete ($id) {
        $table = self::$_table;
        $conn = get_connection();

        $sql = "DELETE FROM {$table} WHERE book_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $conn = null;
    }
}

?>
