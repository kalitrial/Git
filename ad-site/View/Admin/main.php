<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>

    <link href="<?php echo ROOT_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ROOT_URL;?>assets/css/datepicker3.css" rel="stylesheet">
    <link href="<?php echo ROOT_URL;?>assets/css/styles.css" rel="stylesheet">

    <!--Icons-->
    <script src="<?php echo ROOT_URL;?>assets/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="<?php echo ROOT_URL;?>assets/js/html5shiv.js"></script>
    <script src="<?php echo ROOT_URL;?>assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php require $path;?>

    <script src="<?php echo ROOT_URL;?>assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo ROOT_URL;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo ROOT_URL;?>assets/js/chart.min.js"></script>
    <script src="<?php echo ROOT_URL;?>assets/js/chart-data.js"></script>
    <script src="<?php echo ROOT_URL;?>assets/js/easypiechart.js"></script>
    <script src="<?php echo ROOT_URL;?>assets/js/easypiechart-data.js"></script>
    <script src="<?php echo ROOT_URL;?>assets/js/bootstrap-datepicker.js"></script>
    <script>
        $('#calendar').datepicker({
        });

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>

</body>

</html>
