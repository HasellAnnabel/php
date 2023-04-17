<?php

    /**
     * Routes are responsible for matching a requested path
     * with a controller and an action. The controller represents
     * a collection of functions you want associated, usually, with
     * a resource. The action is the specific function you want to call.
     */

    $routes = [
        "get" => [
            [
                "pattern" => "/",
                "controller" => "PagesController",
                "action" => "index"
            ],
            [
                "pattern" => "/resources",
                "controller" => "ResourcesController",
                "action" => "index"
            ],
            [
                "pattern" => "/resources/new",
                "controller" => "ResourcesController",
                "action" => "_new"
            ],
            [
                "pattern" => "/resources/:id",
                "controller" => "ResourcesController",
                "action" => "show"
            ],
            [
                "pattern" => "/resources/edit/:id",
                "controller" => "ResourcesController",
                "action" => "edit"
            ],
            [
                "pattern" => "/resources/delete/:id",
                "controller" => "ResourcesController",
                "action" => "delete"
            ],
            [
                "pattern" => "/users/new",
                "controller" => "UsersController",
                "action" => "_new"
            ],
            [
                "pattern" => "/login",
                "controller" => "UsersController",
                "action" => "login"
            ],
            [
                "pattern" => "/logout",
                "controller" => "UsersController",
                "action" => "logout"
            ],
        ],
        "post" => [
            [
                "pattern" => "/resources/create",
                "controller" => "ResourcesController",
                "action" => "create"
            ],
            [
                "pattern" => "/resources/update",
                "controller" => "ResourcesController",
                "action" => "update"
            ],
            [
                "pattern" => "/users/create",
                "controller" => "UsersController",
                "action" => "create"
            ],
            [
                "pattern" => "/authenticate",
                "controller" => "UsersController",
                "action" => "authenticate"
            ],
        ]
    ];

?>