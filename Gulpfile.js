'use strict';

var browserSync = require('browser-sync');
var reload = browserSync.reload;
var gulp = require('gulp');
var sass = require('gulp-sass');
var filter = require('gulp-filter');
var autoprefixer = require('gulp-autoprefixer');

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
    .pipe(sass({ includePaths: ['./node_modules/foundation-sites/scss', 'scss'] })) // compile sass
    .pipe(autoprefixer({
  		browsers: ['last 2 versions', 'ie >= 9', 'and_chr >= 2.3'],
  		cascade: false
  	})) // prefix for different browsers
    .pipe(gulp.dest('css')) // write to css dir
    .pipe(filter('**/*.css')) // filter the stream to ensure only CSS files passed.
    .pipe(reload({ stream: true })); // inject into browsers
});

// Default task to be run with `gulp`
gulp.task('default', ['sass', 'browser-sync'], function () {
  gulp.watch("scss/**/*.scss", ['sass']);
  gulp.watch("**/*.php").on('change', browserSync.reload);
});
