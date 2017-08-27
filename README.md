# Guest Directory Plugin

* This plugin once active creates a new settings pages under ```Settings -> Guest Directory```
* This plugin uses [piklist](https://piklist.com/learn/section/piklist/)
* Install [WP-Less](https://en-ca.wordpress.org/plugins/wp-less/) plugin to enable styles

There is six sections Services, Enables, Sidebar, Buttons, Configuration and Modules.

## Settings Section
```
Settings -> Guest Directory
```

### Services
This is where you add the services using the repeater fields

### Enables
This is where you allow which custom post types you are allowed for the directory.

* Directory Announcements (GD Update)
* Directory Activities (GD Activities)
* Directory Dining (GD Dining)

**Important** After saving the enables or making changes you have to go to ``` Settings -> Permalinks ``` and save changes to ensure changes are allow for custom post type links.

### Sidebar

This is where the sidebar images are added.

### Buttons

This is where the Main section buttons are created. ie Facebook or Browse the web

### Configuration

* Select page for guest directory
* select logo.
* select Directory title
* css overrides


### Modules

This is where you create the sections and order and add any content if required.

Module Types:

* Announcements
* Services
* Activities
* Dining
* Transportation
* Real Estate
* Contact
* Custom

## Shortcodes

### [guest_directory]

```
[guest_directory]

```

## Setup

* Add to ```composer.json```

```json
{
	"require": {
    ...
		"fgms/wp-plugin-directory": "@dev"
	}
}
```
* Create a new page for guest directory.
* add shortcode [guest_directory].
* set template to Basic Template.
* setup enables for Guest Directory custom post types.
* setup settings at ```Settings -> Guest Directory ```
* setup Services, Sidebar, Buttons, Configuration, and Modules

## File structure

```
├── assets
│   ├── css
│   │   ├── style2.css
│   │   └── style.css  -- styles default if wp-less plugin is not loaded
│   ├── images
│   │   ├── background-accordian-shadow.jpg
│   │   ├── background.jpg
│   │   └── glyphs.png
│   ├── js
│   │   └── script.js -- main plugin javascript file.
│   └── less
│       ├── activities.less
│       ├── bootstrap.less
│       ├── condominium.less
│       ├── dining.less
│       ├── home.less
│       ├── mixins
│       │   ├── 3l.less
│       │   └── mixins.less
│       ├── old.less
│       ├── site.less
│       ├── style.less
│       ├── variables.less
│       └── widgets.less
├── composer.json  -- used for composer
├── parts -- this is used by PIKLIST
│   ├── meta-boxes
│   │   ├── gd-activites.php -- GD Activities custom fields
│   │   ├── gd-dining.php -- GD Dining custom fields
│   │   └── gd-dining-special-offer.php GD Dining (specials) custom fields
│   └── settings  -- this is used by PIKLIST for Settings -> Guest Directory
│       ├── directory-ads.php
│       ├── directory-buttons.php
│       ├── directory-config.php
│       ├── directory-layout.php
│       ├── directory-services.php
│       └── directory-settings.php
├── README.md -- this file
├── shortcodes
│   └── guest-directory.php -- shortcode which loads resources and templates.  It also removes resources.
├── src
│   └── Fgms
│       └── Directory
│           └── Controller.php -- Controller
├── twig-templates  -- twig templates, to override these templates you need to create a plugin directory in your theme.
│   ├── activities.twig
│   ├── announcements.twig
│   ├── contact.twig
│   ├── dining.twig
│   ├── guest-directory-base.twig
│   ├── realestate.twig
│   ├── services.twig
│   └── transportation.twig
└── wp-plugin-directory.php -- plugin file.
```
