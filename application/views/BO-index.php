<?php 


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clima-now -- Backoffice - Accueil </title>
    <link rel="stylesheet" href="<?php echo bootstrap_css("bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo font_url("simple-line-icons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo css_url("styles.min.css"); ?>">
</head>

<body>
    <div class="container row p-5 shadow  bg-light rounded ">
        <div class="col-md-12 ">
            <p class="display-4 text-center">Back-Office</p>
            <hr/>
            <p> Ou vous voulez visiter en premier lieux? </p>
            <div class="btn-group d-flex mt-4 justify-content-center" role="group" aria-label="Basic outlined example">
                <a href="<?php echo site_url('Backoffice/')?>" class="btn btn-outline-primary">Categorie</a>
                <a href="<?php echo site_url('Backoffice/')?>" class="btn btn-outline-primary">Article</a>
            </div>
        </div>
    </div>
    <script src=" <?php echo bootstrap_js("bootstrap.min.js") ?>"></script>
    <script src="<?php echo js_url("script.min.js"); ?>"></script>
</body>

</html>     