Todo List
=========

* Make The buttons on the top search pages look more consistant (make them the standard blue color as the rest of the buttons on the site)

* should be a space between a call number and "Nearby items" in "brief" view

* the "NO ENTRIES FOUND" page should produce a page that has form elements that are partially filled in ... example: http://flyers.udayton.edu/search/X?SEARCH=shakespeare+pickles&SORT=D&submit=Submit

* add find it / map it feature back for items in bib_display.html (basically 
anything that has a call number associated with it)

* stack the top buttons in "navigationRowRecord" so that they behave similar to 
the buttons in "icon_but_output" (i.e. they stack and expand all the way across
the page in mobile views) 

* create buttons for "logout" and "return to your record" links

* add icon for patron view (icon but_ret2prec)

* add icon for "Log Out" and  "Return To Your Record" anywhere they appear. 
Also, add log off button to the front page. --Sadly, there doesn't appear
to be a way to add a link to the "Return To Your Record" from the main pages.

* adjust the input boxes for the patron login page so they're more aligned / 
visually pleasing.

* possibly add <!--{pager}--> token to the bottom of bib_display.html just before botlogo.html

* fix javascript for the desktop and mobile view so that the navigation view changes when you switch viewports.
	(on mainmenu.html selected pages do not continue to stay selected when toggling viewports)

* consider adding code to break out of the frame if the user so desires. For example, when browsing certain electronic 
resources, the catalog remains open in a frame above with a button that says, "Return to Catalog" (taking up 30% of the 
window size).  To break out of that, we would add a second button, and add the following javascript to it (first check if
there is a valid frame)
window.location.assign(document.getElementsByTagName('frame')[1].src)

Finished / Addressed
--------------------
* ~~change font?
'Alright Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif~~

* ~~add refworks~~

* ~~change "Your Library Account" (everywhere) to match www.udayton.edu/libraries language: "My Library Account" ~~

* fix request problem (request icon shouldn't display) http://flyers.udayton.edu:2082/record=b1311694~S0

Scratched
---------
* add the QR code javascript to the bib_display.html page. (Maybe figure out 
a way to incorporate the "Text This To Me" button, or move the button)

* fix the briefcit(x) page style so that the padding / separating lines are 
more visually pleasing.

Added from todo.txt (maybe repeats)
-------------------
*add refworks

*change font?
'Alright Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif

*create buttons for "logout" and "return to your record" links

*add icon for patron view (icon but_ret2prec)

*possibly add <!--{pager}--> token to the bottom of bib_display.html just before botlogo.html
 
*fix request problem (request icon shouldn't display) http://flyers.udayton.edu:2082/record=b1311694~S0

*fix javascript for the desktop and mobile view so that the navigation view changes when you switch viewports.
	(on mainmenu.html selected pages do not continue to stay selected when toggling viewports)

*remove patron record option to change a held item's pickup location. 
	(most likely a wwwoption that needs updated)

*replace material type icons (replace material type I (non-music recording) with something
generic
