export default (gulp, $, onError, browsersync) => {
  gulp.task('watch', ['copy'], () => {
    gulp.watch(['./src/assets/sass/**/*.scss', './src/assets/sass/**/*.sass'],['sass'] );
    gulp.watch(['./src/assets/js/**/*.js'],['browserify', () => browsersync.reload()] );
    gulp.watch(['./resources/**/*.twig'], () => browsersync.reload());
  });
}
