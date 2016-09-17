export default (gulp, $) => {
  gulp.task('sass', () =>
    gulp.src('./src/assets/sass/*.scss')
      .pipe($.sass())
      .pipe(gulp.dest('resources/static/css')));
}
