# Le Moyne Library LibGuides v2 Bootstrap Redesign Project

For two months, from June to the beginning of August, 2017, I worked with the Bootstrap framework system in LibGuides v2, creating, along the way, a code repository to preserve and document the changes I made to the Library’s new website design. The repository also documents code used in other support files such as LibGuides custom JS/CSS code, custom LibGuides header and footer elements, LibGuides page templates, and Library image files. As I’ve been doing version control on all these files locally using Git, I thought, as the August 7 go-live date for LibGuides approached, that it was time to push out the work done so far to my Github repository. 

This is still very much a work in progress. While LibGuides will be going live on August 7, there will be additional changes to certain files before the start of the semester. 

As I reach closure on the LibGuides redesign, my next goal is that the Bootstrap style that I designed for LibGuides can be extended consistently across all of the Library web sites, including the Library’s Serial Solutions Journal Finder and OpenURL link resolver, LibraryH3lp FAQ, WordPress blog, and III library catalog. As with the Library’s previous web design, I also want to use the same banner navigation and page footer on all of these sites so that users perceive them as a single system. 

## Workflow Setup

The design for the website is based on [Bootstrap](http://getbootstrap.com/) v3.3.7 using the [Bootswatch](https://bootswatch.com/) [Simplex](https://bootswatch.com/simplex/) template as a starting point. Since I last used it in 2015, Bootswatch templates added new default requirements of an `npm` and `grunt` build process, but this didn't fit with what my rather locked down workstation would allow. Instead, I manually set up my own work environment. I downloaded the Less CSS preprocessor source code files for [Bootstrap v3.3.7](https://github.com/twbs/bootstrap/releases/tag/v3.3.7). I used [PrePros](https://prepros.io/) as my CSS preprocessor compiler environment and setting up the workflow was much more straightforward in Less than SCSS. 

The idea behind using Bootswatch themes is that you make changes to two core Less files, `bootswatch.less` and `variables.less`, rather than making them to the Less files you download from the Bootstrap site. This make it possible to update what version of Bootstrap you are using, rather than needing start over again from scratch. That said, v3.3.7 is likely to be the last stable version of Bootstrap 3; Bootstrap 4 is already on the horizon. Because it drastically changes to how you code up many components, and is not backward compatible, I suspect LibGuides will take a conservative approach to how it applies it to its products. 

In my workflow, I placed the Bootswatch files in a folder named `custom`. The Bootstrap source code is located next to `custom` in a folder named `bootstrap`. Here’s a glimpse of what my `assets` folder structure looks like. The whole setup also includes `fonts`, `javascript`, and `images` folders, but I simplified the directory tree for clarity.

```
 assets
 ├── css
 │   └── bootstrap-custom.css
 └── less
     ├── bootstrap-custom.less
     ├── bootstrap
     │   ├── alerts.less
     │   ├── badges.less
     │   ├── bootstrap.less
     │   ... <more Bootstrap source code files>
     │   └── wells.less
     └── custom
         ├── bootswatch.less
         ├── grid.less
         ├── lmc-footer.less
         ├── pills-tabs.less
         └── variables.le 
```

Note, there is a file named `bootstrap-custom.less` which is what PrePros uses to compile the final CSS code. From `bootstrap-custom.less`, you import the base Bootstrap Less file that imports all the Bootstrap components and then you import your Bootswatch files from the `custom` folder, which modifies those components. 

```
// Import Bootstrap master and local changes
@import "bootstrap/bootstrap";
@import "custom/variables";
@import "custom/bootswatch";
@import "custom/grid";
@import "custom/pills-tabs";
@import "custom/lmc-footer";
```

The way I’ve configured PrePros, `assets/less/bootstrap-custom.less` compiles to `assets/css/bootstrap-custom.css`. One of the nice circumstances of the network environment at my place of work is that it provides a network drive whose contents is published on the College intranet. Therefore, if I have PrePros watch the `bootstrap-custom.less` file located on that drive, it automatically publishes it to `bootstrap-custom.css`. Then, if I link to that CSS file from LibGuides, any change I make on my local computer automatically is automatically reflected in the CSS file that styles the LibGuides website. I wouldn’t trust this setup in production, but it was very handy for rapid design iteration while the site was in development. 

## Bootstrap Theming

I have been trying to use the same color schema that the College CMS uses. This was actually easily accomplished by defining Less color variables using a `@lmc-` namespace. 

```
//## Le Moyne Colors  
@lmc-green-lightest:   #00c483;  // lightest: background, links
@lmc-green-lighter-2:  #00ab72;  // background, text
@lmc-green-primary:    #009161;  // background, primary green link 
@lmc-green-light:      #007850;  // background, gift box, dolphin
@lmc-green-secondary:  #005f3f;  // background, bars, primary green link hover
@lmc-green-dark:       #00452e;  // background, super navbar
@lmc-green-darkest:    #003825;  // darkest: background, search field
@lmc-gold-primary:     #cfb57e;  // primary gold, buttons, links 
@lmc-gold-secondary:   #ddb253;  // secondary gold, small arrows
```

These color variables are available to define standard Bootstrap  brand and link colors. E.G., 

```
@brand-primary:         @lmc-green-primary;
@brand-success:         @lmc-green-secondary; 
@link-color:            @lmc-green-primary;
@link-hover-color:      @lmc-green-secondary;
```

For the most part, CSS styles that reference LibGuides IDs and classes such as `#s-lib-bc-site`, `#s-lg-guide-tabs-title-bar`, `.s-lib-box-content`, etc. are stored in LibGuides’ Custom JS/CSS setting in the Look and Feel administrative interface rather than in the `assets/css/bootstrap-custom.css` file. These style changes are documented in `libguides2/look-and-feel/js-css-code.txt`. 

## Bootstrap Layout Considerations

My original design reflected the color scheme and font choices of the College CMS, which was redesigned in 2015. However, I was never satisfied with this approach. In a staff meeting, we were able to reach consensus on an alternative approach that was better suited to what we were trying to achieve. 

I used two text logotypes, one for the Library and the other for the College. The easy part was positioning them using the Bootstrap grid system. But using images with a fixed size in a responsive layout is problematic (and was one of the reasons I was having problems in my first design iteration). The solution I hit on was to design them in Adobe Illustrator and export them as SVG text outlines. As the Bootstrap grid containers change size, the SVG images fluidly resize along with them. The SVG files can be found in `assets/images/banner`.

LibGuides v2 itself takes care of most of the Bootstrap layout work through a templating system. The default layout templates utilize top-positioned tabs to switch between pages in a guide -- as was the case in LibGuides v1. However, in LibGuides v2, this navigation system can also be switched over to sidebar pills. Library staff decided that the sidebar navigation was the preferred approach and so I designed a set of custom page templates and then made them the default in all guides. 

One of the reasons I tackled redoing the page templates was that LibGuides assumes that you are using fixed-width `.container` classes in the [grid layout](http://getbootstrap.com/css/#grid). However, I am not a fan of how the `.container` class grid system jumps between breakpoints and generally wastes space. I preferred the full-width `.container-fluid` grid and modified the templates accordingly. I also changed the order of LibGuides’ system footer and a custom footer so that the former before the former instead of the other way around as in the default templates. The custom templates can be found in `libguides2/templates`. 

One of my functional design goals was to use the same Bootstrap CSS file to style both LibGuides and LibCal, as well as other core Library utilities. However, because LibCal doesn’t use a templating system, I found it was necessary to redefine the `.container` class to be equivalent to `.container-fluid`. That change is included in the `assets/less/custom/grid.less` Bootswatch component file. 

One other thing to note: LibGuides added extra padding and margins on the `.container` and `.container-fluid` classes on top of what Bootstrap provides. This meant that LibGuides was displaying slightly differently than LibCal. Because they were LibGuides-specific, I made those changes in LibGuides’ Custom JS/CSS setting, rather than in the Library's custom Bootstrap stylesheet.

```
/* remove extraneous padding from all fluid container elements */
.container-fluid,
.container {
  margin-right: 0px;
  margin-left: 0px;
  padding-right: 0px;
  padding-left: 0px;
}
```

