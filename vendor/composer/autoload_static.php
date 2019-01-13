<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit47531d1b423ac88867114428d78041bd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Controllers\\AuthController' => __DIR__ . '/../..' . '/app/controllers/AuthController.php',
        'App\\Controllers\\ChapterController' => __DIR__ . '/../..' . '/app/controllers/ChapterController.php',
        'App\\Controllers\\CommentController' => __DIR__ . '/../..' . '/app/controllers/CommentController.php',
        'App\\Controllers\\HomeController' => __DIR__ . '/../..' . '/app/controllers/HomeController.php',
        'App\\Controllers\\PostController' => __DIR__ . '/../..' . '/app/controllers/PostController.php',
        'App\\Controllers\\PostsController' => __DIR__ . '/../..' . '/app/controllers/PostsController.php',
        'App\\Controllers\\UserController' => __DIR__ . '/../..' . '/app/controllers/UserController.php',
        'App\\Core\\Config' => __DIR__ . '/../..' . '/app/core/Config.php',
        'App\\Core\\Controller' => __DIR__ . '/../..' . '/app/core/Controller.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/app/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/app/core/Router.php',
        'App\\Core\\SecureController' => __DIR__ . '/../..' . '/app/core/SecureController.php',
        'App\\Core\\Session' => __DIR__ . '/../..' . '/app/core/Session.php',
        'App\\Core\\View' => __DIR__ . '/../..' . '/app/core/View.php',
        'App\\Models\\Comment' => __DIR__ . '/../..' . '/app/models/Comment.php',
        'App\\Models\\Database' => __DIR__ . '/../..' . '/app/models/Database.php',
        'App\\Models\\Messages' => __DIR__ . '/../..' . '/app/models/Messages.php',
        'App\\Models\\Model' => __DIR__ . '/../..' . '/app/models/Model.php',
        'App\\Models\\Post' => __DIR__ . '/../..' . '/app/models/Post.php',
        'App\\Models\\User' => __DIR__ . '/../..' . '/app/models/User.php',
        'App\\Models\\manager\\ChapterManager' => __DIR__ . '/../..' . '/app/models/manager/ChapterManager.php',
        'App\\Models\\manager\\CommentManager' => __DIR__ . '/../..' . '/app/models/manager/CommentManager.php',
        'App\\Models\\manager\\HomeManager' => __DIR__ . '/../..' . '/app/models/manager/HomeManager.php',
        'App\\Models\\manager\\PostManager' => __DIR__ . '/../..' . '/app/models/manager/PostManager.php',
        'App\\Models\\manager\\PostsManager' => __DIR__ . '/../..' . '/app/models/manager/PostsManager.php',
        'App\\Models\\manager\\UserManager' => __DIR__ . '/../..' . '/app/models/manager/UserManager.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit47531d1b423ac88867114428d78041bd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit47531d1b423ac88867114428d78041bd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit47531d1b423ac88867114428d78041bd::$classMap;

        }, null, ClassLoader::class);
    }
}