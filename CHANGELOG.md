# Project Change-Log

Below is a detailed change-log, along with specific tasks completed, for each
version released to date.

## Version 1.0.0 (07/08/2020)

- [#new](#new)
  + Added new components path in paths.php.
  + Added new link to Wishlist in the navigation bar.
  + Added Classes folder in paths.php.
  + New Database Class file for migrating to OOP with Queries.
  + New .htaccess for pretty URLs & Sets up security and caching.
  + New 404 page.
  + New MySQLi Class file for handling queries.
  + New MySQL Workbench Schema File.
- [#bugfix](#bugfix)
  + Fixed issue #4 which related to `composer.json` formatting issues.
  + Fixed error message on login page.
  + Removed SSL redirect in .htaccess.
  + Fixed error where check for two $_POST clauses were only separated with 
    one ampersand instead of two.
- [#enhancement](#enhancement)
  + Included install instructions in the [README](README.md).
  + Updated packages in `composer.json`.
  + New security component file for storing security related functions.
  + Updated register to use security component.
  + Adjusted Footer CSS.
  + Login Process file now migrated to use new DB Class file.
  + Bootstrap file includes the database.php class file and creates new DB 
    object.
  + Added more values to .env files.
  + Changed MySQLi Class to use camelCase for method names.
  + Updated Register to use new MySQLi Class.
  + Updated Register to validate passwords match.
  + Updated the check for error messages on Login and Register.
  + Updated SQL creation script with Foreign Keys and Indexes.

## Version 0.5.0 (22/10/2018)

- [#new](#new)
  - New Insert method now added to edit-address.php.
  - Added new CSS styles for single.php.
  - Added Debugging options for Dev environments.
  - New PasswordHash method for hashing passwords correctly.
  - Updated CSS with new styles to align with changes to index.php.
  - Added new pattern.jpg file for the background image.
  - Added new user does not exist error method on Login page.
  - Added missing separator image.
- [#enhancement](#enhancement)
  - Converted queries to new MySQL objects.
  - Added success, error and warning messages along with some validation.
  - Changed MySQL connection script to use objects instead.
  - Changed Login / Sign In buttons based on logged in/out state.
  - Only display MySQL errors with Debugging on.
  - Changed layout from the original theme.
  - Changed the loop for product listing.
  - Restructured footer.php and header.php for new layout.
  - Redirect users to my-account on login.
  - Cleaned up some pages.
  - Rewrote the checkout.php page with new queries and better way of handling
    post data.
  - Added validation checking to the checkout.php POST variables and HTML form.
  - Cleaned up CSS file.
- [#bugfix](#bugfix)
  - Fixed layout on single.php.
  - Fixed Add to Wishlist button.
  - Fixed dynamic link to Categories from Single page.
  - Sanitised the input methods for XSS Attacks.
  - Fixed layout with product products not appearing on the same lines.
  - Fixed warning message about SESSION not being set.

## Version 0.4.0 (21/10/2018)

- [#new](#new)
  - Added new Contact page.
- [#enhancement](#enhancement)
  - Hiding the Google Map from the browser until we have a working Contact Page.
  - Removed Google Map Scripts from Footer and Migrated to Contact Page.
- [#bugfix](#bugfix)
  - Fixed Uncaught TypeError getAttribute error.
  - Fixed 15 JavaScript & 404 errors appearing in Developer Tools Console.
  - Replaced Google Maps with working API Key and error free JavaScript.
  - Fixed all remaining Dev Tools Console Bugs - no errors anymore.

## Version 0.3.2 (20/10/2018)

- [#new](#new)
  - Added Social Media icons to footer and .env files as variables.
- [#bugfix](#bugfix)
  - Check to see if 'cart' session is set.
  - Fixed the missing ; from the footer.php includes.

## Version 0.3.1 (20/10/2018)

- [#new](#new)
  - Added new ADMIN_INC, updated Admin index and login pages.
  - Added full country selector to edit-address.php. Cleaned up other pages.
- [#enhancement](#enhancement)
  - Enclosed SQL queries and updated links.
  - Implemented more reliable method for cart totals.
  - Removed the `<em>` when zero items in cart.
  - Checkout page has been totally over-hauled. It wasn't dynamic and hard-coded
    plus there was no check for if there were actually items to check out.
- [#bugfix](#bugfix)
  - Fixed bug where users could view orders that they didn't place.
  - Fixed up queries and variables in my-account.
  - Removed the echo on the cart page.
  - Fixed multiple errors on cart.php.
  - Fixed issue where nav cart total was doubling the total on cart.php.
  - Fixed errors when the `$_SESSION['cart']` data is null.

## Version 0.3.0 (19/10/2018)

- [#new](#new)
  - Added STORE_NAME env variable.
  - Added new STORE_TAGLINE env variable.
- [#enhancement](#enhancement)
  - Moved js, css and font-awesome into new assets folder. Updated template files.
  - Modified the core files to include bootstrap.php and set proper includes.
  - Added STORE_CURRENCY env variable. Updated nav.php.
  - Updated Nav links.
- [#bugfix](#bugfix)
  - Fixed out layout problems with login page.
  - Enclosed the SQL statements in single.php.
  - Removed extra div tag in single.php.
  - Fixed broken layout on single.php file.

## Version 0.2.1 (18/10/2018)

- [#bugfix](#bugfix)
  - Added SITE_URL environment variable and updated links in templates.
  - Fixed PHP warnings with cart when it has zero items in it.

## Version 0.2.0 (18/10/2018)

- [#new](#new)
  - Loaded dotenv() support to use global variables instead.
  - Using Composer now for third-party libraries.
  - New paths file for using variables for common paths.
  - Added requirements file to check minimum PHP requirements.
  - Index now loads requirements and bootstrap file.
- [#enhancement](#enhancement)
  - Renamed & moved DB schema and dump files.
  - Updated DB connect to use dotenv.
  - New include method for templates.

## Version 0.1.0 (17/10/2018)

- [#new](#new)
  - Initial source code checkin.
  - New template files in `/inc`.
  - New Admin area files in `/admin`.
  - New `/config` file.
  - New website template design with `/css/`, `/font-awesome/` and `/js/`
    folders.
- [#enhancement](#enhancement)
  - Added GitHub template files.
  - Updated the `README.md` file with project specific information.
  - New `.editorconfig` file.
- [#bugfix](#bugfix)
  - Updated GitHub template files with project details.

## Version 0.0.1 (17/10/2018)

- [#new](#new)
  - Initial commit.
