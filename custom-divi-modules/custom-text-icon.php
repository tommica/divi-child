<?php
function subt_custom_text_icon()
{
    if (!class_exists('ET_Builder_Module')) {
        return;
    }

    if (class_exists('ET_Builder_Module_Text_Plus_Icon')) {
    	return;
    }

    class ET_Builder_Module_Text_Plus_Icon extends ET_Builder_Module {
		function init() {
			$this->name       = esc_html__( 'Text + Icon', 'et_builder' );
			$this->slug       = 'et_pb_icon_plus_text_custom';
			$this->fb_support = true;

			$this->whitelisted_fields = array(
				'src',
				'alt',
				'title_text',
				'show_in_lightbox',
				'url',
				'url_new_window',
				'show_bottom_space',
				'align',
				'admin_label',
				'module_id',
				'module_class',
				'force_fullwidth',
				'always_center_on_mobile',
				'use_overlay',
				'overlay_icon_color',
				'hover_overlay_color',
				'hover_icon',
				'background_layout',
				'content_new',
				'admin_label',
				'module_id',
				'module_class',
				'ul_type',
				'ul_position',
				'ul_item_indent',
				'ol_type',
				'ol_position',
				'ol_item_indent',
				'quote_border_weight',
				'quote_border_color',
			);

			$this->fields_defaults = array(
				'show_in_lightbox'        => array( 'off' ),
				'url_new_window'          => array( 'off' ),
				'show_bottom_space'       => array( 'on' ),
				'align'                   => array( 'left' ),
				'force_fullwidth'         => array( 'off' ),
				'always_center_on_mobile' => array( 'on' ),
				'use_overlay'             => array( 'off' ),
				'background_layout'   => array( 'light' ),
				'text_orientation'    => array( 'left' ),
			);

			$this->options_toggles = array(
				'general'  => array(
					'toggles' => array(
						'main_content_image' => esc_html__( 'Image', 'et_builder' ),
						'link'         => esc_html__( 'Link', 'et_builder' ),
						'main_content' => esc_html__( 'Text', 'et_builder' ),
					),
				),
				'advanced' => array(
					'toggles' => array(
						'overlay'    => esc_html__( 'Overlay', 'et_builder' ),
						'alignment'  => esc_html__( 'Alignment', 'et_builder' ),
						'width'      => array(
							'title'    => esc_html__( 'Sizing', 'et_builder' ),
							'priority' => 65,
						),
						'text' => array(
							'title'    => esc_html__( 'Text', 'et_builder' ),
							'priority' => 45,
							'tabbed_subtoggles' => true,
							'bb_icons_support' => true,
							'sub_toggles' => array(
								'p'     => array(
									'name' => 'P',
									'icon' => 'text-left',
								),
								'a'     => array(
									'name' => 'A',
									'icon' => 'text-link',
								),
								'ul'    => array(
									'name' => 'UL',
									'icon' => 'list',
								),
								'ol'    => array(
									'name' => 'OL',
									'icon' => 'numbered-list',
								),
								'quote' => array(
									'name' => 'QUOTE',
									'icon' => 'text-quote',
								),
							),
						),
						'header' => array(
							'title'    => esc_html__( 'Heading Text', 'et_builder' ),
							'priority' => 49,
							'tabbed_subtoggles' => true,
							'sub_toggles' => array(
								'h1' => array(
									'name' => 'H1',
									'icon' => 'text-h1',
								),
								'h2' => array(
									'name' => 'H2',
									'icon' => 'text-h2',
								),
								'h3' => array(
									'name' => 'H3',
									'icon' => 'text-h3',
								),
								'h4' => array(
									'name' => 'H4',
									'icon' => 'text-h4',
								),
								'h5' => array(
									'name' => 'H5',
									'icon' => 'text-h5',
								),
								'h6' => array(
									'name' => 'H6',
									'icon' => 'text-h6',
								),
							),
						),
					),
				),
				'custom_css' => array(
					'toggles' => array(
						'animation' => array(
							'title'    => esc_html__( 'Animation', 'et_builder' ),
							'priority' => 90,
						),
						'attributes' => array(
							'title'    => esc_html__( 'Attributes', 'et_builder' ),
							'priority' => 95,
						),
					),
				),
			);

			$this->main_css_element = '%%order_class%%';

			$this->advanced_options = array(
				'max_width' => array(
					'options' => array(
						'max_width' => array(
							'depends_show_if' => 'off',
						),
					),
				),
				'filters' => array(),
				'fonts' => array(
					'text'   => array(
						'label'    => esc_html__( 'Text', 'et_builder' ),
						'css'      => array(
							'line_height' => "{$this->main_css_element} p",
							'color' => "{$this->main_css_element}.et_pb_text",
						),
						'line_height' => array(
							'default' => floatval( et_get_option( 'body_font_height', '1.7' ) ) . 'em',
						),
						'font_size' => array(
							'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
						),
						'toggle_slug' => 'text',
						'sub_toggle'  => 'p',
						'hide_text_align' => true,
					),
					'link'   => array(
						'label'    => esc_html__( 'Link', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} a",
							'color' => "{$this->main_css_element}.et_pb_text a",
						),
						'line_height' => array(
							'default' => '1em',
						),
						'font_size' => array(
							'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
						),
						'toggle_slug' => 'text',
						'sub_toggle'  => 'a',
					),
					'ul'   => array(
						'label'    => esc_html__( 'Unordered List', 'et_builder' ),
						'css'      => array(
							'main'        => "{$this->main_css_element} ul",
							'color'       => "{$this->main_css_element}.et_pb_text ul",
							'line_height' => "{$this->main_css_element} ul li",
						),
						'line_height' => array(
							'default' => '1em',
						),
						'font_size' => array(
							'default' => '14px',
						),
						'toggle_slug' => 'text',
						'sub_toggle'  => 'ul',
					),
					'ol'   => array(
						'label'    => esc_html__( 'Ordered List', 'et_builder' ),
						'css'      => array(
							'main'        => "{$this->main_css_element} ol",
							'color'       => "{$this->main_css_element}.et_pb_text ol",
							'line_height' => "{$this->main_css_element} ol li",
						),
						'line_height' => array(
							'default' => '1em',
						),
						'font_size' => array(
							'default' => '14px',
						),
						'toggle_slug' => 'text',
						'sub_toggle'  => 'ol',
					),
					'quote'   => array(
						'label'    => esc_html__( 'Blockquote', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} blockquote",
							'color' => "{$this->main_css_element}.et_pb_text blockquote",
						),
						'line_height' => array(
							'default' => '1em',
						),
						'font_size' => array(
							'default' => '14px',
						),
						'toggle_slug' => 'text',
						'sub_toggle'  => 'quote',
					),
					'header'   => array(
						'label'    => esc_html__( 'Heading', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} h1",
						),
						'font_size' => array(
							'default' => absint( et_get_option( 'body_header_size', '30' ) ) . 'px',
						),
						'toggle_slug' => 'header',
						'sub_toggle'  => 'h1',
					),
					'header_2'   => array(
						'label'    => esc_html__( 'Heading 2', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} h2",
						),
						'font_size' => array(
							'default' => '26px',
						),
						'line_height' => array(
							'default' => '1em',
						),
						'toggle_slug' => 'header',
						'sub_toggle'  => 'h2',
					),
					'header_3'   => array(
						'label'    => esc_html__( 'Heading 3', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} h3",
						),
						'font_size' => array(
							'default' => '22px',
						),
						'line_height' => array(
							'default' => '1em',
						),
						'toggle_slug' => 'header',
						'sub_toggle'  => 'h3',
					),
					'header_4'   => array(
						'label'    => esc_html__( 'Heading 4', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} h4",
						),
						'font_size' => array(
							'default' => '18px',
						),
						'line_height' => array(
							'default' => '1em',
						),
						'toggle_slug' => 'header',
						'sub_toggle'  => 'h4',
					),
					'header_5'   => array(
						'label'    => esc_html__( 'Heading 5', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} h5",
						),
						'font_size' => array(
							'default' => '16px',
						),
						'line_height' => array(
							'default' => '1em',
						),
						'toggle_slug' => 'header',
						'sub_toggle'  => 'h5',
					),
					'header_6'   => array(
						'label'    => esc_html__( 'Heading 6', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} h6",
						),
						'font_size' => array(
							'default' => '14px',
						),
						'line_height' => array(
							'default' => '1em',
						),
						'toggle_slug' => 'header',
						'sub_toggle'  => 'h6',
					),
				),
				'background' => array(
					'settings' => array(
						'color' => 'alpha',
					),
				),
				'custom_margin_padding' => array(
					'css' => array(
						'important' => 'all',
					),
				),
				'text'      => array(
					'sub_toggle'  => 'p',
				),
			);
		}

		function get_fields() {
			$fields = array(
				'background_layout' => array(
					'label'             => esc_html__( 'Text Color', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'light' => esc_html__( 'Dark', 'et_builder' ),
						'dark'  => esc_html__( 'Light', 'et_builder' ),
					),
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'text',
					'sub_toggle'        => 'p',
					'description'       => esc_html__( 'Here you can choose the value of your text. If you are working with a dark background, then your text should be set to light. If you are working with a light background, then your text should be dark.', 'et_builder' ),
				),
				'content_new' => array(
					'label'           => esc_html__( 'Content', 'et_builder' ),
					'type'            => 'tiny_mce',
					'option_category' => 'basic_option',
					'description'     => esc_html__( 'Here you can create the content that will be used within the module.', 'et_builder' ),
					'toggle_slug'     => 'main_content',
				),
				'ul_type' => array(
					'label'             => esc_html__( 'Unordered List Style Type', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'disc'    => esc_html__( 'Disc', 'et_builder' ),
						'circle'  => esc_html__( 'Circle', 'et_builder' ),
						'square'  => esc_html__( 'Square', 'et_builder' ),
						'none'    => esc_html__( 'None', 'et_builder' ),
					),
					'priority'          => 80,
					'default'           => 'disc',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'text',
					'sub_toggle'        => 'ul',
				),
				'ul_position' => array(
					'label'             => esc_html__( 'Unordered List Style Position', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'outside' => esc_html__( 'Outside', 'et_builder' ),
						'inside'  => esc_html__( 'Inside', 'et_builder' ),
					),
					'priority'          => 85,
					'default'           => 'outside',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'text',
					'sub_toggle'        => 'ul',
				),
				'ul_item_indent' => array(
					'label'           => esc_html__( 'Unordered List Item Indent', 'et_builder' ),
					'type'            => 'range',
					'option_category' => 'configuration',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text',
					'sub_toggle'      => 'ul',
					'priority'        => 90,
					'default'         => '0px',
					'range_settings'  => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
				),
				'ol_type' => array(
					'label'             => esc_html__( 'Ordered List Style Type', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'decimal'              => 'decimal',
						'armenian'             => 'armenian',
						'cjk-ideographic'      => 'cjk-ideographic',
						'decimal-leading-zero' => 'decimal-leading-zero',
						'georgian'             => 'georgian',
						'hebrew'               => 'hebrew',
						'hiragana'             => 'hiragana',
						'hiragana-iroha'       => 'hiragana-iroha',
						'katakana'             => 'katakana',
						'katakana-iroha'       => 'katakana-iroha',
						'lower-alpha'          => 'lower-alpha',
						'lower-greek'          => 'lower-greek',
						'lower-latin'          => 'lower-latin',
						'lower-roman'          => 'lower-roman',
						'upper-alpha'          => 'upper-alpha',
						'upper-greek'          => 'upper-greek',
						'upper-latin'          => 'upper-latin',
						'upper-roman'          => 'upper-roman',
						'none'                 => 'none',
					),
					'priority'          => 80,
					'default'           => 'decimal',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'text',
					'sub_toggle'        => 'ol',
				),
				'ol_position' => array(
					'label'             => esc_html__( 'Ordered List Style Position', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'outside' => esc_html__( 'Outside', 'et_builder' ),
						'inside'  => esc_html__( 'Inside', 'et_builder' ),
					),
					'priority'          => 85,
					'default'           => 'outside',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'text',
					'sub_toggle'        => 'ol',
				),
				'ol_item_indent' => array(
					'label'           => esc_html__( 'Ordered List Item Indent', 'et_builder' ),
					'type'            => 'range',
					'option_category' => 'configuration',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text',
					'sub_toggle'      => 'ol',
					'priority'        => 90,
					'default'         => '0px',
					'range_settings'  => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
				),
				'quote_border_weight' => array(
					'label'           => esc_html__( 'Blockquote Border Weight', 'et_builder' ),
					'type'            => 'range',
					'option_category' => 'configuration',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text',
					'sub_toggle'      => 'quote',
					'priority'        => 85,
					'default'         => '5px',
					'range_settings'  => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
				),
				'quote_border_color' => array(
					'label'           => esc_html__( 'Blockquote Border Color', 'et_builder' ),
					'type'            => 'color-alpha',
					'option_category' => 'configuration',
					'custom_color'    => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'text',
					'sub_toggle'      => 'quote',
					'field_template'  => 'color',
					'priority'        => 90,
				),
				'disabled_on' => array(
					'label'           => esc_html__( 'Disable on', 'et_builder' ),
					'type'            => 'multiple_checkboxes',
					'options'         => array(
						'phone'   => esc_html__( 'Phone', 'et_builder' ),
						'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
						'desktop' => esc_html__( 'Desktop', 'et_builder' ),
					),
					'additional_att'  => 'disable_on',
					'option_category' => 'configuration',
					'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'visibility',
				),
				'admin_label' => array(
					'label'       => esc_html__( 'Admin Label', 'et_builder' ),
					'type'        => 'text',
					'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
					'toggle_slug' => 'admin_label',
				),
				'module_id' => array(
					'label'           => esc_html__( 'CSS ID', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'classes',
					'option_class'    => 'et_pb_custom_css_regular',
				),
				'module_class' => array(
					'label'           => esc_html__( 'CSS Class', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'classes',
					'option_class'    => 'et_pb_custom_css_regular',
				),
				'src' => array(
					'label'              => esc_html__( 'Image URL', 'et_builder' ),
					'type'               => 'upload',
					'option_category'    => 'basic_option',
					'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
					'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
					'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
					'affects'            => array(
						'alt',
						'title_text',
					),
					'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'et_builder' ),
					'toggle_slug'        => 'main_content_image',
				),
				'alt' => array(
					'label'           => esc_html__( 'Image Alternative Text', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'depends_default' => true,
					'depends_to'      => array(
						'src',
					),
					'description'     => esc_html__( 'This defines the HTML ALT text. A short description of your image can be placed here.', 'et_builder' ),
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'attributes',
				),
				'title_text' => array(
					'label'           => esc_html__( 'Image Title Text', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'depends_default' => true,
					'depends_to'      => array(
						'src',
					),
					'description'     => esc_html__( 'This defines the HTML Title text.', 'et_builder' ),
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'attributes',
				),
				'show_in_lightbox' => array(
					'label'             => esc_html__( 'Open in Lightbox', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'configuration',
					'options'           => array(
						'off' => esc_html__( 'No', 'et_builder' ),
						'on'  => esc_html__( 'Yes', 'et_builder' ),
					),
					'affects'           => array(
						'url',
						'url_new_window',
						'use_overlay',
					),
					'toggle_slug'       => 'link',
					'description'       => esc_html__( 'Here you can choose whether or not the image should open in Lightbox. Note: if you select to open the image in Lightbox, url options below will be ignored.', 'et_builder' ),
				),
				'url' => array(
					'label'           => esc_html__( 'Link URL', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'depends_show_if' => 'off',
					'affects'         => array(
						'use_overlay',
					),
					'description'     => esc_html__( 'If you would like your image to be a link, input your destination URL here. No link will be created if this field is left blank.', 'et_builder' ),
					'toggle_slug'     => 'link',
				),
				'url_new_window' => array(
					'label'             => esc_html__( 'Url Opens', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'off' => esc_html__( 'In The Same Window', 'et_builder' ),
						'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
					),
					'depends_show_if'   => 'off',
					'toggle_slug'       => 'link',
					'description'       => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'et_builder' ),
				),
				'use_overlay' => array(
					'label'             => esc_html__( 'Image Overlay', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'layout',
					'options'           => array(
						'off' => esc_html__( 'Off', 'et_builder' ),
						'on'  => esc_html__( 'On', 'et_builder' ),
					),
					'affects'           => array(
						'overlay_icon_color',
						'hover_overlay_color',
						'hover_icon',
					),
					'depends_default'   => true,
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'overlay',
					'description'       => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'et_builder' ),
				),
				'overlay_icon_color' => array(
					'label'             => esc_html__( 'Overlay Icon Color', 'et_builder' ),
					'type'              => 'color-alpha',
					'custom_color'      => true,
					'depends_show_if'   => 'on',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'overlay',
					'description'       => esc_html__( 'Here you can define a custom color for the overlay icon', 'et_builder' ),
				),
				'hover_overlay_color' => array(
					'label'             => esc_html__( 'Hover Overlay Color', 'et_builder' ),
					'type'              => 'color-alpha',
					'custom_color'      => true,
					'depends_show_if'   => 'on',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'overlay',
					'description'       => esc_html__( 'Here you can define a custom color for the overlay', 'et_builder' ),
				),
				'hover_icon' => array(
					'label'               => esc_html__( 'Hover Icon Picker', 'et_builder' ),
					'type'                => 'text',
					'option_category'     => 'configuration',
					'class'               => array( 'et-pb-font-icon' ),
					'renderer'            => 'et_pb_get_font_icon_list',
					'renderer_with_field' => true,
					'depends_show_if'     => 'on',
					'tab_slug'            => 'advanced',
					'toggle_slug'         => 'overlay',
					'description'         => esc_html__( 'Here you can define a custom icon for the overlay', 'et_builder' ),
				),
				'show_bottom_space' => array(
					'label'             => esc_html__( 'Show Space Below The Image', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'layout',
					'options'           => array(
						'on'      => esc_html__( 'Yes', 'et_builder' ),
						'off'     => esc_html__( 'No', 'et_builder' ),
					),
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'custom_margin_padding',
					'description'       => esc_html__( 'Here you can choose whether or not the image should have a space below it.', 'et_builder' ),
				),
				'align' => array(
					'label'           => esc_html__( 'Image Alignment', 'et_builder' ),
					'type'            => 'text_align',
					'option_category' => 'layout',
					'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'alignment',
					'description'     => esc_html__( 'Here you can choose the image alignment.', 'et_builder' ),
					'options_icon'    => 'module_align',
				),
				'force_fullwidth' => array(
					'label'             => esc_html__( 'Force Fullwidth', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'layout',
					'options'           => array(
						'off' => esc_html__( 'No', 'et_builder' ),
						'on'  => esc_html__( 'Yes', 'et_builder' ),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'width',
					'affects' => array(
						'max_width',
					),
				),
				'always_center_on_mobile' => array(
					'label'             => esc_html__( 'Always Center Image On Mobile', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'layout',
					'options'           => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'alignment',
				),
				'disabled_on' => array(
					'label'           => esc_html__( 'Disable on', 'et_builder' ),
					'type'            => 'multiple_checkboxes',
					'options'         => array(
						'phone'   => esc_html__( 'Phone', 'et_builder' ),
						'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
						'desktop' => esc_html__( 'Desktop', 'et_builder' ),
					),
					'additional_att'  => 'disable_on',
					'option_category' => 'configuration',
					'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'visibility',
				),
				'admin_label' => array(
					'label'       => esc_html__( 'Admin Label', 'et_builder' ),
					'type'        => 'text',
					'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
					'toggle_slug' => 'admin_label',
				),
				'module_id' => array(
					'label'           => esc_html__( 'CSS ID', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'classes',
					'option_class'    => 'et_pb_custom_css_regular',
				),
				'module_class' => array(
					'label'           => esc_html__( 'CSS Class', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'toggle_slug'     => 'classes',
					'option_class'    => 'et_pb_custom_css_regular',
				),
			);

			return $fields;
		}

		public function get_alignment() {
			$alignment = isset( $this->shortcode_atts['align'] ) ? $this->shortcode_atts['align'] : '';

			return et_pb_get_alignment( $alignment );
		}

		function shortcode_callback($atts, $content = null, $function_name)
	    {
	        $module_id = $this->shortcode_atts['module_id'];
	        $module_class = $this->shortcode_atts['module_class'];
	        $background_layout = $this->shortcode_atts['background_layout'];
	        $ul_type = $this->shortcode_atts['ul_type'];
	        $ul_position = $this->shortcode_atts['ul_position'];
	        $ul_item_indent = $this->shortcode_atts['ul_item_indent'];
	        $ol_type = $this->shortcode_atts['ol_type'];
	        $ol_position = $this->shortcode_atts['ol_position'];
	        $ol_item_indent = $this->shortcode_atts['ol_item_indent'];
	        $quote_border_weight = $this->shortcode_atts['quote_border_weight'];
	        $quote_border_color = $this->shortcode_atts['quote_border_color'];
	        $src = $this->shortcode_atts['src'];
	        $alt = $this->shortcode_atts['alt'];
	        $title_text = $this->shortcode_atts['title_text'];
	        $url = $this->shortcode_atts['url'];
	        $url_new_window = $this->shortcode_atts['url_new_window'];
	        $show_in_lightbox = $this->shortcode_atts['show_in_lightbox'];
	        $show_bottom_space = $this->shortcode_atts['show_bottom_space'];
	        $align = $this->get_alignment();
	        $force_fullwidth = $this->shortcode_atts['force_fullwidth'];
	        $always_center_on_mobile = $this->shortcode_atts['always_center_on_mobile'];
	        $overlay_icon_color = $this->shortcode_atts['overlay_icon_color'];
	        $hover_overlay_color = $this->shortcode_atts['hover_overlay_color'];
	        $hover_icon = $this->shortcode_atts['hover_icon'];
	        $use_overlay = $this->shortcode_atts['use_overlay'];
	        $animation_style = $this->shortcode_atts['animation_style'];

	        $module_class = ET_Builder_Element::add_module_order_class($module_class, $function_name);

	        $this->shortcode_content = et_builder_replace_code_content_entities($this->shortcode_content);

	        $video_background = $this->video_background();
	        $parallax_image_background = $this->get_parallax_image_background();

	        if ('' !== $ul_type || '' !== $ul_position || '' !== $ul_item_indent) {
	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%% ul',
	                'declaration' => sprintf(
	                    '%1$s
				%2$s
				%3$s',
	                    '' !== $ul_type ? sprintf('list-style-type: %1$s;', esc_html($ul_type)) : '',
	                    '' !== $ul_position ? sprintf('list-style-position: %1$s;', esc_html($ul_position)) : '',
	                    '' !== $ul_item_indent ? sprintf('padding-left: %1$s;', esc_html($ul_item_indent)) : ''
	                ),
	            ));
	        }

	        if ('' !== $ol_type || '' !== $ol_position || '' !== $ol_item_indent) {
	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%% ol',
	                'declaration' => sprintf(
	                    '%1$s
				%2$s
				%3$s',
	                    '' !== $ol_type ? sprintf('list-style-type: %1$s;', esc_html($ol_type)) : '',
	                    '' !== $ol_position ? sprintf('list-style-position: %1$s;', esc_html($ol_position)) : '',
	                    '' !== $ol_item_indent ? sprintf('padding-left: %1$s;', esc_html($ol_item_indent)) : ''
	                ),
	            ));
	        }

	        if ('' !== $quote_border_weight || '' !== $quote_border_color) {
	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%% blockquote',
	                'declaration' => sprintf(
	                    '%1$s
				%2$s',
	                    '' !== $quote_border_weight ? sprintf('border-width: %1$s;', esc_html($quote_border_weight)) : '',
	                    '' !== $quote_border_color ? sprintf('border-color: %1$s;', esc_html($quote_border_color)) : ''
	                ),
	            ));
	        }

	        $class = " et_pb_module et_pb_bg_layout_{$background_layout}{$this->get_text_orientation_classname()}";

	        // Image

	        $module_class = ET_Builder_Element::add_module_order_class($module_class, $function_name);
	        $video_background = $this->video_background();
	        $parallax_image_background = $this->get_parallax_image_background();

	        // Handle svg image behaviour
	        $src_pathinfo = pathinfo($src);
	        $is_src_svg = isset($src_pathinfo['extension']) ? 'svg' === $src_pathinfo['extension'] : false;

	        if ('on' === $always_center_on_mobile) {
	            $module_class .= ' et_always_center_on_mobile';
	        }

	        // overlay can be applied only if image has link or if lightbox enabled
	        $is_overlay_applied = 'on' === $use_overlay && ('on' === $show_in_lightbox || ('off' === $show_in_lightbox && '' !== $url)) ? 'on' : 'off';

	        if ('on' === $force_fullwidth) {
	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%%',
	                'declaration' => 'max-width: 100% !important;',
	            ));

	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%% .et_pb_image_wrap, %%order_class%% img',
	                'declaration' => 'width: 100%;',
	            ));
	        }

	        if ($this->fields_defaults['align'][0] !== $align) {
	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%%',
	                'declaration' => sprintf(
	                    'text-align: %1$s;',
	                    esc_html($align)
	                ),
	            ));
	        }

	        if ('center' !== $align) {
	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%%',
	                'declaration' => sprintf(
	                    'margin-%1$s: 0;',
	                    esc_html($align)
	                ),
	            ));
	        }

	        if ('on' === $is_overlay_applied) {
	            if ('' !== $overlay_icon_color) {
	                ET_Builder_Element::set_style($function_name, array(
	                    'selector' => '%%order_class%% .et_overlay:before',
	                    'declaration' => sprintf(
	                        'color: %1$s !important;',
	                        esc_html($overlay_icon_color)
	                    ),
	                ));
	            }

	            if ('' !== $hover_overlay_color) {
	                ET_Builder_Element::set_style($function_name, array(
	                    'selector' => '%%order_class%% .et_overlay',
	                    'declaration' => sprintf(
	                        'background-color: %1$s;',
	                        esc_html($hover_overlay_color)
	                    ),
	                ));
	            }

	            $data_icon = '' !== $hover_icon
	                ? sprintf(
	                    ' data-icon="%1$s"',
	                    esc_attr(et_pb_process_font_icon($hover_icon))
	                )
	                : '';

	            $overlay_output = sprintf(
	                '<span class="et_overlay%1$s"%2$s></span>',
	                ('' !== $hover_icon ? ' et_pb_inline_icon' : ''),
	                $data_icon
	            );
	        }

	        // Set display block for svg image to avoid disappearing svg image
	        if ($is_src_svg) {
	            ET_Builder_Element::set_style($function_name, array(
	                'selector' => '%%order_class%% .et_pb_image_wrap',
	                'declaration' => 'display: block;',
	            ));
	        }

	        $output = sprintf(
	            '<span class="et_pb_image_wrap"><img src="%1$s" alt="%2$s"%3$s />%4$s</span>',
	            esc_url($src),
	            esc_attr($alt),
	            ('' !== $title_text ? sprintf(' title="%1$s"', esc_attr($title_text)) : ''),
	            'on' === $is_overlay_applied ? $overlay_output : ''
	        );

	        if ('on' === $show_in_lightbox) {
	            $output = sprintf('<a href="%1$s" class="et_pb_lightbox_image" title="%3$s">%2$s</a>',
	                esc_url($src),
	                $output,
	                esc_attr($alt)
	            );
	        } else if ('' !== $url) {
	            $output = sprintf('<a href="%1$s"%3$s>%2$s</a>',
	                esc_url($url),
	                $output,
	                ('on' === $url_new_window ? ' target="_blank"' : '')
	            );
	        }

	        $output = sprintf(
	            '<div%3$s class="et_pb_text%2$s%4$s%5$s%7$s">
		%8$s
		%6$s
		<div class="et_pb_text_inner">
		<div class="et_pb_custom_text_icon_icon">%9$s</div>
		<div class="et_pb_custom_text_icon_text">%1$s</div>
		</div>
		</div> <!-- .et_pb_text -->',
	            $this->shortcode_content,
	            esc_attr($class),
	            ('' !== $module_id ? sprintf(' id="%1$s"', esc_attr($module_id)) : ''),
	            ('' !== $module_class ? sprintf(' %1$s', esc_attr($module_class)) : ''),
	            '' !== $video_background ? ' et_pb_section_video et_pb_preload' : '', // #5
	            $video_background,
	            '' !== $parallax_image_background ? ' et_pb_section_parallax' : '',
	            $parallax_image_background,
	            $output
	        );

	        return $output;
	    }

		public function process_box_shadow( $function_name ) {
			$boxShadow = ET_Builder_Module_Fields_Factory::get( 'BoxShadow' );

			self::set_style( $function_name, $boxShadow->get_style(
				sprintf( '.%1$s .et_pb_image_wrap', self::get_module_order_class( $function_name ) ),
				$this->shortcode_atts
			) );
		}

		protected function _add_additional_border_fields() {
			parent::_add_additional_border_fields();

			$this->advanced_options["border"]['css'] = array(
				'main' => array(
					'border_radii'  => "%%order_class%% .et_pb_image_wrap",
					'border_styles' => "%%order_class%% .et_pb_image_wrap",
				)
			);

		}


	}

	new ET_Builder_Module_Text_Plus_Icon;
}

add_action('et_builder_ready', 'subt_custom_text_icon');
?>