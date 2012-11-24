        <div class="clear"></div>

        <?php
            if(segment(0, isLang()) !== "live") {
            ?>
                <footer>
                    <p>
                        <?php 
                            echo display('<a href="'. path(slug(__("Advertising")), FALSE, FALSE) .'">'. __("Advertising") .'</a> &nbsp;&nbsp;
                                <!--<a href="'. path(slug(__("Legal notice")), FALSE, FALSE) .'">'. __("Legal notice") .'</a>  &nbsp;&nbsp;-->
                                <!--<a href="'. path(slug(__("Terms of Use")), FALSE, FALSE) .'">'. __("Terms of Use") .'</a>  &nbsp;&nbsp;-->
                                <!--<a href="'. path(slug(__("About CodeJobs")), FALSE, FALSE) .'">'. __("About CodeJobs") .'</a> &nbsp;&nbsp;-->
                                <a href="'. path("links", TRUE) .'">'. __("Links") .'</a> &nbsp;&nbsp;
                                <a href="'. path("feedback") .'">'. __("Contact us") .'</a><br />', TRUE, "Spanish");
                            
                            echo __("This site is licensed under a"); 
                        ?> 
                        
                        <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">Creative Commons Attribution 3.0 License</a>. 
                        <?php echo __("Powered by"); ?> <a href="http://www.milkzoft.com" target="_blank">MilkZoft</a>
                    </p>
                </footer>
            <script type="text/javascript">
                var PATH = "<?php print path(); ?>";
                
                var URL  = "<?php print _get('webURL'); ?>";
            </script>
    
            <?php 
            }   

            echo $this->js("jquery", NULL, TRUE); 
                    
            if(defined("_codemirror")) {
                echo $this->js("codemirror", NULL, TRUE);
            }
            
            if(defined("_angularjs")) {
                echo $this->js("angular", NULL, TRUE);
            }

            if(segment(0, isLang()) === "forums") {
                echo $this->js(_corePath ."/vendors/js/editors/markitup/jquery.markitup.js", NULL, TRUE);
                echo $this->js(_corePath ."/vendors/js/editors/markitup/sets/bbcode/set.js", NULL, TRUE);
            ?>

                <script type="text/javascript">
                    $(document).on("ready", function() {
                        $("textarea").markItUp(mySettings);
                    });
                </script>
            <?php
            }
    
            echo $this->js("$this->themeRoute/js/social.min.js", NULL, TRUE);
            echo $this->js("$this->themeRoute/js/porlets.min.js", NULL, TRUE);

            echo $this->getJs(); 

            echo display('<script type="text/javascript">
                            var sc_project = 7655788; 
                            var sc_invisible = 1; 
                            var sc_security = "f167f55b"; 
                        </script> 

                        <script type="text/javascript" src="http://www.statcounter.com/counter/counter.js"></script>', 4);
        ?>

        <?php 

            if(segment(0, isLang()) === "live") {
            ?>
                <script src="<?php echo path("www/lib/scripts/js/tweetscroller/js/handlebars.js", TRUE); ?>"></script>
                <script src="<?php echo path("www/lib/scripts/js/tweetscroller/js/moment.js", TRUE); ?>"></script>
                <script src="<?php echo path("www/lib/scripts/js/tweetscroller/js/jquery.masonry.js", TRUE); ?>"></script>
                <script src="<?php echo path("www/lib/scripts/js/tweetscroller/js/jquery.hoverIntent.js", TRUE); ?>"></script>
                <script src="<?php echo path("www/lib/scripts/js/tweetscroller/js/jquery.tweetscroller.js", TRUE); ?>"></script>
                <script>
                    (function(){
                        $('#tweets').tweetscroller({
                            autoplay: true,
                            speed: 65,
                            username: 'codejobs'
                        });
                    })(jQuery);
                </script>
            <?php
            }
            ?>
    </body>
</html>