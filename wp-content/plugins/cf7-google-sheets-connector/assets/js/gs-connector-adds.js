jQuery(document).ready(function () {

 // if check gs-display-note class exists or not
    if (jQuery(".gs-display-note")[0]){
      jQuery(".submit").css("display", "none");
    }

   jQuery('.set-adds-interval').click(function () {
      var data = {
         action: 'set_adds_interval',
         security: jQuery('#gs_adds_ajax_nonce').val()
      };

      jQuery.post(ajaxurl, data, function (response) {
         if (response.success) {
            jQuery('.gs-adds').slideUp('slow');
         }
      });
   });
   
   jQuery('.close-adds-interval').click(function () {
      var data = {
         action: 'close_adds_interval',
         security: jQuery('#gs_adds_ajax_nonce').val()
      };

      jQuery.post(ajaxurl, data, function (response) {
         if (response.success) {
            jQuery('.gs-adds').slideUp('slow');
         }
      });
   });
   


   jQuery('.set-auth-expired-adds-interval').click(function () {
      var data = {
         action: 'set_auth_expired_adds_interval',
         security: jQuery('#gs_auth_expired_adds_ajax_nonce').val()
      };

      jQuery.post(ajaxurl, data, function (response) {
         if (response.success) {
            jQuery('.gs-auth-expired-adds').slideUp('slow');
         }
      });
   });

 jQuery('.close-auth-expired-adds-interval').click(function () {
      var data = {
         action: 'close_auth_expired_adds_interval',
         security: jQuery('#gs_auth_expired_adds_ajax_nonce').val()
      };

      jQuery.post(ajaxurl, data, function (response) {
         if (response.success) {
            jQuery('.gs-auth-expired-adds').slideUp('slow');
         }
      });
   });


   // Upgrade notification scripts
   jQuery('.cf7gsc_upgrade_later').click(function () {
      var data = {
         action: 'set_upgrade_notification_interval',
         security: jQuery('#gs_upgrade_ajax_nonce').val()
      };

      jQuery.post(ajaxurl, data, function (response) {
         if (response.success) {
            jQuery('.gs-upgrade').slideUp('slow');
         }
      });
   });
   
   jQuery('.cf7gsc_upgrade').click(function () {
      var data = {
         action: 'close_upgrade_notification_interval',
         security: jQuery('#gs_upgrade_ajax_nonce').val()
      };

      jQuery.post(ajaxurl, data, function (response) {
         if (response.success) {
            jQuery('.gs-upgrade').slideUp('slow');
         }
      });
   });
   
});