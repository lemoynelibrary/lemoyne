(function($){  
  $.fn.extend({   
    radiotabs: function() {  
      return this.each(function() {  
        var self = this;

        /* hide all divs...*/
        $(this).find('input').each(function() {
          var rel = $(this).attr('rel');
          $('#' + rel).hide().addClass('esoteric');
        });

        /* ...but show the one that was checked. */ 
        var rel = $(this).find('input:checked').attr('rel');
        $('#' + rel).show().removeClass('esoteric').addClass('obvious');

        /* when the radio button changes, change the content below. */
        $(this).find('input').change(function() {
          /* remove the checked attribute from every other input. */
          $(self).find('input').removeAttr('checked');

          /* but re-check this one. */
          $(this).attr('checked', 'checked');

          /* hide all divs...*/
          $(self).find('input').each(function() {
            var rel = $(this).attr('rel');
            $('#' + rel).hide().addClass('esoteric');
          });
        
          /* ...but show the one that was clicked. */  
          var rel = $(this).attr('rel');
          $('#' + rel).show().removeClass('esoteric').addClass('obvious');
        });
      });
    }  
  });  
})(jQuery);  
