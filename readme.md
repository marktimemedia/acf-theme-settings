# ACF Options Page 

Registers some default WordPress theme settings using Advanced Custom Fields Pro, with helper functions to include in the theme


### Theme Settings

##### Header
* Header Logo
* Additional Header Text (like phone number, etc)

##### Footer
* Footer Logo
* Additional Footer Text (like copyrights, etc)

##### Defaults
* Default Image (if there is no post thumbnail)
* Social Media Buttons (to be used anywhere) *Yes, Jetpack just released a similar feature, literally on the same day I built this for myself* 


### Helper Functions
`the_mtm_header_logo( $class = 'header-logo', $size = 'large' )`
Output header logo inside image tag, with link to homepage. Optionally specify image size and class. Falls back to Site Name if nothing is entered.

`the_mtm_header_text()`
Outputs header text if any exists

`the_mtm_footer_logo(  $class = 'footer-logo', $size = 'large'  )`
Outputs footer logo inside image tag, with link to homepage. Optionally specify image size and class. Shows nothing if nothing is entered.


`the_mtm_footer_copyright()`
Outputs copyright text with year and date

`the_mtm_footer_text()`
Outputs footer text if any exists


`the_mtm_social_icons( $prepend = '', $showtext = false )`
Outputs social icons with custom classes based on social network name. Compatible with Font Awesome if installed (you can prepend the fa- to the class).


`the_mtm_post_thumbnail( $size = 'full', $class = '', $link = true, $attr ='' )`
Outputs the post thumbnail inside a `<figure>` with a permalink to the post, with fallback for the default image
