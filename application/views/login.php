<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Ronono-Vel</title>
    <link rel="stylesheet" href="<?php echo bootstrap_css("bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo font_url("simple-line-icons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo css_url("styles.min.css"); ?>">
</head>

<body>
    <main class="page login-page">
        <section class="clean-block clean-form dark p-5">
            <div class="container w-50 p-5 shadow border">
                <div class="block-heading p-3 text-center">
                    <h2 class="text-info ">Login</h2>
                    <p>Pour pouvoir continuer, veuillez vous connecter. <a href="<?php echo base_url("Welcome/inscription"); ?>">S'inscrire?</a></p>
                </div>
                <form class="p-2" action="<?php echo base_url("Welcome/log"); ?>" method="POST">
                    <div>
						<?php if (isset($erreurConnexion)) { ?>
                        <p class="text-center alert alert-danger alert-dismissible fade show" >*<?php echo $erreurConnexion; ?>* <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
						<?php } ?>
                    </div>
                    <div class="mb-3">
						<label class="form-label" for="email">Email</label>
						<input class="form-control item" name="myemail" type="email" id="email" value="<?php echo isset($mail) ? $mail : "" ;?>">
						<?php if (isset($erreurMail)) { ?>
						<label class="form-label text-danger text-center" style="font-size: 12px;">*<?php echo $erreurMail; ?>*</label></div>
						<?php } ?>
						<br>
                    <div class="mb-3">
						<label class="form-label" for="password">Password</label>
						<input class="form-control" name="mypassword" type="password" id="password" value="">
						<?php if (isset($erreurPassword)) { ?>
						<label class="form-label text-center text-danger text-center" style="font-size: 12px;">*<?php echo $erreurPassword; ?>*</label>
						<?php } ?>
						<br>
					</div>
					<button class="btn btn-primary" type="submit">Se connecter</button>
						
                </form>
            </div>
        </section>
    </main>
    <script src=" <?php echo bootstrap_js("bootstrap.min.js") ?>"></script>
    
    <script src="<?php echo js_url("script.min.js"); ?>"></script>
</body>

</html>
