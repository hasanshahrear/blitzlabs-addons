<?php
class MeetTeam extends \Elementor\Widget_Base{
    public function get_name()
    {
        return "meet-team";
    }

    public function get_title()
    {
        return __("Meet Team", "bitzlabs");
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
                'label' => __('Heading', 'bitzlabs'),
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
                'label' => __('Title', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'designation', [
                'label' => __('Designation', 'bitzlabs'),
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
            'twitter_url', [
                'label' => __('Twitter URL', 'bitzlabs'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
			'teamlist', [
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
        ?>
            <div class="rwt-team-area rn-section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center pt-5">
                                <h2><?php echo $title; ?></h2>
                                <div>
                                    <span style="font-weight:400"><br></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row--15">
                        <?php if($settings['teamlist']): 
                            foreach (  $settings['teamlist'] as $item ):
                                
                                    $img_url = $item['image']['url'];

                                if(!empty($item['image']['alt'])){
                                    $img_alt = $item['image']['alt'];
                                }
                                
                            ?>
                            
                            <div class="col-lg-4 col-md-6 col-12 mt--10">
                                <div class="rn-team team-style-default style-two">
                                    <div class="inner">
                                        <div class="content">
                                            <div class="bluredImg">
                                                <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt) ?> " class="imgA" /> 
                                                <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt) ?> " class="imgB" />
                                            </div>
                                            <h2><?php echo esc_html($item['list_title']);  ?></h2>
                                            <h6><?php echo esc_html($item['designation']);  ?></h6>
                                            <div>
                                                <?php echo esc_html($item['list_content']);  ?>
                                            </div>
                                            <?php if(!empty($item['twitter_url'])):  ?>
                                            <p><br>
                                                <a href="<?php echo esc_html($item['twitter_url']);  ?>">TWITTER</a>
                                            </p>
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