<?php


    session_start();



require_once __DIR__. '/../vendor/autoload.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', 'localhost');
define('DB_NAME', 'auth');
define('DB_USER', 'root');
define('DB_PASS', 'root');




$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

use Itb\MainController;
use Itb\ProductRepository;

$mainController = new MainController();  /* */

switch($action){


    case 'login':
        $mainController->login_action();
        break;
    case 'logout':
        $mainController->logout_action();
        break;
    case 'process_login':
        $mainController->process_login_action();
        break;
    case 'register':
        $mainController->create_action();
        break;
    case 'process_registration':
        $mainController->process_registration_action();
        break;
    case 'shop':
        $mainController->shop_action();
        break;
    case 'siteMap':
        $mainController->site_action();
        break;
    case 'contact':
        $mainController->contact_action();
        break;
    case 'cart':
        $mainController->cart_action();
        break;

    /*        shop/crud related                          */

    case 'crud':
        $mainController->list_action();
        break;

    case 'showUpdateProductForm':
        $mainController->show_update_product_form_action();
        break;

    case 'updateProduct':
        $mainController->update_product_action();
        break;

    case 'showNewProductForm':
        $mainController->show_new_product_form_action();
        break;

    case 'createNewProduct':
        $mainController->create_product_action();
        break;

    case 'show':
        $mainController->show_one_product_action();
        break;

    case 'deleteProduct':
        $mainController->delete_product_action();
        break;
    case 'product_detail':
        $mainController->product_detail_action();
        break;
    case 'user_crud':
        $mainController->user_crud_action();
        break;
    case 'updateUser':
        $mainController->update_user_action();
        break;
    /*          user edit how page looks               */
    case 'setBackgroundColorYellowgreen':
        $mainController->changeBackgroundColor('yellowgreen');
        break;

    case 'setBackgroundColorLightgreen':
        $mainController->changeBackgroundColor('lightgreen');
        break;
    case 'setBackgroundColorLightgrey':
        $mainController->changeBackgroundColor('lightgrey');
        break;
    /*     CHANING CSS                            */
    case 'colorRed':
        $mainController->changeColor('red');
        break;

    case 'colorBlue':
        $mainController->changeColor('blue');
        break;

    case 'sizeOne':
        $mainController->changeSize(1);
        break;

    case 'sizeOnePointTwo':
        $mainController->changeSize(1.2);
        break;
    case 'killSession':
        $mainController->forgetSession();
        break;
    /*              Adding things to cart        */


    case 'addToCart':
        $mainController->addToCart();
        break;

    case 'removeFromCart':
        $mainController->removeFromCart();
        break;

    case 'emptyCart':
        $mainController->forgetSession();
        break;





    case 'index':
    default:
    $mainController->index_action();

}

