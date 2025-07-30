/**
 * @file
 * Lightship Theme Gulpfile for compiling Sass.
 *
 * https://css-tricks.com/gulp-for-beginners/
 */

import gulp from 'gulp';
const {src, dest, watch, series} = gulp;

import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);

import sourcemaps from 'gulp-sourcemaps';     // Create sass sourcemaps.
import autoprefixer from 'gulp-autoprefixer'; // Adds vendor prefixes to CSS rules.
import { deleteSync } from 'del';             // Delete generated files when needed.
import plumber from 'gulp-plumber';           // Used to catch errors and continue build.
import svgSprite from "gulp-svg-sprite";      // Build svg-sprite to make referencing SVG icons easier.

const sassPaths = [
  'sass/**/*.scss',
  'blocks/**/*.scss'
];

// Clean up existing compiled files.
export function clean(done) {
  deleteSync('css/*');
  deleteSync('sprite/sprite.svg');
  done();
}

// Compile sass to css.
export function css() {
  return src(sassPaths)
    .pipe(plumber(function (error) {
      console.log(error.message);
      this.emit('end');
    }))
    .pipe(sourcemaps.init())
    .pipe(sass.sync({ style: 'compressed' }))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('assets/css'));
}

// Build SVG sprite.
export function svg() {
  return src('sprite/svg/*.svg')
    .pipe(svgSprite({
      transform: ['svgo'],
      mode: {
        symbol: {
          dest: './',           // output sprite file in same directory
          prefix: ".icon--%s",  // Prefix for CSS selectors
          dimensions: "-dims",  // Suffix for dimension CSS selectors
          sprite: 'sprite.svg', // name of sprite
          example: false,       // generate html file showing all icons
          bust: false,
          render: {
            scss: true,
          },
          inline: true,
        },
      }
    }))
    .pipe(dest('sprite'))
}

// Watch sass files & rebuild on any changes.
export function watchFiles() {
  watch(sassPaths, series('css'));
  watch('sprite/svg/*.svg', series('svg'));
}

// One time build process.
export function build(done) {
  series('clean', 'svg', 'css')(done);
}

export { watchFiles as watch };

export default series(clean, svg, css, watchFiles);
