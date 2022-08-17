<?php
class JoinUs extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "join-us";
    }

    public function get_title()
    {
        return __("Join Us", "bitzlabs");
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

        $this->add_control(
            'description', [
                'label' => __('Description', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon', [
                'label' => __( 'Icon', 'bitzlabs' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'list_title', [
                'label' => __('Icon Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_url', [
                'label' => __('Icon URL', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '#'
            ]
        );

        $this->add_control(
			'iconlist', [
				'label' => esc_html__( 'Icon List', 'bitzlabs' ),
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
            <div class="rwt-brand-area rn-section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center">
                                <h2><?php echo esc_html($title); ?></h2>
                                <p><?php echo esc_html($description); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt--40">
                            <?php if($settings['iconlist']):?>
                            <ul class="brand-list brand-style-1">
                                <?php foreach (  $settings['iconlist'] as $item ):?>
                                <li>
                                    <a href="<?php echo esc_url($item['icon_url'])?>" title="<?php echo esc_html($item['list_title'])?>">
                                        <i class="<?php echo esc_attr( $item['icon']['value'] ); ?>" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

}