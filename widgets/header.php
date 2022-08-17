<?php
class Header extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "header";
    }

    public function get_title()
    {
        return __("Header", "bitzlabs");
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
                'label' => __('Logo Section', 'bitzlabs'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mobile_logo', [
                'label' => __('Mobile Logo', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'left_logo', [
                'label' => __('Left Logo', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'right_logo', [
                'label' => __('Right Logo', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'open_icon', [
                'label' => __('Menu Open Icon', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'close_icon', [
                'label' => __('Menu Close Icon', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'social_icon_section',
            [
                'label' => __('Social Icons', 'bitzlabs'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->start_controls_section(
            'content_button',
            [
                'label' => __('Button Content', 'bitzlabs'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'connect_text', [
                'label' => __('Button Text', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'connect_url', [
                'label' => __('Button URL', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $mobile_logo = $settings['mobile_logo']['url'];
        $menu_open = $settings['open_icon']['url'];
        $menu_close = $settings['close_icon']['url'];
        $left_logo = $settings['left_logo']['url'];
        $right_logo = $settings['right_logo']['url'];

        $connect_text = $settings['connect_text'];
        $connect_url = $settings['connect_url'];
        ?>
        <header class="rn-header header-default header-left-align header-not-transparent">
            <div class="position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-md-6 col-4 position-static">
                        <div class="header-left d-flex">
                            <div class="logo">
                                <a href="<?php echo home_url('/'); ?>" class="blitz-logo-left">
                                    <img class="logo-light logo-height" src="<?php echo esc_url($right_logo); ?>" alt="Blitz Logo">
                                </a>
                            </div>
                            <nav class="mainmenu-nav d-none d-lg-block">
                                <?php
                                   wp_nav_menu( array(
                                        'menu'           => 'Project Nav', 
                                        'theme_location' => 'primary',
                                        'container' => 'ul',
                                        'menu_class' => 'mainmenu',
                                        'link_before' => '<span>',
                                        'link_after'=>'</span>'
                                    ) );
                                ?>
                                
                            </nav>
                        </div>
                    </div>

                    <?php if(!empty($connect_text)): ?>
                        <div class="col-lg-3 col-md-6 col-8">
                            <div class="header-right">

                                <div class="connect-group connect-group-md">
                                    <a href="<?php echo esc_url($connect_url); ?>" type="button" class="btn-default btn-small round btn-connect d-flex align-items-center">
                                        <div><?php echo esc_html($connect_text); ?></div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </header>

        <header class="rn-mobile-header header-default header-left-align header-not-transparent">
            <div class="position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-md-6 col-4 position-static">
                        <div class="header-left d-flex">
                            <div class="logo">
                                <a href="<?php echo home_url('/'); ?>" class="blitz-logo-left">
                                    <img class="logo-light logo-height" src="<?php echo esc_url($mobile_logo); ?>" alt="Blitz Logo" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-8">
                        <div class="header-right">
                            <?php if(!empty($connect_text)): ?>
                            <div class="connect-group-sm">
                                <a href="<?php echo esc_url($connect_url); ?>" type="button" class="btn-default btn-small round btn-connect-simple">
                                    <div><?php echo esc_html($connect_text); ?></div>
                                </a>
                            </div>
                            <?php endif; ?>

                            <button class="hamberger">
                                <div>
                                    <img src="<?php echo esc_url($menu_open); ?>" alt="" class="logo-light" />
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <nav class="rn-aside d-flex flex-column flex-shrink-0">
            <a href="<?php echo home_url('/'); ?>" class="link-dark text-decoration-none blitz-logo mb-auto" title="">
                <img class="logo-light logo-height" src="<?php echo esc_url($left_logo); ?>" alt="">
            </a>
            <?php if($settings['iconlist']):?>
            <ul class="nav nav-pills nav-flush flex-column text-center nav-socials d-none d-md-flex mb-3">
                <?php foreach (  $settings['iconlist'] as $item ): ?>
                <li>
                    <a href="<?php echo esc_url($item['icon_url'])?>" title="<?php echo esc_html($item['list_title'])?>" rel="nofollow" target="_blank">
                        <i class="<?php echo esc_attr( $item['icon']['value'] ); ?>" aria-hidden="true"></i>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </nav>
        
        <button id="hamberger">
            <div>
                <img src="<?php echo esc_url($menu_open); ?>" alt="" class="logo-light" />
            </div>
        </button>

        <div class="popup-mobile-menu-bg">
            <button id="hambergerClose">
                <img src="<?php echo esc_url($menu_close); ?>" alt="" class="logo-light" />
            </button>
            <div class="popup-mobile-menu">
                <div class="container">
                    <div class="inner d-flex justify-content-between flex-column">
                        <div>
                            <div class="header-top">
                                <a href="<?php echo home_url('/'); ?>" class="blitz-logo-left">
                                    <img class="logo-light logo-height" src="<?php echo esc_url($mobile_logo); ?>" alt="Blitz Logo" />
                                </a>
                            </div>
                            <?php
                                wp_nav_menu( array(
                                    'menu'           => 'Project Nav', 
                                    'theme_location' => 'primary',
                                    'container' => 'ul',
                                    'menu_class' => 'mainmenu',
                                    'link_before' => '<span>',
                                    'link_after'=>'</span>'
                                ) );
                            ?>
                        </div>

                        <div class="d-flex justify-content-between align-items-end">
                            <?php if($settings['iconlist']):?>
                            <ul class="nav nav-pills nav-flush text-center nav-socials">
                                <?php foreach (  $settings['iconlist'] as $item ): ?>
                                <li>
                                    <a href="<?php echo esc_url($item['icon_url'])?>" title="<?php echo esc_html($item['list_title'])?>" rel="nofollow" target="_blank">
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
        </div>

        <div id="rn-bg">
            <canvas id="fluid"></canvas>
            <div class="rn-gradient-circle"></div>
            <div class="rn-gradient-circle theme-pink"></div>
        </div>

        


        
        <?php
    }

}