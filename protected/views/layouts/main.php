<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>M1</title>
        <meta property="description" content="<?php echo $this->description; ?>">
        <meta property="og:description" content="<?php echo $this->description; ?>">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/main.css" type="text/css" media="screen, projection">
        <!-- endbuild -->
        <!-- build:js scripts/vendor/modernizr.js -->
        <script src="<?php echo Yii::app()->baseUrl?>/bower_components/modernizr/modernizr.js"></script>
        <script data-main="<?php echo Yii::app()->baseUrl?>/scripts/main" src="bower_components/requirejs/require.js"></script>
        <!-- endbuild -->
    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="i-layout">
            <header>
                <div class="b-header">
                    <div class="logo">
                        <a href="/">
                            <img src="images/logo.png" alt="logo" />
                        </a>
                    </div>
                    <div class="right">
                        <div class="order">
                            <a href="#add_order">
                                заказать звонок
                            </a>
                        </div>
                        <div class="social">
                            <div class="e-social">
                                <a href="<?php echo $this->vk ?>" target="_blank" class="vk"></a>
                                <a href="<?php echo $this->fb ?>" target="_blank" class="fb"></a>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $this->phone ?>
                        </div>
                        <div class="form-container" data-order-container></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </header>
            <?php echo $content;?>
        </div>
        <footer>
            <div class="b-footer">
                2014 &copy; Копирование материалов без согласия владельцев запрещается
            </div>
        </footer>
    </body>
</html>
