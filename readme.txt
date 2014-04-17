=== SO Jetpack Stats Only ===
Contributors: senlin
Donate link: http://so-wp.com/donations
Tags: jetpack, stats
Requires at least: 3.7
Tested up to: 3.9
Stable tag: 2014.04.16a
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The SO Jetpack Stats Only plugin is a fork of Jetpack with only the Stats Module enabled. All the rest of the modules of Jetpack have been removed.

== Description ==

** IMPORTANT: This plugin is NOT the official [Jetpack](http://jetpack.me/) plugin by WordPress.com **

The SO Jetpack Stats Only plugin is a fork of Jetpack 2.9.3 with only the Stats Module enabled. All the rest of the modules of Jetpack have been removed. 

The plugin is a full fork of Jetpack and it is therefore not necessary to have Jetpack itself installed. Actually, if you would do that, then things will rapidly fall apart :)

I have decided to only support this plugin through [Github](https://github.com/senlin/so-jetpack-stats-only/issues). Therefore, if you have any questions, need help and/or want to make a feature request, please open an issue over at Github. You can also browse through open and closed issues to find what you are looking for and perhaps even help others.

**PLEASE DO NOT POST YOUR ISSUES VIA THE WORDPRESS FORUMS**

Thanks for your understanding and cooperation.

== Installation ==

Go to **Plugins > Add New** in your WordPress Dashboard, do a search for "so jetpack stats only" and install it.

 &hellip; OR &hellip;


 1. Download zip file.

 2. Upload the zip file via the Plugins > Add New > Upload page &hellip; OR &hellip; unpack and upload with your favourite FTP client to the /plugins/ folder.

 3. Activate the plugin on the Plugins page.

Done!


== Frequently Asked Questions ==

= I received an email from "Jetpack by WordPress.com" that says if I don't update to Jetpack 2.9.3 the Stats Module may stop working; what should I do? =

We have received those emails too and have therefore forked Jetpack 2.9.3 (for our version 2014.04.14). In our fork we adjusted the coded version to our own version number, and as that is not the same as Jetpack, they send out these emails to you. In version 2014.04.16 we have adjusted that and at the same time did some more cleaning up.
In other words, if you install the latest version of SO Jetpack Stats Only, you don't have to worry that your Site Stats will vanish.

= I have an issue with the Stats Module of Jetpack, where can I get support? =

The SO Jetpack Stats Only plugin is a fork of Jetpack and removes all the other modules; it does not do anything functional to/with Jetpack. Therefore any and all Jetpack related issues, should be directed to [Jetpack](http://jetpack.me/support/wordpress-com-stats/).

= I have an issue with this plugin, where can I get support? =

Please open an issue on [Github](https://github.com/senlin/so-jetpack-stats-only/issues)


== Changelog ==

= 2014.04.16a =

* bug fix of warning that only showed when debug was set to `true`. Apologies for the inconvenience of 2 updates in 1 day.

= 2014.04.16 =

* adjusted Jetpack version definition (to 2.9.3) to comply to new Jetpack "rules" (i.e. warning emails that threaten to turn off the service)
* some bug fixes
* adjusted text in some strings
* remove 3rd-party folder: bloat
* removed _inc/lib folder: bloat
* removed redundant scripts
* edited FAQ

= 2014.04.14 =

* new fork of Jetpack 2.9.3, which addresses the issue that new users could no longer activate version 2014.01.12 as reported on Github [issue 2](https://github.com/senlin/so-jetpack-stats-only/issues/2)

= 2014.01.12 =

* first release

== Upgrade Notice ==

= 2014.04.16 =

* adjusted Jetpack version definition (to 2.9.3) to comply to new Jetpack "rules" (i.e. warning emails that threaten to turn off the service) 