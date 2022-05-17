<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Ronono-Vel</title>
    <link rel="stylesheet" href="<?php echo bootstrap_css("bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo font_url("simple-line-icons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo css_url("styles.min.css"); ?>">
</head>

<body>
    <main class="page registration-page">
        <section class="clean-block clean-form dark p-5">
            <div class="container w-50 p-5 shadow border">
                <div class="block-heading p-3 text-center">
                    <h2 class="text-info">Inscription</h2>
                    <hr>
                    <p>Pour vous inscrire, veuillez remplir les champs ci-dessous, et après, une email de confirmation vous sera envoyer. <a href="<?php echo base_url("Welcome/login"); ?>">Se conneter?</a></p>
                </div>
                <form action="<?php echo base_url("Welcome/register"); ?>" class="p-2" method="POST">
                    <div>
						<?php if (isset($erreurConnexion)) { ?>
                        <p class="text-center alert alert-danger alert-dismissible fade show" >*<?php echo $erreurConnexion; ?>* <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>
						<?php } ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Nom</label>
                        <input class="form-control item" type="text" id="name" name="nom" value="<?php echo isset($nom) ? $nom : "" ?>" />
                        <?php if (isset($erreurNom)) { ?><label class="form-label text-center" style="color: var(--bs-danger);font-size: 12px;text-align: center;">*<?php echo $erreurNom; ?>*</label><?php } ?></div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input class="form-control item " type="password" name="password">
                        <?php if (isset($erreurPassword)) { ?><label class="form-label text-center" style="color: var(--bs-danger);font-size: 12px;text-align: center;">*<?php echo $erreurPassword; ?>*</label><?php } ?></div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Ressaisissez votre mot de passe</label>
                        <input class="form-control item" type="password" name="repassword">
                        <?php if (isset($erreurPassword)) { ?><label class="form-label text-center" style="color: var(--bs-danger);font-size: 12px;text-align: center;">*<?php echo $erreurPassword; ?>*</label><?php } ?></div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control item" type="email" id="email" name="email" value="<?php echo isset($email) ? $email : "" ?>">
                        <?php if (isset($erreurMail)) { ?>
                            <label class="form-label text-center" style="color: var(--bs-danger);font-size: 12px;text-align: center;">*<?php echo $erreurMail; ?>*</label>
                        <?php } ?>
                        </div>
                        <button class="btn btn-primary" type="submit">Sign Up</button>
                </form>
            </div>
        </section>
    </main>
    <script src=" <?php echo bootstrap_js("bootstrap.min.js") ?>"></script>
    
    <script src="<?php echo js_url("script.min.js"); ?>"></script>
</body>

</html>
