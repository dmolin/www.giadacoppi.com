Giada Coppy personal homepage
=============================

This is a website I developed for a friend of mine.

The design is all from Giada Coppi; The website was originally just a list of static HTML pages; there was no responsiveness at all.
The work I did was to turn the static pages into a dynamic website, achieving these goals:

- minimize repetitions
- maintaning a simple file structure (to allow my non-technical friend to make changes to the markup without struggling too much)
- add responsive design to the pages

This is the result

[![ScreenShot](https://raw.github.com/dmolin/www.giadacoppi.com/master/README/github_giadacoppi.png)](http://www.davidemolin.com/labs/www.giadacoppi.com)

You can see it live [HERE](http://www.davidemolin.com/labs/www.giadacoppi.com)

### Technologies Used ###

To keep the implementation as simpler as possible for non-tech hands I chose PHP to quickly turn static web pages into partials; this allowed me to minimize repetitions using templates and generator functions for the repeating elements (like the thumbnails).

### Responsive columns ###

The main challenge was to render the homepage responsive columns. Giada wanted the columns to always fill all the available horizontal space in the page, wether there was 1, 2 or 3 columns displayed; That ruled out a simple CSS breakpoint-based approach, in favour of a full Javascript-driven logic.

I decided to avoid masonry or other plugins because they didn't do exactly what we needed and the footprint was too much for just a unique use case; I opted for a custom implementation, that you can find in the <i>rebuildColumns</i> functions within js/home.js

All the thumbs are initially in one single column; the function calculate its total height/width and then determine how many columns to create and how many elements to put into each column (the thumbs have different heights, so this must be taken into account)