<?php
/**
 * Advanced PHP 7 eCommerce Website (https://22digital.agency)
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
 * @copyright Copyright (c) 22 Digital (https://22digital.agency)
 * @copyright Copyright (c) Justin Hartman (https://justinhartman.blog)
 * @author    Justin Hartman <justin@hartman.me> (https://justinhartman.blog)
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
    $dotenv->required(['DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', 'DB_DATABASE', 'STORE_URL']);
}

/**
 * Start the session.
 */
session_start();

/**
 * Setup Debugging. Set to false if not defined in .env.
 */
$debug = getenv('ERROR_DEBUG', false);

/**
 * Load the Database Class file and setup a new $database Object.
 */
require CLASSES . 'database.php';
$database = new Database();
