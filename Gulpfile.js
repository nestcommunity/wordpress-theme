'use strict';
require('es6-promise').polyfill();

var browserSync = require('browser-sync');
var reload = browserSync.reload;
var gulp = require('gulp');

var filter = require('gulp-filter');
var sourcemaps = require('gulp-sourcemaps');

var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var foundationPath = './node_modules/foundation-sites/';
var paths = {
  scss: [
    foundationPath + 'scss',
    'scss'
  ],
  scripts: [
    // foundationPath + 'js/foundation.abide.js',
    // foundationPath + 'js/foundation.accordion.js',
    // foundationPath + 'js/foundation.accordionMenu.js',
    foundationPath + 'js/foundation.core.js',
    // foundationPath + 'js/foundation.drilldown.js',
    // foundationPath + 'js/foundation.dropdown.js',
    // foundationPath + 'js/foundation.dropdownMenu.js',
    // foundationPath + 'js/foundation.equalizer.js',
    // foundationPath + 'js/foundation.interchange.js',
    // foundationPath + 'js/foundation.magellan.js',
    // foundationPath + 'js/foundation.offcanvas.js',
    // foundationPath + 'js/foundation.orbit.js',
    // foundationPath + 'js/foundation.responsiveMenu.js',
    // foundationPath + 'js/foundation.responsiveToggle.js',
    // foundationPath + 'js/foundation.reveal.js',
    // foundationPath + 'js/foundation.slider.js',
    // foundationPath + 'js/foundation.sticky.js',
    // foundationPath + 'js/foundation.tabs.js',
    // foundationPath + 'js/foundation.toggler.js'.
    // foundationPath + 'js/foundation.tooltip.js',
    // foundationPath + 'js/foundation.util.box.js',
    // foundationPath + 'js/foundation.util.keyboard.js',
    // foundationPath + 'js/foundation.util.mediaQuery.js',
    // foundationPath + 'js/foundation.util.motion.js',
    // foundationPath + 'js/foundation.util.nest.js',
    // foundationPath + 'js/foundation.util.timerAndImageLoader.js',
    // foundationPath + 'js/foundation.util.touch.js',
    // foundationPath + 'js/foundation.util.triggers.js',

    'scripts/**/*.js'
  ]
};

// Browser-sync task, only cares about compiled CSS
gulp.task('browser-sync', function() {
  browserSync({
    files: "css/*.css",
    proxy: "nest.community.dev"
  });
});

// Sass task, will run when any SCSS files change.
gulp.task('sass', function () {
  return gulp.src('scss/styles.scss')
    .pipe(sass({ includePaths: paths.scss })) // compile sass
    .pipe(autoprefixer({
  		browsers: ['last 2 versions', 'ie >= 9', 'and_chr >= 2.3'],
  		cascade: false
  	})) // prefix for different browsers
    .pipe(gulp.dest('css')) // write to css dir
    .pipe(filter('**/*.css')) // filter the stream to ensure only CSS files passed.
    .pipe(reload({ stream: true })); // inject into browsers
});

// Minify and copy all JavaScript (except vendor scripts)
gulp.task('scripts', function() {
  return gulp.src(paths.scripts)
    .pipe(sourcemaps.init())
      .pipe(uglify())
      .pipe(concat('scripts.min.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('js'));
});

// Default task to be run with `gulp`
gulp.task('default', ['scripts', 'sass', 'browser-sync'], function () {
  gulp.watch("scripts/**/*.js", ['scripts']);
  gulp.watch("scss/**/*.scss", ['sass']);
  gulp.watch("**/*.php").on('change', browserSync.reload);
});
