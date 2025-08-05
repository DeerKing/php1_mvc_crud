<?php

$action = $_GET['action'] ?? '/';
$homeController = new HomeController();
match ($action) {
    '/'         => $homeController->index(),
    'product'   => $homeController->show(),
    'home'         => $homeController->index(),
    'add'    => $homeController->add(),
    'edit'    => $homeController->edit(),
    'delete'    => $homeController->delete(),
    default     => $homeController->index(),
};