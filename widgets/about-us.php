<?php

class About_Us_Widget extends WP_Widget {
    function __construct()
    {
        parent::__construct(
            'About_Us', //id
            'About Us Widget' //name
        );
        add_action('widgets_init', function(){
            register_widget('About_Us_Widget');
        });
    }

    public function widget($args, $instance)
    {
        ?>
        <div class="about-us-content">
            <div class="about-us-img">
                <img src="<?php echo esc_html($instance['avatar']) ?>" alt="<?php echo $instance['name'] ?>">
            </div>
            <div class="about-us-comment">
            <?php echo $instance['comment'] ?>
            </div>
            <div class="about-us-name"><?php echo $instance['name'] ?></div>
            <div class="about-us-des"><?php echo $instance['status'] ?></div>
        </div>
        <?php
    }

    public function form($instance)
    {
        $avatar = !empty($instance['avatar']) ? $instance['avatar'] : esc_html__('');
        $comment = !empty($instance['comment']) ? $instance['comment'] : esc_html__('');
        $name = !empty($instance['name']) ? $instance['name'] : esc_html__('');
        $status = !empty($instance['status']) ? $instance['status'] : esc_html__('');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('avatar')) ?>"><?php echo esc_html__('Avatar: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('avatar')) ?>" name="<?php echo esc_attr($this->get_field_name('avatar')) ?>" type="text" value="<?php echo esc_attr($avatar) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('comment')) ?>"><?php echo esc_html__('Comment: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('comment')) ?>" name="<?php echo esc_attr($this->get_field_name('comment')) ?>" type="text" value="<?php echo esc_attr($comment) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('name')) ?>"><?php echo esc_html__('Name: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('name')) ?>" name="<?php echo esc_attr($this->get_field_name('name')) ?>" type="text" value="<?php echo esc_attr($name) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('status')) ?>"><?php echo esc_html__('Status: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('status')) ?>" name="<?php echo esc_attr($this->get_field_name('status')) ?>" type="text" value="<?php echo esc_attr($status) ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
       $instance = array();
       
       $instance['avatar'] = (!empty($new_instance['avatar'])) ? strip_tags($new_instance['avatar']) : '';
       $instance['comment'] = (!empty($new_instance['comment'])) ? strip_tags($new_instance['comment']) : '';
       $instance['name'] = (!empty($new_instance['name'])) ? strip_tags($new_instance['name']) : '';
       $instance['status'] = (!empty($new_instance['status'])) ? strip_tags($new_instance['status']) : '';

       return $instance;
    }
}

$about_us_widget = new About_Us_Widget();