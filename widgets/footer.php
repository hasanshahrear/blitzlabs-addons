<?php
class Footer extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "footer";
    }

    public function get_title()
    {
        return __("Footer", "bitzlabs");
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
            'footer_logo', [
                'label' => __('Footer Logo', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'subtitle', [
                'label' => __('Sub Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Sub Title', 'bitzlabs'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'btn_text', [
                'label' => __('Button Text', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('BUY TOKEN', 'bitzlabs'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'btn_url', [
                'label' => __('Button URL', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '#'
            ]
        );

        $this->add_control(
            'cpytext_left', [
                'label' => __('Copyright Text Left', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cpytext_right', [
                'label' => __('Copyright Text Right', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $logo = $settings['footer_logo']['url'];
        $logo_alt = $settings['footer_logo']['alt'];
        $subtitle = $settings['subtitle'];
        $btn_text = $settings['btn_text'];
        $btn_url = $settings['btn_url'];
        $cpytext_left = $settings['cpytext_left'];
        $cpytext_right = $settings['cpytext_right'];
        ?>
            <footer class="rn-footer footer-style-default variation-two">
                <div class="rn-callto-action clltoaction-style-default style-7">
                    <div class="container">
                        <div class="row row--0 align-items-center content-wrapper">
                            <div class="col-lg-8 col-md-8">
                                <div class="inner">
                                    <div class="content text-left">
                                    <div class="logo">
                                        <a href="<?php echo home_url();?>">
                                            <img class="logo-light logo-height" src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
                                        </a>
                                    </div>
                                    <div class="subtitle">
                                        <div data-hveid="CDIQAA" data-ved="2ahUKEwiOlubvicT3AhVJr6QKHTgHDn8QFSgAegQIMhAA">
                                            <div data-sokoban-container="SOKOBAN_653929003155823713">
                                                <div data-content-feature="1">
                                                    <div>
                                                        <i><?php echo esc_html($subtitle)?></i>
                                                    </div>
                                                </div>
                                                <div>
                                                <div jscontroller="K6HGfd" id="eob_3" jsdata="fxg5tf;_;BmuW/s" jsaction="rcuQ6b:npT2md" data-ved="2ahUKEwiOlubvicT3AhVJr6QKHTgHDn8Q2Z0BegQIGhAA"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="call-to-btn text-left mt_sm--20 text-lg-right">
                                    <p>
                                        <a href="<?php echo esc_url($btn_url)?>"><?php echo esc_html($btn_text)?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="copyright-area copyright-style-one">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-8 col-sm-12 col-12">
                            <div class="copyright-left">
                                <div class="copyright-nfa">
                                    <p><?php echo esc_html($cpytext_left)?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 col-12">
                            <div class="copyright-right text-center text-lg-end">
                                <p class="copyright-text"><?php echo esc_html($cpytext_right)?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

}