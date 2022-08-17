<?php
class Explore extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "explore";
    }

    public function get_title()
    {
        return __("Explore", "bitzlabs");
    }

    public function get_icon()
    {
        return 'eicon-post-excerpt';
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
                'label' => __('Heading', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Title', 'bitzlabs'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description', [
                'label' => __('Description', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Description', 'bitzlabs'),
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
                'label' => __('Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sub_title', [
                'label' => __('Sub Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_content', [
                'label' => __('Description', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'button_text', [
                'label' => __('Button Text', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'button_url', [
                'label' => __('Button URL', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
			'explorelist', [
				'label' => esc_html__( 'Explore List', 'bitzlabs' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'bitzlabs' ),
						'list_content' => esc_html__( 'Item content', 'bitzlabs' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'bitzlabs' ),
						'list_content' => esc_html__( 'Item content', 'bitzlabs' ),
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
        $description = $settings['description'];
        ?>
            <div class="rn-service-area rn-section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center pt-5">
                                <h2><?php echo $title; ?></h2>
                                <div>
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row--15 service-wrapper">

                        <?php if($settings['explorelist']): 
                            foreach (  $settings['explorelist'] as $item ):
                                $img_url = $item['image']['url'];

                                if(!empty($item['image']['alt'])){
                                    $img_alt = $item['image']['alt'];
                                }
                                
                            ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-5">
                            <div class="service gallery-style text-left service_0 service-link">
                                <div class="inner">
                                    <div class="content text-center">
                                        <div class="bluredImg">
                                            <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt) ?> " class="imgA" /> 
                                            <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt) ?> " class="imgB" />
                                        </div>
                                        <h3><?php echo $item['list_title'];  ?></h3>

                                        <?php if(isset($item['sub_title'])): ?>
                                        <h6><?php echo esc_html($item['sub_title']);  ?></h6>
                                        <?php endif; ?>

                                        <p><?php echo esc_html($item['list_content']);  ?></p>
                                        
                                        <?php if(!empty($item['button_text'])): ?>
                                        <p><a href="<?php echo esc_url($item['button_url']);  ?>"><?php echo esc_html($item['button_text']);  ?></a></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        <?php
    }

}