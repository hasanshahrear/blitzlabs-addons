<?php
class Service extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "service";
    }

    public function get_title()
    {
        return __("Service", "bitzlabs");
    }

    public function get_icon()
    {
        return 'el-align-link';
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
            'title', [
                'label' => __('Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Title', 'bitzlabs'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image', [
                'label' => __( 'Image', 'bitzlabs' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_title', [
                'label' => __('URL Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'hover_url', [
                'label' => __('Hover URL', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
			'servicelist', [
				'label' => esc_html__( 'Service List', 'bitzlabs' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'bitzlabs' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'bitzlabs' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $title = $settings['title'];
        ?>
           <div class="rn-service-area rn-section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center pt-5">
                                <h2><span style="font-weight:400"><?php echo esc_html($title); ?></span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt--40">
                            <ul class="brand-list brand-style-1 press-brands">
                                <?php 
                                    foreach (  $settings['servicelist'] as $item ):
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($item['hover_url']);?>" rel="nofollow" target="_blank" title="<?php echo esc_attr($item['list_title']);?>">
                                    <img alt="" src="<?php echo esc_url($item['image']['url']);?>" />
                                </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

}