<?php

class Category2_Widget extends WP_Widget {
    function __construct()
    {
        parent::__construct(
            'category2', //id
            'Category 2 Widget' //name
        );
        add_action('widgets_init', function(){
            register_widget('Category2_Widget');
        });
    }

    public function widget($args, $instance)
    {
        ?>
        <!-- Category Content 1 -->
        <div class="cat-item">
            <div class="cat-item-content">
                <div class="cat-icon">
                    <img src="<?php echo $instance['icon'] ?>" alt="alt">
                </div>
                <div class="cat-title"><?php echo $instance['title'] ?></div>
                <div class="cat-des"><?php echo $instance['description'] ?></div>
            </div>
        </div>
        <!-- End Category Content 1 -->
        <?php
    }

    public function form($instance)
    {
        $icon = !empty($instance['icon']) ? $instance['icon'] : esc_html__('');
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('');
        $description = !empty($instance['description']) ? $instance['description'] : esc_html__('');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon')) ?>"><?php echo esc_html__('Icon: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('icon')) ?>" name="<?php echo esc_attr($this->get_field_name('icon')) ?>" type="text" value="<?php echo esc_attr($icon) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')) ?>"><?php echo esc_html__('Title: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>" name="<?php echo esc_attr($this->get_field_name('title')) ?>" type="text" value="<?php echo esc_attr($title) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')) ?>"><?php echo esc_html__('Description: ') ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')) ?>" name="<?php echo esc_attr($this->get_field_name('description')) ?>" type="text" value="<?php echo esc_attr($description) ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['icon'] = (!empty($new_instance['icon'])) ? strip_tags($new_instance['icon']) : '';
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';

        return $instance;
    }
}

$category2_widget = new Category2_Widget();