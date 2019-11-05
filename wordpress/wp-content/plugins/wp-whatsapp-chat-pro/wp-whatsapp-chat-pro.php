<?php
/**
 * Plugin Name: WhatsApp Chat PRO
 * Description: Send messages directly to your WhatsApp phone number.
 * Version: 2.3.7
 * Author: QuadLayers
 * Author URI: https://quadlayers.com
 * Copyright: 2018 QuadLayers (https://quadlayers.com)
 * Text Domain: wp-whatsapp-chat-pro
 */
if (!defined('ABSPATH'))
  exit;

if (!defined('QLWAPP_PLUGIN_NAME')) {
  define('QLWAPP_PLUGIN_NAME', 'WhatsApp Chat');
}
if (!defined('QLWAPP_PRO_PLUGIN_NAME')) {
  define('QLWAPP_PRO_PLUGIN_NAME', 'WhatsApp Chat PRO');
}
if (!defined('QLWAPP_PRO_PLUGIN_VERSION')) {
  define('QLWAPP_PRO_PLUGIN_VERSION', '2.3.7');
}
if (!defined('QLWAPP_PRO_PLUGIN_FILE')) {
  define('QLWAPP_PRO_PLUGIN_FILE', __FILE__);
}
if (!defined('QLWAPP_PRO_PLUGIN_DIR')) {
  define('QLWAPP_PRO_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR);
}
if (!defined('QLWAPP_PRO_DEMO_URL')) {
  define('QLWAPP_PRO_DEMO_URL', 'https://quadlayers.com/portfolio/wordpress-whatsapp-chat/?utm_source=qlwapp_admin');
}
if (!defined('QLWAPP_PRO_LICENSES_URL')) {
  define('QLWAPP_PRO_LICENSES_URL', 'https://quadlayers.com/account/licenses/?utm_source=qlwapp_admin');
}
if (!defined('QLWAPP_PRO_SUPPORT_URL')) {
  define('QLWAPP_PRO_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=qlwapp_admin');
}

if (!class_exists('QLWAPP_PRO')) {

  class QLWAPP_PRO {

    protected static $instance;
    var $free = 'wp-whatsapp-chat';

    function add_action_links($links) {

      $links[] = '<a target="_blank" href="' . QLWAPP_PRO_SUPPORT_URL . '">' . esc_html__('Support', 'wp-whatsapp-chat-pro') . '</a>';

      $links[] = '<a target="_blank" href="' . QLWAPP_PRO_LICENSES_URL . '">' . esc_html__('License', 'wp-whatsapp-chat-pro') . '</a>';

      return $links;
    }

    function add_admin_notices() {

      $screen = get_current_screen();

      if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
        return;
      }

      $plugin = "{$this->free}/{$this->free}.php";

      if (is_plugin_active($plugin)) {
        return;
      }

      if ($this->is_installed($plugin)) {

        if (!current_user_can('activate_plugins')) {
          return;
        }
        ?>
        <div class="error">
          <p>
            <a href="<?php echo wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1', 'activate-plugin_' . $plugin); ?>" class='button button-secondary'><?php printf(esc_html__('Activate %s', 'wp-whatsapp-chat-pro'), QLWAPP_PLUGIN_NAME); ?></a>
            <?php printf(esc_html__('%s not working because you need to activate the %s plugin.', 'wp-whatsapp-chat-pro'), QLWAPP_PRO_PLUGIN_NAME, QLWAPP_PLUGIN_NAME); ?>   
          </p>
        </div>
        <?php
      } else {
        if (!current_user_can('install_plugins')) {
          return;
        }
        ?>
        <div class="error">
          <p>
            <a href="<?php echo wp_nonce_url(self_admin_url("update.php?action=install-plugin&plugin={$this->free}"), "install-plugin_{$this->free}"); ?>" class='button button-secondary'><?php printf(esc_html__('Install %s', 'wp-whatsapp-chat-pro'), QLWAPP_PLUGIN_NAME); ?></a>
            <?php printf(esc_html__('%s not working because you need to install the %s plugin.', 'wp-whatsapp-chat-pro'), QLWAPP_PRO_PLUGIN_NAME, QLWAPP_PLUGIN_NAME); ?>
          </p>
        </div>
        <?php
      }
    }

    function add_frontend_js() {
      wp_enqueue_style('qlwapp-icons', plugins_url('/assets/qlwapp-icons.min.css', QLWAPP_PRO_PLUGIN_FILE), null, QLWAPP_PRO_PLUGIN_VERSION, 'all');
    }

    function add_admin_js() {
      if (isset($_GET['page']) && strpos($_GET['page'], QLWAPP_DOMAIN) !== false) {
        wp_enqueue_style('qlwapp-icons', plugins_url('/assets/qlwapp-icons.min.css', QLWAPP_PRO_PLUGIN_FILE), null, QLWAPP_PRO_PLUGIN_VERSION, 'all');
        wp_enqueue_script('qlwapp-premium', plugins_url('/assets/js/qlwapp-premium.min.js', QLWAPP_PRO_PLUGIN_FILE), array('jquery', 'backbone'), QLWAPP_PRO_PLUGIN_VERSION);
      }
    }

    function add_frontend_css() {
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

    function add_license_page() {
      remove_submenu_page(QLWAPP_DOMAIN, QLWAPP_DOMAIN . '_premium');
      add_submenu_page(QLWAPP_DOMAIN, __('License', 'wp-whatsapp-chat-pro'), __('License', 'wp-whatsapp-chat-pro'), 'manage_options', QLWAPP_DOMAIN . '_license', array($this, 'settings_license'));
    }

    function settings_license() {

      global $qlwapp, $qlwapp_updater;
      ?>
      <?php QLWAPP_Settings::instance()->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
        <?php include_once('includes/pages/license.php'); ?>
      </div>
      <?php
    }

    function add_preview_init() {
      wp_enqueue_script('qlwapp-customize', plugins_url('/assets/js/qlwapp-customizer.min.js', QLWAPP_PRO_PLUGIN_FILE), array('jquery'), QLWAPP_PRO_PLUGIN_VERSION, 'all');
    }

    function add_customize_settings() {

      global $qlwapp;

      $qlwapp_customized = array();

      foreach ($customized = json_decode(wp_unslash($_REQUEST['customized']), true) as $key => $value) {
        if (strpos($key, QLWAPP_DOMAIN) !== false) {
          parse_str("$key=$value", $qlwapp_customized[]);
        }
      }

      $qlwapp_customized = call_user_func_array('array_merge_recursive', $qlwapp_customized);

      if (isset($qlwapp_customized[QLWAPP_DOMAIN])) {
        $qlwapp = array_replace_recursive($qlwapp, $qlwapp_customized[QLWAPP_DOMAIN]);
      }

      return $qlwapp;
    }

    function add_selective_refresh($partial) {

      if (isset($_REQUEST['wp_customize']) && $_REQUEST['wp_customize'] == "on" && isset($_REQUEST['customized']) && !empty($_REQUEST['customized'])) {
        $qlwapp = $this->add_customize_settings();
      }

      ob_start();

      include apply_filters('qlwapp_box_template', QLWAPP_PLUGIN_DIR . 'template/box.php');

      return ob_get_clean();
    }

    function save_customize($manager) {

      if (is_customize_preview()) {
        update_option(QLWAPP_DOMAIN, $this->add_customize_settings());
      }
    }

    function add_customize_register($wp_customize) {

      global $qlwapp;

      include_once 'includes/customizer_editor.php';

      $section_id = QLWAPP_DOMAIN . '_settings';

      $wp_customize->add_section($section_id, array(
          'title' => QLWAPP_PLUGIN_NAME,
          'description' => '',
          'priority' => 200,
      ));

      $wp_customize->add_setting(QLWAPP_DOMAIN . '[scheme][brand]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['scheme']['brand'],
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_hex_color',
      ));
      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, QLWAPP_DOMAIN . '[scheme][brand]', array(
          'label' => esc_html__('Brand', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[scheme][brand]',
              ))
      );
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[scheme][text]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['scheme']['text'],
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_hex_color',
          'sanitize_js_callback' => ''
      ));
      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, QLWAPP_DOMAIN . '[scheme][text]', array(
          'label' => esc_html__('Text', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[scheme][text]',
      )));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[scheme][link]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['scheme']['link'],
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_hex_color',
          'sanitize_js_callback' => ''
      ));
      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, QLWAPP_DOMAIN . '[scheme][link]', array(
          'label' => esc_html__('Link', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[scheme][link]',
              ))
      );
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[scheme][name]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['scheme']['name'],
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_hex_color',
          'sanitize_js_callback' => ''
      ));
      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, QLWAPP_DOMAIN . '[scheme][name]', array(
          'label' => esc_html__('Name', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[scheme][name]',
      )));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[scheme][label]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['scheme']['label'],
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_hex_color',
          'sanitize_js_callback' => ''
      ));
      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, QLWAPP_DOMAIN . '[scheme][label]', array(
          'label' => esc_html__('Label', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[scheme][label]',
      )));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[scheme][message]', array(
          //'type' => $type,
          'capability' => 'manage_options',
          'default' => $qlwapp['scheme']['message'],
          'transport' => 'postMessage',
          'sanitize_callback' => 'sanitize_hex_color',
      ));
      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, QLWAPP_DOMAIN . '[scheme][message]', array(
          'label' => esc_html__('Message', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[scheme][message]',
      )));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[button][layout]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['button']['layout'],
          'transport' => 'postMessage',
      ));
      $wp_customize->add_control(QLWAPP_DOMAIN . '[button][layout]', array(
          'type' => 'select',
          'section' => $section_id,
          'label' => esc_html__('Button Layout', 'wp-whatsapp-chat-pro'),
          'description' => '',
          'input_attrs' => array(),
          'choices' => array(
              'button' => esc_html__('Button', 'wp-whatsapp-chat-pro'),
              'bubble' => esc_html__('Bubble', 'wp-whatsapp-chat-pro')
      )));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[button][position]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['button']['position'],
          'transport' => 'postMessage',
      ));
      $wp_customize->add_control(QLWAPP_DOMAIN . '[button][position]', array(
          'type' => 'select',
          'section' => $section_id,
          'label' => esc_html__('Button Position', 'wp-whatsapp-chat-pro'),
          'choices' => array(
              'middle-left' => esc_html__('Middle Left', 'wp-whatsapp-chat-pro'),
              'middle-right' => esc_html__('Middle Right', 'wp-whatsapp-chat-pro'),
              'bottom-left' => esc_html__('Bottom Left', 'wp-whatsapp-chat-pro'),
              'bottom-right' => esc_html__('Bottom Right', 'wp-whatsapp-chat-pro'),
      )));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[button][text]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['button']['text'],
          'transport' => 'postMessage',
      ));
      $wp_customize->add_control(QLWAPP_DOMAIN . '[button][text]', array(
          'type' => 'text',
          'section' => $section_id,
          'label' => esc_html__('Button Text', 'wp-whatsapp-chat-pro'),
          'description' => '',
      ));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[button][icon]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['button']['icon'],
          'transport' => 'postMessage',
      ));
      $wp_customize->add_control(QLWAPP_DOMAIN . '[button][icon]', array(
          'type' => 'text',
          'section' => $section_id,
          'label' => esc_html__('Button Icon', 'wp-whatsapp-chat-pro'),
          'description' => '',
      ));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[box][header]', array(
          ////'type' => $type,
          'capability' => 'manage_options',
          'default' => $qlwapp['box']['header'],
          'transport' => 'postMessage',
      ));
      $wp_customize->add_control(new QLWAPP_WP_Editor_Control($wp_customize, QLWAPP_DOMAIN . '[box][header]', array(
          'label' => esc_html__('Box Header', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[box][header]',
      )));
      $wp_customize->add_setting(QLWAPP_DOMAIN . '[box][footer]', array(
          'capability' => 'manage_options',
          'default' => $qlwapp['box']['footer'],
          'transport' => 'postMessage',
      ));
      $wp_customize->add_control(new QLWAPP_WP_Editor_Control($wp_customize, QLWAPP_DOMAIN . '[box][footer]', array(
          'label' => esc_html__('Box Footer', 'wp-whatsapp-chat-pro'),
          'section' => $section_id,
          'settings' => QLWAPP_DOMAIN . '[box][footer]',
      )));
      $wp_customize->selective_refresh->add_partial(QLWAPP_DOMAIN . '[button][layout]', array(
          'selector' => '#qlwapp',
          'settings' => array(
              QLWAPP_DOMAIN . '[button][layout]',
              QLWAPP_DOMAIN . '[button][position]',
              QLWAPP_DOMAIN . '[button][icon]',
              QLWAPP_DOMAIN . '[button][text]',
              QLWAPP_DOMAIN . '[box][header]',
              QLWAPP_DOMAIN . '[box][footer]',
          ),
          'container_inclusive' => true,
          'fallback_refresh' => false,
          'render_callback' => array($this, 'add_selective_refresh')));
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

      global $qlwapp;

      $template = QLWAPP_PRO_PLUGIN_DIR . 'template/box_premium.php';

      return $template;
    }

    function add_contact_js() {

      if (isset($_GET['page']) && strpos($_GET['page'], 'qlwapp_box') !== false) {
        ?>
        <script>
          (function ($) {
            $('#btn-add-contact').click(function (e) {
              e.preventDefault();
              document.querySelector('#qlwapp-contact-form').dataset.editindex = '-1';
              let
              avatarImg = document.querySelector('#cavatar-img');
              avatarImg.src = avatarImg.dataset.src;
              $('#qlwapp-contact-form #cavatar').val('');
              $('#qlwapp-contact-form #cavatar-img').attr('src', 'https://www.gravatar.com/avatar/00000000000000000000000000000000');
              $('#qlwapp-contact-form #cfirstname').val('');
              $('#qlwapp-contact-form #clastname').val('');
              $('#qlwapp-contact-form #cphone').val('');
              $('#qlwapp-contact-form #clabel').val('');
              $('#qlwapp-contact-form #cmessage').val('');
              $('#qlwapp-contact-form').slideToggle();
              return false;
            });
          })(jQuery);
        </script>
        <?php
      }
    }

    function is_installed($path) {

      $installed_plugins = get_plugins();

      return isset($installed_plugins[$path]);
    }

    function add_updater() {

      global $qlwapp, $qlwapp_updater;

      if (include_once 'includes/updater.php') {

        $qlwapp_updater = qlwdd_updater(array(
            'api_url' => 'https://quadlayers.com/wc-api/qlwdd/',
            'plugin_url' => QLWAPP_PRO_DEMO_URL,
            'plugin_file' => __FILE__,
            'license_market' => $qlwapp['license']['market'],
            'license_key' => $qlwapp['license']['key'],
            'license_email' => $qlwapp['license']['email'],
            'license_url' => admin_url('admin.php?page=qlwapp_license'),
            'product_key' => '4c3b7745ace5a4648fe6b434964955b6',
            'envato_key' => 'Gn46hMOIcvz8uyVvpe0jB2ge7A1RdH5T',
            'envato_id' => '23125935',
            'emp_id' => '843823'
        ));
      }
    }

    function add_activation() {

      global $qlwapp_updater;

      if (isset($_POST['option_page']) && $_POST['option_page'] == 'qlwapp-group' && isset($_POST[QLWAPP_DOMAIN]['license'])) {
        $qlwapp_updater->request_activation($_POST[QLWAPP_DOMAIN]['license']['key'], $_POST[QLWAPP_DOMAIN]['license']['email'], $_POST[QLWAPP_DOMAIN]['license']['market']);
      }
    }

    function init() {
      add_action('admin_notices', array($this, 'add_admin_notices'));
      add_filter('plugin_action_links_' . plugin_basename(QLWAPP_PRO_PLUGIN_FILE), array($this, 'add_action_links'));
      if (class_exists('QLWAPP')) {
        add_action('wp_enqueue_scripts', array($this, 'add_frontend_js'));
        add_action('wp_head', array($this, 'add_frontend_css'), 200);
        add_action('admin_enqueue_scripts', array($this, 'add_admin_js'));
        add_action('admin_init', array($this, 'add_updater'));
        add_action('admin_init', array($this, 'add_activation'));
        add_action('admin_menu', array($this, 'add_license_page'));
        add_action('admin_footer', array($this, 'add_contact_js'));
        add_action('customize_register', array($this, 'add_customize_register'));
        add_action('customize_preview_init', array($this, 'add_preview_init'), 10, 2);
        add_action('customize_save_after', array($this, 'save_customize'));
        add_filter('qlwapp_box_display', array($this, 'box_display'), 10);
        add_filter('qlwapp_box_template', array($this, 'box_premium'));
      }
    }

    public static function do_activation() {

      if ($active_plugins = get_option('active_plugins', array())) {

        foreach ($active_plugins as $key => $active_plugin) {

          if (strstr($active_plugin, '/ql-whatsapp-chat-pro.php')) {
            unset($active_plugins[$key]);
          }
        }

        update_option('active_plugins', $active_plugins);
      }
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        self::$instance->init();
      }
      return self::$instance;
    }

  }

  add_action('plugins_loaded', array('QLWAPP_PRO', 'instance'), 99);

  register_activation_hook(QLWAPP_PRO_PLUGIN_FILE, array('QLWAPP_PRO', 'do_activation'));
}

