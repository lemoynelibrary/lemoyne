# LibGuides v2 Files

Code here is for system files and content boxes for essential guides on the site.

- `guides` directory -- divided up into folders corresponding to key sections of the website and has code for each content box in the guide.
- `look-and-feel` -- only the `js-css-code.txt` file is unique. `header.txt` and `footer.txt` files are now moved to the `shared/look-and-feel` folder and act as masters. 
- `search-boxes` -- code for custom search boxes such as ProQuest. The plan is document the library specific search boxes for catalog, journal finder, database, etc. In some ways, this code duplicates that found in the `libguides2/guides` folder.
- `settings` -- code for LibGuides Google Analytics.
- `templates` -- each of the standard page types in LibGuides can be assigned one or more custom templates. Customizations include swapping "container-fluid" for the default "container" classes, tidying up the code, and rearranging the order of the `{{public_footer}}` and `{{system_footer}}` includes. 
