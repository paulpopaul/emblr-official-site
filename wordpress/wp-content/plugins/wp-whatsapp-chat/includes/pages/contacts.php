 
<div class="submit qlwapp-premium-field">

    <a href="javascript:;" id="qlwapp_settings_add" contact_id ="-1" class="button button-primary"><?php esc_html_e('+ New Contact', 'woocommerce-checkout-manager') ?></a> 

</div>

<table id="qlwapp-contacts-table" class="form-table widefat striped">
    <thead>
        <tr>
            <td><b><?php esc_html_e('Avatar', 'wp-whatsapp-chat'); ?></b></td>
            <td><b><?php esc_html_e('Phone', 'wp-whatsapp-chat'); ?></b></td>
            <td><b><?php esc_html_e('Name', 'wp-whatsapp-chat'); ?></b></td>
            <td><b><?php esc_html_e('Label', 'wp-whatsapp-chat'); ?></b></td>
            <td><b><?php esc_html_e('Message', 'wp-whatsapp-chat'); ?></b></td>
            <td><b><?php esc_html_e('Chat', 'wp-whatsapp-chat'); ?></b></td> 
            <td><b><?php esc_html_e('Availability', 'wp-whatsapp-chat'); ?></b></td>
            <td><b><?php esc_html_e('Timezone', 'wp-whatsapp-chat'); ?></b></td>
            <td><b><?php esc_html_e('Actions', 'wp-whatsapp-chat'); ?></b></td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($qlwapp['contacts'] as $id => $c) {
            ?> 
            <tr data-contact_id="<?php echo esc_attr($id) ?>" > 
                <td>
                    <img class="qlwapp-avatar" src="<?php echo $c['avatar']; ?>" alt="" width="50" height="50" />           </td>    
                <td><b><?php echo esc_attr($c['phone']); ?></b></td> 
                <td><b><?php echo $c['firstname'] . ', ' . $c['lastname']; ?> </b></td>  
                <td><b><?php echo $c['label']; ?></b></td> 
                <td><b>
                        <?php
                        if (strlen(wp_trim_words($c['message'])) > 13) {
                            echo substr(wp_trim_words($c['message']),0,  11).'...';
                        } else {
                            echo wp_trim_words( $c['message']);
                        }
                        ?>
                    </b></td>   
                <td><b>
                        <?php
                        if ($c['chat'])
                            esc_html_e('active', 'wp-whatsapp-chat');
                        else
                            esc_html_e('inactive', 'wp-whatsapp-chat');
                        ?>
                    </b></td>  
                <td><b><?php echo $c['timefrom']; ?> to <?php echo $c['timeto']; ?></b></td>   
                <td><b><?php echo $c['timezone']; ?></b></td> 
                <td><b> 
                        <a class="qlwapp_settings_edit button"  aria-label="<?php esc_html_e('Edit checkout field', 'wp-whatsapp-chat'); ?>" href="javascript:;"><?php esc_html_e('Edit'); ?></a>
                        <a class="qlwapp_settings_delete" aria-label="<?php esc_html_e('Edit checkout field', 'wp-whatsapp-chat'); ?>" href="javascript:;"><?php esc_html_e('Delete'); ?></a> 
                    </b>
                </td>  
            </tr>  
            <?php
        }
        ?>  
    </tbody>

</table>

<?php include_once('modals/contact.php'); ?> 