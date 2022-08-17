<?php
class HeroSection extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "hero";
    }

    public function get_title()
    {
        return __("Hero Section", "bitzlabs");
    }

    public function get_icon()
    {
        return 'el-align-justify';
    }

    public function get_categories()
    {
        return ['blitzlabsaddon'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'bitzlabs'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text_1', [
                'label' => __('Text 1', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text_2', [
                'label' => __('Text 2', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text_3', [
                'label' => __('Text 3', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text_4', [
                'label' => __('Text 4', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content_1', [
                'label' => __('Content 1', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Sub Title', 'bitzlabs'),
                'label_block' => true,
            ]
        );

        
        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $text_1 = $settings['text_1'];
        $text_2 = $settings['text_2'];
        $text_3 = $settings['text_3'];
        $text_4 = $settings['text_4'];
        $content_1 = $settings['content_1'];
        ?>
            <div class="slider-area hero bg-transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 inner">
                            <div class="home-title">
                                <h1 class="title display-two display-contents" data-scroll-section>
                                    <span class="home-we"><span><?php if(!empty($text_1)){ echo esc_html($text_1);}?></span></span>
                                    <span class="home-ar"><span><?php if(!empty($text_2)){ echo esc_html($text_2);}?></span></span> 
                                    <span class="home-bl"><span><?php if(!empty($text_3)){ echo esc_html($text_3);}?></span></span> 
                                    <span class="home-la"><span ><?php if(!empty($text_4)){ echo esc_html($text_4);}?></span></span>
                                </h1>
                            </div>
                            <div class="text-center py-5">
                                <div class="description py-5">
                                    <div>
                                        <div>
                                           <?php echo $content_1; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

}