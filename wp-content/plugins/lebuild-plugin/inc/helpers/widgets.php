<?php
///----Blog widgets---
//Popular Post 
class Lebuild_latest_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Lebuild_Latest_Post', /* Name */esc_html__('Lebuild Latest Post','lebuild'), array( 'description' => esc_html__('Show the Latest Post', 'lebuild' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<!--Start single sidebar-->
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			<ul class="latest-posts">
				<?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					$this->posts($query_string);
				?>
			</ul>     
		<!--End single sidebar-->
                
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Latest Post', 'lebuild');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'lebuild'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'lebuild'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'lebuild'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'lebuild'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
			
			<li>
				<div class="inner">   
					<div class="img-box">
						<?php the_post_thumbnail(); ?>
						<div class="overlay-content">
							<a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="fa fa-link" aria-hidden="true"></i></a>
						</div>    
					</div>
					<div class="title-box">
						<p><?php echo get_the_date(); ?></p>
						<h4><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
			</li>
			
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}


///----footer widgets---
//About Company
class Lebuild_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Lebuild_About_Company', /* Name */esc_html__('Lebuild About Company','lebuild'), array( 'description' => esc_html__('Show the About Company', 'lebuild' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="marbtm">
                <div class="our-company-info">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']); ?>" data-src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'lebuild'); ?>"></a>    
                    </div>
                    <div class="text">
                        <p><?php echo wp_kses_post($instance['content']); ?></p>
                    </div>
                    <div class="btns-box">
                        <a class="btn-one style2" href="<?php echo esc_url($instance['btn_link']); ?>">
                            <span class="txt"><?php echo wp_kses_post($instance['btn_title']); ?><i class="fa fa-angle-double-right round" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>      
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : 'http://el.commonsupport.com/newwp/lebuild/wp-content/uploads/2020/09/mobilemenu-logo-1.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Logo Image Url:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'lebuild'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('Book Appointment', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Enter Button Link:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
               
                
		<?php 
	}
	
}

//News
class Lebuild_News extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Lebuild_News', /* Name */esc_html__('Lebuild News','lebuild'), array( 'description' => esc_html__('Show the News ', 'lebuild' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start single sidebar-->
        <div class="martop16">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <ul class="footer-news-links clearfix">
                <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					$this->posts($query_string);
				?>
            </ul>                     	  
        </div>
        <!--End single sidebar-->
                
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('News', 'lebuild');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'lebuild'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'lebuild'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'lebuild'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'lebuild'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li class="single-news">
                <div class="img-holder" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>);">
                    <div class="overlay-content">
                        <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="title-holder">
                    <p><?php echo get_the_date(); ?></p>
                    <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h5>
                </div>    
            </li>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Contact Details
class Lebuild_Contact_Details extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Lebuild_Contact_Details', /* Name */esc_html__('Lebuild Contact Details','lebuild'), array( 'description' => esc_html__('Show the Contact Details', 'lebuild' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="pdtop martop16">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="footer-contact-info">
                    <ul>
                        <?php if( $instance['phone_no'] ): ?>
                        <li>
                            <div class="icon">
                                <span class="icon-telephone thm-clr"></span>
                            </div>
                            <div class="text">
                                <p><a href="tel:<?php echo esc_url($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></p>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if( $instance['email_address'] ): ?>
                        <li>
                            <div class="icon">
                                <span class="icon-email thm-clr"></span>
                            </div>
                            <div class="text">
                                <p><a href="mailto:<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></p>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if( $instance['address'] ): ?>
                        <li>
                            <div class="icon">
                                <span class="icon-pin-1 thm-clr"></span>
                            </div>
                            <div class="text">
                                <p><?php echo wp_kses_post($instance['address']); ?></p>
                            </div>
                        </li>
                        <?php endif; ?> 
                    </ul>
                </div>                     	  
            </div>
           
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['address'] = $new_instance['address'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Contact';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('+1 800 555 44 00', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('supportteam@info.com', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'lebuild'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
               
		<?php 
	}
	
}


///----Service Sidebar widgets---
//Book Appointment
class Lebuild_Book_Appointment extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Lebuild_Book_Appointment', /* Name */esc_html__('Lebuild Book Appointment','lebuild'), array( 'description' => esc_html__('Show the Book Appointment', 'lebuild' )) );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <!--Start Single sidebar-->
            <div class="single-sidebar2" style="background-image: url(<?php echo esc_url($instance['bg_img']); ?>)">
                <a href="<?php echo esc_url($instance['btn_link']); ?>"><?php echo wp_kses_post($instance['btn_title']); ?></a>
                <h2><?php echo wp_kses_post($instance['title']); ?></h2>       
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['bg_img'] = $new_instance['bg_img'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['title'] = $new_instance['title'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$bg_img = ($instance) ? esc_attr($instance['bg_img']) : 'http://el.commonsupport.com/newwp/lebuild/wp-content/uploads/2020/09/single-sidebar2-bg.jpg';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		$title = ($instance) ? esc_attr($instance['title']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_img')); ?>"><?php esc_html_e('background Image Url:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('background Image Url', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_img')); ?>" type="text" value="<?php echo esc_attr($bg_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('Book Appointment', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'lebuild'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'lebuild');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'lebuild'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" ><?php echo wp_kses_post($title); ?></textarea>
        </p>
               
		<?php 
	}
	
}