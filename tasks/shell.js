export default (gulp, $) => {
  gulp.task('migrate',() =>
    gulp.src('')
      .pipe($.shell(' php vendor/bin/phinx migrate -c config-phinx.php -e dev '))
  );
  gulp.task('mkMigration',() =>
    gulp.src('')
      .pipe($.shell(`php vendor/bin/phinx create ${process.argv.a} -c config-phinx.php ` ))
  );
  gulp.task('mg', ['migrate', 'mkMigration'])
}
