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
    <main class="p-5">
        <div class="container-fluid p-5 shadow">
            <h1 class="h1 text-center">Liste des comptes utilisateurs</h1>
            <hr>
            <?php if (isset($validedSuccess)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Le compte <?php echo $validedSuccess; ?> vient d'être activer. Une email a été envoyer à l'addresse "<?php echo $senttomail; ?>".
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } elseif(isset($errorValidation)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Une erreur s'est produite, veuillez reessayer ultierieurement ou contacter le service technique.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Active</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listeUtilisateurs as $key => $utilisateur) { ?>
                        <tr>
                            <th scope="row"></th>
                            <td><?php echo $utilisateur['nom']; ?></td>
                            <td><?php echo $utilisateur['email']; ?></td>
                            <?php if($utilisateur['issuper']==1) { ?>
                            <td class="text-center" colspan="1">Super User</td>
                            <td></td>
                            <?php } else { ?>

                                <td class="text-center"><?php echo $utilisateur['isactive']==0 ? "Non" : "Oui" ?></td>
                                <?php if($utilisateur['isactive']==0) { ?>
                                <td class="text-center">
                                    <a href="<?php echo base_url("Welcome/valider/".$utilisateur['id']) ?>" class="btn btn-sm btn-outline-success">Activer</a>
                                </td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary disabled">Déjà activé</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Re envoyer l'email</a></li>
                                                <li><a class="dropdown-item" href="#">Desactiver</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    
    
    <script src=" <?php echo bootstrap_js("bootstrap.min.js") ?>"></script>
    <script src="<?php echo js_url("script.min.js"); ?>"></script>
</body>

</html>
