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
 * @since     0.3.2
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 */

/**
 * Load the bootstrap file.
 */
require __DIR__ . '/config/bootstrap.php';

/**
 * Load the template files.
 */
include INC . 'header.php';
include INC . 'nav.php';
?>


<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
                <div class="page_header text-center">
                    <h2>Contact Us</h2>
                    <p>You can contact us via any of the methods below.</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <h2>Support Options</h2>
                        <hr>
                        <div class="col-sm-6">
                            <h4>Email:</h4>
                            <br>
                            <h4>Phone:</h4>
                            <br>
                            <h4>WhatsApp:</h4>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <h4><a href="mailto:<?php echo getenv('SALES_EMAIL', null); ?>?subject=Website+Enquiry"><?php echo getenv('SALES_EMAIL', null); ?></a></h4>
                            <br>
                            <h4><a href="tel:<?php echo getenv('SALES_TELEPHONE', null); ?>"><?php echo getenv('SALES_TELEPHONE', null); ?></a></h4>
                            <br>
                            <h4><a href="https://api.whatsapp.com/send?phone=<?php echo getenv('SALES_WHATSAPP', null); ?>"><?php echo getenv('SALES_WHATSAPP', null); ?></a></h4>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix space20"></div>
                    <div class="row">
                        <h2>Our Address Details</h2>
                        <hr>
                        <div class="col-sm-12">
                            <h3><?php echo getenv('COMPANY_NAME', null); ?></h3>
                            <br>
                            <p><?php echo getenv('ADDRESS_LINE_ONE', null); ?></p>
                            <p><?php echo getenv('ADDRESS_LINE_TWO', null); ?></p>
                            <p><?php echo getenv('ADDRESS_SUBURB', null); ?></p>
                            <p><?php echo getenv('ADDRESS_CITY', null); ?></p>
                            <p><?php echo getenv('ADDRESS_STATE', null); ?></p>
                            <p><?php echo getenv('ADDRESS_COUNTRY', null); ?></p>
                            <p><?php echo getenv('ADDRESS_POSTAL_CODE', null); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <h2>Come Visit Us</h2>
                    <hr>
                    <div id="map-pop"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo getenv('GOOGLE_MAPS_API_KEY', null); ?>&v=quarterly&callback=initMap" type="text/javascript"></script>
<script src="<?php echo getenv('STORE_URL'); ?>/assets/js/gmap.js"></script>

<?php include INC . 'footer.php'; ?>
