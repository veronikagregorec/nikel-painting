<?php get_header(); ?>

    <div class="header-iskanje"></div>

    <div style="margin-top:2vw;"></div>

    <h2 class="search-data">Iskani rezultati za '<?php echo get_search_query(); ?>'</h2>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <div class="blog-index">
        
            <div class="blog-index-block">
                <h3><?php the_title(); ?></h3>

                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="preberi">Preberi več</a>
            </div>
    </div>

    <?php endwhile; else: ?>
        
        <h3 class="search-data-2">Ni iskanih rezultatov za '<?php echo get_search_query(); ?>'</h3>
        
    <?php endif; ?>

<?php get_footer(); ?>