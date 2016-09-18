export default (gulp, $) => {
  gulp.task('server', ['watch'], () =>
    gulp.src('')
      .pipe($.shell('php -S localhost:8888'))
  );
}
