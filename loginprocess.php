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

/**
 * Load the bootstrap file.
 */
require __DIR__ . '/config/bootstrap.php';

if (isset($_POST) && !empty($_POST)) {
    // Variables for the query.
    $email = $database->escape($_POST['email']);
    $password = $_POST['password'];
    // Setup the query.
    $query = $database->singleSelect("id, email, password", "users", "WHERE `email`='$email'");

    // If the query is true then setup variables for the login else redirect
    // user telling them their email doesn't exist on the system.
    if ($query !== null) {
        $pass = $query['password'];
        $user = $query['id'];
        // Verify the password. Redirect to my-account on successful login, else
        // redirect with an error message status telling the user they have
        // their email and password incorrect.
        if (password_verify($password, $pass)) {
            $_SESSION['customer'] = $email;
            $_SESSION['customerid'] = $user;
            header("location: my-account.php");
        } else {
            header("location: login.php?message=login-error");
        }
    } else {
        header("location: login.php?message=invalid-account");
    }
}
