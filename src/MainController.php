<?php
/**
 * hjj
 */



/**
 * this is a comment
 */
namespace Itb;


use PDO;
/**
 * lets goo
 * Class MainController
 */
class MainController
{
    /**
     * this to open index
     */
    public function index_action()
    {


        $pageTitle = 'index';
        $indexLinkStyle = 'current_page';

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $isLoggedInAsAdmin = $this->isAdminUser();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();

        require_once __DIR__ . '/../template/index.php';
    }

    /**
     * this to open login
     */
    public function login_action()
    {
        $pageTitle = 'login';

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $isLoggedInAsAdmin = $this->isAdminUser();


        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();

        if ($isLoggedIn) {
            $isLoggedInAsUser = true;
        }


        require_once __DIR__ . '/../template/login.php';
    }

    /**
     *This is to load sitemap
     */
    public function site_action()
    {
        $pageTitle = 'siteMap';
        $sitemapLinkStyle = 'current_page';

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $isLoggedInAsAdmin = $this->isAdminUser();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();

        require_once __DIR__ . '/../template/siteMap.php';
    }

    /**
     * this to open contactUs
     */
    public function contact_action()
    {
        $pageTitle = 'contact';
        $contactLinkStyle = 'current_page';

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $isLoggedInAsAdmin = $this->isAdminUser();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();

        require_once __DIR__ . '/../template/contactUs.php';
    }

    /**
     * this to open register
     */
    public function create_action()
    {

        $pageTitle = 'register';

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $isLoggedInAsAdmin = $this->isAdminUser();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();

        require_once __DIR__ . '/../template/register.php';
    }

    /**
     * this to open shop
     */
    public function shop_action()
    {
        $pageTitle = 'shop';
        $shopLinkStyle = 'current_page';

        $cssStyleRule = $this->buildStyleRule();
        $backgroundColor = $this->getBackgroundColor();
        $isLoggedInAsAdmin = $this->isAdminUser();

        // 2. get all products
        $productRepository = new ProductRepository();
        $products = $productRepository->get_all_products();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();

        require_once __DIR__ . '/../template/shop.php';
    }

    /**
     *This is the admin crud
     */
    public function list_action()
    {
        $productRp = new ProductRepository;

        $pageTitle = 'crud';
        $crudLinkStyle = 'current_page';

        $cssStyleRule = $this->buildStyleRule();
        $backgroundColor = $this->getBackgroundColor();

        $isLoggedInAsAdmin = $this->isAdminUser();

        // 2. get all products
        $products = $productRp->get_all_products();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();


        require_once __DIR__ . '/../template/admin_crud.php';
    }

    /**
     *in this function it loads up the user crud
     */
    public function user_crud_action()
    {
        $productRp = new ProductRepository;

        $pageTitle = 'User Account';
        $crudLinkStyle = 'current_page';

        $cssStyleRule = $this->buildStyleRule();
        $backgroundColor = $this->getBackgroundColor();

        $isLoggedInAsAdmin = $this->isAdminUser();

        // 2. get all products
        $products = $productRp->get_all_products();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();


        $id = $this->userID_from_session();
        $user_image = $this->userImg_from_session();
        $backgroundColor = $this->getBackgroundColor();


        require_once __DIR__ . '/../template/user_crud.php';
    }

    /**
     *this puts cart into play
     */
    public function cart_action()
    {
        $productRp = new ProductRepository;

        $shoppingCart = $this->getShoppingCart();
        $products = $productRp->get_all_products();

        $pageTitle = 'cart';
        $crudLinkStyle = 'current_page';

        $cssStyleRule = $this->buildStyleRule();
        $backgroundColor = $this->getBackgroundColor();

        $isLoggedInAsAdmin = $this->isAdminUser();

        // 2. get all products
        $products = $productRp->get_all_products();

        $isLoggedIn = $this->is_logged_in_from_session();
        $user_name = $this->username_from_session();


        require_once __DIR__ . '/../template/_cart.php';
    }


    /**
     * registration  page
     */
    public function process_registration_action()
    {
        $user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $user_image = filter_input(INPUT_POST, 'user_image', FILTER_SANITIZE_STRING);

        $receivedEmailAndPassword = !empty($user_name) && !empty($password);

        if ($receivedEmailAndPassword) {
            // do something with them
            $this->process_valid_registration($user_name, $password, $user_image);

        } else {

            // do action for missing value(s)
            $errorMessage = 'missing email or password - please try again';
            require_once __DIR__ . '/../template/register.php';
        }

    }


    /**
     * this process a valid registration
     * @param $user_name
     * @param $password
     * @param $user_image
     */


    public function process_valid_registration($user_name, $password, $user_image)
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();
        $message = '';


        //enter the new user in the db
        //to prevent Sql injection
        $sql = 'INSERT INTO users (email, password,user_image) VALUES (:email, :password,:user_image)';
        //  var_dump($sql); die();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':email', $user_name, PDO::PARAM_STR);
        $stmt->bindParam(':user_image', $user_image, PDO::PARAM_STR);

        //hash's password inside Sql
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);


        if ($stmt->execute()):
            $message = 'Successfully created new user';
        else:
            $message = 'Sorry there must been an issue creating your account';
        endif;


        require_once __DIR__ . '/../template/register_confirmation.php';

    }

    /**
     * Login actions
     */
    public function process_login_action()
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();


        $user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $user_image = filter_input(INPUT_POST, 'user_image', FILTER_SANITIZE_STRING);


        $receivedLogin = !empty($user_name) && !empty($password);


        if ($receivedLogin):
            $this->process_valid_Login($user_name, $password, $user_image);
        else:
            // do action for missing value(s)
            $errorMessage = 'Wrong login details';
            require_once __DIR__ . '/../template/login.php';
        endif;
    }


    /**
     * makes sure that everything is valid
     * @param $user_name
     * @param $password
     * @param $user_image
     */
    public function process_valid_Login($user_name, $password, $user_image)
    {
        //default session is logged out
        $isLoggedIn = false;

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();


        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();

        $loginmessage = '';
        $loginmessage1 = '';

        $records = $conn->prepare('SELECT id,email,password,user_image FROM users WHERE email = :email');
        $records->bindParam(':email', $user_name);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (count($results) > 0 && password_verify($password, $results['password'])):          //validating passwords match

            $loginmessage = 'Welcome back.  ';
            $user_image = $results['user_image'];

            $_SESSION['user_image'] = $results['user_image'];
            $_SESSION['user'] = $user_name;
            $_SESSION['session_id'] = $results['id'];


            $isLoggedInAsAdmin = $this->isAdminUser();


            require_once __DIR__ . '/../template/login_confirmation.php';
        else:

            $loginmessage1 = 'Your email or password is not in the database. ';
            require_once __DIR__ . '/../template/login_fail.php';
        endif;

    }

    //--------- public functions  for sessions-------


    /**
     * this is helper for session
     * @return bool
     */
    public function is_logged_in_from_session()
    {
        $isLoggedIn = false;

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if (isset($_SESSION['user'])) {
            $isLoggedIn = true;

        }

        return $isLoggedIn;
    }

    /**
     * this passes the username from session
     * @return string
     */
    public function username_from_session()
    {
        $user_name = '';

        // extract username from SESSION superglobal
        if (isset($_SESSION['user'])) {
            $user_name = $_SESSION['user'];
        }

        return $user_name;
    }


    // helper public functions to deal with error i had with strange session id
    /**
     * this passes userId
     * @return string
     */
    public function userID_from_session()
    {
        $userID = '';

        if (isset($_SESSION['session_id'])) {
            $userID = $_SESSION['session_id'];
        }
        return $userID;
    }

    /**
     * this passes userImg
     * @return string
     */
    public function userImg_from_session()
    {
        $userImg = '';

        if (isset($_SESSION['userImg'])) {
            $userImg = $_SESSION['userImg'];
        }
        return $userImg;

    }


    /**
     *this function takes care of loging out
     */
    public function logout_action()
    {
        // remove 'user' element from SESSION array

        $this->kill_session();


        // redirect to index action
        $this->index_action();
    }

    /**
     * shop public functions below
     *
     */
    public function show_one_product_action()
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $product = $productRp->get_one_product($id);

        if (null == $product) {
            $message = 'sorry, no product with id = ' . $id . ' could be retrieved from the database';

            // output the detail of product in HTML table
            require_once __DIR__ . '/../template/message.php';
        } else {
            $isLoggedInAsAdmin = $this->isAdminUser();
            // output the detail of product in HTML table
            require_once __DIR__ . '/../template/detail.php';
        }
    }


    /**
     *this public function is deleting a single product
     */
    public function delete_product_action()
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $success = $productRp->delete_product($id);

        if ($success) {
            $message = 'SUCCESS - product with id = ' . $id . ' was deleted';
        } else {
            $message = 'sorry, product with id = ' . $id . ' could not be deleted';
        }
        $isLoggedInAsAdmin = $this->isAdminUser();

        require_once __DIR__ . '/../template/message.php';
    }

    /**
     *this public function assists with new product form
     */
    public function show_new_product_form_action()
    {
        $isLoggedInAsAdmin = $this->isAdminUser();

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        require_once __DIR__ . '/../template/new_product_form.php';
    }

    /**
     *this public function creates a new product
     */
    public function create_product_action()
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();

        $isLoggedInAsAdmin = $this->isAdminUser();

        $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING);
        $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_SANITIZE_NUMBER_INT);
        $productCode = filter_input(INPUT_POST, 'productCode', FILTER_SANITIZE_STRING);
        $productImage = filter_input(INPUT_POST, 'productImage', FILTER_SANITIZE_STRING);
        $productDesc = filter_input(INPUT_POST, 'productDesc', FILTER_SANITIZE_STRING);


        $success = $productRp->create_product($productName, $productPrice, $productCode, $productImage, $productDesc);

        if ($success) {
            $id = $conn->lastInsertId();
            $message = "SUCCESS - new product added = $productName created";
        } else {
            $message = 'Sorry, there was a problem creating new product';
        }

        require_once __DIR__ . '/../template/message.php';
    }

    /**
     *this is showing updating a product
     */
    public function show_update_product_form_action()
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $isLoggedInAsAdmin =$this-> isAdminUser();

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $product = $productRp->get_one_product($id);

        require_once __DIR__ . '/../template/update_product_form.php';
    }

    /**
     * this public function updates the product and displays message if sucessfull
     */
    public function update_product_action()
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $isLoggedInAsAdmin = $this->isAdminUser();

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING);
        $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_SANITIZE_NUMBER_INT);
        $productCode = filter_input(INPUT_POST, 'productCode', FILTER_SANITIZE_STRING);
        $productImage = filter_input(INPUT_POST, 'productImage', FILTER_SANITIZE_STRING);
        $productDesc = filter_input(INPUT_POST, 'productDesc', FILTER_SANITIZE_STRING);


        $success = $productRp->update_product($id, $productName, $productPrice, $productCode, $productImage, $productDesc);

        if ($success) {
            $message = "SUCCESS - new product with ID = $id updated";
        } else {
            $message = 'Sorry, there was a problem updated the product';
        }

        require_once __DIR__ . '/../template/message.php';
    }

    /**
     *this shows product product and accounts for if user enters an id that is not in db
     */
    public function product_detail_action()
    {
        $productRp = new ProductRepository;
        $shopLinkStyle = 'current_page';

        $conn = $productRp->get_connection();

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();


        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $product = $productRp->get_one_product($id);

        if (null == $product) {
            $message = 'sorry, no product with id = ' . $id . ' could be retrieved from the database';

            // output the detail of product in HTML table
            require_once __DIR__ . '/../template/message.php';
        } else {
            $isLoggedInAsAdmin = $this->isAdminUser();
            // output the detail of product in HTML table
            require_once __DIR__ . '/../template/shop_details.php';
        }
    }

    /**
     *this public function assists in changing the user image
     */
    public function update_user_action()
    {
        $productRp = new ProductRepository;


        $conn = $productRp->get_connection();

        $isLoggedInAsAdmin = $this->isAdminUser();

        $backgroundColor = $this->getBackgroundColor();
        $cssStyleRule = $this->buildStyleRule();

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $user_image = filter_input(INPUT_POST, 'user_image', FILTER_SANITIZE_STRING);


        $success = $productRp->update_user($id, $user_image);


        if ($success) {
            $message = "SUCCESS - Your new image is updated";

        } else {
            $message = 'Sorry, there was a problem updating the image';
        }


        require_once __DIR__ . '/../template/message.php';

    }
    /*      ---------------CHANGING CSS --------------------                    */
    /**
     *  helper for setting color
     * @param $color
     */
    public function changeColor($color)
    {
        // (1) set default style array
        $styleArray = $this->getStyleArray();

        // (2) change color element to parameter
        $styleArray['color'] = $color;

        // store new style array into SESSION
        $_SESSION['styleArray'] = $styleArray;

        // redirect display page (with CSS style rule)
        $this->index_action();
    }

    /**
     * helper for size of text
     * @param $size
     */
    public function changeSize($size)
    {
        // (1) set default style array
        $styleArray = $this->getStyleArray();

        // (2) change color element to parameter
        $styleArray['size'] = $size;

        // store new style array into SESSION
        $_SESSION['styleArray'] = $styleArray;

        // redirect display page (with CSS style rule)
        $this->index_action();
    }

    /**
     * this helps change background colour and font size
     * @return string
     */
    public function buildStyleRule()
    {
        // (1) get style array
        $styleArray = $this->getStyleArray();

        // (3) retrieve color and size from array
        $color = $styleArray['color'];
        $size = $styleArray['size'];

        // (4) build string to define CSS rule for all body text color
        $bodyRule = 'body {'
            . PHP_EOL . "    color: $color;"
            . PHP_EOL . "    font-size: {$size}rem;"
            . PHP_EOL . '}';

        return $bodyRule;
    }

    /**
     * sets
     * @return array
     */
    public function getStyleArray()
    {
        // (1) set default style array
        $styleArray = array();
        $styleArray['color'] = 'black';
        $styleArray['size'] = '1';

        // (2) try to retrieve style array from $_SESSION
        if (isset($_SESSION['styleArray'])) {
            $styleArray = $_SESSION['styleArray'];
        }

        return $styleArray;
    }


    /**
     *this reset the session logs them out  and brings back to index page
     */
    public function forgetSession()
    {
        $this->kill_session();

        // redirect to display text
        $this->index_action();
    }
    /* -----------------------CART public functionS----------------------*/
    /**
     *this public function adds to cart
     */
    public function addToCart()
    {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // get the cart array
        $shoppingCart = $this->getShoppingCart();

        // default is old total is zero
        $oldTotal = 0;

        // if quantity found in cart array, then use this
        if (isset($shoppingCart[$id])) {
            $oldTotal = $shoppingCart[$id];
        }

        // store old total + 1 as new quantity into cart array
        $shoppingCart[$id] = $oldTotal + 1;

        // store new  array into SESSION
        $_SESSION['shoppingCart'] = $shoppingCart;

        // redirect display page
        $this->cart_action();
    }

    /**
     *public function removes from a cart
     */
    public function removeFromCart()
    {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // get the cart array
        $shoppingCart = $this->getShoppingCart();

        // remove entry for this ID
        unset($shoppingCart[$id]);

        // store new  array into SESSION
        $_SESSION['shoppingCart'] = $shoppingCart;

        // redirect display page
        $this->cart_action();
    }

    /**
     * this retrieves the session shopping cart
     * @return array
     */
    public function getShoppingCart()
    {
        if (isset($_SESSION['shoppingCart'])) {
            return $_SESSION['shoppingCart'];
        } else {
            return [];
        }
    }





    /*                        HELPERS                    */
    /**
     *this is to kill the session timeout after time
     */
    public function kill_session()
    {

        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(),
                '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();
    }


    /**
     * helper public function if Admin
     * @return bool
     */
    public function isAdminUser()
    {

        if ('admin' == $this->username_from_session()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * this is to see what the background color
     * @return string
     */
    public function getBackgroundColor()
    {
        // default to lightgrey if not found in $_SESSION
        if (isset($_SESSION['backgroundColor'])) {
            return $_SESSION['backgroundColor'];
        } else {
            return 'lightgrey';
        }
    }

    /**
     * this  now changes
     * @param $color
     */
    public function changeBackgroundColor($color)
    {
        $_SESSION['backgroundColor'] = $color;
        $this-> index_action();
    }
}