<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('QLWAPP_Settings')) {

  class QLWAPP_Settings extends QLWAPP_Options {

    protected static $instance;

    // fix for activateUrl on install now button
    public function network_admin_url($url, $path) {

      if (wp_doing_ajax() && !is_network_admin()) {
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'install-plugin') {
          if (strpos($url, 'plugins.php') !== false) {
            $url = self_admin_url($path);
          }
        }
      }

      return $url;
    }

    public function add_redirect() {

      if (isset($_REQUEST['activate']) && $_REQUEST['activate'] == 'true') {
        if (wp_get_referer() == admin_url('admin.php?page=' . QLWAPP_DOMAIN . '_suggestions')) {
          wp_redirect(admin_url('admin.php?page=' . QLWAPP_DOMAIN . '_suggestions'));
        }
      }
    }

    function add_action_links($links) {

      $links[] = '<a target="_blank" href="' . QLWAPP_PURCHASE_URL . '">' . esc_html__('Premium', 'wp-whatsapp-chat') . '</a>';

      $links[] = '<a href="' . admin_url('admin.php?page=' . QLWAPP_DOMAIN) . '">' . esc_html__('Settings', 'wp-whatsapp-chat') . '</a>';

      return $links;
    }

    function ajax_get_posts() {

      if (current_user_can('manage_options')) {

        if (!empty($_REQUEST) && check_admin_referer('qlwapp_get_posts', 'nonce')) {

          $data = array(
              array('none', esc_html__('Exclude from all', 'wp-whatsapp-chat'))
          );

          $args = array(
              'post_type' => sanitize_key($_REQUEST['name']),
              'post_status' => 'publish',
              'ignore_sticky_posts' => 1,
              'posts_per_page' => 10,
              'exclude' => array_map('intval', (array) $_REQUEST['selected'])
          );

          if ($_REQUEST['q']) {
            $args['s'] = sanitize_text_field($_REQUEST['q']);
          }

          $posts = get_posts($args);

          foreach ($posts as $post) {
            $data[] = array($post->ID, mb_substr($post->post_title, 0, 49));
          }

          wp_send_json($data);
        }
      }

      wp_die();
    }

    function add_menu() {
      add_menu_page(QLWAPP_PLUGIN_NAME, QLWAPP_PLUGIN_NAME, 'edit_posts', QLWAPP_DOMAIN, array($this, 'settings_welcome'), plugins_url('/assets/img/icon.png', QLWAPP_PLUGIN_FILE));
      add_submenu_page(QLWAPP_DOMAIN, esc_html__('Welcome', 'wp-whatsapp-chat'), esc_html__('Welcome', 'wp-whatsapp-chat'), 'edit_posts', QLWAPP_DOMAIN, array($this, 'settings_welcome'));
      add_submenu_page(QLWAPP_DOMAIN, esc_html__('Button', 'wp-whatsapp-chat'), esc_html__('Button', 'wp-whatsapp-chat'), 'manage_options', QLWAPP_DOMAIN . '_button', array($this, 'settings_button'));
      add_submenu_page(QLWAPP_DOMAIN, esc_html__('Box', 'wp-whatsapp-chat'), esc_html__('Box', 'wp-whatsapp-chat'), 'manage_options', QLWAPP_DOMAIN . '_box', array($this, 'settings_box'));
      //add_submenu_page(QLWAPP_DOMAIN, esc_html__('Contacts', 'wp-whatsapp-chat'), esc_html__('Contacts', 'wp-whatsapp-chat'), 'manage_options', QLWAPP_DOMAIN . '_contacts', array($this, 'settings_contacts1'));
      add_submenu_page(QLWAPP_DOMAIN, esc_html__('Display', 'wp-whatsapp-chat'), esc_html__('Display', 'wp-whatsapp-chat'), 'manage_options', QLWAPP_DOMAIN . '_display', array($this, 'settings_display'));
      add_submenu_page(QLWAPP_DOMAIN, esc_html__('Colors', 'wp-whatsapp-chat'), esc_html__('Colors', 'wp-whatsapp-chat'), 'manage_options', QLWAPP_DOMAIN . '_colors', array($this, 'settings_colors'));
      add_submenu_page(QLWAPP_DOMAIN, esc_html__('Suggestions', 'wp-whatsapp-chat'), sprintf('%s', esc_html__('Suggestions', 'wp-whatsapp-chat')), 'edit_posts', QLWAPP_DOMAIN . '_suggestions', array($this, 'settings_suggestions'), 99);
      add_submenu_page(QLWAPP_DOMAIN, esc_html__('Premium', 'wp-whatsapp-chat'), sprintf('<i class="dashicons dashicons-awards"></i> %s', esc_html__('Premium', 'wp-whatsapp-chat')), 'edit_posts', QLWAPP_DOMAIN . '_premium', array($this, 'settings_premium'));
    }

    function settings_header() {
      global $submenu;
      ?>
      <div class="wrap about-wrap full-width-layout qlwrap">

        <h1><?php echo esc_html(QLWAPP_PLUGIN_NAME); ?></h1>

        <p class="about-text"><?php printf(esc_html__('Thanks for using %s! We will do our best to offer you the best and improved communication experience with your users.', 'wp-whatsapp-chat'), QLWAPP_PLUGIN_NAME); ?></p>

        <p class="about-text">
      <?php printf('<a href="%s" target="_blank">%s</a>', QLWAPP_DEMO_URL, esc_html__('Demo', 'wp-whatsapp-chat')); ?></a> |  
          <?php printf('<a href="%s" target="_blank">%s</a>', QLWAPP_DOCUMENTATION_URL, esc_html__('Documentation', 'wp-whatsapp-chat')); ?></a>
        </p>

      <?php printf('<a href="%s" target="_blank"><div style="
               background: #006bff url(%s) no-repeat;
               background-position: top center;
               background-size: 130px 130px;
               color: #fff;
               font-size: 14px;
               text-align: center;
               font-weight: 600;
               margin: 5px 0 0;
               padding-top: 120px;
               height: 40px;
               display: inline-block;
               width: 140px;
               " class="wp-badge">%s</div></a>', 'https://quadlayers.com/?utm_source=qlwapp_admin', plugins_url('/assets/img/quadlayers.jpg', QLWAPP_PLUGIN_FILE), esc_html__('QuadLayers', 'wp-whatsapp-chat')); ?>

      </div>
      <?php
      if (isset($submenu[QLWAPP_DOMAIN])) {
        if (is_array($submenu[QLWAPP_DOMAIN])) {
          ?>
          <div class="wrap about-wrap full-width-layout qlwrap">
            <h2 class="nav-tab-wrapper">
          <?php
          foreach ($submenu[QLWAPP_DOMAIN] as $tab) {
            if (strpos($tab[2], '.php') !== false)
              continue;
            ?>
                <a href="<?php echo admin_url('admin.php?page=' . esc_attr($tab[2])); ?>" class="nav-tab<?php echo (isset($_GET['page']) && $_GET['page'] == $tab[2]) ? ' nav-tab-active' : ''; ?>"><?php echo $tab[0]; ?></a>
                <?php
              }
              ?>
            </h2>
          </div>
          <?php
        }
      }
    }

    function settings_sanitize($settings) {

      if (isset($settings['button']['layout'])) {
        $settings['button']['layout'] = sanitize_html_class($settings['button']['layout']);
      }
      if (isset($settings['button']['position'])) {
        $settings['button']['position'] = sanitize_html_class($settings['button']['position']);
      }
      if (isset($settings['button']['text'])) {
        $settings['button']['text'] = sanitize_text_field($settings['button']['text']);
      }
//      if (isset($settings['button']['contactstimeout'])) {
//        $settings['box']['contactstimeout'] = sanitize_text_field($settings['box']['contactstimeout']);
//      }
      if (isset($settings['button']['icon'])) {
        $settings['button']['icon'] = sanitize_html_class($settings['button']['icon']);
      }
      if (isset($settings['box']['header'])) {
        $settings['box']['header'] = wp_kses_post($settings['box']['header']);
      }
      if (isset($settings['box']['footer'])) {
        $settings['box']['footer'] = wp_kses_post($settings['box']['footer']);
      }
      if (isset($settings['contacts'])) {
        if (count($settings['contacts'])) {
          foreach ($settings['contacts'] as $id => $c) {
            $settings['contacts'][$id]['chat'] = (bool) $settings['contacts'][$id]['chat'];
            $settings['contacts'][$id]['avatar'] = sanitize_text_field($settings['contacts'][$id]['avatar']);
            $settings['contacts'][$id]['phone'] = sanitize_text_field($settings['contacts'][$id]['phone']);
            $settings['contacts'][$id]['firstname'] = sanitize_text_field($settings['contacts'][$id]['firstname']);
            $settings['contacts'][$id]['lastname'] = sanitize_text_field($settings['contacts'][$id]['lastname']);
            $settings['contacts'][$id]['label'] = sanitize_text_field($settings['contacts'][$id]['label']);
            $settings['contacts'][$id]['message'] = wp_kses_post($settings['contacts'][$id]['message']);
            $settings['contacts'][$id]['timeto'] = wp_kses_post($settings['contacts'][$id]['timeto']);
//$settings['contacts'][$id]['message'] = stripslashes($settings['contacts'][$id]['message']);
          }
        }
      }

      return $settings;
    }

    function add_settings_register() {
      register_setting(sanitize_key(QLWAPP_DOMAIN . '-group'), sanitize_key(QLWAPP_DOMAIN), array($this, 'settings_sanitize'));
    }

    function settings_welcome() {

      global $qlwapp;
      ?>
      <?php $this->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
      <?php include_once('pages/welcome.php'); ?>
      </div>
        <?php
      }

      function settings_button() {

        global $qlwapp;
        ?>
      <?php $this->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
      <?php include_once('pages/button.php'); ?>
      </div>
        <?php
      }

      function settings_box() {

        global $qlwapp;
        ?>
      <?php $this->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
      <?php include_once('pages/box.php'); ?>
      </div>
        <?php
      }

      function settings_contacts1() {

        global $qlwapp;
        ?>
      <?php $this->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
      <?php include_once('pages/contacts.php'); ?>
      </div>
        <?php
      }

      function settings_display() {

        global $qlwapp;
        ?>
      <?php $this->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
      <?php include_once('pages/display.php'); ?>
      </div>
        <?php
      }

      function settings_colors() {

        global $qlwapp;
        ?>
      <?php $this->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
      <?php include_once('pages/colors.php'); ?>
      </div>
        <?php
      }

      function settings_premium() {

        global $qlwapp;
        ?>
      <?php $this->settings_header(); ?>
      <div class="wrap about-wrap full-width-layout qlwrap">
      <?php include_once('pages/premium.php'); ?>
      </div>
        <?php
      }

      function settings_suggestions() {

        global $qlwapp;
        ?>
      <?php $this->settings_header(); ?>
      <?php include_once('suggestions.php'); ?>
      <?php include_once('pages/suggestions.php'); ?>
      <?php
    }

    function settings_contacts() {
      ?>
      <table class="form-table widefat" id="qlwapp-contact-form" data-editindex="-1">
      <?php
      //gestion de la time zone
      $current_offset = get_option('gmt_offset');
      $tzstring = get_option('timezone_string');

      $check_zone_info = true;

      // Remove old Etc mappings. Fallback to gmt_offset.
      if (false !== strpos($tzstring, 'Etc/GMT')) {
        $tzstring = '';
      }
      if (empty($tzstring)) { // Create a UTC+- zone if no timezone string exists
        $check_zone_info = false;
        if (0 == $current_offset) {
          $tzstring = 'UTC+0';
        } elseif ($current_offset < 0) {
          $tzstring = 'UTC' . $current_offset;
        } else {
          $tzstring = 'UTC+' . $current_offset;
        }
      }
      //  echo 'aca ' . get_option('gmt_offset'). ' aca'.get_option( 'timezone_string');
      // gestion de los contactos + gmt
      $this->contact_table();
      ?>
      </table>
        <?php
      }

      function contact_table($id = 0) {
        global $qlwapp;
        ?>
      <tr>
        <td>
          <div class="upload">
            <img id="cavatar-img" class="qlwapp-avatar" data-src="<?php echo stripslashes(esc_url($qlwapp['contacts'][$id]['avatar'])); ?>" src="<?php echo esc_url($qlwapp['contacts'][$id]['avatar']); ?>" />
            <div>
              <input type="hidden" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][avatar]'); ?>" id="cavatar" value="<?php echo esc_url($qlwapp['contacts'][$id]['avatar']); ?>" />
              <button type="button" class="upload_image_button button"><?php esc_html_e('Upload', 'wp-whatsapp-chat'); ?></button>
              <button type="button" class="remove_image_button button">&times;</button>
            </div>
          </div>
        </td>
        <td>
          <table>
            <tr>
              <td><b><?php esc_html_e('Firstname', 'wp-whatsapp-chat'); ?></b></td>
              <td><input type="text" id="cfirstname" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][firstname]'); ?>" placeholder="<?php echo esc_html($this->defaults['contacts'][0]['firstname']); ?>" value="<?php echo esc_html($qlwapp['contacts'][$id]['firstname']); ?>" /></td>
              <td><b><?php esc_html_e('Lastname', 'wp-whatsapp-chat'); ?></b></td>
              <td><input type="text" id="clastname" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][lastname]'); ?>" placeholder="<?php echo esc_html($this->defaults['contacts'][0]['lastname']); ?>" value="<?php echo esc_html($qlwapp['contacts'][$id]['lastname']); ?>" /></td>
            </tr>
            <tr>
              <td><b><?php esc_html_e('Phone', 'wp-whatsapp-chat'); ?></b></td><td><input type="text" id="cphone" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][phone]'); ?>" placeholder="<?php echo esc_html('+542215677768'); ?>" value="<?php echo esc_html($qlwapp['contacts'][$id]['phone']); ?>"/></td>
              <td><b><?php esc_html_e('Label', 'wp-whatsapp-chat'); ?></b></td><td><input type="text" id="clabel" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][label]'); ?>" placeholder="<?php echo esc_html($this->defaults['contacts'][0]['label']); ?>" value="<?php echo esc_html($qlwapp['contacts'][$id]['label']); ?>" /></td>
            </tr> 
            <tr>
              <td >
                <b><?php esc_html_e('From', 'wp-whatsapp-chat'); ?></b></td>
              <td  class="qlwapp-premium-field">
                <input type="time" id="ctimefrom" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][timefrom]'); ?>" placeholder="<?php echo esc_html($this->defaults['contacts'][0]['timefrom']); ?>" value="<?php echo esc_html($qlwapp['contacts'][$id]['timefrom']); ?>" />
                <p class="description hidden"><small><?php esc_html_e('This is a premium feature', 'wp-whatsapp-chat'); ?></small></p>    

              </td>
              <td>
                <b><?php esc_html_e('To', 'wp-whatsapp-chat'); ?></b></td>
              <td  class="qlwapp-premium-field">
                <input type="time" id="ctimeto" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][timeto]'); ?>" placeholder="<?php echo esc_html($this->defaults['contacts'][0]['timeto']); ?>" value="<?php echo esc_html($qlwapp['contacts'][$id]['timeto']); ?>" />
                <p class="description hidden"><small><?php esc_html_e('This is a premium feature', 'wp-whatsapp-chat'); ?></small></p>    
              </td> 
            </tr> 
            <!--      
                        <tr>
                          <td><b><?php esc_html_e('Time is over', 'wp-whatsapp-chat'); ?></b></td> 
                          <td class="qlwapp-premium-field">
                            <select id="ctimeout" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][timeout]'); ?>">
                              <option value="readonly"  ><?php esc_html_e('Show the field as read only', 'wp-whatsapp-chat'); ?></option>
                              <option value="disabled" > <?php esc_html_e('Do not show the field', 'wp-whatsapp-chat'); ?></option>
                            </select> 
                            <p class="description hidden"><small><?php esc_html_e('This is a premium feature', 'wp-whatsapp-chat'); ?></small></p>    
                          </td>  --> 
            <td>
              <b><label for="timezone"><?php esc_html_e('Timezone', 'wp-whatsapp-chat'); ?></label></b></td> 
            <td class="qlwapp-premium-field">
              <select id="ctimezone" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][timezone]'); ?>" aria-describedby="timezone-description">
      <?php echo wp_timezone_choice(get_option('timezone_string'), get_user_locale()); ?>
              </select> 
              <p class="description hidden"><small><?php esc_html_e('This is a premium feature', 'wp-whatsapp-chat'); ?></small></p>    

            </td>  
      </tr>
      </table>
      </td>
      </tr>
      <tr>
        <td><b><?php esc_html_e('Chat', 'wp-whatsapp-chat'); ?></b></td>
        <td class="qlwapp-premium-field">
          <p>
            <label><input type="radio" class="cchat" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][chat]'); ?>" value="1" <?php echo checked(true, (bool) $qlwapp['contacts'][$id]['chat']); ?>/><?php esc_html_e('Enabled', 'wp-whatsapp-chat'); ?></label>
            <label><input type="radio" class="cchat" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][chat]'); ?>" value="0" <?php echo checked(false, (bool) $qlwapp['contacts'][$id]['chat']); ?>/><?php esc_html_e('Disabled', 'wp-whatsapp-chat'); ?></label>
          </p>
          <p class="description hidden"><small><?php esc_html_e('This is a premium feature', 'wp-whatsapp-chat'); ?></small></p>    

        </td>
      </tr>
      <tr>
        <td colspan="2"><b><?php esc_html_e('Message', 'wp-whatsapp-chat'); ?></b></td>
      </tr>
      <tr class="qlwapp-premium-field">
        <td colspan="2"><?php wp_editor($qlwapp['contacts'][$id]['message'], 'cmessage', array('tinymce' => false, 'editor_height' => 150, 'textarea_name' => esc_attr(QLWAPP_DOMAIN . '[contacts][' . $id . '][message]'))); ?></td>
      <p class="description hidden"><small><?php esc_html_e('This is a premium feature', 'wp-whatsapp-chat'); ?></small></p>    
      </tr>
      <?php
    }

    function add_print_media_templates() {
      ?>
      <script type="text/html" id='tmpl-qlwapp-modal-backdrop'>
        <div class="media-modal-backdrop">&nbsp;</div>
      </script>
      <script type="text/html" id='tmpl-qlwapp-modal-window'>
        <div id="qlwapp_modal" class="media-modal wp-core-ui">
          <button type="button" class="media-modal-close close">
            <span class="media-modal-icon">
              <span class="screen-reader-text"><?php esc_html_e('Close media panel'); ?></span>
            </span>
          </button>
          <div class="media-frame mode-select wp-core-ui hide-menu">
            <div class="media-frame-title">
              <h1><?php echo esc_html(QLWAPP_PLUGIN_NAME); ?><span class="dashicons dashicons-arrow-down"></span></h1>
            </div>
            <div class="media-frame-router">
              <div class="media-router">
                <a href="#" class="media-menu-item active"><?php esc_html_e('Select icon', 'wp-whatsapp-chat'); ?></a>
              </div>
            </div>
            <div class="media-modal-content">
              <div class="media-frame mode-select wp-core-ui">
                <div class="media-frame-menu">
                  <div class="media-menu">
                    <a href="#" class="media-menu-item active"><?php esc_html_e('Featured Image'); ?></a>
                  </div>
                </div>
                <div class="media-frame-content" data-columns="10">
                  <div class="attachments-browser">
                    <input type="hidden" id="qlwapp_icon" value="{{ data.icon }}">
                    <ul tabindex="-1" class="attachments">
      <?php foreach (explode(',', 'qlwf-chat,qlwf-chat1,qlwf-chat2,qlwf-comments,qlwf-chat3,qlwf-bubble1,qlwf-chat-alt-fill,qlwf-chat-alt-stroke,qlwf-comment-alt2-fill,qlwf-comment-alt2-stroke,qlwf-comment-fill,qlwf-comment-stroke,qlwf-comment,qlwf-comment-alt1-stroke,qlwf-chat4,qlwf-comments1,qlwf-chat5,qlwf-comment1,qlwf-bubble,qlwf-bubbles,qlwf-bubbles2,qlwf-bubble2,qlwf-bubbles3,qlwf-bubbles4,qlwf-whatsapp,qlwf-chat6,qlwf-mode_comment,qlwf-insert_comment,qlwf-chat_bubble_outline,qlwf-chat_bubble,qlwf-bubble_chart,qlwf-comment2,qlwf-chat7,qlwf-commenting-o,qlwf-commenting,qlwf-comments-o,qlwf-comment-o,qlwf-wechat,qlwf-comments2,qlwf-comment3,qlwf-chat8,qlwf-chat-bubble-dots,qlwf-bubbles1,qlwf-bubble3') as $id => $icon) : ?>
                        <li tabindex="0" role="checkbox" aria-label="<?php echo esc_attr($icon); ?>" aria-checked="false" data-id="<?php echo esc_attr($id); ?>" class="attachment save-ready icon _<?php echo esc_attr(str_replace(' ', '_', trim($icon))); ?>">
                          <div class="attachment-preview js--select-attachment type-image subtype-jpeg landscape">
                            <div class="thumbnail">
                              <i class="<?php echo esc_attr($icon); ?>"></i>
                            </div>
                          </div>
                          <button type="button" class="check" tabindex="-1">
                            <span class="media-modal-icon"></span>
                            <span class="screen-reader-text"><?php esc_html_e('Deselect'); ?></span>
                          </button>
                        </li>
      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
                <div class="media-frame-toolbar">
                  <div class="media-toolbar">
                    <div class="media-toolbar-secondary"></div>
                    <div class="media-toolbar-primary search-form">
                      <button type="button" class="button media-button button-large button-primary media-button-select save"><?php esc_html_e('Save'); ?></button>
                      <button type="button" class="button media-button button-large button-secondary remove"><?php esc_html_e('Remove'); ?></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </script>
      <?php
    }

    function filter_pre_update_option($value, $old_value, $option) {

      global $qlwapp;

      if (isset($value['display'])) {
        unset($qlwapp['display']);
      }

      if (isset($value['contacts'])) {
        unset($qlwapp['contacts']);
      }

      return $this->wp_parse_args($value, $qlwapp);
    }

    function add_css() {
      ?>
      <style>
        @font-face {
          font-family: 'qlwf-whatsapp';
          src: url(data:application/x-font-woff;charset=utf-8;base64,d09GRgABAAAAAAYEAAsAAAAABbgAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABPUy8yAAABCAAAAGAAAABgDxIFKmNtYXAAAAFoAAAAVAAAAFQXVtKHZ2FzcAAAAbwAAAAIAAAACAAAABBnbHlmAAABxAAAAfwAAAH8pb7IGGhlYWQAAAPAAAAANgAAADYUXm9HaGhlYQAAA/gAAAAkAAAAJAfAA8ZobXR4AAAEHAAAABQAAAAUCgAAA2xvY2EAAAQwAAAADAAAAAwAKAESbWF4cAAABDwAAAAgAAAAIAAJAJluYW1lAAAEXAAAAYYAAAGGmUoJ+3Bvc3QAAAXkAAAAIAAAACAAAwAAAAMDAAGQAAUAAAKZAswAAACPApkCzAAAAesAMwEJAAAAAAAAAAAAAAAAAAAAARAAAAAAAAAAAAAAAAAAAAAAQAAA6QADwP/AAEADwABAAAAAAQAAAAAAAAAAAAAAIAAAAAAAAwAAAAMAAAAcAAEAAwAAABwAAwABAAAAHAAEADgAAAAKAAgAAgACAAEAIOkA//3//wAAAAAAIOkA//3//wAB/+MXBAADAAEAAAAAAAAAAAAAAAEAAf//AA8AAQAAAAAAAAAAAAIAADc5AQAAAAABAAAAAAAAAAAAAgAANzkBAAAAAAEAAAAAAAAAAAACAAA3OQEAAAAAAwAD/8AD/gPAACcATwCWAAABJicuAScmIyIHDgEHBhUUFhcDJR4BMzE4ATEyNz4BNzY1NCcuAScmATEiJi8BBzcnLgE1NDc+ATc2MzIXHgEXFhcWFx4BFxYVFAcOAQcGIxMuAScmIgcOAQcOAScuAScuAScmNjc+ATc+ATc2JicuAScuASMmIiMiBgcOARUUFhcWFx4BFxYXHgEXHgE3PgE3PgEnLgEnA2kkKSpbMTEzaVxdiSgoIiJIAQ03e0BpXF2KKCgKCiYbHP51OW0xD6ArCiAhIiFyTU1XKygpTCIjHh0XFyAICCEick1NV+cJRAkJDQcGHAYGDAkKOCQdJAYGBwUECgUEBQMDAQMCHQgHEAUGDAcGEwgJJC8FAhEQOCcnMBYkDhcoERI7CAgCAgMMCgMrJBwcJQoKKCiKXFxpQ4E6/vlHHx8oKIldXGkzMTFbKin9Fx4dCSmbEDJzPFdNTHMhIQgIHxcXHh4jIkwpKCtXTU1yISIBPAUhBAMKCSIHBgIFBRogGTYJCQwFBAwGBgkGBgwEBUcTEgMBBwkJMi8vTgYDFxY8IB8UCg0EBwEDAyMWFiIEBAcEAAAAAAEAAAABAAAmrdZpXw889QALBAAAAAAA2KCVZQAAAADYoJVlAAD/wAP+A8AAAAAIAAIAAAAAAAAAAQAAA8D/wAAABAAAAAAAA/4AAQAAAAAAAAAAAAAAAAAAAAUEAAAAAAAAAAAAAAACAAAABAAAAwAAAAAACgAUAB4A/gABAAAABQCXAAMAAAAAAAIAAAAAAAAAAAAAAAAAAAAAAAAADgCuAAEAAAAAAAEABwAAAAEAAAAAAAIABwBgAAEAAAAAAAMABwA2AAEAAAAAAAQABwB1AAEAAAAAAAUACwAVAAEAAAAAAAYABwBLAAEAAAAAAAoAGgCKAAMAAQQJAAEADgAHAAMAAQQJAAIADgBnAAMAAQQJAAMADgA9AAMAAQQJAAQADgB8AAMAAQQJAAUAFgAgAAMAAQQJAAYADgBSAAMAAQQJAAoANACkaWNvbW9vbgBpAGMAbwBtAG8AbwBuVmVyc2lvbiAxLjAAVgBlAHIAcwBpAG8AbgAgADEALgAwaWNvbW9vbgBpAGMAbwBtAG8AbwBuaWNvbW9vbgBpAGMAbwBtAG8AbwBuUmVndWxhcgBSAGUAZwB1AGwAYQByaWNvbW9vbgBpAGMAbwBtAG8AbwBuRm9udCBnZW5lcmF0ZWQgYnkgSWNvTW9vbi4ARgBvAG4AdAAgAGcAZQBuAGUAcgBhAHQAZQBkACAAYgB5ACAASQBjAG8ATQBvAG8AbgAuAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==) format('woff');
          font-weight: normal;
          font-style: normal;
        }

        #toplevel_page_qlwapp .wp-menu-image img {
          height: 16px;
        }
      </style>
      <?php
    }

    function add_js() {
      if (isset($_GET['page']) && strpos($_GET['page'], QLWAPP_DOMAIN) !== false) {
        wp_register_style('qlwapp-select2', plugins_url('/assets/css/qlwapp-select2' . QLWAPP::is_min() . '.css', QLWAPP_PLUGIN_FILE), array('wp-color-picker'), QLWAPP_PLUGIN_VERSION, 'all');

        wp_enqueue_style('qlwapp-admin', plugins_url('/assets/css/qlwapp-admin' . QLWAPP::is_min() . '.css', QLWAPP_PLUGIN_FILE), array('wp-color-picker', 'qlwapp-select2'), QLWAPP_PLUGIN_VERSION, 'all');

        wp_enqueue_media();
        wp_register_script('qlwapp-modal', plugins_url('/assets/js/qlwapp-modal' . QLWAPP::is_min() . '.js', QLWAPP_PLUGIN_FILE), array('jquery', 'backbone'), QLWAPP_PLUGIN_VERSION, true);
        wp_register_script('qlwapp-select2', plugins_url('/assets/js/select2.min.js', QLWAPP_PLUGIN_FILE), array('jquery'), QLWAPP_PLUGIN_VERSION);
        wp_enqueue_script('qlwapp-admin', plugins_url('/assets/js/qlwapp-admin' . QLWAPP::is_min() . '.js', QLWAPP_PLUGIN_FILE), array('jquery', 'qlwapp-modal', 'qlwapp-select2', 'wp-color-picker'), QLWAPP_PLUGIN_VERSION, true);

        wp_localize_script('qlwapp-admin', 'qlwapp', array('nonce' => array(
                'qlwapp_get_posts' => wp_create_nonce('qlwapp_get_posts'),
                'qlwapp_get_contact' => wp_create_nonce('qlwapp_get_contact'),
                'qlwapp_edit_contact' => wp_create_nonce('qlwapp_edit_contact'),
                'qlwapp_add_contact' => wp_create_nonce('qlwapp_add_contact'),
                'qlwapp_save_contact' => wp_create_nonce('qlwapp_save_contact')
            ))
        );
      }
    }

    function init() {
      add_action('wp_ajax_qlwapp_get_posts', array($this, 'ajax_get_posts'));
      add_action('admin_enqueue_scripts', array($this, 'add_js'));
      add_action('admin_head', array($this, 'add_css'));
      add_action('admin_menu', array($this, 'add_menu'));
      add_action('admin_init', array($this, 'add_settings_register'));
      add_action('print_media_templates', array($this, 'add_print_media_templates'));
      add_filter('pre_update_option_' . sanitize_key(QLWAPP_DOMAIN), array($this, 'filter_pre_update_option'), -1, 3);
      add_filter('plugin_action_links_' . plugin_basename(QLWAPP_PLUGIN_FILE), array($this, 'add_action_links'));

      //// 
      add_action('wp_ajax_qlwapp_add_contact', array($this, 'ajax_add_contact'));
      add_action('wp_ajax_qlwapp_edit_contact', array($this, 'ajax_edit_contact'));
      add_action('wp_ajax_qlwapp_save_contact', array($this, 'ajax_save_contact'));

//
      add_action('admin_init', array($this, 'add_redirect'));
      add_filter('network_admin_url', array($this, 'network_admin_url'), 10, 2);
    }

    ///
    function ajax_edit_contact() {
      global $qlwapp;

      if (check_ajax_referer('qlwapp_edit_contact', 'nonce', false)) {
        // set -1 if the contact not exist beacouse allways exist contact 0   
        $contact_id = (isset($_REQUEST['contact_id'])) ? absint($_REQUEST['contact_id']) : -1;
        if (isset($qlwapp['contacts'][$contact_id])) {
          $qlwapp['contacts'][$contact_id]['id'] = $contact_id;
          $qlwapp['contacts'][$contact_id]['prev_id'] = $contact_id - 1;
          $qlwapp['contacts'][$contact_id]['next_id'] = min($contact_id + 1, count($qlwapp['contacts']) - 1);

          wp_send_json_success($qlwapp['contacts'][$contact_id]);
        }
      } else {
        $this->defaults()['contacts'][0]['id'] = $contact_id;
        wp_send_json_success($this->defaults()['contacts'][0]);
      }
    }

    function ajax_save_contact() {
      global $qlwapp;
      if (check_ajax_referer('qlwapp_save_contact', 'nonce', false)) {

        if (array_key_exists('contacts', $qlwapp)) {

          $contact_data = isset($_REQUEST['contact_data']) ? $_REQUEST['contact_data'] : false;
          $contact_id = isset($_REQUEST['contact_id']) ? absint($_REQUEST['contact_id']) : 0;

          if (is_array($contact_data)) {

            $qlwapp['contacts'][$contact_id] = wp_parse_args($contact_data, $qlwapp['contacts'][$contact_id]);

            update_option('qlwapp', $qlwapp);

            wp_send_json_success($contact_data);
          }

          wp_send_json_error(esc_html__('Undefined contact', 'qlwapp'));
        }
      }
    }

    function ajax_add_contact() {
      global $qlwapp;
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        self::$instance->defaults();
        self::$instance->init();
      }
      return self::$instance;
    }

  }

  QLWAPP_Settings::instance();
}
