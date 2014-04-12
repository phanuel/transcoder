<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transcoder</title>
        <link href="<?php echo base_url(); ?>lib/bootstrap-3.1.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>lib/jquery-autosize.min.js"></script>
        <script src="<?php echo base_url(); ?>lib/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/stats.js"></script>
        <script src="<?php echo base_url(); ?>js/transcoder.js"></script>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="header" class="jumbotron">
            <div class="container">
                <h1>Transcoder</h1>
                <h3><?php echo isset($description) ? $description : ""; ?></h3>
            </div>
        </div>
        <div class="container">
            <?php echo isset($content) ? $content : ""; ?>
        </div>
        <div id="footer">
            <div class="container">
                <hr />
                <p>Transcoder v3.0.0 — Aucune garantie n'est donnée quant à l'exactitude des conversions.</p>
            </div>
        </div>
    </body>
</html>
