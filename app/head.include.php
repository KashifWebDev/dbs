<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DBS Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom_css/main.css?v=<?php echo rand(); ?>" rel="stylesheet">
    <?php
    if (isset($_SESSION["darkTheme"]) && $_SESSION["darkTheme"] == 1){
        echo '
            <link href="assets/custom_css/dark_theme.css?v='.rand().'" rel="stylesheet">
        ';
    }else{
        echo '
              <link href="assets/custom_css/light_theme.css?v='.rand().'" rel="stylesheet">

        ';
    }
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap');
    </style>

<!--    <script src="assets/jquery/jquery.slim.min.js"></script>-->
<!--    <script src="assets/jquery/jquery-3.5.1.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>