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

function PasswordHash($pass)
{
    // $pass = $userPass;
    $phpVersion = phpversion();
    if ($phpVersion >= '7.3.0') {
        // This is the Argon2 method which only works on PHP 7.2.* upwards as it was
        // only introduced in 7.2.0.
        $password = password_hash($pass, PASSWORD_ARGON2I);
        return $password;
    } else {
        // Set the options with the cost param.
        $options = [
            'cost' => '12',
        ];
        $password = password_hash($pass, PASSWORD_BCRYPT, $options);
        return $password;
    }
}

if (isset($_POST) & !empty($_POST)) {
    // Sanitise the input methods for XSS Attacks.
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $userPass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    // Set the password using a hash.
    $hashPass = PasswordHash($userPass);

    // Store the email and password in the DB.
    $sql = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$hashPass')";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    if ($result) {
        $_SESSION['customer'] = $email;
        $_SESSION['customerid'] = mysqli_insert_id($connection);
        header("location: my-account.php");
    } else {
        header("location: login.php?message=2");
    }
}
