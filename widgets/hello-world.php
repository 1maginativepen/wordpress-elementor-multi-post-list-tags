<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
 
class Hello_World extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'hello-world';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Multi Post Tag list', 'elementor-hello-world' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */


	//  for controls 
	//  for controls  

	// $tags_handler = array();
		
	// function filter_session(){ 
	// 	global $wp;
	// 	$current_url = home_url(add_query_arg(array(), $wp->request)); 
	// 	//header('Location: '.$current_url);  
	// 	return $current_url;
	// }

	function get_all_post_types(){ 

		$args = array(
			'public'   => true,
			'_builtin' => false, 
			'exclude_from_search'   => false,
		 );
		 
		 $post_types = get_post_types( $args , 'names' , 'and'  );
		
		 $post_types['post'] = 'post';

		 return $post_types;
	}

	
	protected function _register_controls() { 




		$post_array = $this->get_all_post_types(); 
 
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'elementor-hello-world' ),
			]
		);   

		// $tag_size = sizeof($tag_array);
		
		// $tag_while_loop = 0;  


		$this->add_control(
			'post_preview_style',
			[
				'label' => __( 'Style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'card',
				'options' => [
					'card'  => __( 'Card', 'plugin-domain' ),
					'table' => __( 'Table', 'plugin-domain' ),  
				],
			]
		);  
		
		$this->add_control(
			'post_type_selector',
			[
				'label' => __( 'Post Types', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $post_array,
			]
		); 

		$this->end_controls_section();
		
		// end of content  

		// Start of Layout  

		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'elementor-hello-world' ),
			]
		);    

		$this->add_control(
			'layout_column',
			[
				'label' => __( 'Column', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1'  	=> __( '1', 'plugin-domain' ),
					'2' 	=> __( '2', 'plugin-domain' ),  
					'3'  	=> __( '3', 'plugin-domain' ),
					'4' 	=> __( '4', 'plugin-domain' ),   
				],
			]
		);
		
		$this->add_control(
			'post_preview_style_mobile_view',
			[
				'label' => __( 'Mobile Column', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1'  	=> __( '1', 'plugin-domain' ),
					'2' 	=> __( '2', 'plugin-domain' ),  
					'3'  	=> __( '3', 'plugin-domain' ),
					'4' 	=> __( '4', 'plugin-domain' ),   
				],
			]
		);

		$this->add_control(
			'post_image_size',
			[
				'label' => __( 'Image Size', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => [
					'0'  	=> __( 'Thumbnail', 'plugin-domain' ),
					'1'  	=> __( 'Medium', 'plugin-domain' ),
					'2' 	=> __( 'Medium Large', 'plugin-domain' ),  
					'3'  	=> __( 'Large', 'plugin-domain' ),
					'4' 	=> __( '1536x1536', 'plugin-domain' ),   
					'5' 	=> __( '2048x2048', 'plugin-domain' ),   
					'6' 	=> __( 'Full', 'plugin-domain' ),   
				],
			]
		);
		
		$this->add_control(
			'show_tag',
			[
				'label' => __( 'Show Tags', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		); 

		$this->add_control(
			'show_datepublished',
			[
				'label' => __( 'Date Published', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		); 

		$this->add_control(
			'show_readmore',
			[
				'label' => __( 'Read More', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		); 

		$this->add_control(
			'show_new_window',
			[
				'label' => __( 'Open in New Window', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'Yes',
			]
		); 

		$this->end_controls_section(); 

		// End of Layout
		
		// Start of Pagination  

		$this->start_controls_section(
			'section_pagination',
			[
				'label' => __( 'Pagination', 'elementor-hello-world' ),
			]
		);   

		$this->add_control(
			'post_view_limit',
			[
				'label' => __( 'Post View Limit', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 16, 
				'default' => 3, 
			]
		);  

		$this->add_control(
			'pagination_alignment',
			[
				'label' => __( 'Alignment', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'plugin-name' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-name' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'plugin-name' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
			]
		);

		$this->end_controls_section();

		// End of Pagination

		// Start of Filter  

		$this->start_controls_section(
			'section_filter',
			[
				'label' => __( 'Filter', 'elementor-hello-world' ),
			]
		);   
		
		// $tag_size = sizeof($tag_array);
		
		// $tag_while_loop = 0; 
 
		$this->add_control(
			'show_filter',
			[
				'label' => __( 'Show Filter', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);  

		$this->add_control(
			'filter_alignment',
			[
				'label' => __( 'Alignment', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'fleft' => [
						'title' => __( 'Left', 'plugin-name' ),
						'icon' => 'fa fa-chevron-left',
					], 
					'fright' => [
						'title' => __( 'Right', 'plugin-name' ),
						'icon' => 'fa fa-chevron-right',
					],
				],
				'default' => 'left',
			]
		);

		$this->end_controls_section();

		// end of advanced   

	}



	

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */



	//  data pull 
	//  data pull 
	//  data pull  
	// try the commented codes (print_r()) to see the value inside.
	protected function render() {
		$settings = $this->get_settings_for_display();

		// print_r($settings ); 

		$all_tags = get_queried_object();
		
	 	// print_r($all_tags->slug);
		
		$merged_post_ids = [];
		$paged = isset($_GET['page'])?$_GET['page']:1;
		
		//$posts_per_page =  get_option( 'posts_per_page' ); 

		$posts_per_page= $settings['post_view_limit'];
		
		// WP_Query Main Loop
		
		global $wp;
		$current_url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		preg_match('/(?<=type=)\S+/i', $current_url, $match); 

		if($match[0]==null){
			foreach( $settings['post_type_selector'] as $post ) {
				 
				$wp_query = new \WP_Query( array(
					
					'fields'         => 'ids', // only return post ID´s
					'post_type'      => $post,  
					'sort'		     => 'DESC',
					'posts_per_page' => -1 ,
					'depth'          => 1,
					'tax_query' => array(
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => $all_tags->slug
						)
					), 
					
				) );  

				// print_r($wp_query );
					if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
						//echo ;
						if(!empty(get_the_ID()))$merged_post_ids[] = get_the_ID();
					endwhile;
					endif;
				
				
				wp_reset_postdata();
			}
		}else{ 
			foreach( $settings['post_type_selector'] as $post ) {
			
				$wp_query = new \WP_Query( array(
					
					'fields'         => 'ids', // only return post ID´s
					'post_type'      => $match[0], 
					'sort'		     => 'DESC',
					'posts_per_page' => -1 ,
					'depth'          => 1,
					'tax_query' => array(
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => $all_tags->slug
						)
					), 
				) );  
				$wp_query->set( 'posts_per_page', '-1' );			
				// print_r($wp_query );
				if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
					//echo ;
					if(!empty(get_the_ID()))$merged_post_ids[] = get_the_ID();
				endwhile;
				endif; 
				wp_reset_postdata();
			}
		}  
		// End of Loop

		// print_r($merged_post_ids);
		
		$wp_query = new \WP_Query( array(
			'post_type' => 'any', // any post type
			'posts_per_page' => $posts_per_page ,
			'paged' => $paged,
			'post__in'  => $merged_post_ids
		) );
		
		function Polylang_PostTypes($tag_CPT){
			$tag_CPT = pll_e(ucwords($tag_CPT));
			return $tag_CPT;
		} 

		$json = file_get_contents(get_site_url().'/wp-content/plugins/elementor-multi-post-list-tags/assets/css/image-css.json');

		$data = json_decode($json, true);   
		// print_r($data[$settings['post_image_size']]['name']);

		if($settings['show_filter'] != null){ 
		?>
			<style>
				.table-window {
				display: block; 
				}
				.mobile-window{
				display: none;
				} 
				@media only screen and (max-width: 600px) {
					.table-window {
						display: none;
					}
					.mobile-window{
						display: block;
					}
				}
			</style>
			<div class="categories <?php echo $settings['filter_alignment'];?>">  
			<a class="filter_on" href="<?php echo esc_attr( add_query_arg( 'type', '') ); ?>" name='filter' value='exchange'><p><?php echo pll_e('All Types'); ?></p></a>
					
			<!-- fetch new set of CPT and just get the available Post type that is having same tags -->
			<? foreach( $settings['post_type_selector'] as $tags ){ 
				$wp_query_tags = new \WP_Query( array(
				
					'fields'         => 'ids', // only return post ID´s
					'post_type'      =>  $tags, 
					// 'post_type'      => 'company', 
					'sort'		     => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => $all_tags->slug
						)
					) 
				) );  
				$current_filter_detect ='';
				if ( $wp_query_tags->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
					if(get_the_ID() != ''){
						if($current_filter_detect != $tags){
							$current_filter_detect = $tags;
							?>
								<a href="<?php echo esc_attr( add_query_arg( 'type', $tags) ); ?>" name='filter' value='exchange'>
									<p><? echo ucwords($tags);?></p>
								</a>
							<? 
						}  
					} 
				endwhile;
				endif;  
				wp_reset_postdata();
			?>  
			<?} ?> 
			</div>
			<? 
		}
		?> 
			<br>
			<br>  
		<? 
		 
		if($settings['post_preview_style'] == 'card'){ 
			?> 
				<!-- change the 'elementor-grid-3' number for grid --> 
				<div class="elementor-element elementor-grid-<?php echo $settings['layout_column'];?> elementor-grid-tablet-2 elementor-grid-mobile-<?php echo $settings['post_preview_style_mobile_view'];?> elementor-posts--thumbnail-top elementor-widget elementor-widget-archive-posts" data-element_type="widget" data-settings="archive_classic_columns:3,archive_classic_columns_tablet:2,archive_classic_columns_mobile:1,archive_classic_row_gap:{unit:px,size:35,sizes:[]}}" data-widget_type="archive-posts.archive_classic">
					<div class="elementor-widget-container">
						<div class="elementor-posts-container elementor-posts elementor-posts--skin-cards elementor-grid elementor-has-item-ratio">

			<?
			if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
			//look at $post here !!
			//Example: $post->post_type;
			//this return the type of each post so you can do checks and stuff 
			//for example show title and content   
			?>
			<!-- elementor style  -->  
			<article class="elementor-post elementor-grid-item post-308 post type-post status-publish format-standard has-post-thumbnail hentry category-safety tag-test-tag">
				<? 
					if($settings['show_tag'] == 'yes'){
						?>
 							<div class="tags">
								<p><strong><?php print_r(Polylang_PostTypes(get_post_type()));?></strong></p>
							</div> 
						<?
					}
				?> 
				<?php 
					if($settings['show_new_window'] == 'yes'){ 
						?>
							<a class="elementor-post__thumbnail__link" href="<?php the_permalink();?>" target="_blank">
						<?
					} else{
						?>
							<a class="elementor-post__thumbnail__link" href="<?php the_permalink();?>">
						<?
					}
				?> 
					<div class="elementor-post__thumbnail elementor-fit-height"> 
						<div class="image-box">
							<?php  
								if ( get_the_post_thumbnail( get_the_ID() ) ) { 
									// the_post_thumbnail(); 
								?> 
								<!-- <img width="900" height="550" src="https://dev.blockspot.io/wp-content/uploads/google-2fa-authenticator.jpg" class="attachment-full size-full" alt="Safety" srcset="https://dev.blockspot.io/wp-content/uploads/google-2fa-authenticator.jpg 900w, https://dev.blockspot.io/wp-content/uploads/google-2fa-authenticator-300x183.jpg 300w, https://dev.blockspot.io/wp-content/uploads/google-2fa-authenticator-768x469.jpg 768w" sizes="(max-width: 900px) 100vw, 900px"> -->
									<img 
										class="<?php echo $data[$settings['post_image_size']]['class'];?>" 
										width="<?php echo $data[$settings['post_image_size']]['width'];?>" 
										height="<?php echo $data[$settings['post_image_size']]['height'];?>" 
										alt="alt" 
										src ="<?php print_r(get_the_post_thumbnail_url()); ?>" 
										srcset="<?php print_r(get_the_post_thumbnail_url()); ?> 900w, <?php print_r(get_the_post_thumbnail_url()); ?> 300w, <?php print_r(get_the_post_thumbnail_url()); ?> 768w, <?php print_r(get_the_post_thumbnail_url()); ?> 768w" 
										sizes="(max-width: <?php echo $data[$settings['post_image_size']]['width'];?>) 100vw, <?php echo $data[$settings['post_image_size']]['width'];?>"/>
								<?
								}
								else {
									// shows placeholder if there is no featured image found
								?>
									<img class="<?php echo $data[$settings['post_image_size']]['class'];?>" width="<?php echo $data[$settings['post_image_size']]['width'];?>" height="<?php echo $data[$settings['post_image_size']]['height'];?>" alt="Safety" src="https://dev.blockspot.io/wp-content/uploads/placeholder-1-1.png" /> 										
								<?	
								}  
							?>
						</div>  
					</div>
				</a>
				<div class="elementor-post__text">
					<h3 class="elementor-post__title">
					<a href="<?php the_permalink();?>"><?php the_title(  );?></a>
					</h3>
					<div class="elementor-post__meta-data">  
						<span class="elementor-post-date">
							<?php
								if($settings['show_datepublished'] == 'yes'){
									?>
										<?php print_r(get_the_date());?>
									<?
								}
							?>  
						</span>
						<span class="elementor-post-avatar">
						</span>  
					</div>  
					<? 
						if($settings['show_readmore'] == 'yes'){
							?>
								<a class="elementor-post__read-more" href="<?php the_permalink();?>"><? echo pll__('Read More');?> »</a>
							<?
						}
					?> 
				</div>
			</article>  
			<?
			endwhile; 
			?> 
					</div>
				</div>  
			<?

			$total_pages = $wp_query->max_num_pages; 
			
			// echo $total_pages; 

			echo '<br><br><br><div class="page-number-holder '.$settings['pagination_alignment'].'">';  
		
 

			if ($total_pages > 1){
 
				$current_page = isset($_GET['page'])?$_GET['page']:1; 
				$args = array(
					'base' => '?page=%#%',
					'format' => '?page=%#%', 
					'total' => $wp_query->max_num_pages, // total amount of pages
					'current' => ( ( $wp_query->query_vars['paged'] ) ? $wp_query->query_vars['paged'] : $settings['post_view_limit'] ), // current page number
					'show_all' => false, // set to true if you want to show all pages at once
					'mid_size' => 2, // how much page numbers to show on the each side of the current page
					'end_size' => 2, // how much page numbers to show at the beginning and at the end of the list
					'prev_next' => true, // if you set this to false, the previous and the next post links will be removed
					'prev_text' => '« '.pll__('Previous'), // «
					'next_text' => pll__('Next').' »' // »
				); 
				// Remove this line to hide the pagination
				print_r(paginate_links($args));
			}     
				
			?>
			</div> 
			<?  
				wp_reset_postdata(); 
			else :
				echo 'Sorry, no posts matched your criteria.';
			endif; 
		}else{ 
			?>  
				<div class="table-window">
				<table class="table table-bordered" style="margin-top: 20px;">
						<thead>
							<tr>
								<th width="20px">ID</th>
								<th width="auto">Image</th>
								<th width="60%">Title</th>
								<th width="20%">Date Published</th>
								<th>Type</th>
							</tr>
						</thead>
						<tbody>
					<? 
					if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
						
					//look at $post here !!
					//Example: $post->post_type;
					//this return the type of each post so you can do checks and stuff 
					//for example show title and content   
					?> 
						<tr>
							<td><?php echo get_the_ID();?></td>
							<td class="td-centered" style="text-align:center;">
							<div class="image-box-table" >
							<a href="<?php the_permalink();?>">
								<?php 
									
									if ( get_the_post_thumbnail( get_the_ID() ) ) { 
										// the_post_thumbnail(); 
									?> 
										<img src="<?php print_r(get_the_post_thumbnail_url()); ?>" class="attachment-medium size-medium" alt="Safety" sizes="(max-width: 300px) 100vw, 300px">
									<?
									}
									else {
										// shows placeholder if there is no featured image found
										echo 
										'<img class="attachment-medium size-medium" width="300" height="150" alt="Safety" sizes="(max-width: 300px) 100vw, 300px" src="https://dev.blockspot.io/wp-content/uploads/placeholder-1-1.png" />'; 										
									}  
								?>
							</a>
							</div>  
							</td>
							<td><a class="elementor-post__thumbnail__link" href="<?php the_permalink();?>"><?php the_title(  );?></a></td>
							<td><?php print_r(get_the_date());?></td>
							<td><?php print_r(ucwords(get_post_type()));?></td>
						</tr> 
					<? 
					endwhile; 
					?> 
						</tbody>
					</table> 
				</div> 
				<div class="mobile-window">
				<div class="elementor-element elementor-grid-<?php echo $settings['layout_column'];?> elementor-grid-tablet-2 elementor-grid-mobile-<?php echo $settings['post_preview_style_mobile_view'];?> elementor-posts--thumbnail-top elementor-widget elementor-widget-archive-posts" data-element_type="widget" data-settings="archive_classic_columns:3,archive_classic_columns_tablet:2,archive_classic_columns_mobile:1,archive_classic_row_gap:{unit:px,size:35,sizes:[]}}" data-widget_type="archive-posts.archive_classic">
					<div class="elementor-widget-container">
						<div class="elementor-posts-container elementor-posts elementor-posts--skin-cards elementor-grid elementor-has-item-ratio">
			<?
			if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
				
			//look at $post here !!
			//Example: $post->post_type;
			//this return the type of each post so you can do checks and stuff 
			//for example show title and content   
			?>
			<!-- elementor style  -->  
			<article class="elementor-post elementor-grid-item post-308 post type-post status-publish format-standard has-post-thumbnail hentry category-safety tag-test-tag">
				<? 
					if($settings['show_tag'] == 'yes'){
						?>
 							<div class="tags">
								<p><strong><?php print_r(ucwords(get_post_type()));?></strong></p>
							</div> 
						<?
					}
				?> 
				<?php 
					if($settings['show_new_window'] == 'yes'){ 
						?>
							<a class="elementor-post__thumbnail__link" href="<?php the_permalink();?>" target="_blank">
						<?
					} else{
						?>
							<a class="elementor-post__thumbnail__link" href="<?php the_permalink();?>">
						<?
					}
				?> 
					<div class="elementor-post__thumbnail elementor-fit-height"> 
						<div class="image-box">
							<?php  
								if ( get_the_post_thumbnail( get_the_ID() ) ) { 
									// the_post_thumbnail(); 
								?>
									<img width="300" height="150" src="<?php print_r(get_the_post_thumbnail_url()); ?>" class="attachment-medium size-medium" alt="Safety" sizes="(max-width: 300px) 100vw, 300px">
								<?
								}
								else {
									// shows placeholder if there is no featured image found
									echo 
									'<img class="attachment-medium size-medium" width="300" height="150" alt="Safety" sizes="(max-width: 300px) 100vw, 300px" src="https://dev.blockspot.io/wp-content/uploads/placeholder-1-1.png" />'; 										
								}  
							?>
						</div> 

					</div>
				</a>
				<div class="elementor-post__text">
					<h3 class="elementor-post__title">
					<a href="<?php the_permalink();?>"><?php the_title(  );?></a>
					</h3>
					<div class="elementor-post__meta-data"> 
						<span class="elementor-post-date"><?php print_r(get_the_date());?></span>
						<span class="elementor-post-avatar">
						</span>  
					</div>  
					<? 
						if($settings['show_readmore'] == 'yes'){
							?>
								<a class="elementor-post__read-more" href="<?php the_permalink();?>"><? echo pll__('Read More');?> »</a>
							<?
						}
					?>
					
				</div>
			</article>  
			<?
			endwhile;
			wp_reset_postdata(); 
			else :
				echo 'Sorry, no posts matched your criteria.';
			endif;
			?>
				</div> 
			<?
			$total_pages = $wp_query->max_num_pages; 
			
			// echo $total_pages; 

			echo '<br><br><br><div class="page-number-holder '.$settings['pagination_alignment'].'">'; 
			
			if ($total_pages > 1){ 
				$current_page = isset($_GET['page'])?$_GET['page']:1; 
				$args = array(
					'base' => '?page=%#%',
					'format' => '?page=%#%', 
					'total' => $wp_query->max_num_pages, // total amount of pages
					'current' => ( ( $wp_query->query_vars['paged'] ) ? $wp_query->query_vars['paged'] : $settings['post_view_limit'] ), // current page number
					'show_all' => false, // set to true if you want to show all pages at once
					'mid_size' => 2, // how much page numbers to show on the each side of the current page
					'end_size' => 2, // how much page numbers to show at the beginning and at the end of the list
					'prev_next' => true, // if you set this to false, the previous and the next post links will be removed
					'prev_text' => '« '.pll__('Previous'), // «
					'next_text' => pll__('Next').' »' // »
				); 
				// Remove the comment next line to see the pagination
				print_r(paginate_links($args));
			}     
				
			?> 
			<?  
				wp_reset_postdata();

			else :
				echo 'Sorry, no posts matched your criteria.';
			endif;
		} 
	}  
	
	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		//$settings = $this->get_settings_for_display(); 
	} 
} 