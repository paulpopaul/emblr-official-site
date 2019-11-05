(function ($) {

    var is_blocked = function ($node) {
        return $node.is('.processing') || $node.parents('.processing').length;
    };
    var block = function ($node) {
        if (!is_blocked($node)) {
            $node.addClass('processing').block({
                message: null,
                overlayCSS: {
                    background: '#fff',
                    opacity: 0.6
                }
            });
        }
    };
    var unblock = function ($node) {
        $node.removeClass('processing').unblock();
    };
    var wpmi = {
        __instance: undefined
    };
    wpmi.Application = Backbone.View.extend({
        id: 'wpmi_modal',
        events: {
            'click .media-modal-backdrop': 'Close',
            'click .media-modal-close': 'Close',
            'click .media-modal-delete': 'Delete',
            'click .media-modal-prev': 'update',
            'click .media-modal-next': 'update',
            'submit .media-modal-form': 'Save'
        },
        templates: {},
        initialize: function (e) {
            'use strict';
            _.bindAll(this, 'open', 'update', 'render', 'Close', 'Save');
            this.init();
            this.open(e);
        },
        init: function () {
            this.templates.window = wp.template('wpmi-modal-window');
        },
        render: function (contact_id) {
            'use strict';
            var $modal = this;
            $.ajax({
                url: ajaxurl,
                data: {
                    action: 'qlwapp_edit_contact',
                    nonce: qlwapp.nonce.qlwapp_edit_contact,
                    //options_name: $tr.data('options_name'),
                    //options_key: $tr.data('options_key'),
                    contact_id: contact_id
                },
                dataType: 'json',
                type: 'POST',
                beforeSend: function () {
                    //block($tr);
                },
                complete: function () {
                    //unblock($tr);
                },
                error: function (response) {
                    console.log(response);
                    /// alert(response);
                },
                success: function (response) {
                    $modal.$el.attr('tabindex', '0');
                    $modal.$el.html($modal.templates.window(response.data));
                    //$(document).on('focusin', $modal.preserveFocus);
                    $modal.$el.focus().trigger('wc-init-tabbed-panels');
                    $modal.$el.focus().trigger('init_tooltips');
                }
            });
        },
        update: function (e) {
            'use strict';
            e.stopPropagation();
            e.preventDefault();
            var $button = $(e.target),
                    contact_id = $button.data('contact_id');
            this.render(contact_id);
        },
        open: function (e) {
            'use strict';
            var $button = $(e.target),
                    $tr = $button.closest('tr'),
                    contact_id = $tr.data('contact_id');
            this.render(contact_id);
            $('body').addClass('modal-open').append(this.$el);
        },
        /*preserveFocus: function (e) {
         'use strict';
         
         if (this.$el[0] !== e.target && !this.$el.has(e.target).length) {
         this.$el.focus();
         }
         },*/
        Close: function (e) {
            'use strict';
            e.preventDefault();
            this.undelegateEvents();
            $(document).off('focusin');
            $('body').removeClass('modal-open');
            this.remove();
            wpmi.__instance = undefined;
        },
        Save: function (e) { 
            'use strict';
            e.preventDefault();
            var $form = $(e.target),
                    $modal = this.$el,
                    $spinner = $modal.find('.settings-save-status .spinner');  
            $.ajax({
                url: ajaxurl,
                data: {
                    action: 'qlwapp_save_contact',
                    nonce: qlwapp.nonce.qlwapp_save_contact,
                    contact_id: $form.data('contact_id'),
                    contact_data: $form.serializeArrayAll()
                },
                dataType: 'json',
                type: 'POST',
                beforeSend: function () {
                    $spinner.addClass('is-active');
//          block($modal);
                },
                complete: function () {
                    $spinner.removeClass('is-active');

//          unblock($modal);
                    //$modal.Close(e);
                },
                error: function () {
                    alert('Error!');
                },
                success: function (response) { 
                    $modal.find('.settings-save-status').addClass('save-complete');
                    console.log(response);
                    //$modal.$el.attr('tabindex', '0');
                    //$modal.$el.html($modal.templates.window(response.data));
                    //$(document).on('focusin', $modal.preserveFocus);
                    //$modal.$el.focus().trigger('wc-init-tabbed-panels');
                }
            });
            return false;
        },
        Delete: function (e) {
            'use strict';
            e.preventDefault();
            var $modal = this;
            $modal.Close(e);
        }
    });

    $('#qlwapp_settings_add').on('click', function (e) {
        e.preventDefault();
        if (wpmi.__instance === undefined) {
            wpmi.__instance = new wpmi.Application(e);
        }
    });
    $('.qlwapp_settings_edit').on('click', function (e) {
        e.preventDefault();
        if (wpmi.__instance === undefined) {
            wpmi.__instance = new wpmi.Application(e);
        }
    });
    $('.qlwapp_settings_delete').on('click', function (e) {
        alert('hacer algo ...');
        e.preventDefault();

    });



})(jQuery);




/*(function ($) {
 
 var wpmi = {
 __instance: undefined
 };
 
 wpmi.Application = Backbone.View.extend(
 {
 id: 'wpmi_modal',
 events: {
 'click .close': 'Close',
 //                    'click .remove': 'Remove',
 'click .save': 'Save'
 },
 ui: {
 //                    nav: undefined,
 //                    content: undefined,
 //                    media: undefined
 },
 templates: {},
 initialize: function (e) {
 'use strict';
 _.bindAll(this, 'render', 'preserveFocus', 'Close', 'Save');//, 'Select', 'Search', 'Remove'
 this.initialize_templates();
 this.render(e);
 this.backdrop(e);
 },
 backdrop: function (e) {
 'use strict';
 
 var plugin = this;
 
 $(document).on('click', '.media-modal-backdrop', function (e) {
 plugin.Close(e);
 });
 },
 initialize_templates: function () {
 this.templates.window = wp.template('wpmi-modal-window');
 this.templates.backdrop = wp.template('wpmi-modal-backdrop');
 },
 render: function (e) {
 'use strict';
 var contact_id = $(e.target).data('contact_id');
 $.ajax({
 type: 'POST',
 url: ajaxurl,
 data: {
 action: 'qlwapp_get_contact',
 nonce: qlwapp.nonce.qlwapp_get_contact,
 contact_id:contact_id
 },
 beforeSend: function () {
 //                            alert('before..');
 },
 complete: function () {
 //                              alert('complete..');
 },
 error: function () {
 alert('Error!');
 },
 success: function (response) {
 alert(response);
 console.log( response.data);
 
 }
 });  
 this.$el.attr('tabindex', '0')
 //                              .data('menu_item_id', menu_item_id)
 .append(this.templates.window())
 .append(this.templates.backdrop());
 
 $(document).on('focusin', this.preserveFocus);
 $('body').addClass('modal-open').append(this.$el);
 this.$el.focus();
 },
 preserveFocus: function (e) {
 'use strict';
 if (this.$el[0] !== e.target && !this.$el.has(e.target).length) {
 this.$el.focus();
 }
 },
 Close: function (e) {
 'use strict';
 e.preventDefault();
 this.undelegateEvents();
 $(document).off('focusin');
 $('body').removeClass('modal-open');
 this.remove();
 wpmi.__instance = undefined;
 },
 Save: function (e) {
 'use strict';
 e.preventDefault();
 
 var plugin = this,
 $form = $('form', this.$el),
 menu_item_id = this.$el.data('menu_item_id');
 
 if (!menu_item_id)
 return;
 
 if (!$form.length)
 return;
 
 var $li = $('#menu-to-edit').find('#menu-item-' + menu_item_id),
 $plus = $li.find('.menu-item-wpmi_plus'),
 $icon = $li.find('.menu-item-wpmi_icon');
 
 if (!$li.length)
 return;
 
 $form.find('.wpmi-input').each(function (i) {
 
 var key = $(this).prop('id').match(/wpmi-input-([a-z]+)/)[1],
 value = $(this).val();
 
 $li.find('input#wpmi-input-' + key).val(value);
 
 if (key === 'icon') {
 
 if ($icon.length) {
 
 $icon.remove();
 }
 
 $plus.before('<i class="menu-item-wpmi_icon ' + value + '"></i>');
 }
 });
 
 plugin.Close(e);
 }
 
 
 });
 
 $(document).on('click', '.qlwapp-contact_open', function (e) {
 
 e.preventDefault();
 if (wpmi.__instance === undefined) {
 wpmi.__instance = new wpmi.Application(e);
 }
 });
 
 $(document).on('click', '#wpmi_metabox', function (e) {
 
 var menu_font = $('input:checked', $(this)).val(),
 menu_id = $('#menu').val();
 
 if ($(e.target).hasClass('save') && menu_font && menu_id) {
 
 e.preventDefault();
 
 $.ajax({
 type: 'POST',
 url: ajaxurl,
 data: {
 action: 'wpmi_save_nav_menu',
 menu_id: menu_id,
 menu_font: menu_font,
 nonce: wpmi_l10n.nonce
 },
 beforeSend: function () {
 },
 complete: function () {
 },
 error: function () {
 alert('Error!');
 },
 success: function (response) {
 location.reload();
 }
 });
 
 }
 });
 
 })(jQuery);*/