# Le Moyne Library Bootstrap Wordpress Theme


I am running Wordpress and MySQL inside a Docker Compose container on my Macintosh, but I want to maintain the master files for this theme in my [GitHub repository](http://github.com/tomkeays/lemoyne). I needed a way to make sure that my Docker files for the theme mirror the files in the repository. I tried symbolic links (`ln -s target linkname`) but that didn't work. Remote sync (`rsync`) is supported in MacOS. 

```
rsync -aE --delete /Users/tomkeays/Repos/tomkeays/lemoyne/wordpress/lemoynelibrary /Users/tomkeays/Projects/Docker/wordpress/html/wp-content/themes/
```

This does two things:

1. Copies anything that has changed since the last copy.
2. Deletes anything in `Projects/Docker/wordpress/html/wp-content/themes/lemoynelibrary` that is no longer in the `Repos/tomkeays/lemoyne/wordpress/lemoynelibrary` folder

This command works great but it's a lot to type, so I decided to save it as an Automator app. Now, all I have to do is click the `rsync.app` icon to mirror the theme in my Docker container.

![Automator screenshot](./rsync-app.png)

Reference: Eddie Smith, “[rsync + Automator = free and easy backups for your Mac](http://www.practicallyefficient.com/2011/03/18/rsync-automator.html)”. Practically Efficient. March 18, 2011.