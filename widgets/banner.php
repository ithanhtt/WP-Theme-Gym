<?php
 
class Banner_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'banner',  // Base ID
            'Banner Header'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Banner_Widget' );
        });
 
    }
 
    public function widget( $args, $instance ) {
        
        ?>
        <!-- Banner -->
        <div class="banner" style="background: url('<?php echo esc_html($instance['bgimg']); ?>') top center/cover no-repeat; height: 950px;">
            <div class="banner-inner container">
                <!-- Text Banner -->
                <div class="text-banner">
                    <h1 class="title-banner"><?php echo esc_html($instance['title']); ?></h1>
                    <h3 class="s-title-banner"><?php echo esc_html($instance['title1']); ?></h3>
                    <p class="deltai-banner"><?php echo esc_html($instance['description']); ?></p>
                    <a href="<?php echo $instance['abutton'] ?>" class="button-banner"><?php echo esc_html($instance['button']); ?></a>
                </div>
                <!-- End Text Banner -->
                <!-- Model Banner -->
                <!-- <div class="model-banner">
                    <img src="./img/sModel.png" alt="Model">
                </div> -->
                <!-- End Model Banner -->
            </div>
        </div>
        <!-- End Banner -->
        <?php
 
    }
 
    public function form( $instance ) {
 
        $bgimg = ! empty( $instance['bgimg'] ) ? $instance['bgimg'] : esc_html__( '' );
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '' );
        $title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : esc_html__( '' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '' );
        $button = ! empty( $instance['button'] ) ? $instance['button'] : esc_html__( '' );
        $abutton = ! empty( $instance['abutton'] ) ? $instance['abutton'] : esc_html__( '' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'bgimg' ) ); ?>"><?php echo esc_html__( 'Backgroud Image:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bgimg' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bgimg' ) ); ?>" type="text" value="<?php echo esc_attr( $bgimg ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title1' ) ); ?>"><?php echo esc_html__( 'Title 1:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title1' ) ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php echo esc_html__( 'Description:' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="text"><?php echo esc_attr( $description ); ?></textarea>
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'button' ) ); ?>"><?php echo esc_html__( 'Button:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button' ) ); ?>" type="text" value="<?php echo esc_attr( $button ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'abutton' ) ); ?>"><?php echo esc_html__( 'Link Button:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'abutton' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'abutton' ) ); ?>" type="text" value="<?php echo esc_attr( $abutton ); ?>">
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['bgimg'] = ( !empty( $new_instance['bgimg'] ) ) ? strip_tags( $new_instance['bgimg'] ) : '';
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['title1'] = ( !empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
        $instance['description'] = ( !empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['button'] = ( !empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
        $instance['abutton'] = ( !empty( $new_instance['abutton'] ) ) ? strip_tags( $new_instance['abutton'] ) : '';
 
        return $instance;
    }
 
}
$banner_widget = new Banner_Widget();