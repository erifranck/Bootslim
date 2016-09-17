export default (gulp, $, onError) => {
  gulp.task('sass', () =>
    gulp.src('src/assets/sass/*.scss')
      .pipe($.sass().on('error', onError))
      .pipe(gulp.dest('public/static/css')));
}
