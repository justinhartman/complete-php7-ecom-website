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
 * Get and Set the environment variables.
 */
$dbHost     = getenv("DB_HOST");
$dbUsername = getenv("DB_USERNAME");
$dbPassword = getenv("DB_PASSWORD");
$database   = getenv("DB_DATABASE");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $database);

if ($connection->connect_error && $debug == true) {
    echo "Error: Unable to connect to MySQL.<br>" . PHP_EOL;
    echo "Debug Error Number: " . mysqli_connect_errno() . "<br>" . PHP_EOL;
    echo "Debug Error: " . mysqli_connect_error() . "<br>" . PHP_EOL;
    exit;
} elseif ($connection->connect_error) {
    echo "Error: Unable to connect to the Database Server.<br>" . PHP_EOL;
}
