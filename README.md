# LightShip

LightShip is a minimalist starter theme for WordPress founded on the tenets of simplicity, accessibility and infrastructure sustainability.

It's still a work in progress, if you run into any issues or improvements please open an issue or pull-request.

## Changelog

### 2.2.0

Released: Nov 18, 2025

**Full Changelog**: https://github.com/devcollaborative/lightship/commits/2.2.0

### 2.1.0

Released: April 28, 2025

**Full Changelog**: https://github.com/devcollaborative/lightship/commits/2.1.0

### 2.0

Released: April 28, 2025

- Install Timber with composer
- Timber 2.0 compatibility changes
- Update styles & add content widths
- Add SVG sprite and default social media icons

**Full Changelog**: https://github.com/devcollaborative/lightship/commits/2.0

## Getting Started

### Requirements

- WordPress 6
- [Node.js](https://nodejs.org/)
- [Gulp](https://getcomposer.org/)
- [wp-cli](https://wp-cli.org/) (optional)

### Installing

Clone or download this repository and rename as needed.
`git clone git@github.com:devcollaborative/lightship.git theme-name`

Do a find and replace on the name in all the theme files:

1. Search for `lightship_` to capture all function names and replace with: `[theme-name]_`
1. Search for `lightship` to capture all other instances and replace with: `[theme-name]`

Update theme settings:

1. Update the theme metadata in `style.css` and `package.json`
1. Replace fonts in `inc/assets.php` and `inc/block-editor.php`

From the theme directory, run `npm install` and `gulp watch` to start compiling Sass.

#### Gulp Tasks

- `gulp sass` - compiles sass into CSS
- `gulp clean:css` - deletes compiled CSS
- `gulp watch` - watches sass directories for changes and recompiles whenever you save a change
- `gulp build` - simple one time build task

##### Why doesn’t gulp do ALL THE THINGS?

This is by design, and at the core of LightShip's mission. We reduce complexity and development abstractions so that later on, in 2-5 years' time, it's not difficult to reproduce this development environment.

### Theme Structure

```
├── acf-json/
├── assets/
│   ├── css/
│   │   ├── block-editor.css      # Compiled editor styles
│   │   └── style.css             # Compiled front-end styles
│   ├── fonts/
│   ├── img/
│   │   └── svg
│   └── js/
│       ├── block-editor.js
│       └── navigation.js
├── blocks/                   # files for individual custom blocks
│   └── testimonial/          # ACF block
│       ├── editor.scss       # - Editor styles
│       ├── style.scss        # - Front-end styles
│       ├── testimonial.twig  # - Block template
│       └── testimonial.php   # - Register block
├── components/                # Helper components that aren't blocks
│   └── disclosure/            # Disclosure toggle component
│       ├── disclosure-element.js
│       ├── disclosure-element.scss
│       └── disclosure-element.twig
├── composer.json
├── composer.lock
├── functions.php                 # Loads all functionality
├── gulpfile.js
├── inc/
│   ├── post-types/
│   ├── taxonomies/
│   ├── assets.php
│   ├── block-editor.php
│   ├── nav-menus.php
│   ├── template-functions.php
│   └── theme-setup.php
├── package-lock.json
├── package.json
├── sass/
├── sprite/
│   ├── svg/
├── style.css                     # Theme metadata
├── theme.json
├── templates/
└── vendor/                       #Timber 2.0 and Twig
    ├── composer/
    ├── symfony/
    ├── timber/
    └── twig/
```

#### `acf-json`

Adds support for Advanced Custom Fields [local JSON](https://www.advancedcustomfields.com/resources/local-json/).

Fields will be saved as .json files and can be tracked with version control. ACF will load the settings from files.

ACF fields should be edited on a local dev, and never on the server.

#### `style.css`

Used for setting theme metadata, and is not enqueued on the front-end. Front-end styles are compiled and loaded from `assets/css/style.css`.

#### `theme.json`

Features like color palette, font sizes, etc. are disabled on a global level and can be enabled per-block as needed. When new blocks are added to core, these features will be disabled by default.

### Timber

Timber 2.0 is integrated with the theme
Docs: https://timber.github.io/docs/
