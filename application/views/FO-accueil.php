
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-8">
            <h2>Article populaire</h2>
            <hr>
            <?php foreach ($listArticle as $index => $article) { ?>
                <article class="post-preview row shadow border p-3 rounded-3">
                    <div class="col-md-5"><img class="img-fluid" src="<?php echo uploadedfile_url($article['image']); ?>"></div>
                    <div class="col-md-7">
                        <a href="<?php echo site_url("Content/".$article['id']); ?>">
                            <h4 class="post-title"><?php echo $article['titre']; ?></h4>
                        </a>
                        <p class="post-subtitle"><em><?php echo $article['description']; ?></em></p>
                        <p class="post-meta text-muted">Posté le <?php echo $article['datepubli'];?></p>
                    </div>
                </article>
                <hr>
            <?php } ?>
            <div class="clearfix"><button class="btn btn-primary float-end" type="button">Older Posts&nbsp;⇒</button></div>
        </div>
    </div>
</div>