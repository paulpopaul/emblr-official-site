<?php

/**
 * Plugin Name: WhatsApp Chat PRO
 * Description: Send messages directly to your WhatsApp phone number.
 * Plugin URI: https://quadlayers.com/portfolio/wordpress-whatsapp-chat/
 * Version: 2.4.0
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
  define('QLWAPP_PRO_PLUGIN_VERSION', '2.4.0');
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
  include_once( QLWAPP_PRO_PLUGIN_DIR . 'includes/qlwapp.php' );
}