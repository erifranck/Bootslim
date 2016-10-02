export default function (gulp, $, onError, browsersync){
  gulp.task('sass', function() {
     return gulp.src('src/assets/sass/*.scss')
        .pipe($.plumber())
        .pipe($.sass().on('error', onError))
        .pipe(browsersync.stream())
        .pipe(gulp.dest('public/static/css'));
  })
}
