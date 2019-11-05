(function ($) {

  var qlwapp = {
    __instance: undefined
  };

  qlwapp.Application = Backbone.View.extend(
          {
            id: 'qlwapp_modal',
            events: {
              'click .close': 'Close',
              'click .remove': 'Remove',
              'click .save': 'Save',
              'click .attachments .attachment': 'Select',
              'keyup #media-search-input': 'Search',
            },
            ui: {
              nav: undefined,
              content: undefined,
              media: undefined
            },
            templates: {},
            initialize: function (e) {
              'use strict';
              _.bindAll(this, 'render', 'preserveFocus', 'Select', 'Close', 'Save', 'Remove');
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
              this.templates.window = wp.template('qlwapp-modal-window');
              this.templates.backdrop = wp.template('qlwapp-modal-backdrop');
            },
            render: function (e) {
              'use strict';

              this.$el.attr('tabindex', '0')
                      .append(this.templates.window(qlwapp))
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
            Select: function (e) {
              'use strict';
              var $this = $(e.target),
                      $input = this.$el.find('input#qlwapp_icon'),
                      icon = $this.find('i').attr('class');

              $input.val(icon);
            },
            Close: function (e) {
              'use strict';
              e.preventDefault();
              this.undelegateEvents();
              $(document).off('focusin');
              $('body').removeClass('modal-open');
              this.remove();
              qlwapp.__instance = undefined;
            },
            Save: function (e) {
              'use strict';
              e.preventDefault();

              var plugin = this;

              var $input = $('input[name="qlwapp[button][icon]"]'),
                      icon = this.$el.find('input#qlwapp_icon').val();

              if ($input.length && icon) {
                $input.val(icon);
              }

              plugin.Close(e);
            },
            Remove: function (e) {
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
                      $icon = $li.find('.menu-item-qlwapp_icon');

              if (!$li.length)
                return;

              $form.find('.qlwapp-input').each(function (i) {

                var key = $(this).prop('id').match(/qlwapp-input-([a-z]+)/)[1];

                $li.find('input#qlwapp-input-' + key).val('');

              });

              $icon.remove();

              plugin.Close(e);
            }
          });


  $(document).on('click', '#btn-add-icon', function (e) {
    e.preventDefault();
    if (qlwapp.__instance === undefined) {
      qlwapp.__instance = new qlwapp.Application(e);
    }
    return false;
  });

})(jQuery);