# Bootstrap

This started out as a variation of a Bootswatch sample style, but became its own thing. If go back and try to make out its Simplex origins, you will likely no longer see it.

I'm still using Less even though the Bootstrap project itself now advocates for using Sass not so much because I prefer it (I don't) but because it requires less (no pun) set up.

## Set up

I use VS Code as my preferred code editor. It has a very nice live server available as a VS Code extension (Ritwick Dey's [Live Server](https://github.com/ritwickdey/vscode-live-server)), which I use when I'm working on the compiled stylesheet. However, I haven't found an extension for compiling Less from VS Code. Instead, I'm still using Prepros, which suits my purpose just fine.

I generally open up the `lemoyne` local repository and the concentrate on the `assets` folder. With Live Server running and Prepros compiling `assets/less/bootstrap-custom.less` to `assets/css/bootstrap-custom.css`, the test page will auto-reload in my browser with every update.

## Uploads

Prepros can output both uncompressed and minimized files. The naming convention we're using is this:

- `bootstrap-custom.css`
- `bootstrap-custom.min.css`

### LibGuides

Both files can be uploaded to Amazon AWS using our LibGuides account. Go to [Admin > Look & Feel > Custom JS/CSS](https://lemoyne.libapps.com/libguides/lookfeel.php?action=1) and open the "Upload Customization Files" panel at the bottom of the page.

The destination URLs for these stylesheets are:

- https://libapps.s3.amazonaws.com/sites/20/include/bootstrap-custom.css
- https://libapps.s3.amazonaws.com/sites/20/include/bootstrap-custom.min.css

In practice, we are only using the minimized URL across our domains.

### Wordpress

Wordpress is a little finicky about using an external stylesheet, so we've just been FTPing them to the server. FTP to the following address and upload the minimized verion of the stylesheet.

ftp://lemoynelibrary.dreamhosters.com/lemoynelibrary/news/wp-content/themes/lemoynelibrary/css/
