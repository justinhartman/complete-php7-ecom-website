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
 * @since     0.5.0
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 */

/**
 * This method hashes all the passwords using either Argon2, for PHP >= 7.2.0,
 * or Bcrypt on versions below 7.2.0.
 *
 * @param  string      $pass Password string from $_POST data.
 *
 * @return string|null Returns the Hashed password.
 */
function PasswordHash($pass)
{
    $phpVersion = phpversion();
    if ($phpVersion >= '7.2.0') {
        // This is the Argon2 method which only works on PHP 7.2.* upwards as it
        // was only introduced in 7.2.0.
        $password = password_hash($pass, PASSWORD_ARGON2I);
        return $password;
    } else {
        // Set the options with the cost param. 12 is quite high so if your
        // server is slowing down on login/register then change this to 10. The
        // base of 10 should be fine for most servers.
        $options = [
         'cost' => '12',
     ];
        $password = password_hash($pass, PASSWORD_BCRYPT, $options);
        return $password;
    }
}
