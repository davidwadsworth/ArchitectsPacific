<?php
/*
Plugin Name: Site Plugin for architectspacific.com
Description: Site specific code changes for architectspacific.com
Author: David Wadsworth
*/

/**************************************************************************************
Custom Widget Section
**************************************************************************************/

//Load Custom Widgets
function load_custom_widgets() {
    register_widget( 'related_projects_widget' );
    register_widget('about_us_widget');
    register_widget('quote_widget');
    register_widget('contact_widget');
}
add_action( 'widgets_init', 'load_custom_widgets' );

/**************************************************************************************/

//New About Us Widget
class about_us_widget extends WP_Widget {
   function __construct() {
      $widget_ops = array( 'classname' => 'widget_contact_block', 'description' => __( 'Custom About page', 'himalayas' ) );
      $control_ops = array( 'width' => 200, 'height' =>250 );
      parent::__construct( false, $name = __( 'AP: About Us', 'himalayas' ), $widget_ops, $control_ops);
   }

   function form( $instance ) {
      $defaults[ 'about_menu_id' ] = '';
      $defaults[ 'title' ] = '';
      $defaults[ 'text' ] = '';
      $defaults[ 'page_id' ] = '';

      $defaults[ 'numberbox_1' ] = '';
      $defaults[ 'descriptionbox_1' ] = '';
      $defaults[ 'descriptionbox_2' ] = '';
      $defaults[ 'numberbox_2' ] = '';
      $defaults[ 'numberbox_3' ] = '';
      $defaults[ 'descriptionbox_3' ] = '';
      $defaults[ 'descriptionbox_4' ] = '';
      $defaults[ 'numberbox_4' ] = '';

      $instance = wp_parse_args( (array) $instance, $defaults );

      $about_menu_id = esc_attr( $instance[ 'about_menu_id' ] );
      $title = esc_attr( $instance[ 'title' ] );
      $text = esc_textarea( $instance['text'] );
      $page_id = absint( $instance[ 'page_id' ] );

      $numberbox_1 = esc_textarea( $instance[ 'numberbox_1' ] );
      $descriptionbox_1 = esc_textarea( $instance[ 'descriptionbox_1' ] );
      $descriptionbox_2 = esc_textarea( $instance[ 'descriptionbox_2' ] );
      $numberbox_2 = esc_textarea( $instance[ 'numberbox_2' ] );
      $numberbox_3 = esc_textarea( $instance[ 'numberbox_3' ] );
      $descriptionbox_3 = esc_textarea( $instance[ 'descriptionbox_3' ] );
      $descriptionbox_4 = esc_textarea( $instance[ 'descriptionbox_4' ] );
      $numberbox_4 = esc_textarea( $instance[ 'numberbox_4' ] );

      ?>
      <p><?php _e( 'Note: Enter the About Us Section ID and use same for Menu item. Only used for One Page Menu.', 'himalayas' ); ?></p>

      <p>
         <label for="<?php echo $this->get_field_id( 'about_menu_id' ); ?>"><?php _e( 'About Section ID:', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id( 'about_menu_id' ); ?>" name="<?php echo $this->get_field_name( 'about_menu_id' ); ?>" type="text" value="<?php echo $about_menu_id; ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
      </p>

      <?php _e( 'Description:','himalayas' ); ?>
      <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>

      <p><?php _e( 'Customize About Graphic:', 'himalayas' ) ?></p>
      <p>
         <label for="<?php echo $this->get_field_id('numberbox_1'); ?>"><?php _e( '', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('numberbox_1'); ?>" name="<?php echo $this->get_field_name('numberbox_1'); ?>" type="text" value="<?php echo $numberbox_1; ?>" style="width:20%"/>
         <label for="<?php echo $this->get_field_id('descriptionbox_1'); ?>"><?php _e( ' ', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('descriptionbox_1'); ?>" name="<?php echo $this->get_field_name('descriptionbox_1'); ?>" type="text" value="<?php echo $descriptionbox_1; ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('descriptionbox_2'); ?>"><?php _e( '', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('descriptionbox_2'); ?>" name="<?php echo $this->get_field_name('descriptionbox_2'); ?>" type="text" value="<?php echo $descriptionbox_2; ?>" />
         <label for="<?php echo $this->get_field_id('numberbox_2'); ?>"><?php _e( ' ', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('numberbox_2'); ?>" name="<?php echo $this->get_field_name('numberbox_2'); ?>" type="text" value="<?php echo $numberbox_2; ?>" style="width:20%"/>
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('numberbox_3'); ?>"><?php _e( '', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('numberbox_3'); ?>" name="<?php echo $this->get_field_name('numberbox_3'); ?>" type="text" value="<?php echo $numberbox_3; ?>" style="width:20%"/>
         <label for="<?php echo $this->get_field_id('descriptionbox_3'); ?>"><?php _e( ' ', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('descriptionbox_3'); ?>" name="<?php echo $this->get_field_name('descriptionbox_3'); ?>" type="text" value="<?php echo $descriptionbox_3; ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('descriptionbox_4'); ?>"><?php _e( '', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('descriptionbox_4'); ?>" name="<?php echo $this->get_field_name('descriptionbox_4'); ?>" type="text" value="<?php echo $descriptionbox_4; ?>" />
         <label for="<?php echo $this->get_field_id('numberbox_4'); ?>"><?php _e( ' ', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id('numberbox_4'); ?>" name="<?php echo $this->get_field_name('numberbox_4'); ?>" type="text" value="<?php echo $numberbox_4; ?>" style="width:20%"/>
      </p>


      <p><?php _e( 'Select an About page.', 'himalayas' ) ?></p>
      <label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page', 'himalayas' ); ?>:</label>
      <?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'page_id' ), 'selected' => $instance[ 'page_id' ] ) ); ?>

   <?php }

   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'about_menu_id' ] = sanitize_text_field( $new_instance[ 'about_menu_id' ] );
      $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );

      if ( current_user_can('unfiltered_html') )
         $instance[ 'text' ] =  $new_instance[ 'text' ];
      else
         $instance[ 'text' ] = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); // wp_filter_post_kses() expects slashed

      $instance[ 'page_id' ] = absint( $new_instance[ 'page_id' ] );

      $instance[ 'numberbox_1' ] =  $new_instance[ 'numberbox_1' ];
      $instance[ 'descriptionbox_1' ] =  $new_instance[ 'descriptionbox_1' ];
      $instance[ 'descriptionbox_2' ] =  $new_instance[ 'descriptionbox_2' ];
      $instance[ 'numberbox_2' ] =  $new_instance[ 'numberbox_2' ];
      $instance[ 'numberbox_3' ] =  $new_instance[ 'numberbox_3' ];
      $instance[ 'descriptionbox_3' ] =  $new_instance[ 'descriptionbox_3' ];
      $instance[ 'descriptionbox_4' ] =  $new_instance[ 'descriptionbox_4' ];
      $instance[ 'numberbox_4' ] =  $new_instance[ 'numberbox_4' ];

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );

      global $post;
      $about_menu_id = isset( $instance[ 'about_menu_id' ] ) ? $instance[ 'about_menu_id' ] : '';
      $title = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
      $text = apply_filters( 'widget_text', empty( $instance[ 'text' ] ) ? '' : $instance['text'], $instance );
      $page_id = isset( $instance[ 'page_id' ] ) ? $instance[ 'page_id' ] : '';

      $section_id = '';
      if( !empty( $about_menu_id ) )
         $section_id = 'id="' . $about_menu_id . '"';

      $numberbox_1 = empty( $instance[ 'numberbox_1' ] ) ? '' : $instance[ 'numberbox_1' ];
      $descriptionbox_1 = empty( $instance[ 'descriptionbox_1' ] ) ? '' : $instance[ 'descriptionbox_1' ];
      $descriptionbox_2 = empty( $instance[ 'descriptionbox_2' ] ) ? '' : $instance[ 'descriptionbox_2' ];
      $numberbox_2 = empty( $instance[ 'numberbox_2' ] ) ? '' : $instance[ 'numberbox_2' ];
      $numberbox_3 = empty( $instance[ 'numberbox_3' ] ) ? '' : $instance[ 'numberbox_3' ];
      $descriptionbox_3 = empty( $instance[ 'descriptionbox_3' ] ) ? '' : $instance[ 'descriptionbox_3' ];
      $descriptionbox_4 = empty( $instance[ 'descriptionbox_4' ] ) ? '' : $instance[ 'descriptionbox_4' ];
      $numberbox_4 = empty( $instance[ 'numberbox_4' ] ) ? '' : $instance[ 'numberbox_4' ];

      echo $before_widget; ?>
      <div <?php echo $section_id; ?> class="section-wrapper">
         <div class="tg-container">

            <div class="section-title-wrapper">
               <?php if( !empty( $title ) ) echo $before_title . esc_html( $title ) . $after_title;

               if( !empty( $text ) ) { ?>
                  <h4 class="sub-title"><?php echo esc_textarea( $text ); ?></h4>
               <?php } ?>
            </div>

            <div class="contact-form-wrapper tg-column-wrapper clearfix">
               <?php if( $page_id ) :
                  $the_query = new WP_Query( 'page_id='.$page_id );
                  while( $the_query->have_posts() ):$the_query->the_post(); ?>

                     <div class="tg-column-2">

                        <div class="contact-content"> <?php the_content(); ?> </div>

                     </div>
                  <?php endwhile;
               endif; ?>
                  <div class="tg-column-2">
                     <div class="about-content about-graphic">
                      <div class="boxcenter numberbox"><span class="vertical"><?php echo esc_html( $numberbox_1 ); ?></span></div>
                      <div class="spacer"></div>
                      <div class="boxcenter descriptionbox"><span class="vertical"><?php echo esc_html( $descriptionbox_1 ); ?></span></div>

                      <div class="heightspacer"></div>

                      <div class="boxcenter descriptionbox"><span class="vertical"><?php echo esc_html( $descriptionbox_2 ); ?></span></div>
                      <div class="spacer"></div>
                      <p class="boxcenter numberbox"><span class="vertical"><?php echo esc_html( $numberbox_2 ); ?></span></p>

                      <div class="heightspacer"></div>

                      <p class="boxcenter numberbox"><span class="vertical"><?php echo esc_html( $numberbox_3 ); ?></span></p>
                      <div class="spacer"></div>
                      <div class="boxcenter descriptionbox"><span class="vertical"><?php echo esc_html( $descriptionbox_3 ); ?></span></div>

                      <div class="heightspacer"></div>

                      <div class="boxcenter descriptionbox"><span class="vertical"><?php echo esc_html( $descriptionbox_4 ); ?></span></div>
                      <div class="spacer"></div>
                      <p class="boxcenter numberbox"><span class="vertical"><?php echo esc_html( $numberbox_4 ); ?></span></p>

                    </div>
                  </div>
            </div><!-- .contact-content-wrapper -->
         </div><!-- .tg-container -->
      </div>
   <?php echo $after_widget;
   }
}

/*************************************************************************************/

//Related Projects Widget

class related_projects_widget extends WP_Widget {

   function __construct() {
      $widget_ops = array( 'classname' => 'widget_portfolio_block', 'description' => __( 'Display related projects in sidebar', 'himalayas') );
      $control_ops = array( 'width' => 200, 'height' =>250 );
      parent::__construct( false,$name= __( 'AP: Related Projects', 'himalayas' ), $widget_ops);
   }

   function form( $instance ) {
      $defaults[ 'title' ] = '';
      $defaults[ 'text' ] = '';
      $defaults[ 'number' ] = 6;

      $instance = wp_parse_args( (array) $instance, $defaults );

      $title = esc_attr( $instance[ 'title' ] );
      $text = esc_textarea( $instance[ 'text' ] );
      $number = absint( $instance[ 'number' ] ); ?>


      <p>
         <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of pages to display:', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
      </p>

      <p><?php _e( 'Note: Create the pages and select Portfolio Template to display Portfolio pages.', 'himalayas' ); ?></p>
      <?php
   }

   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

      $instance[ 'portfolio_menu_id' ] = sanitize_text_field( $new_instance[ 'portfolio_menu_id' ] );
      $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
      if ( current_user_can('unfiltered_html') )
         $instance[ 'text' ] =  $new_instance[ 'text' ];
      else
         $instance[ 'text' ] = stripslashes( wp_filter_post_kses( addslashes($new_instance[ 'text' ]) ) ); // wp_filter_post_kses() expects slashed
      $instance[ 'number' ] = absint( $new_instance[ 'number' ] );

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );
      
      global $post;

      $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
      $number = empty( $instance[ 'number' ] ) ? 6 : $instance[ 'number' ];

      $page_array = array();
      $pages = get_pages();
      // get the pages associated with Portfolio Template.
      foreach ( $pages as $page ) {
         $page_id = $page->ID;
         $template_name = get_post_meta( $page_id, '_wp_page_template', true );
         if( $template_name == 'page-templates/template-portfolio.php' && $page_id <> get_the_ID()) {
            array_push( $page_array, $page_id );
         }
      }
      $get_featured_posts = new WP_Query( array(
         'posts_per_page'        => $number,
         'post_type'             => array( 'page' ),
         'post__in'              => $page_array,
         'orderby'               => 'rand'
      ) );

      echo $before_widget;

      $section_id = '';?>

      <div <?php echo $section_id; ?> class="" >
         <div>
            <div>
               <div class="related-projects-header">
                  <?php
                  if( !empty( $title ) ) { ?> <h4> <?php echo esc_html( $title ) ?> </h4> <?php }?>
               </div>
            </div>

            <?php if( !empty( $page_array ) ) : ?>
               <div>
                  <?php
                  while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post(); ?>

                     <div class="related-projects-container">
                        <?php
                        // Get the full URI of featured image
                        $image_popup_id = get_post_thumbnail_id();
                        $image_popup_url = wp_get_attachment_url( $image_popup_id ); ?>
                        <a class="related-projects-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                           <div class="port-img">
                              <?php if( has_post_thumbnail() ) {
                                 the_post_thumbnail('himalayas-portfolio-image');

                              } else { $image_popup_url = get_template_directory_uri() . '/images/placeholder-portfolio.jpg';
                                 echo '<img src="' . $image_popup_url . '">';
                              } ?>
                              <div class="related-projects-outer-title">
                                 <div class="related-projects-title"><?php the_title(); ?></div>
                              </div>   
                           </div>
                        </a>
                     </div>

                     <div class="related-projects-spacer"></div>
                  <?php endwhile; ?>
               </div><!-- .Portfolio-content-wrapper -->
               <?php
               // Reset Post Data
               wp_reset_query();
            endif; ?>
         </div>
      </div><!-- .section-wrapper -->

      <?php echo $after_widget;
	}
}

/**************************************************************************************/

//Quote Widget
class quote_widget extends WP_Widget {
   function __construct() {
      $widget_ops = array( 'classname' => 'widget_call_to_action_block', 'description' => __( 'Use this widget to show quotes', 'himalayas' ) );
      $control_ops = array( 'width' => 200, 'height' =>250 );
      parent::__construct( false, $name = __( 'AP: Quotes', 'himalayas' ), $widget_ops, $control_ops);
   }

   function form( $instance ) {
      $defaults[ 'background_color' ] = '#32c4d1';
      $defaults[ 'background_image' ] = '';
      $defaults[ 'select' ] = 'cta-text-style-1';

      $instance = wp_parse_args( (array) $instance, $defaults );

      $background_color = esc_attr( $instance[ 'background_color' ] );
      $background_image = esc_url_raw( $instance[ 'background_image' ] );
      $select = $instance[ 'select' ];
      ?>
      <p>
         <strong><?php _e( 'DESIGN SETTINGS :', 'himalayas' ); ?></strong><br />
         <label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Background Color:', 'himalayas' ); ?></label><br />
         <input class="my-color-picker" type="text" data-default-color="#32c4d1" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo  $background_color; ?>" />
      </p>

   <?php
   }

   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

      $instance['background_color'] =  $new_instance['background_color'];
      $instance['background_image'] =  esc_url_raw( $new_instance['background_image'] );
      $instance[ 'select' ] = $new_instance[ 'select' ];

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );

      $background_color = isset( $instance[ 'background_color' ] ) ? $instance[ 'background_color' ] : '';
      $background_image = isset( $instance[ 'background_image' ] ) ? $instance[ 'background_image' ] : '';
      $select = isset( $instance[ 'select' ] ) ? $instance[ 'select' ] : '';

      global $post;


      ?>
      <div class="quote-spacer"></div>

      <div class="quote-slider-wrapper">
         <ul class="quoteLightSlider">

            <?php $page_array = array();
            $pages = get_pages();
            // get the pages associated with Quote Template.
            foreach ( $pages as $page ) {
               $page_id = $page->ID;
               $template_name = get_post_meta( $page_id, '_wp_page_template', true );
               if( $template_name == 'template-quote.php' ) {
                  array_push( $page_array, $page_id );
               }
            }
            $get_featured_posts = new WP_Query( array(
               'posts_per_page'        => -1,
               'post_type'             => array( 'page' ),
               'post__in'              => $page_array,
               'orderby'               => array( 'menu_order' => 'ASC', 'date' => 'DESC' )
            ) ); 

            $bg_image_style = '';
            if ( !empty( $background_image ) ) {
               $bg_image_style .= 'background-image:url(' . $background_image . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
               $bg_image_class = 'parallax-section';
            }else {
               $bg_image_style .= 'background-color:' . $background_color . ';';
               $bg_image_class = 'no-bg-image';
            }?>

            <?php while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post(); 
               $quote_content = get_the_content(); ?>
               <li>
                  <div class="<?php echo $bg_image_class . ' ' . $select; ?> clearfix quote-height" style="<?php echo $bg_image_style; ?>">
                     <div class="section-wrapper cta-text-section-wrapper">
                        <div class="cta-text-desc">
                           <?php echo $quote_content; ?>
                        </div>
                     </div>
                  </div>
               </li>

            <?php 
            endwhile; 
            // Reset Post Data
            wp_reset_query(); ?>
            </div>
         </div>
      </div>
      <?php echo $after_widget;
   }
   
}

/**************************************************************************************/

//Contact Widget
class contact_widget extends WP_Widget {
   function __construct() {
      $widget_ops = array( 'classname' => 'widget_contact_block', 'description' => __( 'Show your Contact page.', 'himalayas' ) );
      $control_ops = array( 'width' => 200, 'height' =>250 );
      parent::__construct( false, $name = __( 'AP: Contact Us Widget', 'himalayas' ), $widget_ops, $control_ops);
   }

   function form( $instance ) {
      $defaults[ 'contact_menu_id' ] = '';
      $defaults[ 'title' ] = '';
      $defaults[ 'text' ] = '';
      $defaults[ 'page_id' ] = '';
      $defaults[ 'shortcode' ] = '';

      $instance = wp_parse_args( (array) $instance, $defaults );

      $contact_menu_id = esc_attr( $instance[ 'contact_menu_id' ] );
      $title = esc_attr( $instance[ 'title' ] );
      $text = esc_textarea( $instance['text'] );
      $page_id = absint( $instance[ 'page_id' ] );
      $shortcode = esc_attr( $instance[ 'shortcode' ] );
      ?>
      <p><?php _e( 'Note: Enter the Contact Section ID and use same for Menu item. Only used for One Page Menu.', 'himalayas' ); ?></p>

      <p>
         <label for="<?php echo $this->get_field_id( 'contact_menu_id' ); ?>"><?php _e( 'Contact Section ID:', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id( 'contact_menu_id' ); ?>" name="<?php echo $this->get_field_name( 'contact_menu_id' ); ?>" type="text" value="<?php echo $contact_menu_id; ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
      </p>

      <?php _e( 'Description:','himalayas' ); ?>
      <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>

      <p><?php _e( 'Select a Contact page.', 'himalayas' ) ?></p>
      <label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page', 'himalayas' ); ?>:</label>
      <?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'page_id' ), 'selected' => $instance[ 'page_id' ] ) ); ?>

      <p><?php _e( 'Use Contact Form Plugin and enter the shortcode here:', 'himalayas' ) ?></p>
      <p>
         <label for="<?php echo $this->get_field_id( 'shortcode' ); ?>"><?php _e( 'Shortcode', 'himalayas' ); ?></label>
         <input id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" value="<?php echo $shortcode; ?>" />
      </p>
   <?php }

   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'contact_menu_id' ] = sanitize_text_field( $new_instance[ 'contact_menu_id' ] );
      $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );

      if ( current_user_can('unfiltered_html') )
         $instance[ 'text' ] =  $new_instance[ 'text' ];
      else
         $instance[ 'text' ] = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); // wp_filter_post_kses() expects slashed

      $instance[ 'page_id' ] = absint( $new_instance[ 'page_id' ] );
      $instance[ 'shortcode' ] = sanitize_text_field( $new_instance[ 'shortcode' ] );

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );

      global $post;
      $contact_menu_id = isset( $instance[ 'contact_menu_id' ] ) ? $instance[ 'contact_menu_id' ] : '';
      $title = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
      $text = apply_filters( 'widget_text', empty( $instance[ 'text' ] ) ? '' : $instance['text'], $instance );
      $page_id = isset( $instance[ 'page_id' ] ) ? $instance[ 'page_id' ] : '';
      $shortcode = isset( $instance[ 'shortcode' ] ) ? $instance[ 'shortcode' ] : '';

      $section_id = '';
      if( !empty( $contact_menu_id ) )
         $section_id = 'id="' . $contact_menu_id . '"';

      echo $before_widget; ?>
      <div <?php echo $section_id; ?> class="section-wrapper">
         <div class="tg-container">

            <div class="section-title-wrapper">
               <?php if( !empty( $title ) ) echo $before_title . esc_html( $title ) . $after_title;

               if( !empty( $text ) ) { ?>
                  <h4 class="sub-title"><?php echo esc_textarea( $text ); ?></h4>
               <?php } ?>
            </div>

            <div class="contact-form-wrapper tg-column-wrapper clearfix">
               <?php if( $page_id ) :
                  $the_query = new WP_Query( 'page_id='.$page_id );
                  while( $the_query->have_posts() ):$the_query->the_post(); ?>

                     <div class="tg-column-2">

                        <div class="contact-content"> <?php the_content(); ?> </div>
                     </div>
                  <?php endwhile;
               endif;
               // Reset Post Data
               wp_reset_query();
               if ( !empty ( $shortcode ) ) { ?>
                  <div class="tg-column-2">
                     <?php echo do_shortcode( $shortcode ); ?>
                  </div>
               <?php } ?>
            </div><!-- .contact-content-wrapper -->
         </div><!-- .tg-container -->
      </div>
   <?php echo $after_widget;
   }
}


?>