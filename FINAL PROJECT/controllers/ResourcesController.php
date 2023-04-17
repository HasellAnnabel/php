<?php
    require_once("./models/ResourceModel.php");

    function index () {
        render("resources/index", [
            "title" => "Index"
        ]);
    }

    function show () {
        render("resources/show", [
            "title" => "Show"
        ]);
    }

    function _new () {
        render("resources/new", [
            "title" => "New",
            "action" => "create"
        ]);
    }

    function edit ($request) {
        render("resources/edit", [
            "title" => "Edit",
            "action" => "update"
        ]);
    }

    function create ($request) {
        $book = [
            "title" => $_POST["title"],
            "author" => $_POST["author"],
            "isbn" => $_POST["isbn"]
        ];
    
        $errors = validate($book, "/resources/new");
    
        if ($errors) {
            render("resources/new", [
                "title" => "New",
                "action" => "create",
                "errors" => $errors,
                "book" => $book
            ]);
        } else {
            $book_id = ResourceModel::create($book);
            redirect("resources/{$book_id}", ["success" => "Resource added successfully!"]);
        }
    }

    function update () {
        $book = [
            "book_id" => $_POST["book_id"],
            "title" => $_POST["title"],
            "author" => $_POST["author"],
            "isbn" => $_POST["isbn"]
        ];
    
        $errors = validate($book, "/resources/{$book['book_id']}/edit");
    
        if ($errors) {
            render("resources/edit", [
                "title" => "Edit",
                "action" => "update",
                "errors" => $errors,
                "book" => $book
            ]);
        } else {
            ResourceModel::update($book);
    
            redirect("", ["success" => "Updates Successfully"]);
        }
    }

    function delete ($request) {
        $book_id = $request["id"];

         ResourceModel::delete($book_id);

        redirect("", ["success" => "Deleted Successfully"]);
    }

    function validate ($package, $error_redirect_path) {
        $errors = [];

    if (empty($book["title"])) {
        $errors["title"] = "Title is required.";
    }

    if (empty($book["author"])) {
        $errors["author"] = "Author is required.";
    }

    if (empty($book["isbn"])) {
        $errors["isbn"] = "ISBN is required.";
    } elseif (strlen($book["isbn"]) !== 13) {
        $errors["isbn"] = "ISBN must be 13 characters.";
    }

    if (count($errors) > 0) {
        redirect($error_redirect_path,"failure");
    }

    return $errors;
    }

    function sanitize($package) {
        foreach ($package as $key => $value) {
            // Sanitize the value using the built-in PHP function
            $package[$key] = htmlspecialchars($value);
        }
    
        return $package;
    }
        
?>