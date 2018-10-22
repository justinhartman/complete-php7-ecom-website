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

/**
 * Load the bootstrap file.
 */
require __DIR__ . '/config/bootstrap.php';

/**
 * Load the security component to hash the password.
 */
include_once COMPONENTS . 'security.php';

if (isset($_POST) & !empty($_POST)) {
    // Sanitise the input methods for XSS Attacks.
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $userPass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // Set the password using a hash.
    $hashPass = PasswordHash($userPass);

    // Setup the query to store the email and password in the users table.
    $sql = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$hashPass')";
    $result = $connection->query($sql);

    // Check connection
    if ($connection->connect_error && $debug == true) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Insert the user data into the users table.
    if ($result === TRUE) {
        $_SESSION['customer'] = $email;
        $_SESSION['customerid'] = $connection->insert_id;
        header("location: my-account.php");
    } else {
        header("location: login.php?message=2");
    }
}
