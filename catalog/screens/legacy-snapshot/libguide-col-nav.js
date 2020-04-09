// Contributors: Dan Brubaker Horst, Laura J. Harris, thorbroo (#code4lib), Erin R. White, Derik Badman.
// Code is licensed under a Creative Commons Atrribution license: http://creativecommons.org/licenses/by/3.0/us

//compatibility mode for $ namespace (which might get used by other js libraries) better to use jQuery in these cases
// jQuery.noConflict();
// Leave this commented out -- causes conflict with superfish banner 

// Wrapping with: (function($){ ...code...})(jQuery); replaces '$' with 'jQuery'.
(function($){
    $(document).ready(function() {
      $('#subScript').remove();
      // creates the columns through the column plug loaded above
      $('.subjectlist').columns({columns: 3});      
   
      // 'hide' function is called on each of the 'ul' elements with the class 'guide_links'
      $('ul.guide_links').hide();
      
      // DOM insert a link element inside of each of the subject list items.
      $('li.subject_link').prepend('<a href="javascript://toggle guide links" class="toggle_button">+</a>');
      
      // enable toggle action on each Subject LI
      $('li.subject_link').bind("click", function(){
        // toggles text in the link between '+' and '-'.
        if($(this).children('a.toggle_button').text() == '+'){
          $(this).children('a.toggle_button').text('-');
        } else {
          $(this).children('a.toggle_button').text('+');
        }
        // Toggle the child 'ul' element
        $(this).children('ul.guide_links').slideToggle("fast");
      });
    
  $('a.subject_link_a').contents().unwrap();

  });
})(jQuery);  
