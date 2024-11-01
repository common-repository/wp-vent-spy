=== WP Ventrilo Status Monitor ===
Contributors: onykage
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10805248
Tags: php, ventrilo, wordpress, vspy, onykage, vent, ajax, jquery, jquery, status, superscriptz
Requires at least: 2.7
Tested up to: 2.9.1
Stable tag: trunk

a robust self configuring ventrilo server status monitor for wordpress

== Changelog ==
= 1.2.3 =
* Fixed validation button showing on managed window.
* Added toggle for Ventrilo Logo in title bar.
* Added toggle for Menubar to display in Status window when using managed option.
= 1.2.1b =
* bugfix, thanks, Jordan, Eric.
* auto refresh removed for now.
* will add support for windows based servers in next version change.

= 1.2.1a =
* bugfix, thanks, Scautura.
* xml type'O in the base function call.

= 1.2 =
* now supports FireFox 2.5 and later, IE 6.5 and later, Chrome(all), Safari(all)
* moved ajax were it belongs (in the head)
* optimized ajax for smoother operation (now 40% faster process time)
* removed loading image 
* added ventrilo logo to the title bar
* reorganised the options page to a more logical easy to use page
* added ajax based refresh effect
* added toggle based menu to extremespy utility

= 1.1.364 = 
* fixed mulitple security issues with donation system
* more code cleanup

= 1.1.146 =
* added donation authorization option
* altered vspy to accept donation codes
* braches cleared

= 1.1.033 =
* added sponsorship banner and information into the options page
* added sponsorship link into the vspy hosted banner.

= 1.1.013 =
* added ability to change width/height/overflow on hosted & managed options

= 1.1.0 =
* several minor code fixes and cleanup
* changed the options page banner to a dynamic header
* fixed no jquery problem
* added managed autofix

= 1.0.372 =
* fixed a few typeOs
* fixed the fancy toggle.

= 1.0.366 =
* fixed several precurser parse and instant errors.
* added some security fixes
* added some statitical resorce information to help with debugging.

= 1.0.326 =
* replaced php file_get_content() with cURL libs as a php.ini workaround for hosted option.

= 1.0.318 =
* fixed display delay for hosted option
* added hosted.php file(jQuery work around for Post())
* added loading.gif
* added loading sequence in ajax to increase page load speeds
* added fancy graphics to display
* updated screenshots
* added width options
* added fancy/plain toggle
* added custom colors
* added hex color data to buildTable

= 1.0.115 =
* fixed version oversite (project just now reached 1.0 state.)
* added options page
* added hosted option
* change widget control to dynamic insertion
* added file permissions test option for the managed section.

= 0.7.77 =
* Cleaned up the code.
* Fixed the file location bug in the widget.
* added a post based display module, please see installation.

= 0.6.42 =
* added ajax refresh options;

= 0.5.11 =
* project start
* inicial addition to wordpress svn

== Description ==

a robust self configuring ventrilo server status monitor for wordpress that uses Onykage's ventspy script.

This plugin has a hosted or managed operation.  

1. Hosted means that the plugin will ask another website what the provided vent server address is doing.  The Hosted option also has a small ad at the bottom of the script.  If you dont want the ad there, use the managed option or make it a point to donate and the ad will remove itself (this is a beta option, if you donate I will contact you).
2. Managed means you have total control over everything, and there is no ad!

= IMPORTANT! =

The auto refresh option works!  And it loves your bandwidth.  I strongly discourage having it refresh in intervals less then 30 seconds.

*other details and most versions of the plugin can be found at:
*http://superscriptz.net/onykage/wordpress/wp-ventrilo-status-monitor/

= Updates =
* New toggle based menu included to refresh the server on request.
* Added Support for ALL browsers, plugin is now fully cross browser.
* Multiple Security Fixes with the donation system.
* Even more code cleanup and added efficiency.

== Installation ==

= Typical =
1. goto the dashboard
2. click on 'Add New' under plugins
3. search for 'Ventrilo'
4. select Wp Ventrilo Status Monitor and click 'install' to the right.
5. activate the plugin.
6. goto the settings page, and provide your Ventrilo server address and port (password if needed)
7. goto 'widgets' under Appearance and add the 'WP Vent Spy' widget to your sidebar.
8. look at your website to verify that everything works.
9. adjust settings and feel according to taste.

= Alternate =
1. Download the plugin
2a. Upload the plugin to the '/wp-content/plugins/' directory or
2b. Upload the plugin via the 'Add New' feature in the Plugins Panel
3. Activate the plugin through the 'settings' menu on your dashboard
4. Configure the plugin through the 'plugins' menu on your dashboard
5. Set the widget where you want it on the sidebar

== Extra Stuff ==

= using wp-extemespy =

* put the following line of code in your post.  This line requires the Exec-php plugin.
* http://wordpress.org/extend/plugins/exec-php/

* replace the '{everything in here including the curly braces}' with server information.
* (php tag)- include('includes/wp-extremespy.php?nme={server name}&svr={theserver ipaddress or cname}&prt={server port}&psw={server password, leave blank if no password is needed.}'); - (php tag)

== Screenshots ==

1. Plugin in Plain Mode
2. Plugin Admin Panel
3. Plugin in Fancy Mode

== Upgrade Notice ==

= 1.2 =
Multiple security fixes and plugin optimization.  Plugin now works 40% faster and now supports ALL browsers.

== Frequently Asked Questions ==

= I dont see anything =

This may be an issue resulting from your Wordpress template choice.  In most cases, this issue is caused from either the wrong version of jQuery or an unsupported version.  Please make sure your template is using the correct jQuery version.

= I got an Error =

* Your trying to use the Managed option.  Your webhost has the ports to the ventrilo server blocked.  Tell your webhost to whitelist the ports, or find a better host that is less paranoid.  I recomend http://www.hostmonster.com.
* An alternate explaination to this issue is your webhost is either running a windows platform or does not allow php to run systme level commands.

= Can I get rid of the Ad? =

Yup, click the donate button, when you donate you will get a code emailed to you.  Put the code in the appropriate field in the plugin to remove the ad.  Please see http://superscriptz.net/onykage/wordpress/wp-ventrilo-status-monitor/ for more details about this.

= If I have a problem not listed here can I contact you? =

Sure can, you can use the supplied email address here or, you can simply post a comment at http://superscriptz.net and I will reply to you directly about this issue upon request.

= Do you have a beta program? =

Check the 'other versions' tab, if there is a current beta version released it will be there.  Feel free to report bugs and issues on the plugins base page at http://superscriptz.net
















