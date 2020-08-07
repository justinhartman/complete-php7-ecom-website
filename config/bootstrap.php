<?php
/**
 * Advanced PHP 7 eCommerce Website (https://22digital.co.za)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 *
 * @copyright Copyright (c) 22 Digital (https://22digital.co.za)
 * @copyright Copyright (c) Justin Hartman (https://justinhartman.co)
 * @author    Justin Hartman <justin@hartman.me> (https://justinhartman.co)
 * @link      https://github.com/justinhartman/complete-php7-ecom-website GitHub Project
 * @since     0.1.0
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 */

/*
 * Configure paths required to find general filepath constants.
 */
require __DIR__ . '/paths.php';

/**
 * Include the composer autoloader.
 */
require VENDOR . 'autoload.php';

/**
 * To use `.env` file during development you should copy `config/.env.default`
 * to `config/.env` and set/modify the variables as required.
 *
 * Make sure that you also adjust the `config/.env.prod` file to your production
 * server's app specific details. When you install the app on a production
 * server, Composer copies this file to `config/.env` on post-install.
 */
if (file_exists(CONFIG . '.env')) {
    $dotenv = new Dotenv\Dotenv(CONFIG, '.env');
    $dotenv->load();
    // Check that the following variables have been defined.
    $dotenv->required(['DB_HOSTNAME', 'DB_USERNAME', 'DB_PASSWORD', 'DB_DATABASE', 'STORE_URL']);
}

/**
 * Setup Debugging. Set to false if not defined in .env.
 */
$debug = getenv('ERROR_DEBUG', false);

/**
 * Start the session as most data we use for the Shop comes via $_SESSION
 * variable data.
 */
session_start();

/**
 * Setup the variables that allow us to connect to the database server.
 */
$dbHostname = getenv('DB_HOSTNAME');
$dbUsername = getenv('DB_USERNAME');
$dbPassword = getenv('DB_PASSWORD');
$dbDatabase = getenv('DB_DATABASE');
$dbPort     = getenv('DB_PORT', null);
$dbSocket   = getenv('DB_SOCKET', null);

/**
 * Load the Database Class file and setup a new $database Object.
 */
require CLASSES . 'mysqli.php';

try {
    // Create new DatabaseManager object.
    $database = new DatabaseManager();
    // Connect Database.
    $database->Connect($dbHostname, $dbUsername, $dbPassword, $dbDatabase, $dbPort, $dbSocket);
} catch (Exception $err) {
    exit($err->getMessage());
}

/**
 * Check to see if the cart is in the session data else default to null.
 * We do this because the $cart and $count variables are used extensively
 * below and will output warnings if we don't.
 */
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $count = count($cart);
} else {
    $count = 0;
}
