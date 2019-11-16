<div id="qlwapp" class="qlwapp-premium <?php printf("qlwapp-%s qlwapp-%s qlwapp-%s qlwapp-%s %s", esc_attr($button['layout']), esc_attr($button['position']), esc_attr($qlwapp['display']['devices']), esc_attr($button['rounded'] === 'yes' ? 'rounded' : 'square'), join(' ', array_map('sanitize_html_class', (array) wp_get_current_user()->roles))); ?>">
  <div class="qlwapp-container">
    <?php if ($box['enable'] === 'yes'): ?>
      <div class="qlwapp-box">
        <div class="qlwapp-header">
          <div class="qlwapp-carousel">
            <?php if (!empty($box['header'])): ?>
              <div class="qlwapp-slide">
                <i class="qlwapp-close" data-action="close">&times;</i>
                <div class="qlwapp-description">
                  <?php echo wpautop(wp_kses_post(wpautop($box['header']))); ?>
                </div>
              </div>
            <?php endif; ?>
            <div class="qlwapp-slide">
              <div class="qlwapp-contact">     
                <div class="qlwapp-previous" data-action="previous">
                  <i class="qlwf-arrow_left"></i>
                </div>
                <div class="qlwapp-info">
                  <span class="qlwapp-name">%</span>
                  <span class="qlwapp-label">%</span>
                </div>
                <div class="qlwapp-avatar">
                  <div class="qlwapp-avatar-container">
                    <img>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="qlwapp-body">
          <div class="qlwapp-carousel">
            <div class="qlwapp-slide">
              <?php
              if (count($contacts) > 0):
                foreach ($contacts as $id => $contact):
                  ?>
                  <a class="qlwapp-account" 
                     data-action="<?php echo ($contact['chat'] ? 'chat' : 'open'); ?>" 
                     data-timefrom="<?php echo esc_attr($contact['timefrom']); ?>" 
                     data-timeto="<?php echo esc_attr($contact['timeto']); ?>" 
                     data-timeout="<?php echo esc_attr($contact['timeout']); ?>" 
                     data-phone="<?php echo esc_attr($contact['phone']); ?>" 
                     data-timezone="<?php echo esc_attr($contact['timezone']); ?>"
                     data-message="<?php echo esc_html($contact['message']); ?>" href="javascript:void(0);" target="_blank"> 
                       <?php if (!empty($contact['avatar'])): ?>
                      <div class="qlwapp-avatar">
                        <div class="qlwapp-avatar-container">
                          <img alt="<?php printf("%s %s", esc_html($contact['firstname']), esc_html($contact['lastname'])); ?>" src="<?php echo esc_url($contact['avatar']); ?>">
                        </div>                      
                      </div>
                    <?php endif; ?>
                    <div class="qlwapp-info"> 
                      <span class="qlwapp-label"><?php echo esc_html($contact['label']); ?></span>
                      <span class="qlwapp-name"><?php printf('%s %s', esc_html($contact['firstname']), esc_html($contact['lastname'])); ?></span>
                      <!--<time class="qlwapp-label"><?php printf(__('Available from %s to %s'), esc_html($contact['timefrom']), esc_html($contact['timeto'])); ?></time>-->
                      <?php if (!empty($contact['timefrom']) && !empty($contact['timeto']) && ($contact['timefrom'] != $contact['timeto'])): ?>
                        <span class="qlwapp-time"><?php printf(__('Available from <span class="from">%s</span> to <span class="to">%s</span> '), esc_html($contact['timefrom']), esc_html($contact['timeto'])); ?></span>
                      <?php endif; ?>
                    </div>
                  </a>
                  <?php
                endforeach;
              endif;
              ?>
            </div>
            <div class="qlwapp-slide">
              <div class="qlwapp-chat">
                <div class="qlwapp-message">
                </div>
                <!--<div class="qlwapp-user"></div>-->
              </div>
            </div>
          </div>
        </div>
        <?php if (!empty($box['footer'])): ?>
          <div class="qlwapp-footer" data-contactstimeout="<?php //echo esc_html($button['contactstimeout']);          ?>" >
            <?php echo wpautop(wp_kses_post($box['footer'])); ?>  
          </div>
        <?php endif; ?>
        <div class="qlwapp-response" data-action="response">
          <pre></pre>
          <textarea maxlength="500" name="message" placeholder="<?php echo esc_html($box['response']); ?>" aria-label="<?php echo esc_html($box['response']); ?>" tabindex="0"></textarea>
          <div class="qlwapp-buttons">
            <i class="qlwf-emoji"></i>       
            <a class="qlwapp-reply" data-action="open" data-message="<?php echo esc_html($button['message']); ?>" href="javascript:void(0);" target="_blank">
              <i class="qlwf-send"></i>
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <a class="qlwapp-toggle" 
       data-action="<?php echo ($box['enable'] === 'yes' ? 'box' : 'open'); ?>" 
       data-phone="<?php echo esc_attr($button['phone']); ?>" 
       data-timefrom="<?php echo esc_attr($button['timefrom']); ?>" 
       data-timeto="<?php echo esc_attr($button['timeto']); ?>" 
       data-timeout="<?php echo esc_attr($button['timeout']); ?>" 
       data-phone="<?php echo esc_attr($button['phone']); ?>" 
       data-timezone="<?php echo esc_attr($button['timezone']); ?>"
       data-message="<?php echo esc_html($button['message']); ?>" 
       href="javascript:void(0);" target="_blank">
         <?php if ($button['icon']): ?>
        <i class="qlwapp-icon <?php echo esc_attr($button['icon']); ?>"></i>
      <?php endif; ?>
      <i class="qlwapp-close" data-action="close">&times;</i>
      <?php if ($button['text']): ?>
        <span class="qlwapp-text"><?php echo esc_html($button['text']); ?></span>
      <?php endif; ?>
      <?php if (!empty($button['timefrom']) && !empty($button['timeto']) && ($button['timefrom'] != $button['timeto'])): ?>
        <span class="qlwapp-time"><?php printf(__('Available from <span class="from">%s</span> to <span class="to">%s</span> '), esc_html($button['timefrom']), esc_html($button['timeto'])); ?></span>
      <?php endif; ?>
    </a>
    <!--<?php //if ($button['developer'] === 'yes'):   ?>
      <a class="qlwapp-developer" href="<?php echo esc_url(QLWAPP_DEMO_URL); ?>" target="_blank"><?php echo esc_html('Powered by QuadLayers'); ?></a>
    <?php //endif; ?>-->
  </div>
</div>
