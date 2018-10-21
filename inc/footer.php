            <div class="clearfix space70"></div>
        </div>
        <div class="clearfix space90"></div>
        <footer id="footer2">
            <div class="footer-bottom container-footer">
                <div class="row">
                    <div class="col-md-6">
                        <p><?php echo getenv('STORE_FOOTER'); ?></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php
                        // Setup the social media variables for the if
                        // statements and echos.
                        $fab = getenv('SOCIAL_FACEBOOK', null);
                        $twt = getenv('SOCIAL_TWITTER', null);
                        $lin = getenv('SOCIAL_LINKEDIN', null);
                        $you = getenv('SOCIAL_YOUTUBE', null);
                        $goo = getenv('SOCIAL_GOOGLE_PLUS', null);
                        $pin = getenv('SOCIAL_PINTEREST', null);
                        $ins = getenv('SOCIAL_INSTAGRAM', null);
                        $fli = getenv('SOCIAL_FLICKR', null);
                        $vim = getenv('SOCIAL_VIMEO', null);
                        $red = getenv('SOCIAL_REDDIT', null);
                        $slk = getenv('SOCIAL_SLACK', null);
                        $git = getenv('SOCIAL_GITHUB', null);
                        $bit = getenv('SOCIAL_BITBUCKET', null);
                        $wha = getenv('SOCIAL_WHATSAPP', null);
                        $sky = getenv('SOCIAL_SKYPE', null);
                        $wch = getenv('SOCIAL_WECHAT', null);
                        $sli = getenv('SOCIAL_SLIDESHARE', null);
                        $tum = getenv('SOCIAL_TUMBLR', null);
                        $wor = getenv('SOCIAL_WORDPRESS', null);
                        $med = getenv('SOCIAL_MEDIUM', null);
                        $yel = getenv('SOCIAL_YELP', null);
                        $fsq = getenv('SOCIAL_FOURSQUARE', null);
                        // Start the if statments to echo the social
                        // profiles that have been set in .env.
                        if (!empty($fab)) : ?>
                        <a href="https://www.facebook.com/<?php echo $fab; ?>"><i class="fab fa-2x fa-facebook-square"></i></a>
                        <?php endif; if (!empty($twt)) : ?>
                        <a href="https://twitter.com/<?php echo $twt; ?>"><i class="fab fa-2x fa-twitter-square"></i></a>
                        <?php endif; if (!empty($lin)) : ?>
                        <a href="https://linkedin.com/in/<?php echo $lin; ?>"><i class="fab fa-2x fa-linkedin-square"></i></a>
                        <?php endif; if (!empty($you)) : ?>
                        <a href="https://youtube.com/<?php echo $you; ?>"><i class="fab fa-2x fa-youtube-square"></i></a>
                        <?php endif; if (!empty($goo)) : ?>
                        <a href="https://plus.google.com/<?php echo $goo; ?>"><i class="fab fa-2x fa-google-plus-square"></i></a>
                        <?php endif; if (!empty($pin)) : ?>
                        <a href="https://pinterest.com/<?php echo $pin; ?>"><i class="fab fa-2x fa-pinterest-square"></i></a>
                        <?php endif; if (!empty($ins)) : ?>
                        <a href="https://instagram.com/<?php echo $ins; ?>"><i class="fab fa-2x fa-instagram"></i></a>
                        <?php endif; if (!empty($fli)) : ?>
                        <a href="https://flickr.com/<?php echo $fli; ?>"><i class="fab fa-2x fa-flickr"></i></a>
                        <?php endif; if (!empty($vim)) : ?>
                        <a href="https://vimeo.com/<?php echo $vim; ?>"><i class="fab fa-2x fa-vimeo-square"></i></a>
                        <?php endif; if (!empty($red)) : ?>
                        <a href="https://reddit.com/<?php echo $red; ?>"><i class="fab fa-2x fa-reddit-square"></i></a>
                        <?php endif; if (!empty($slk)) : ?>
                        <a href="https://<?php echo $slk; ?>.slack.com/"><i class="fab fa-2x fa-slack"></i></a>
                        <?php endif; if (!empty($git)) : ?>
                        <a href="https://github.com/<?php echo $git; ?>"><i class="fab fa-2x fa-github-square"></i></a>
                        <?php endif; if (!empty($bit)) : ?>
                        <a href="https://bitbucket.com/<?php echo $bit; ?>"><i class="fab fa-2x fa-bitbucket"></i></a>
                        <?php endif; if (!empty($wha)) : ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $wha; ?>"><i class="fab fa-2x fa-whatsapp"></i></a>
                        <?php endif; if (!empty($sky)) : ?>
                        <a href="https://skype.com/<?php echo $sky; ?>"><i class="fab fa-2x fa-skype"></i></a>
                        <?php endif; if (!empty($wch)) : ?>
                        <a href="https://wechat.com/<?php echo $wch; ?>"><i class="fab fa-2x fa-weixin"></i></a>
                        <?php endif; if (!empty($sli)) : ?>
                        <a href="https://www.slideshare.net/<?php echo $sli; ?>"><i class="fab fa-2x fa-slideshare"></i></a>
                        <?php endif; if (!empty($tum)) : ?>
                        <a href="https://<?php echo $tum; ?>.tumblr.com/"><i class="fab fa-2x fa-tumblr-square"></i></a>
                        <?php endif; if (!empty($wor)) : ?>
                        <a href="https://<?php echo $wor; ?>.wordpress.com/"><i class="fab fa-2x fa-wordpress"></i></a>
                        <?php endif; if (!empty($med)) : ?>
                        <a href="https://medium.com/<?php echo $med; ?>"><i class="fab fa-2x fa-medium"></i></a>
                        <?php endif; if (!empty($yel)) : ?>
                        <a href="https://yelp.com/biz/<?php echo $yel; ?>"><i class="fab fa-2x fa-yelp"></i></a>
                        <?php endif; if (!empty($fsq)) : ?>
                        <a href="https://foursquare.com/<?php echo $fsq; ?>"><i class="fab fa-2x fa-foursquare"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>

        <!-- Javascript -->
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/dialogFx.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/dialog-js.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/navigation/jquery.easing.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/flexslider/jquery.flexslider.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/navigation/scroll.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/navigation/jquery.sticky.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/isotope/isotope.pkgd.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/superfish/js/hoverIntent.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/superfish/js/superfish.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/tweecool.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/jquery.bpopup.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/pikaday/pikaday.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/classie.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/jquery.prettyphoto.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/script.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/booking.js"></script>
    </body>
</html>
