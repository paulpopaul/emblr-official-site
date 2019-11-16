<?php
if (!class_exists('QLWAPP_PRO_Frontend')) {

  class QLWAPP_PRO_Frontend {

    protected static $instance;

    function add_js() {
      wp_enqueue_style('qlwapp-icons', plugins_url('/assets/qlwapp-icons.min.css', QLWAPP_PRO_PLUGIN_FILE), null, QLWAPP_PRO_PLUGIN_VERSION, 'all');
    }

    function add_css() {
      global $qlwapp;
      ?>
      <style>
      <?php if (is_customize_preview()): ?>
          #qlwapp .qlwapp-toggle,
          #qlwapp .qlwapp-toggle .qlwapp-icon,
          #qlwapp .qlwapp-toggle .qlwapp-text,
          #qlwapp .qlwapp-box .qlwapp-header,
          #qlwapp .qlwapp-box .qlwapp-user {
            color: var(--qlwapp-scheme-text);
          }
      <?php endif; ?>
      <?php if (is_customize_preview()): ?>
          #qlwapp .qlwapp-toggle,
          #qlwapp .qlwapp-box .qlwapp-header,
          #qlwapp .qlwapp-box .qlwapp-user,
          #qlwapp .qlwapp-box .qlwapp-user:before {
            background-color: var(--qlwapp-scheme-brand);  
          }
      <?php endif; ?>
      <?php if (is_customize_preview() || $qlwapp['scheme']['link']): ?>
          #qlwapp a {
            color: var(--qlwapp-scheme-link);
          }
      <?php endif; ?>
      <?php if (is_customize_preview() || $qlwapp['scheme']['name']): ?>
          #qlwapp .qlwapp-box .qlwapp-account {
            color: var(--qlwapp-scheme-name);
          }
      <?php endif; ?>
      <?php if (is_customize_preview() || $qlwapp['scheme']['label']): ?>
          #qlwapp .qlwapp-box .qlwapp-label {
            color: var(--qlwapp-scheme-label);
          }
      <?php endif; ?>
      <?php if (is_customize_preview() || $qlwapp['scheme']['message']): ?>
          #qlwapp .qlwapp-box .qlwapp-message, 
          #qlwapp .qlwapp-box .qlwapp-response {
            color: var(--qlwapp-scheme-message);
          }
      <?php endif; ?>
      </style>
      <?php
    }

    function box_display($display) {

      global $qlwapp, $wp_query;

      if (!is_front_page() && is_singular() && isset($wp_query->queried_object->post_type)) {

        if (isset($qlwapp['display'][$wp_query->queried_object->post_type]) && count($qlwapp['display'][$wp_query->queried_object->post_type])) {

          $display = false;

          if (in_array($wp_query->queried_object->ID, $qlwapp['display'][$wp_query->queried_object->post_type])) {
            return true;
          }

          //backward compatibility for $post->post_name
          if (in_array($wp_query->queried_object->post_name, $qlwapp['display'][$wp_query->queried_object->post_type])) {
            return true;
          }
        }
      }

      if (is_post_type_archive() && isset($wp_query->queried_object->name)) {

        if (isset($qlwapp['display'][$wp_query->queried_object->name]) && count($qlwapp['display'][$wp_query->queried_object->name])) {

          $display = false;

          if (in_array('archive', $qlwapp['display'][$wp_query->queried_object->name])) {
            return true;
          }
        }
      }

      return $display;
    }

    function box_premium($template) {

      include_once(QLWAPP_PLUGIN_DIR . 'includes/models/Box.php');
      include_once(QLWAPP_PLUGIN_DIR . 'includes/models/Contact.php');
      include_once(QLWAPP_PLUGIN_DIR . 'includes/models/Display.php');
      include_once(QLWAPP_PLUGIN_DIR . 'includes/models/Button.php');

      $box_model = new QLWAPP_Box();
      $contact_model = new QLWAPP_Contact();
      $button_model = new QLWAPP_Button();
      $display_model = new QLWAPP_Display();

      $contacts = $contact_model->get_contacts_reorder();
      $display = $display_model->get();
      $button = $button_model->get();
      $box = $box_model->get();

      $template = QLWAPP_PRO_PLUGIN_DIR . 'template/box_premium.php';

      return $template;
    }

    function init() {
      add_action('wp_enqueue_scripts', array($this, 'add_js'));
      add_action('wp_head', array($this, 'add_css'), 200);
      add_filter('qlwapp_box_display', array($this, 'box_display'), 10);
      add_filter('qlwapp_box_template', array($this, 'box_premium'));
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        self::$instance->init();
      }
      return self::$instance;
    }

  }

  QLWAPP_PRO_Frontend::instance();
}
