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
    <title>Clima-now <?php echo $titre; ?> </title>
    <link rel="stylesheet" href="<?php echo bootstrap_css("bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?php echo font_url("simple-line-icons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo css_url("styles.min.css"); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top shadow-sm bg-light border-bottom" id="mainNav">
        <div class="container"><a class="navbar-brand" href="index.html">Teach-me</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-2"><a class="nav-link" href="<?php echo base_url("Accueil");?>">Home</a></li>
                    <li class="nav-item me-2"><a class="nav-link" href="<?php echo base_url("Accueil/aboutus");?>">About us</a></li>
                    <li class="nav-item me-2"><a class="nav-link" href="<?php echo base_url("Categorie");?>">Categorie</a></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-5 pt-5" >
        <?php include("FO-".$page.".php"); ?>
    </div>
    
    <footer>
        <div class="container-fluid text-center mt-5 border-top pt-3" >
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <p class="text-muted copyright">Copyright&nbsp;©&nbsp;Climat k'now 2022</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo bootstrap_js("bootstrap.min.js"); ?>"></script>
    <script src="<?php echo js_url("clean-blog.js"); ?>"></script>
</body>

</html>

