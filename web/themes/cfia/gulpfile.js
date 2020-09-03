/**
 * @file
 * Defines gulp tasks to be run by Gulp task runner.
 */
/* eslint-env node */
var gulp = require('gulp'),
  sass = require('gulp-sass'),
  watch = require('gulp-watch'),
  notify = require("gulp-notify") ,
  prefixer = require('gulp-autoprefixer'),
  sourcemaps = require('gulp-sourcemaps'),
  cleanCSS = require('gulp-clean-css');
// Init Gulp
gulp.task('init', function() {
  'use strict';
  gulp.src('scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      sourceMap: true,
      errLogToConsole: true
    }).on('error', function(err) {
      notify().write(err);
      //this.emit('end');
    }))
    .pipe(prefixer())
    .pipe(cleanCSS())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('css/'));
});
// Watch task //
gulp.task('watch', function() {
  'use strict';
  gulp.watch('scss/**/*.scss', ['init']);
});
// Compile sass into CSS & auto-inject into browsers //
gulp.task('sass', function() {
  'use strict';
  return gulp.src("scss/*.scss").pipe(sass()).pipe(gulp.dest("css"))
});
