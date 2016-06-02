<?php

use app\assets\ThemeAsset;
use yii\helpers\Html;

/**
 * @var $this    \yii\web\View
 * @var $content string
 */

ThemeAsset::register($this);

?>

<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= \Yii::$app->language; ?>" class="no-js">
    <head>

        <!-- ==============================================
        Title and Meta Tags
        =============================================== -->
        <meta charset="<?= \Yii::$app->charset; ?>">
        <title><?= \Yii::$app->formatter->asText($this->title); ?></title>

        <?= Html::csrfMetaTags(); ?>
        <?php $this->head(); ?>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- ==============================================
        Favicons
        =============================================== -->
        <link rel="shortcut icon" href="assets/favicon.ico">
        <link rel="apple-touch-icon" href="assets/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/apple-touch-icon-114x114.png">

        <?php
        /*
         * <link rel="stylesheet" href="css/bootstrap.min.css">
         * <link rel="stylesheet" href="css/sequencejs-qubico.css"/>
         * <link rel="stylesheet" href="css/font-awesome.css">
         * <link rel="stylesheet" href="css/flexslider.css">
         * <link rel="stylesheet" href="css/colorbox.css"/>
         * <link rel="stylesheet" href="css/qubico.css">
         * <link id="main" rel="stylesheet" href="css/qubico-cyan.css">
         * <link id="theme" rel="stylesheet" href="css/qubico-cyan.css">
         * <link rel="stylesheet" href="css/style-switcher.css">
         */
        ?>

        <link href='http://fonts.googleapis.com/css?family=Dosis:600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900' rel='stylesheet' type='text/css'>

        <?php
        /*
         * <!--[if lt IE 9]>
         * <script src="js/respond.min.js"></script>
         * <![endif]-->
         * <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
         */
        ?>
    </head>

    <body data-spy="scroll" data-target="#main-nav" data-offset="400">
    <?php $this->beginBody(); ?>

    <?= $this->render('theme_navbar'); ?>
    <?= $content; ?>

    <?= $this->render('theme_footer'); ?>
    <!-- ============================================== SCRIPTS =============================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js">\x3C/script>')</script>

    <?php
    /*
     * <script src="js/libs/bootstrap.min.js"></script>
     * <script src='js/jquery.scrollto.js'></script>
     * <script src='js/jquery.easing.1.3.min.js'></script>
     * <script src='js/jquery.flexslider.min.js'></script>
     * <script src='js/jquery.fitvids.js'></script>
     * <script src='js/jquery.fittext.js'></script>
     * <script src="js/waypoints.min.js"></script>
     * <script src="js/jquery.countTo.js"></script>
     * <script src="js/jquery.easypiechart.js"></script>
     * <script src="js/jquery.sequence-min.js"></script>
     * <script src="js/jquery.colorbox-min.js"></script>
     * <script src="js/contact.js"></script>
     * <script src="js/qubico.js"></script>
     * <script src="js/style-switcher.js"></script>
     */
    ?>

    <script>
        $(window).load(function () {
            $('.macbook-screen').html('<iframe width="640" height="360" src="http://www.youtube.com/embed/JuyB7NO0EYY?feature=player_detailpage&amp;wmode=transparent" frameborder="0" allowfullscreen></iframe>');
            $('.macbook-screen').fitVids();
        })
    </script>

    <!--Style Switcher-->
    <div id="style-switcher">
        <div id="toggle-switcher"><i class="fa fa-cogs"></i></div>
        <h1>Change Color</h1>
        <ul>
            <li id="red"></li>
            <li id="orange"></li>
            <li id="yellow-orange"></li>
            <li id="yellow"></li>
            <li id="grass"></li>
            <li id="green"></li>
            <li id="light-green"></li>
            <li id="cyan"></li>
            <li id="blue"></li>
            <li id="light-purple"></li>
            <li id="purple"></li>
            <li id="pink"></li>
        </ul>
    </div><!--End Style Switcher-->
    <?php $this->endBody(); ?>
    </body>

    </html>
<?php $this->endPage(); ?>