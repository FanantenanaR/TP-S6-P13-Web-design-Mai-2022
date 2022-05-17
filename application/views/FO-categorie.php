<div class="p-5" >
    <div class="container-fluid">
        <div class="row shadow pb-5 h-100" style="min-height: 500px;">
            <div class="col-md-12 col-lg-8 col-xxl-10 mx-auto">
                <p class="h2 text-center mb-4 border-bottom pb-3">Categorie article disponible</p>
                <div class="p-2 row">
                    <?php foreach ($listCategorie as $index => $categorie) { ?>
                        <div class="col-md-4 p-2">
                            <div class="card rounded-3 shadow" style="">
                                <img src="<?php echo uploadedfile_url($categorie['image']); ?>" class="card-img-top" alt="<?php echo $categorie['urlcategorie'];?>">
                                <div class="card-body">
                                    <a href="<?php echo base_url($categorie['urlcategorie']) ;?>" class=" h6 text-center"><?php echo $categorie['nom']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php }  ?> 
                </div>
            </div>
        </div>
    </div>
</div>