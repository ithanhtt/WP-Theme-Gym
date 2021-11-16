<?php

class Category1_Widget extends WP_Widget {
    function __construct()
    {
        parent::__construct(
            'category1', //id
            'Category 1 Widget' //name
        );
        add_action('widgets_init', function(){
            register_widget('Category1_Widget');
        });
    }

    public function widget($args, $instance)
    {
        ?>
        <div class="cat-item">
            <div class="cat-item-img">
                <img src="<?php echo esc_html($instance['image']) ?>" alt="alt">
            </div>
        </div>
        <?php
    }

    public function form($instance)
    {
        $image = !empty($instance['image']) ? $instance['image'] : esc_html__('');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('image')) ?>"><?php echo esc_html__('Image: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image')) ?>" name="<?php echo esc_attr($this->get_field_name('image')) ?>" type="text" value="<?php echo esc_attr($image) ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['image'] = (!empty($new_instance['image'])) ? strip_tags($new_instance['image']) : '';

        return $instance;
    }
}

$category1_widget = new Category1_Widget();