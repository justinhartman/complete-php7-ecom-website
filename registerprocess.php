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

/**
 * Load the security component to hash the password.
 */
include_once COMPONENTS . 'security.php';

// Check that the passwords match and this is a $_POST request before we even
// think about doing anything.
if (isset($_POST) && !empty($_POST) && $_POST['password'] === $_POST['password_again']) {
    // Sanitise the input methods for XSS Attacks.
    $email = $database->escape($_POST['email']);
    $password = $database->escape($_POST['password']);

    // Set the password using a hash.
    $hashedPassword = PasswordHash($password);

    // Setup the insert statement.
    $tableName = 'users';
    $data = array(
    	'email' => $email,
    	'password' => $hashedPassword
    );
    $query = $database->insert($tableName, $data);

    if ($query === TRUE) {
        $_SESSION['customer'] = $email;
        $_SESSION['customerid'] = $database->insert_id;
        header("location: my-account.php");
    } else {
        header("location: login.php?message=general-error");
    }
} else {
    // Redirect back to login with the password error message.
    header("location: login.php?message=password-mismatch");
}
