<?php
require_once 'libs/Router.php';
require_once 'app/ApiProductsController.php';
// require_once 'app/ApiCategoryController.php';
// require_once 'app/ApiBudgetsController.php';
// require_once 'app/ApiClientsController.php';
// require_once 'app/ApiUserController.php';
// require_once 'app/ApiCommentsController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('products', 'GET', 'ApiProductsController', 'getProducts');
$router->addRoute('products/:ID', 'GET', 'ApiProductsController', 'getProduct');
$router->addRoute('products', 'POST', 'ApiProductsController', 'insertProduct');
$router->addRoute('products/:ID', 'PUT', 'ApiProductsController', 'editProduct');
$router->addRoute('products/:ID', 'DELETE', 'ApiProductsController', 'deleteProduct');

// $router->addRoute('categories', 'GET', 'ApiCategoryController', 'getCategories');
// $router->addRoute('categories/:ID', 'GET', 'ApiCategoryController', 'getCategory');
// $router->addRoute('categories', 'POST', 'ApiCategoryController', 'insertCategory');
// $router->addRoute('categories/:ID', 'PUT', 'ApiCategoryController', 'editCategory');
// $router->addRoute('categories/:ID', 'DELETE', 'ApiCategoryController', 'deleteCategory');

// $router->addRoute('budget', 'GET', 'ApiBudgetsController', 'getBudgets');
// $router->addRoute('budget/:ID', 'GET', 'ApiBudgetsController', 'getBudget');
// $router->addRoute('budget', 'POST', 'ApiBudgetsController', 'insertBudget');
// $router->addRoute('budget/:ID', 'PUT', 'ApiBudgetsController', 'editBudget');
// $router->addRoute('budget/:ID', 'DELETE', 'ApiBudgetsController', 'deleteBudget');

// $router->addRoute('clients', 'GET', 'ApiClientsController', 'getClients');
// $router->addRoute('clients/:ID', 'GET', 'ApiClientsController', 'getClient');
// $router->addRoute('clients', 'POST', 'ApiClientsController', 'insertClient');
// $router->addRoute('clients/:ID', 'PUT', 'ApiClientsController', 'editClients');
// $router->addRoute('clients/:ID', 'DELETE', 'ApiClientsController', 'deleteClient');

// $router->addRoute('comments', 'GET', 'ApiCommentsController', 'getComments');
// $router->addRoute('comments/products/:ID', 'GET', 'ApiCommentsController', 'getCommentsByProductId');
// $router->addRoute('comments', 'POST', 'ApiCommentsController', 'insertComments');
// $router->addRoute('comments/:ID', 'DELETE', 'ApiCommentsController', 'deleteComment');

// $router->addRoute('user/token', 'GET', 'ApiUserController', 'getToken');
// $router->addRoute('user/:ID', 'GET', 'ApiUserController', 'getUser');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);