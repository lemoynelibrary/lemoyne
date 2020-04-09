$(document).ready(function() { 
   $(".tablesorter").tablesorter(); 
   $("#searchbox").tabs({ cookie: {} });  /* cookie: {expires: 1} */
   $('.radiotabs').radiotabs();
   $(".description").accordion({ collapsible: true, autoHeight: false, active: false });
   $("input[type=radio]:checked").next("label").addClass("selected");
   $(":radio").click(function(){
       var x = [$(this).closest(".radiotabs"),$(this).attr("id")];
       x[0].find("label").removeClass("selected").parent()
           .find("label[for="+x[1]+"]").addClass("selected");
   });
   $('ul.sf-menu').superfish({
       hoverClass: 'sfHover',
       delay: 750,
       animation: {opacity:'show',height:'show'},
       speed: 'fast',
       autoArrows: false,
       dropShadows: false
   });
}); 
