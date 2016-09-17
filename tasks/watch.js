export default (gulp, $) => {
  gulp.task('watch', () => {
    gulp.watch(['./src/assets/sass/**/*.scss', './src/assets/sass/**/*.sass'],['sass'] );
    gulp.watch(['./src/assets/js/**/*.js'],['browserify'] );
  });
}
