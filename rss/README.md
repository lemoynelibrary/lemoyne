# RSS Scroller

This is an implementation of an open source RSS module written in PHP called SimplePie. 

- https://simplepie.org/

This is combined with a JavaScript jQuery library called easyTicker which scrolls through the RSS feed items and displays them one at a time.

- https://www.aakashweb.com/jquery-plugins/easy-ticker/

The file `autoloader.php` calls the SimplePie routines which are located in folders within the `library` directory.

`scroller.php` sets the source RSS file as the "Featured" directory of the Le Moyne Library blog.

- http://lemoynelibrary.org/news/category/featured/feed/

This file contains all the CSS required to display the feed. One local change that we made was to check the size of the feed and only invoke easyTicker when `$feed_size > 1`.
