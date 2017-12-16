# rachel-disclaimer
Adds per module disclaimer ability to RACHEL to allow systems to be shipped locked to admin only access.

## Motivation
The goals of this RACHEL module are:
1) to provide image creators with the ability to ship images locked to admin only access
2) to promote image curation and volunteer participation by clarifying content and usage responsibility lies with school administrators
3) to provide a method for per-module disclaimer information through the use of rachel-disclaimer.php
4) to demonstrate the use of a jquery lightbox in an admin module
5) to force installers to review admin login procedures with on-site administrators

## Usage
This module has the following line in its rachel-index.php...  

if (!disclaimerApproved()) { exit(); }  

which requires admin login or an approved disclaimer to display the portal's index page.  To open the access to non admin users, the administrator must enter their name and click a button, preferrably after reading the disclaimer text included from each module's rachel-disclaimer.php file.  Access is very simply controlled by the presence or absence of a file in the document root called disclaimerApproved.txt.  Additionally, each time the 'Enable Open Access' button is pressed the information is logged via rachelLogger().

The location of the interface for viewing and approving the disclaimer depends on where rachel-admin.php has been included and the order presented.  If this is moved to core, it would ideally redirect to the disclaimer.php page making aproval of the disclaimer one of the first actions of the admin.

## Developer notes 

disclaimerApproved() relies on authorized() currently displays a form but which may redirect in the future.  A redirect without object buffering means the check for disclaimerApproved needs to occur at the top of index.php before anything has been sent to the browser.  With object buffering, this check could occur anywhere including within the module's rachel-index.php.  Generally, we place the check in index.php so that it is obvious that it is occurring to a future developer, but if this is to remain an independent module then leaving it in rachel-index.php would be the way to go.

If client bookmarks already exist (from previous year install, for example) content will still be accessible through their bookmarks.

The example disclaimer text is in Spanish and not meant to act as an official system disclaimer but rather a place holder.

## Useful practices

We are gratefully using https://github.com/dimsemenov/Magnific-Popup to provide lightbox display of disclaimer text.  This is our preferred jquery lightbox and we would like to recommend it to be available at the root level along with jquery and included in the header of all pages.  If this inclusion were to occur, things like rachel-help.php and rachel-config.php could be added to module templates to allow popup help and configuration.   

## Future direction / TODO

1) Discuss inclusion in core by moving disclaimerApproved(), and rachelLogger() to core or object buffering on index.php.
2) Decide how to best handle multilingual system disclaimer... default with optional translations (case statement rachel-disclaimer.php) or separate files (if statements to check for existence prior to inclusion).
