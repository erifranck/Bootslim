export default (gulp, $, onError, browsersync) => {
  gulp.task('browserify', () =>
    gulp.src('src/assets/js/**/*.js')
      .pipe($.plumber())
      .pipe($.browserify({
        transform: ['babelify'],
        extensions: ['.js', '.jsx']
      }).on('error', onError))
      .pipe(gulp.dest('public/static/js'))
  );
}
