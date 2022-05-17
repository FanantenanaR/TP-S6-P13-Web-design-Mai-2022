
<article>
    <div class="container">
        <div class="row shadow p-5 border rounded-3">
            <div class="col-md-10 col-lg-8 mx-auto pt-2">
                <div class="post-heading">
                    <h1><?php echo $article['titre']; ?></h1>
                    <p class="subheading"><em><?php echo $article['description']; ?></em></p>
                    <span class="meta text-muted">Posté le <?php echo $article['datepubli'];?></span>
                </div>
                <?php if(!empty($article['image'])) { ?>
                    <img src="<?php echo uploadedfile_url($article['image']); ?>" class="img-fluid p-3 shadow-lg border rounded-3 mt-2 mb-3" alt="...">
                <?php } ?>
                
                <?php foreach ($listContenue as $key => $contenue) { ?>
                    
                    <div id="<?php echo $contenue['urlcontenue'].$key; ?>" class="clearfix">

                        <?php if(!empty($contenue['titre'])) { ?>
                            <h2 id="<?php echo $contenue['urlcontenue']; ?> class="section-heading"><?php echo $contenue['titre']; ?></h2>
                        <?php } ?>
                            <?php if(!empty($contenue['image'])) { ?>
                                <img class="h-25 col-md-6 p-2 shadow-lg border  float-md-<?php $contenue['emplacementimage']==2 ? "end" : "start" ?> mb-3 ms-md-3" src="<?php echo uploadedfile_url($contenue['image']); ?>">
                            <?php } ?>
                            <span id="<?php echo $contenue['urlcontenue']; ?>" class=""><?php echo $contenue['texte']; ?></span>
                        
                    </div>
                <?php } ?>
                <!-- <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
                
                <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p>
                <h2 class="section-heading">Reaching for the Stars</h2>
                <p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p><a href="#"><img class="img-fluid" src="<?php echo uploadedfile_url("post-sample-image.jpg"); ?>"></a><span class="text-muted caption">To go places and do things that have never been done before – that’s what living is all about.</span>
                <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>
                <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>
                <p><span>Placeholder text by&nbsp;</span><a href="http://spaceipsum.com">Space Ipsum</a><span>&nbsp;Photographs by&nbsp;</span><a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p> -->
            </div>
        </div>
    </div>
</article>