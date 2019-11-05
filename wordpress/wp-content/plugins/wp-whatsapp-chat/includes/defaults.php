<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('QLWAPP_Options')) {

  class QLWAPP_Options {

    protected static $instance;
    public $defaults;

    function defaults() {

      $this->defaults = array(
          'license' => array(
              'market' => '',
              'key' => '',
              'email' => ''
          ),
          'scheme' => array(
              'brand' => '',
              'text' => '',
              'link' => '',
              'message' => '',
              'label' => '',
              'name' => '',
          ),
          //'user' => array(
          //    'message' => sprintf(esc_html__('Hello! I\'m testing the %s plugin @https://quadlayers.com', 'wp-whatsapp-chat'), QLWAPP_PLUGIN_NAME)
          //),
          'button' => array(
              'layout' => 'button',
              'position' => 'bottom-right',
              'text' => esc_html__('How can I help you?', 'wp-whatsapp-chat'),
              'message' => sprintf(esc_html__('Hello! I\'m testing the %s plugin @https://quadlayers.com', 'wp-whatsapp-chat'), QLWAPP_PLUGIN_NAME),
              'icon' => 'qlwapp-whatsapp-icon',
              'phone' => '',
              'developer' => 'no',
              'rounded' => 'yes',
              'timefrom' => '00:00',
              'timeto' => '00:00',
              'timezone' => $this->get_current_timezone(),
              'timeout' => 'readonly'
          ),
          'box' => array(
              'enable' => 'no',
              'header' => '<h3>Hello!</h3><p>Click one of our representatives below to chat on WhatsApp or send us an email to <a href="mailto:' . get_bloginfo('admin_email') . '">' . get_bloginfo('admin_email') . '</a></p>',
              'footer' => '<p>Powered by <a target="_blank" href="' . QLWAPP_PURCHASE_URL . '">WhatsApp Chat</a>'
//              ,'contactstimeout' => 'no' 
          ),
          'chat' => array(
              'emoji' => 'no',
              'response' => esc_html__('Write a response', 'wp-whatsapp-chat'),
          ),
          'contacts' => array(
              0 => array(
                  'chat' => true,
                  'avatar' => 'https://www.gravatar.com/avatar/00000000000000000000000000000000',
                  'phone' => '',
                  'firstname' => 'John',
                  'lastname' => 'Doe',
                  'label' => esc_html__('Support', 'wp-whatsapp-chat'),
                  'message' => esc_html__('Hello! I\'m John from the support team.', 'wp-whatsapp-chat'),
                  'timefrom' => '00:00',
                  'timeto' => '00:00',
                  'timezone' => $this->get_current_timezone(),
                  'timeout' => 'readonly'
              ),
          ),
          'display' => array(
              'devices' => 'all',
              'target' => array(),
          ),
      );

      return $this->defaults;
    }

    function wac_options($options) {

      if ($phone = get_option('whatsapp_chat_page')) {
        $options['button']['phone'] = $phone;
      }

      if ($text = get_option('whatsapp_chat_button')) {
        $options['button']['text'] = $text;
      }
      if (get_option('whatsapp_chat_powered_by')) {
        $options['button']['developer'] = 'yes';
      }
      if (false !== get_option('whatsapp_chat_round')) {
        $options['button']['rounded'] = 'no';
      }
      if ($message = get_option('whatsapp_chat_msg')) {
        $options['user']['message'] = $message;
      }
      if ($mobile = get_option('whatsapp_chat_mobile')) {
        $options['display']['devices'] = 'mobile';
      }
      if (get_option('whatsapp_chat_hide_button')) {
        $options['display']['devices'] = 'hide';
      }
      if (get_option('whatsapp_chat_hide_post')) {
        $options['display']['post'] = array('none');
      }
      if (get_option('whatsapp_chat_hide_page')) {
        $options['display']['page'] = array('none');
      }
      if (get_option('whatsapp_chat_hide_product')) {
        $options['display']['product'] = array('none');
      }
      if (get_option('whatsapp_chat_hide_project')) {
        $options['display']['project'] = array('none');
      }

      if (false !== get_option('whatsapp_chat_down')) {
        $vposition = get_option('whatsapp_chat_down') ? 'bottom' : 'middle';
        $hposition = get_option('whatsapp_chat_left_side') ? 'left' : 'right';
        $options['button']['position'] = "{$vposition}-{$hposition}";
      }

      if (get_option('whatsapp_chat_dark')) {
        $options['scheme']['brand'] = '#075E54';
        $options['scheme']['text'] = '#ffffff';
      } elseif (get_option('whatsapp_chat_white')) {
        $options['scheme']['brand'] = '#ffffff';
        $options['scheme']['text'] = '#075E54';
      } elseif (false !== get_option('whatsapp_chat_white')) {
        $options['scheme']['brand'] = '#20B038';
        $options['scheme']['text'] = '#ffffff';
      }

      return $options;
    }

    /* function standar_timezone_gmt($timezone) {
      $GMT = 'GMT+00:00';
      $minutes = '00';
      if (strpos($timezone, 'UTC') !== false) {
      $timezone = str_replace(array('.25', '.5', '.75'), array(':15', ':30', ':45'), $timezone);

      $temp = explode(':', $timezone);

      if (isset($temp[1])) {
      $minutes = $temp[1];
      }
      $hours = str_replace(array('UTC'), array('GMT'), $temp[0]);
      $hours = str_replace(array('-1', '-2', '-3', '-4', '-5', '-6', '-7', '-8', '-9'), array('-01', '-02', '-03', '-04', '-05', '-06', '-07', '-08', '-09'), $hours);
      $hours = str_replace(array('+1', '+2', '+3', '+4', '+5', '+6', '+7', '+8', '+9'), array('+01', '+02', '+03', '+04', '+05', '+06', '+07', '+08', '+09'), $hours);
      $GMT = sprintf('%s:%s', $hours, $minutes);
      } else {
      $target_time_zone = new DateTimeZone($timezone);
      $date_time = new DateTime('now', $target_time_zone);
      $GMT = sprintf('GMT%s', $date_time->format('P'));
      }
      return $GMT;
      } */

    function get_whatsapp_number($phone) {

      $phone = preg_replace('/[^0-9]/', '', $phone);

      $phone = ltrim($phone, '0');

      return $phone;
    }

    function get_timezone_offset($timezone) {
      if (strpos($timezone, 'UTC') !== false) {
        $offset = preg_replace('/UTC\+?/', '', $timezone) * 60;
      } else {
        $current = timezone_open($timezone);
        $utc = new \DateTime('now', new \DateTimeZone('UTC'));
        $offset = $current->getOffset($utc) / 3600 * 60;
      }
      return $offset;
    }

    function get_current_timezone() {
      // Get user settings
      $current_offset = get_option('gmt_offset');
      $tzstring = get_option('timezone_string');

      $check_zone_info = true;

      // Remove old Etc mappings. Fallback to gmt_offset.
      if (false !== strpos($tzstring, 'Etc/GMT')) {
        $tzstring = '';
      }

      if (empty($tzstring)) {
        // Create a UTC+- zone if no timezone string exists
        $check_zone_info = false;
        if (0 == $current_offset) {
          $tzstring = 'UTC+0';
        } elseif ($current_offset < 0) {
          $tzstring = 'UTC' . $current_offset;
        } else {
          $tzstring = 'UTC+' . $current_offset;
        }
      }
      return $tzstring;
    }

    function options() {

      global $qlwapp;

      $options = get_option(QLWAPP_DOMAIN, $this->defaults());

      if (isset($options['user']['message'])) {
        $options['button']['message'] = $options['user']['message'];
      }

      if (isset($options['button']['rounded']) && $options['button']['rounded'] == 1) {
        $options['button']['rounded'] = 'yes';
      }
      if (isset($options['button']['developer']) && $options['button']['developer'] == 1) {
        $options['button']['developer'] = 'yes';
      }

      if (!is_admin()) {
        if (isset($options['button']['phone'])) {
          $options['button']['phone'] = $this->get_whatsapp_number($options['button']['phone']);
        }
        if (isset($options['button']['timezone'])) {
          $options['button']['timezone'] = $this->get_timezone_offset($options['button']['timezone']);
        }
      }

      if (isset($options['contacts'])) {
        if (count($options['contacts'])) {
          foreach ($options['contacts'] as $id => $c) {

            $options['contacts'][$id] = wp_parse_args($c, $this->defaults()['contacts'][0]);

            if (!is_admin()) {
              if (!empty($options['contacts'][$id]['phone'])) {
                $options['contacts'][$id]['phone'] = $this->get_whatsapp_number($options['contacts'][$id]['phone']);
              }
              if (!empty($options['contacts'][$id]['timezone'])) {
                $options['contacts'][$id]['timezone'] = $this->get_timezone_offset($options['contacts'][$id]['timezone']);
              }
            }
          }
        }
      }
      /*
       * 
       * next update
        if (isset($options['box']['contactstimeout']) && $options['box']['contactstimeout'] == 'yes') {
        $options['box']['contactstimeout'] = 'yes';
        } */

      $qlwapp = $this->wp_parse_args($options, $this->defaults());
    }

    function wp_parse_args(&$a, $b) {
      $a = (array) $a;
      $b = (array) $b;
      $result = $b;
      foreach ($a as $k => &$v) {
        if (is_array($v) && isset($result[$k])) {
          $result[$k] = $this->wp_parse_args($v, $result[$k]);
        } else {
          $result[$k] = $v;
        }
      }
      return $result;
    }

    function init() {
      add_action('init', array($this, 'options'));
      add_filter('default_option_qlwapp', array($this, 'wac_options'), 10);
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

  QLWAPP_Options::instance();
}
