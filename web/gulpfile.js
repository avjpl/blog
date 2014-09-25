// include gulp
var gulp = require('gulp');

var compass = require('gulp-compass');

var watchSassFiles = [
    'sass/partials/*.scss'
];

gulp.task('compass', function() {
    gulp.src(watchSassFiles)
        .pipe(compass({
            config_file: './config.rb',
            css: 'css',
            sass: 'sass'
        }))
        .pipe(gulp.dest('./css'));
});

gulp.task('default', ['compass'], function() {
    // watch for any sass changes
    gulp.watch(watchSassFiles, function() {
        gulp.run('compass');
    });
});