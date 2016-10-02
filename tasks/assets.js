export default (gulp, $) => {
  gulp.task('copy',() =>
    gulp.src([ './bower_components/font-awesome/fonts/fontawesome-webfont.*',
      './bower_components/bootstrap-sass-official/assets/fonts/bootstrap/*.*'])
      .pipe(gulp.dest('public/static/fonts/'))
  );
}
