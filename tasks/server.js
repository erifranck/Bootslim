export default (gulp, $) => {
  gulp.task('server', ['watch'], () =>
    $.shell('php -S localhost:8888 public/index.php')
  );
}
