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
    <div class="container-fluid row">
        <div class="col-md-8 p-4">
            <div class="row">
                <div class="shadow p-5">
                    <h5 class="text-center">Etat de Stock</h5>
                    <hr class="sm">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Matiere</th>
                                <th scope="col" class="text-end">Quantité</th>
                                <th scope="col" class="text-end">Prix Unitaire Moyen</th>
                                <th scope="col" class="text-end">Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listEtatStock as $key => $stock) { ?>
                                <tr>
                                    <th scope="row"><?php echo $key+1; ?></th>
                                    <td><?php echo $stock['nom']; ?></td>
                                    <td class="text-end"><?php echo $stock['quantitestock']." ".strtolower($stock['unitenom']); ?>s</td>
                                    <td class="text-end"><?php echo number_format($stock['prixunitairemoyenne'], 0, ',', ' '); ?> Ar</td>
                                    <td class="text-end"><?php echo number_format($stock['valeurmoyenne'], 0, ',', ' '); ?> Ar</td>
                                </tr>
                            <?php } ?>
                            <tr>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <th scope="row"></th>
                            <td colspan="1" class="text-end"><strong>TOTAL</strong></td>
                            <td class="text-end "><strong><?php echo number_format($sommeValeurStock, 0, ',', ' '); ?> Ar </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-4">
            <div class="row">
                <div class="col-md-12 shadow pt-5 pb-4">
                    <h6 class="text-center">Acheter une matiere première</h6> 
                    <hr class="sm">  
                    <form action="<?php echo base_url("Stock/achat"); ?>" class="p-4" method="post">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="matierepremiere" aria-label="Floating label select example">
                                <option class="text-muted">Clicker pour choisir</option>
                                <?php foreach ($listMatierepremiere as $key => $matierepremiere) { ?>
                                    <option value="<?php echo $matierepremiere['id']; ?>" ><?php echo $matierepremiere['nom']; ?> (Unité: <?php echo $matierepremiere['unitenom']; ?> )</option>
                                <?php } ?>
                            </select>
                            <label for="floatingSelect">Matiere premiere</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingPassword" name="quantiteentre" placeholder="Password">
                            <label for="floatingPassword">Quantité</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingPassword" name="prixachat" placeholder="Password">
                            <label for="floatingPassword">Prix d'achat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" name="raison" placeholder="Password" value="Achat">
                            <label for="floatingPassword">Raison</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="dateachat" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Date d'achat (Si vide, aujourd'hui)</label>
                        </div>
                        <button class="btn btn-outline-success d-grid gap-2 col-6 mx-auto" type="submit">Valider</button>
                    </form>
                </div>
                <div class="col-md-12 shadow pt-5 pb-4">
                    <h6 class="text-center">Ajouter une matiere première</h6> 
                    <hr class="sm">  
                    <form action="" class="p-4" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Nom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option class="text-muted">Clicker pour choisir</option>
                                <option>Kilogramme</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Unité de mesure</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Seuil d'alerte (par unite, par defaut 0) </label>
                        </div>
                    </form>
                </div>
                
                <div class="col-md-12 shadow pt-5 pb-4">
                    <h6 class="text-center">Ajouter un unité de mesure</h6> 
                    <hr class="sm">  
                </div>
            </div>
            
        </div>
    </div>
    
    <script src=" <?php echo bootstrap_js("bootstrap.min.js") ?>"></script>
    <script src="<?php echo js_url("script.min.js"); ?>"></script>
</body>

</html>
