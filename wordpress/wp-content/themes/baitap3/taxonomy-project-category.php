<?php get_header();?>
<div class="container">
    <div class="row"> 
       	<?php 
		if(have_posts()):while(have_posts()):the_post();?>
		 <div class="col-lg-6 row_project"> 
                 <div class="card_project">
					<div class="card">
						<div class="card-body">
						<?php thumbnail('medium')?>
                        <h6>Giá: <?php the_field('price')?></h6>
						<h6>Location: <?php the_field('location')?></h6>
							<div class="card-body">
								<h4 class="card-title" >
									<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
								</h4>
								<p class="card-text"><?php the_excerpt()  ?></p>
								<a href="<?php the_permalink() ?>" class="btn btn-primary">See project</a>
							</div> 
                        
						</div>
					</div>
				</div>
            </div>
		<?php endwhile;?>
		
		<div class="panigaton " style="width:70%">
            <?php pagainate_post()?>
			
		</div>

		<?php endif;?>  
		 <?php  //category($post)?>
		
    </div>		
</div>

<?php   get_footer(); ?>