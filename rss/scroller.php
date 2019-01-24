<?php
  require_once('./autoloader.php');
  $feed = new SimplePie();
  $feed->set_feed_url('http://lemoynelibrary.org/news/category/featured/feed/');
  $feed->init();
  $feed->handle_content_type();
  $feed_size = count( $feed->get_items() );
?><!DOCTYPE html>
 
<html>
<head>

<title>Le Moyne Library News &amp; Announcements</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<style type="text/css">
  body {
    margin: 0;
    padding: 0;
  }
  .rss-feed {
    font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 12px;
    border: 0 solid #ccc;
    margin: 0;
    padding: 0;
    border-radius: 5px;
  }
  .rss-feed ul {
    padding: 0;
    list-style: none;
  }
  .rss-feed li {
    padding: 10px 0 30px 0;
    border-bottom: 1px solid #fff;
    height: 300px !important;
    overflow: hidden;
  }
  .rss-feed li:after {
    content: '';
    display: block;
    clear: both;
  }
  .rss-feed img{
    float: left;
    margin: 5px 15px 0 0;
  }
  .rss-feed h3 {
    margin-top: 0;
    padding-top: 0;
  }
  .rss-feed a {
    color: #009161;
    text-decoration: none;
  }
  .rss-feed a:hover,
  .rss-feed a:active, 
  .rss-feed a:focus {
    color: #005f3f;
    text-decoration: underline;
  }
  .rss-feed a:active, 
  .rss-feed a:hover {
    outline: 0;
  }
</style>
</head>
<body>

  <div class="rss-feed">
    <ul>
<?php foreach ($feed->get_items() as $item): ?>
      <li>
        <h3><a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title(); ?></a></h3>
        <p><?php echo $item->get_description(); ?></p>
      </li>
<?php endforeach; ?>
    </ul>
  </div>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script type="text/javascript" src="//lemoynelibrary.org/assets/jquery/easy-ticker.2.0.js"></script>
  <script type="text/javascript" src="//lemoynelibrary.org/assets/jquery/jquery.easing.1.3.min.js"></script>

<?php if ($feed_size > 1): ?>
  <script type="text/javascript">
    $('.rss-feed').easyTicker({
      height: 'auto',
      visible: 1,
      speed: 'slow',
      interval: 10000
    });
  </script>
<?php endif ?>

</body>
</html>
