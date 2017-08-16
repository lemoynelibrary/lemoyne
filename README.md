# Le Moyne Library Bootstrap-Based Web Redesign Project

For two months, from late May to the beginning of August, 2017, I worked with the Bootstrap framework system provided in LibGuides v2, creating, along the way, a code repository to preserve and document the changes I made to the Library’s new website design. The repository also documents code used in other support files such as LibGuides custom JS/CSS code, custom LibGuides header and footer elements, LibGuides page templates, and Library image files. As I’ve been doing version control on all these files locally using Git, I thought, as the August 7 go-live date for LibGuides approached, that the work done so far should be documented here in this Github repository. 

As I reach closure on the LibGuides redesign, my next set of goals is that the Bootstrap style that I designed for LibGuides can be extended consistently across all of the Library web sites, including the Library’s Serial Solutions Journal Finder and OpenURL link resolver, LibraryH3lp FAQ, WordPress blog, and III library catalog. As with the Library’s previous web design, I also want to use the same banner navigation and page footer on all of these sites so that users perceive them as a single system. 

## Workflow Setup

The design for the website is based on [Bootstrap](http://getbootstrap.com/) v3.3.7 using the [Bootswatch](https://bootswatch.com/) [Simplex](https://bootswatch.com/simplex/) template as a starting point. Since I last used it in 2015, Bootswatch templates added new default requirements of an `npm` and `grunt` build process, but this didn't fit with what my rather locked down workstation would allow. Instead, I manually set up my own work environment. I downloaded the Less CSS preprocessor source code files for [Bootstrap v3.3.7](https://github.com/twbs/bootstrap/releases/tag/v3.3.7). I was using [PrePros](https://prepros.io/) as my CSS preprocessor compiler environment and, it turned out that setting up the workflow was more straightforward in Less than in my preferred CSS proprocessor, Sass. Less, however, was more than sufficient for my needs. 

The central idea behind using a Bootswatch theme is that you make changes to two core Less files, `bootswatch.less` and `variables.less` and not touch the Less sourcecode files you downloaded from Bootstrap. This make it possible to update what version of Bootstrap you are using, rather than needing to start over again from scratch. 

That said, Bootstrap v3.3.7 may be the last stable version of Bootstrap 3. Work on Bootstrap 4 began in August 2015 and it is currently available as an alpha release. I've heard speculation that it may have a [beta release](https://github.com/twbs/bootstrap/milestones) in 2017, but there's no information about the longer timetable. Because version 4 drastically changes to how you code up many components and is not backward compatible, I suspect LibGuides will take a conservative approach as to when it ships version 4 to its products. It is also worth noting that, on that day, my Less-based workflow will have to be rethought, since Bootstrap 4 uses Sass rather than Less source code files. 

## Directory Structure

In my workflow, I placed the Simplex Bootswatch files in a folder named `custom`. The Bootstrap source code is located next to `custom` in a folder named `bootstrap`. Here’s a glimpse of what my `assets` folder structure looks like. The whole setup also includes `fonts`, `javascript`, and `images` folders, but I simplified the directory tree for clarity. The repository includes all of the `assets` sub-directories. 

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
     │   ... <more Bootstrap Less files>
     │   └── wells.less
     └── custom
         ├── bootswatch.less
         ├── grid.less
         ├── lmc-footer.less
         ├── pills-tabs.less
         └── variables.le 
```

Note, there is a file named `assets/less/custom/bootstrap-custom.less` which controls what PrePros uses to compile to the final CSS stylesheet. This file imports the base `assets/less/custom/bootstrap/bootstrap.less` file which, in turn, imports all the other Bootstrap components. The `bootstrap-custom.less` file also imports all the Bootswatch files from the `custom` directory. 

Here's what `assets/css/bootstrap-custom.less` file currently imports: 

```
// Import Bootstrap master and local changes
@import "bootstrap/bootstrap";
@import "custom/variables";
@import "custom/bootswatch";
@import "custom/grid";
@import "custom/pills-tabs";
@import "custom/lmc-footer";
```
Ultimately, the only files I need to edit are the base `assets/css/bootstrap-custom.less` file and the files in the `assets/css/custom` directory. I should never have to touch the files in the `assets/less/bootstrap` directory. 

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

My original design reflected the overall color scheme, layout considerations, and font choices of the College CMS, which was redesigned in 2015. However, I was never satisfied with this approach and had difficulty moving forward. In a staff meeting in April 2017, we were able to reach concensus on an alternative approach that was better suited to what I felt we were trying to achieve. 

I created two text logotypes for use in the page navigation banner: one for "Noreen Reale Falcone Library" and the other for "Le Moyne College". The easy part was positioning them in the banner using the Bootstrap grid system. But using images with a fixed size in a responsive layout is inherently problematic and it was one of the reasons I encountered problems in my aborted first iteration of the design. The solution I hit upon was to design these logotypes in Adobe Illustrator and export them as SVG text outlines. As the Bootstrap grid containers change size, the SVG images fluidly resize along with them. The SVG files can be found in `assets/images/banner`.

## LibGuides v2 and LibCal v2

LibGuides v2 itself takes care of most of the Bootstrap layout work through a templating system and starting templates are provided. The default layout templates utilize top-positioned tabs to switch between pages in a guide -- as was the case in LibGuides v1. However, in LibGuides v2, this navigation system can also be switched over to sidebar pills. Library staff decided that the sidebar navigation was the preferred approach and so I designed a set of custom page templates and then made them the default in all guides. 

One of the reasons the page templates couldn't be used as is was that LibGuides assumes that you are using fixed-width `.container` classes in the [grid layout](http://getbootstrap.com/css/#grid). However, the `.container` class makes the grid system jump between breakpoints and generally wastes space. I preferred the full-width `.container-fluid` grid and modified the templates accordingly. 

I also changed the order of LibGuides’ system footer (which contains login links, page metadata, and the like) and a custom Library footer, so that the system footer appeared below the Library footer rather than the other way around, as was the case in the default templates. The custom templates can be found in `libguides2/templates`. 

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

## Post-LibGuides v2 Go-Live

After the Library went live with our website under the LibGuides v2 platform, my first task was to reconcile some differences that arose in the custom header and footer files between between LibCal v2, which went live in June 2017, and LibGuides v2. The differences were partly cosmetic -- e.g., differences in wording in banner navigation links -- but also functional. While LibGuides v2 was still on the beta site, I had to make links in LibCal v2 refer to the still operational LibGuides v1 site. Once we went live, I was able to use a common banner and footer that used the same links. The shared header and footer files are found in `shared/look-and-feel`. 

Just as a note to myself: I also had to make sure that the Google Analytics code was included on both sites after they went live. For LibCal, that code can be found in `libcal2/settings/libcal-custom-analytics.txt` and, for LibGuides, in `libguides2/settings/libguides-custom-analytics.txt`. 

Currently, we are hosting a lot of our CSS, JS, and image utility files, including the custom bootstrap stylesheet, the SVG logos, AskUs widget and icons, tablesorter script, etc., on our third-party blog site. That means, if the site goes down, it can take down most of these assets on LibGuides, LibCal, SerSol, etc. In as this has already happened (briefly) at least once during working hours since we rolled out the new site, I want to begin hosting as many of the critical files directly on LibGuides in its "Upload Customization Files" manager in Admin > Look and Feel. Fortunately, this was easy for the bootstrap stylesheet (although I do have an unresolved support question expressing my concern about linking to that file from the other sites). Hosting the SVG logos and AskUs icons, however, was a problem. The built-in image assets manager in LibGuides does not recognize SVGs as an image format (yeah, it's been a supported image filetype with the W3C since 1999) and the "Upload Customization Files" manager accepts them, but won't display them inline. 

## Serials Solutions

The Library subscribes to Serials Solutions 360 Core (Journal Finder) and 360 Link (openURL Link Resolver). They are an integrated system -- 360 Core provides the knowledgebase for 360 Link -- and they share a "Branding" interface, where a custom header and footer can be applied. I documented our old branding in `sersol/legacy-files` and then documented the new header and footer files in `sersol/bootstrap`. 

The header file is repeats almost verbatim the code in the common header in `shared/look-and-feel` but has the addition of `<div>` tags for a `.container-fluid` which contains the SerSol content area. The footer is less similar to its shared version, as it contains the ending `<div>`s for the `.container-fluid` content container, as well as a suite of CSS and JS files for Bootstrap, jQuery, jQuery UI, the LibCal hours widget, Google Analytics, and AskUs widget, each of which are more scattered in LibGuides v2. Because it is easy to lose track of all these supporting files, I documented them in `sersol/bootstrap/all-possible-js-css-files.txt`. This also gives me a place to look in case, in the future, I decide to host them in LibGuides rather than at `lemoynelibrary.org`. 

Updating the header and footer files in 360 Core is easily accomplished in the "Branding" interface of the Serials Solutions Admin interface. I was initially experiencing some FOUC when I implemented the design. This was really obvious since the SVG logos in the header, which are the first thing you see as the page loads, rely on the Bootstrap grid to keep them from filling the width of the screen. This was resolved since the "Branding" admin area let me define a stylesheet to load in the page head. 360 Link style definitions are controlled through a separate "Branding" interface. However, the only thing that this affects is the Citation Builder module; styles for the link resolver are controlled by ProQuest support. What we had before is generic enough that I'll postpone desiging a new logo for it until other more pressing things are resolved. 

The Journal Finder site went live with the new design on August 9 and the Citation Linker on August 10. However, changes in SerSol don't go live until a script runs in the morning of the next day, so it took several more iterations, up through Aug 16, to get the design exactly the way I wanted it. 

## LibraryH3lp

LibraryH3lp FAQs are still using Bootstrap 2 and my stylesheet assumes Bootstrap 3. This is especially critical in the grid column definitions, which changed in format from `span-3` to `col-md-3` or `col-sm-3` or even `col-md-3 col-sm-4` to allow designers to define responsive breakpoints. It also affects how `navbar` and `form` layout elements are defined. Bootstrap 2 also used a different icon font. I could have gone with it and designed a simplified Bootstrap 2 version of our layout, but it was a compromize I didn't want to make if I didn't have to. Too much of what we like in the design would have been lost.

So, instead, I basically jettisoned all of the CSS and JS provided by LibraryH3lp and reformatted the templates around the Bootstrap 3 grid. I archived all of the old templates at `libraryh3lp/template/legacy-files` and downloaded some new default templates as a starting point. LibraryH3lp lets customers define multiple FAQs, so I used one as a sandbox where I could test how the new design worked without affecting the real FAQ until I was ready to roll it out. The new templates are documented at `libraryh3lp/template/bootstrap`.

One thing I lost by using my own assets was a LibraryH3lp JS file that controlled autosuggest in the search box and supplied the dropdown menu for the subject categories. This same JS file also included the Bootstrap 2 scripts. However, including it broke the Bootstrap 3 JS that I needed to run the banner navigation. 

Fortunately, LibraryH3lp had already shared a widget with me that I incorporated into a custom-built AskUs sidebar widget back in 2015. See `libraryh3lp/assets/demos/auto-suggest-widget.html`. It included a call to a JavaScript file hosted by LibraryH3lp that could build the search subject categories and inline JS code for auto-suggest. The former, however, required that the script build the dropdown menu for the subject categories, which meant I had no way to style it properly (even if I had managed to get it to work within the new Bootstrap 3 framework). In any event, the tag cloud feature, which I left in place, essentially duplicated the little-used category search option. Since auto-suggest did work, this was the only bit of functionality we lost. 

We went live with the first iteration of the new design on August 12. 

I immediately began a second implementation of the design. The first iteration carried over the design choices of our LibGuides v1-based design, with a search box spanning the width of the page and a Bootstrap "well" on the right side of the page that contained a variety of links which we were using to link back to the other modes of reference service described on the Ask Us page in LibGuides. Because of its presentation, it really couldn't be considered navigation, even though a similar box in LibGuides was doing the same thing. They looked too different from each other and the LibGuides version didn't even contain a link back to the FAQ. 

I felt that it was time to make a change, but I first needed to get staff approval for my proposed change, since what I was thinking eliminated using the Ask Us box as a navigational element, replacing it with our standard sidebar "pill" navigation. I wouldn't want to eliminate the Ask Us box entirely, since it is extensively mapped on pages in LibGuides, but it would no longer be required as a navigational element. 

The first step was to clone the old Ask Us guide and remove the Ask Us box from the left column and restore the default LibGuides sidebar navigation. I included an extra pill in the sidebar that would redirect to my sandbox LibraryH3lp re-design. Because I thought perhaps the icons that branded the Ask Us services would be missed by users, I incorporated them into the pills using Bootstrap 3 style Font Awesome font icons. All that was left was to change the page layout in LibraryH3lp so that the FAQs were on the right and the navigation on the left. That meant that there was now LibGuides-style pill navigation that was consistent between the Ask Us pages in LibGuides and LibraryH3lp. This is intended to remove the dissonance that users probably felt previously when moving back and forth between LibGuides to LibraryH3lp and make them feel, as we intend, that they all all part of a single service. 

It is also worth noting that, even without this second round of redesign, I already intended to replace the "juicy" clicklet-style image icons that we were using as a sort of branding for each mode of Ask Us service -- e.g., a phone icon for the "Ask Us By Phone" service and a chat bubble for the "Ask Us By Chat" service, etc. -- with a more responsive, flat design done using SVG versions of the icons. They were out of step stylistically and in color with the new Bootstrap 3 design. The new SVG versions are currently flat green rounded corner squares with the Font Awesome icons overlayed on top. I found a [GitHub repo](https://github.com/encharm/Font-Awesome-SVG-PNG) that had converted Font Awesome icons into SVG images, so they were ready made and easy to incorporate in Illustrator. These icons are being used in the right sidebar in my first iteration of the LibraryH3lp redesign and, with approval, I propose to replace the juicy chicklets in LibGuides as well. When I beef up my Illustrator chops, I will make new versions of the SVG icons with a slightly less flat design. 

## Library Catalog

The Library catalog at Le Moyne is III's WebPac. III provides base themes as an aid to libraries who want to develop a particular look and approach to the public interface. However, even after 4+ years of discussion on the III listservs and IUG forums and at the annual IUG conference, the long hoped for Bootstrap-based WebPac theme has yet to materialize. 

To date, I'm aware of only one effort to code up a Bootstrap theme on WebPac: a theme created by [Craig Bowman](https://github.com/craigboman) at the University of Dayton for their "Flyers" catalog, [flyers.udayton.edu](http://flyers.udayton.edu). Craig's code repository is available at [github.com/rm207/flyers](https://github.com/rm207/flyers). 

I need to evaluate Dayton's work to see if it can be adapted to our design. Dayton is using a tabbed navigation for search boxes that transforms into top-positioned navigation pills at the mobile breakpoint. This approach would directly compete with our own banner navigation if I were to implement it as is. Our catalog's current navigation system is to group links together in a sidebar menu within three categories: "Search Options", "My Library", and "Library Links". Sticking with this approach should be consistent with the sidebar navigation approach we're using in LibGuides and is, I think, probably the best way forward. 

Assuming the Dayton work can be adapted to our design, I don't project this work can be completed much before the start of the Fall semester on August 28. 

## Library News Blog

The Library uses a WordPress blog hosted by a commercial hosting company as our News and Announcements platform. I've been looking, so far without good results, for a Bootstrap-based theme that I can overlay with our custom stylesheet, header, and footer. In the interim, I've just been using a generic, unbranded responsive theme and will continue to do so until a solution can be found.

I can't project an exact completion date for this work, but I hope to find and apply a solution by September 30. 
