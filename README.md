LightShip
===

Here are some of the other more interesting things you'll find here:

* A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
* A just right amount of lean, well-commented, modern, HTML5 templates.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample layouts in `sass/layouts/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/style.scss`.
Note: `.no-sidebar` styles are automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.

Installation
---------------

### Requirements

- WordPress 6+
- [Node.js](https://nodejs.org/)
- [Gulp](https://getcomposer.org/)
- [wp-cli](https://wp-cli.org/), optional


### Quick Start

Clone or download this repository, change its name to something else and then you'll need to do a find and replace on the name in all the theme files.

1. Search for `lightship_` to capture all function names and replace with: `[theme-name]_`
1. Search for `lightship` to capture all other instances and replace with: `[theme-name]`
1. Update the theme metadata in `style.css` and `pacakge.json`
1. Replace fonts in `inc/assets.php` and `inc/block-editor.php`

### Setup

From the theme’s directory, run `npm install`

### Gulp Tasks

- `gulp sass` - compiles sass into CSS
- `gulp clean:css` - deletes compiled CSS
- `gulp watch` - watches sass directories for changes and recompiles whenever you save a change
- `gulp build` - simple one time build task

#### Why doesn’t gulp do ALL THE THINGS?

This is by design, and at the core of LightShip's mission. We reduce complexity and development abstractions so that later on, in 2-5 years' time, it's not difficult to reproduce this development environment.

### Structure

```
├── acf-json
├── assets
│   ├── css
│   │   ├── block-editor.css      # Compiled editor styles
│   │   └── style.css             # Compiled front-end styles
│   ├── fonts
│   ├── img
│   │   └── svg
│   └── js
│       ├── block-editor.js
│       └── navigation.js
├── functions.php                 # Loads all functionality
├── gulpfile.js
├── inc
│   ├── blocks
│   │   └── testimonial           # ACF block
│   │       ├── editor.scss       # - Editor styles
│   │       ├── style.scss        # - Front-end styles
│   │       ├── template.php      # - Template
│   │       └── testimonial.php   # - Register block
│   ├── post-types
│   ├── taxonomies
│   ├── assets.php
│   ├── block-editor.php
│   ├── nav-menus.php
│   ├── sidebars.php
│   ├── template-functions.php
│   ├── template-tags.php
│   └── theme-setup.php
├── package-lock.json
├── package.json
├── patterns                      # Block template patterns
│   └── button-group.php
├── sass
├── style.css                     # Theme metadata
└── theme.json
```

## `acf-json`
Adds support for Advanced Custom Fields [local JSON](https://www.advancedcustomfields.com/resources/local-json/).

## `style.css`
Used for setting up theme metadata, and is not enqueued on the front-end. Front-end styles are compiled and loaded from `assets/css/style.css`.

## `theme.json`

The idea here is to disable major features such as color palette, font sizes, etc. globally and enable on individual blocks as needed. This future-proofs the site against new blocks being added in core.
