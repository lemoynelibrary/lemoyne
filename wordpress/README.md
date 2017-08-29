# Le Moyne Library Bootstrap Theme

The new Le Moyne theme is based on the [Bootstrap Basic](https://wordpress.org/themes/bootstrap-basic/) Wordpress theme by Vee Winch. It's already using Bootstrap v.3.3.7, so that saves me work. 

I thought about making a child theme (and maybe I still will), but for now I'm making my changes directly to the theme. If there are any updates to the original, I won't be able to easily incorporate them, but the theme seems stable and hasn't been updated since December 2016, so that's probably not a big concern.

## Workflow for testing the theme

To test my theme locally, I am running Wordpress and MySQL inside a Docker Compose container on my Macintosh. But I also want to maintain the master files for this theme in my [GitHub repository](http://github.com/tomkeays/lemoyne) and not have to maintain and sync separate repositories. Therefore, I needed a way to make sure that my Docker files for the theme mirror the files in the repository. I tried symbolic links (`ln -s target linkname`) to map the master repo to the Docker `themes` folder, but that approach wasn't viable.  

Remote sync (`rsync`), however, does work and is supported in MacOS. 

```
rsync -aE --delete /Users/tomkeays/Repos/tomkeays/lemoyne/wordpress/lemoynelibrary /Users/tomkeays/Projects/Docker/wordpress/html/wp-content/themes/
```

This complicated command does two things:

1. Copies any file in the master repository folder, `Repos/tomkeays/lemoyne/wordpress/lemoynelibrary`, to the `Projects/Docker/wordpress/html/wp-content/themes/lemoynelibrary` Docker folder, that has changed since the last copy.
2. Deletes anything in Docker folder that is no longer in the master repo.

This command works great but it's a lot to type, so I decided to automate it as an Automator app. 

![Automator screenshot](./rsync-app-screenshot.png)

Now, all I have to do is click the `rsync.app` icon to mirror the theme in my Docker container.

Reference: Eddie Smith, “[rsync + Automator = free and easy backups for your Mac](http://www.practicallyefficient.com/2011/03/18/rsync-automator.html)”. Practically Efficient. March 18, 2011.