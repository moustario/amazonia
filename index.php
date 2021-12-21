<?php

// TODO add admin users

require_once __DIR__ . '/router/Request.php';
require_once __DIR__ . '/router/Router.php';
$router = new Router(new Request);

require_once __DIR__ . '/Controller/HomePage.php';
require_once __DIR__ . '/Controller/LoginPage.php';
require_once __DIR__ . '/Controller/RegisterPage.php';
require_once __DIR__ . '/Controller/ProfilePage.php';
require_once __DIR__ . '/Controller/AdminPage.php';

session_start();

// Global styles
echo "<style>";
include __DIR__ . '/View/css/global.css';
echo "</style>";
// Global JS
echo "<script>";
include __DIR__ . '/View/js/global.js';
echo "</script>";
// Snack bar
echo "<div id=\"snackbar\"></div>";

$homePage = new HomePage();
$loginPage = new LoginPage();
$registerPage = new RegisterPage();
$profilePage = new ProfilePage();
$adminPage = new AdminPage();

$router->get('/', function () use ($homePage) {
    $homePage->render_view([]);
});

$router->get('/login', function () use ($loginPage) {
    $loginPage->render_view([]);
});
$router->post('/login', function ($request) use ($loginPage) {
    return $loginPage->check_user($request->getBody());
});

$router->get('/register', function () use ($registerPage) {
    $registerPage->render_view([]);
});

$router->post('/register', function ($request) use ($registerPage) {
    return $registerPage->register_user($request->getBody());
});

$router->get('/profile', function () use ($profilePage) {
    if ($_SESSION["is_connected"]) $profilePage->render_view([]);
});

$router->post('/profile', function ($request) use ($profilePage) {
    return $profilePage->update_user($request->getBody());
});

$router->post('/disconnet', function ($request) use ($profilePage) {
    return $profilePage->disconnect_user($request->getBody());
});

$router->post('/gig', function ($request) use ($profilePage) {
    return $profilePage->update_gig($request->getBody());
});

$router->post('/buy', function ($request) use ($homePage) {
    return $homePage->buy_gig($request->getBody());
});

$router->get('/admin', function () use ($adminPage) {
    if ($_SESSION["admin_user"]) return $adminPage->render_view([]);
});

$router->post('/admin/switch', function ($request) use ($adminPage) {
    if ($_SESSION["admin_user"] || $_SESSION['use_to_be_admin']) return $adminPage->change_account($request->getBody());
});
