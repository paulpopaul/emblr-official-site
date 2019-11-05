<div id="qlwapp" class="qlwapp-premium <?php printf("qlwapp-%s qlwapp-%s qlwapp-%s qlwapp-%s %s", esc_attr($qlwapp['button']['layout']), esc_attr($qlwapp['button']['position']), esc_attr($qlwapp['display']['devices']), esc_attr($qlwapp['button']['rounded'] === 'yes' ? 'rounded' : 'square'), join(' ', array_map('sanitize_html_class', (array) wp_get_current_user()->roles))); ?>">
  <div class="qlwapp-container">
    <?php if ($qlwapp['box']['enable'] === 'yes'): ?>
      <div class="qlwapp-box">
        <div class="qlwapp-header">
          <div class="qlwapp-carousel">
            <?php if (!empty($qlwapp['box']['header'])): ?>
              <div class="qlwapp-slide">
                <i class="qlwapp-close" data-action="close">&times;</i>
                <div class="qlwapp-description">
                  <?php echo wpautop(wp_kses_post(wpautop($qlwapp['box']['header']))); ?>
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
              if (count($qlwapp['contacts']) > 0):
                foreach ($qlwapp['contacts'] as $c):
                  ?>
                  <a class="qlwapp-account" 
                     data-action="<?php echo ($c['chat'] ? 'chat' : 'open'); ?>" 
                     data-timefrom="<?php echo esc_attr(@$c['timefrom']); ?>" 
                     data-timeto="<?php echo esc_attr(@$c['timeto']); ?>" 
                     data-timeout="<?php echo esc_attr(@$c['timeout']); ?>" 
                     data-phone="<?php echo esc_attr(@$c['phone']); ?>" 
                     data-timezone="<?php echo esc_attr(@$c['timezone']); ?>"
                     data-message="<?php echo esc_html(@$c['message']); ?>" href="javascript:void(0);" target="_blank"> 
                       <?php if (!empty($c['avatar'])): ?>
                      <div class="qlwapp-avatar">
                        <div class="qlwapp-avatar-container">
                          <img alt="<?php printf("%s %s", esc_html(@$c['firstname']), esc_html(@$c['lastname'])); ?>" src="<?php echo esc_url($c['avatar']); ?>">
                        </div>                      
                      </div>
                    <?php endif; ?>
                    <div class="qlwapp-info"> 
                      <span class="qlwapp-label"><?php echo esc_html(@$c['label']); ?></span>
                      <span class="qlwapp-name"><?php printf('%s %s', esc_html(@$c['firstname']), esc_html(@$c['lastname'])); ?></span>
                      <!--<time class="qlwapp-label"><?php printf(__('Available from %s to %s'), esc_html(@$c['timefrom']), esc_html(@$c['timeto'])); ?></time>-->
                      <?php if (!empty($c['timefrom']) && !empty($c['timeto']) && ($c['timefrom'] != $c['timeto'])): ?>
                        <span class="qlwapp-time"><?php printf(__('Available from <span class="from">%s</span> to <span class="to">%s</span> '), esc_html(@$c['timefrom']), esc_html(@$c['timeto'])); ?></span>
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
        <?php if (!empty($qlwapp['box']['footer'])): ?>
          <div class="qlwapp-footer" data-contactstimeout="<?php //echo esc_html(@$qlwapp['button']['contactstimeout']);        ?>" >
            <?php echo wpautop(wp_kses_post($qlwapp['box']['footer'])); ?>  
          </div>
        <?php endif; ?>
        <div class="qlwapp-response" data-action="response">
          <pre></pre>
          <textarea maxlength="500" name="message" placeholder="<?php echo esc_html(@$qlwapp['chat']['response']); ?>" aria-label="<?php echo esc_html(@$qlwapp['chat']['response']); ?>" tabindex="0"></textarea>
          <div class="qlwapp-buttons">
            <i class="qlwf-emoji"></i>       
            <a class="qlwapp-reply" data-action="open" data-message="<?php echo esc_html(@$qlwapp['button']['message']); ?>" href="javascript:void(0);" target="_blank">
              <i class="qlwf-send"></i>
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <a class="qlwapp-toggle" 
       data-action="<?php echo ($qlwapp['box']['enable'] === 'yes' ? 'box' : 'open'); ?>" 
       data-phone="<?php echo esc_attr(@$qlwapp['button']['phone']); ?>" 
       data-timefrom="<?php echo esc_attr(@$qlwapp['button']['timefrom']); ?>" 
       data-timeto="<?php echo esc_attr(@$qlwapp['button']['timeto']); ?>" 
       data-timeout="<?php echo esc_attr(@$qlwapp['button']['timeout']); ?>" 
       data-phone="<?php echo esc_attr(@$qlwapp['button']['phone']); ?>" 
       data-timezone="<?php echo esc_attr(@$qlwapp['button']['timezone']); ?>"
       data-message="<?php echo esc_html(@$qlwapp['button']['message']); ?>" 
       href="javascript:void(0);" target="_blank">
         <?php if ($qlwapp['button']['icon']): ?>
        <i class="qlwapp-icon <?php echo esc_attr(@$qlwapp['button']['icon']); ?>"></i>
      <?php endif; ?>
      <i class="qlwapp-close" data-action="close">&times;</i>
      <?php if ($qlwapp['button']['text']): ?>
        <span class="qlwapp-text"><?php echo esc_html(@$qlwapp['button']['text']); ?></span>
      <?php endif; ?>
      <?php if (!empty($qlwapp['button']['timefrom']) && !empty($qlwapp['button']['timeto']) && ($qlwapp['button']['timefrom'] != $qlwapp['button']['timeto'])): ?>
        <span class="qlwapp-time"><?php printf(__('Available from <span class="from">%s</span> to <span class="to">%s</span> '), esc_html(@$qlwapp['button']['timefrom']), esc_html(@$qlwapp['button']['timeto'])); ?></span>
      <?php endif; ?>
    </a>
    <!--<?php //if ($qlwapp['button']['developer'] === 'yes'): ?>
      <a class="qlwapp-developer" href="<?php echo esc_url(QLWAPP_DEMO_URL); ?>" target="_blank"><?php echo esc_html('Powered by QuadLayers'); ?></a>
    <?php //endif; ?>-->
  </div>
</div>
