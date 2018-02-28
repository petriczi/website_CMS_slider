
    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <?php 
        include "settings.php";
    ?>
<br /><br /><br /><br />
    <script src="jssor.slider.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 1,
                $Orientation: 2,
                $Align: 0,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = <?php echo $MAX_WIDTH_SLIDER; ?>;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssora061 {display:block;position:absolute;cursor:pointer;}
        .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
        .jssora061:hover {opacity:.8;}
        .jssora061.jssora061dn {opacity:.5;}
        .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
    </style>

<?php
    
    $pol= mysql_connect($DB_HOST , $DB_LOGIN , $DB_PASSWORD);
    if($pol)
    {
        $baza=mysql_select_db($DB_NAME);
        if($baza){ }
        else
            echo 'Data base error1: '.mysql_error();
    }    
    else
        echo 'Data base error2: '.mysql_error();

        $record1=mysql_query("SELECT * FROM $DB_TABLE_NAME WHERE id=1");
        $slide1 = mysql_fetch_array($record1);
        $record2=mysql_query("SELECT * FROM $DB_TABLE_NAME WHERE id=2");
        $slide2 = mysql_fetch_array($record2);
        $record3=mysql_query("SELECT * FROM $DB_TABLE_NAME WHERE id=3");
        $slide3 = mysql_fetch_array($record3);
    ?>
    








    <div id="jssor_1" style="position:relative;top:-68px;left:0px;bottom:-100px;width:480px;height:310px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" >
            <!--<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />-->
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:480px;height:400px;overflow:hidden;">
            <div>
                <a href="<?php echo $slide1[$LINK_DB_NAME]; ?>">
                <img data-u="image" src="<?php echo $slide1[$PICTURE_DB_NAME]; ?>" /></a>
                <div data-u="thumb"><?php echo $slide1[$TITLE_DB_NAME]; ?></div>
            
            </div>
            <div>
                <a href="<?php echo $slide2[$LINK_DB_NAME]; ?>">
                <img data-u="image" src="<?php echo $slide2[$PICTURE_DB_NAME]; ?>" /></a>
                <div data-u="thumb"><?php echo $slide2[$TITLE_DB_NAME]; ?></div>
            
            </div>
            <div>
                <a href="<?php echo $slide3[$LINK_DB_NAME]; ?>">
                <img data-u="image" src="<?php echo $slide3[$PICTURE_DB_NAME]; ?>" /></a>
                <div data-u="thumb"><?php echo $slide3[$TITLE_DB_NAME]; ?></div>
            
            </div>



        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" style="position:absolute;bottom:-1px;left:0px;width:980px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
            <div data-u="slides">
                <div data-u="prototype" style="position:absolute;top:0;left:0;width:980px;height:50px;">
                    <div data-u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
    <br /><a href="sliderCMS.php"> slider CMS </a>
<?php
mysql_close($pol);
?>
