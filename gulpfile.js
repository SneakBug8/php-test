var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function ()
{
    return gulp.src('assets/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('static/'));
});

gulp.task('sass:watch', function ()
{
    gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task("assets", function ()
{
    return gulp.src(['assets/**/*', "!assets/**/*.scss"])
        .pipe(gulp.dest('static/'));
})

exports.build = gulp.series("sass", "assets");