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

if (isset($_POST) & !empty($_POST)) {
    // Variables for the query.
    $email = $database->Quote($_POST['email']);
    $password = $_POST['password'];
    // Setup the query.
    $query = "SELECT * FROM `users` WHERE `email`='$email'";
    // Count the number of rows.
    $count = $database->NumRows($query);
    // Get results from the select statement.
    $result = $database->Select($query);

    // If the query is true then setup variables for the login.
    if ($result == true) {
        $pass = $result['0']['password'];
        $user = $result['0']['id'];
    }

    if ($count === 1) {
        if (password_verify($password, $pass)) {
            $_SESSION['customer'] = $email;
            $_SESSION['customerid'] = $user;
            header("location: my-account.php");
        } else {
            header("location: login.php?message=1");
        }
    } else {
        header("location: login.php?message=3");
    }
}
