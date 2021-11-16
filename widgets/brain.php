<?php

class Brain_Widget extends WP_Widget {
    function __construct()
    {
        parent::__construct(
            'Brain', //id
            'Brain Widget' //name
        );
        add_action('widgets_init', function(){
            register_widget('Brain_Widget');
        });
    }

    public function widget($args, $instance)
    {
        ?>
        <div class="brand-item">
            <img src="<?php echo esc_html($instance['brain']) ?>" alt="brain">
        </div>
        <?php
    }

    public function form($instance)
    {
        $brain = !empty($instance['brain']) ? $instance['brain'] : esc_html__('');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('brain')) ?>"><?php echo esc_html__('Brain: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('brain')) ?>" name="<?php echo esc_attr($this->get_field_name('brain')) ?>" type="text" value="<?php echo esc_attr($brain) ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['brain'] = (!empty($new_instance['brain'])) ? strip_tags($new_instance['brain']) : '';

        return $instance;
    }
}

$brain_widget = new Brain_Widget();