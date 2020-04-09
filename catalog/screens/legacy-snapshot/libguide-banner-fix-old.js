// libguide-banner-fix.js
// resets navigation tab highlighting for these pages to match the category 

    var url = window.location.href;

    if(
        (url.indexOf('http://resources.library.lemoyne.edu/floor-plans') != -1) || 
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=365028') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/pubserv-hours') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=339323') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/pubserv-policies') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=394774') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/pubserv-rooms') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=183954') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/visit') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=337377') != -1)
    )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#home").addClass("activetab")
    }

    if(
        (url.indexOf('http://resources.library.lemoyne.edu/find-books') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=337895') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/pubserv-circulation') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=366417') != -1)
    )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#books").addClass("activetab")
    }

    if(
        (url.indexOf('http://resources.library.lemoyne.edu/find-articles') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=337930') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/subjects-AllByName') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=83937') != -1)
    ){
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#articles").addClass("activetab")

    }

    if(
        (url.indexOf('http://resources.library.lemoyne.edu/pubserv-reserves') != -1) || 
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=350008') != -1)
    )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#reserves").addClass("activetab")
    }

    if(
        (url.indexOf('http://resources.library.lemoyne.edu/askus') != -1) || 
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=370801') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/contact') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=177032') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/how-do-i') != -1) ||
        (url.indexOf('http://resources.library.lemoyne.edu/content.php?pid=340763') != -1)
    )
    {
        $("#lmc-banner .sf-menu li").removeClass("activetab")
        $("#lmc-banner .sf-menu li#askus").addClass("activetab")
    }
