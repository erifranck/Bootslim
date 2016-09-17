export default (gulp, $, onError) => {
  gulp.task('browserify', () =>
    gulp.src('src/assets/js/**/*.js')
    .pipe($.browserify({
      transform: ['babelify'],
      extensions: ['.js', '.jsx']
    }).on('error', onError))
      .pipe($.notify('success browserify'))
      .pipe(gulp.dest('resources/static/js'))
  );
}
