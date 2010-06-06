iWebkit theme for drupal is created by Sumit Kataria (http://sumitk.net) as a hobby project. He could be contacted for customizations of this project at sumitk@sumitk.net

Blogs about iWebkit theme for drupal are here: http://civicactions.com/blog/2009/oct/30/build_iphone_compatible_drupal_websites_using_iwebkit_part_3_final_release_iwebkit_theme

iWebKit is a web toolkit designed to create iPhone and iPod touch compatible websites and webapps. It is very easy to use, extremely fast, compatible and extensible. iWebkit is available under GNU license and can be downloaded from http://iwebkit.net. 

iWebkit theme for drupal is to make your drupal websites iPhone/iPod compatible.

An important part of building mobile websites is automatic detection of the user-agent (mobile device) so you can switch to an appropriate theme, or re-configure the layout for your mobile browsing. Once you've detected the device, you can present the website in a theme tailored to it.

Few modules to detect user-agent(browser) and switch drupal theme to appropriate mobile device compatible theme are:

* Mobile Tools  http://rupal.org/project/mobile_tools is a very advanced module targeted both towards making a mobile version of your existing Drupal site, and detecting user agents for switching theme to mobile theme. A good tutorial how to use this module is available here.
* WURLF http://drupal.org/project/wurfl is module provides an API for to detect which device is accessing the site and also determine the device's capabilities (e.g. screen size, support for ajax, which device, touch_screen, etc ...). WURLF is available for download from SourceForge (it's an opensource project).
* Browsercap http://drupal.org/project/browscap is a module based upon the Browser Capabilities Project
* iDrupal http://drupal.org/project/idrupal module also provides similar functionality to Browsercap but that is only limited to iPhones and iTouch.

Use of Mobile Tools is highly recommended. http://rupal.org/project/mobile_tools

Features:

Form elements: All form elements now looks like default iphone forms. This means there is no need to add custom user-login, comments or node add forms for your iphone website, you can directly use drupal default forms and they will be automatically converted into iPhone style form elements. 

12 different subthemes + 1 default theme are now included in iWebkit project. To give you more control the theme settings (at 'admin/build/themes/settings/iwebkit') provide a UI to switch between different subthemes. Each subtheme consists of its own style.css along with custom colored image files.