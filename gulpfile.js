var gulp = require('gulp');
var ejs = require('gulp-ejs');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var cssnext = require('postcss-cssnext');

gulp.task('ejs', function() {
  gulp.src([ 'dev/ejs/**/*.ejs','!' + 'dev/ejs/**/_*.ejs'])
  .pipe(ejs())
  .pipe(rename({
    extname: '.html'
  }))
  .pipe(gulp.dest('static'))
});

gulp.task('sass', function() {
  var processors = [
      cssnext()
  ];
  return gulp.src('dev/sass/**/*.scss')
    .pipe(sass())
    .pipe(postcss(processors))
    .pipe(gulp.dest('static/aseets/css/'))
});

gulp.task('watch', function(){
  gulp.watch('./dev/ejs/**/*.ejs', ['ejs']);
  gulp.watch('./dev/sass/**/*.scss', ['sass']);
});

gulp.task('default', ['ejs', 'sass']);
