export default (gulp, $, onError,browsersync) => {
  gulp.task('server', ['watch'], () =>
    gulp.src('')
      .pipe($.shell('php -S localhost:8888'))
      .pipe(browsersync.init({proxy: 'localhost:8888' }))
  );
}
