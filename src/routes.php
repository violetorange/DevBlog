<?php

return [
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'editComment'],
    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\ArticlesController::class, 'addComment'],
    '~^comments/(\d+)/delete$~' => [\MyProject\Controllers\AdminController::class, 'deleteComment'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\AdminController::class, 'deleteArticle'],
    '~^admin$~' => [\MyProject\Controllers\AdminController::class, 'view'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/login~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/logout~' => [\MyProject\Controllers\UsersController::class, 'logout'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^about~' => [\MyProject\Controllers\MainController::class, 'about'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];