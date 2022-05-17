<?php 



?>

<div class="container row p-5 shadow  bg-light rounded">
    <div class="col-12">
        <p class="h2">
            Liste des articles
        </p>
        <hr/>
        <?php foreach ($listArticle as $key => $article) {  ?>
            <article class="mb-2">
                <div class="card mb-3" style="">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<?php echo uploadedfile_url($article['image']); ?>" class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $article['titre']; ?></h5>
                            <p class="card-text"><?php echo $article['description']; ?></p>
                            <p class="card-text"><small class="text-muted">Last updated <?php echo $article['datemodif']; ?></small></p>
                            <a href="<?php echo site_url("Backoffice/ContentOf/".$article['id']);?>" class="btn btn-outline-primary" >Voir ses contenues</a>
                        </div>
                        </div>
                    </div>
                </div>
            </article>
            
        <?php } ?>

    </div>

</div>