// libguide-banner-fix.js
// resets navigation tab highlighting for these pages to match the category 

$(document).ready(function() {

    if( content_config.pid == 394597 || content_config.pid == 404955 )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#home").addClass("activetab")
    }

    if( content_config.pid == 337895 || content_config.pid == 366417 )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#books").addClass("activetab")
    }

    if( content_config.pid == 337930 || content_config.pid == 83937 )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#articles").addClass("activetab")
    }

    if( content_config.pid == 350008 )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#reserves").addClass("activetab")
    }

    if( content_config.pid == 365028 || content_config.pid == 339323 || content_config.pid == 394774 || content_config.pid == 183954 || content_config.pid == 337377 || content_config.pid == 409266 || content_config.pid == 405168 )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#about").addClass("activetab")
    }

    if( content_config.pid == 370801 || content_config.pid == 177032 || content_config.pid == 340763 )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#askus").addClass("activetab")
    }

});
