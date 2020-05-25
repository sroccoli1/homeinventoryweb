Improvements:
  - Feat20191227001: Save NEW cardboard into BD
  - Des20191227001 : Back-end, OO; Connection of Object Model and front-end
  - Feat: Cardboard Search

-Fixing Issue:
  - I20190907002 : Partially resolved with work 20190809 by increasing the grid gap but dropdown button is still not outlined

-On-going... :
  -Dev & Issues emerging:
    - [Cardboard Search] CSS not done
	- Feat20190907001: Accessibility : If keyboard only : Outlining in black the focus on other user controls.
	- Des20190908001: For topbar layout and code with less JS we used the grid repeat() for topbar instaed of JS
	- I20190908001 Dropdown Display emerges problem when using the grid repeat for topbar (Des20190908001). The dropdown button is on the left but the dropdown menu is on the right.
	
  - Found Previously and still on-going :
	-I20190907002 : Keyboard Accessibility : the focus on the relative menu button (Back Outline)is invisible when zoom is under 175% (Home Page Top Bar).

Has already :
  -Home page that redirect to "Record New Carboard" page
  -Record New Carboard (with Input Validation) built in Grid Layout
  -A responsive top bar navigation on "Record New Carboard" page 
  -Menu Sidebar that is displayed when clicking on the topnav menubar
  -A topbar dropdown (page relative menu) displayed at click.
  - I190608002 The top bar navigation on "Record New Carboard" page is hiding the upper part of the page for screen width under 400px
  - Javascript is now in a single external file.