# Bootstrap

This started out as a variation of a Bootswatch sample style, but became its own thing. If go back and try to make out its Simplex origins, you will likely no longer see it.

I'm still using Less even though the Bootstrap project itself now advocates for using Sass not so much because I prefer it (I don't) but because it requires less (no pun) set up.

## Set up

I use VS Code as my preferred code editor. It has a very nice live server available as a VS Code extension (Ritwick Dey's [Live Server](https://github.com/ritwickdey/vscode-live-server)), which I use when I'm working on the compiled stylesheet. However, I haven't found an extension for compiling Less from VS Code. Instead, I'm still using Prepros, which suits my purpose just fine.

I generally open up the `lemoyne` local repository and the concentrate on the `assets` folder. With Live Server running and Prepros compiling `assets/less/bootstrap-custom.less` to `assets/css/bootstrap-custom.css`, the test page will auto-reload in my browser with every update.
