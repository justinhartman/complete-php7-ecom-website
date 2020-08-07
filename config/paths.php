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
 * Use the DS to separate the directories in other defines.
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * The full path to the directory WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * Path to the vendor directory.
 */
define('VENDOR', ROOT . DS . 'vendor' . DS);

/**
 * Path to the includes directory.
 */
define('INC', ROOT . DS . 'inc' . DS);

/**
 * Path to the classes include directory.
 */
define('CLASSES', INC . 'classes' . DS);

/**
 * Path to the components include directory.
 */
define('COMPONENTS', INC . 'components' . DS);

/**
 * Path to the Admin includes directory.
 */
define('ADMIN_INC', ROOT . DS . 'admin' . DS . 'inc' . DS);
