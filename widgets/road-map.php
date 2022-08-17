<?php
class RoadMap extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "road-map";
    }

    public function get_title()
    {
        return __("Road Map", "bitzlabs");
    }

    public function get_icon()
    {
        return 'el el-align-link';
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
            'title', [
                'label' => __('Icon Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );


        $this->add_control(
			'maplist', [
				'label' => esc_html__( 'Icon List', 'bitzlabs' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Title #1', 'bitzlabs' ),
					],
					[
						'title' => esc_html__( 'Title #2', 'bitzlabs' ),
					],
				],
				'title_field' => '{{{ title }}}',
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
            <div class="rwt-timeline-area rn-section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="400">
                                <h2><?php echo $title; ?></h2>
                                <div>
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt--50">
                            <div class="timeline-style-two bg-color-blackest">
                               
                                <?php
                                    $maplist = $settings['maplist']; 
                                    
                                    $list_0 =$maplist[0]['title']; 
                                    $list_1 =$maplist[1]['title']; 
                                    $list_2 =$maplist[2]['title']; 
                                    $list_3 =$maplist[3]['title']; 
                                    $list_4 =$maplist[4]['title']; 
                                    $list_5 =$maplist[5]['title']; 
                                    $list_6 =$maplist[6]['title']; 
                                    $list_7 =$maplist[7]['title']; 
                                    $list_8 =$maplist[8]['title']; 
                                    $list_9 =$maplist[9]['title']; 
                                    $list_10 =$maplist[10]['title']; 
                                    $list_11 =$maplist[11]['title']; 
                                ?>
                                
                                <div class="row row--0 row-progress-line row-progress-line--1">

                                    
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num0"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_0; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num1"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_1; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num2"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_2; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num3"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_3; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              

                                <div class="row row--0 row-progress-line flex-md-row-reverse row-progress-line--2">
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num7"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_4; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num6"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_5; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num5"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_6; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num4"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_7; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="row row--0 row-progress-line row-progress-line--3">
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num8"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_8; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num9"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_9; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num10"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_10; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 rn-timeline-single no-gradient">
                                        <div class="rn-timeline">
                                            <div class="line-custom num11"></div>
                                            <div class="progress-dot">
                                                <div class="dot-level">
                                                    <div class="dot-inner"></div>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <p><?php echo $list_11; ?></p>
                                            </div>
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