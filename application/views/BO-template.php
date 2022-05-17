<?php 
    $titre = " ";
    if(isset($title)){
        $titre = "- ".$title;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clima-now -- Backoffice <?php echo $titre; ?> </title>
    <link rel="stylesheet" href="<?php echo bootstrap_css("bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo font_url("simple-line-icons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo css_url("styles.min.css"); ?>">
    <?php if (isset($css_files)) { ?>
        <?php foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
    <?php } ?>
</head>

<body style="background-color: #FBF8F1;">
    <div class="container-fluid">
        <header class=" mb-4 shadow row bg-light">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-8 d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Accueil</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Categorie</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Article</a></li>
                </ul>
            </div>
            
        </header>
        <div class=" d-flex justify-content-center ">
            <?php include('BO-'.$page.'.php'); ?>
        </div>
    </div>


    <script src=" <?php echo bootstrap_js("bootstrap.min.js") ?>"></script>
    <script src="<?php echo js_url("script.min.js"); ?>"></script>
    <?php if (isset($css_files)) { ?>
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    <?php } ?>
</body>

</html>     
