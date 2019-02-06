'use strict';
const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const imagemin = require('gulp-imagemin');
const babel = require('gulp-babel');
const concat = require('gulp-concat');

sass.compiler = require('node-sass');

/* ----- Browser Sync ----- */
gulp.task('server', function() {
    browserSync.init({
        server: {
            baseDir: "./build"
        },
        port: 8080,
        open: true,
        notify: false
    });

    gulp.watch('build/**/*').on('change', browserSync.reload);
});

/* ----- SASS ----- */
gulp.task('sass', function(done) {
    return gulp.src('./src/style/public-style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['> .5%'],
            cascade: false
        }))
        .pipe(gulp.dest('./public/css'));
    done();
});

/* ----- Image Min ----- */
gulp.task('imagemin', function() {
    return gulp.src('src/img/**/*.*')
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({plugins: [{removeViewBox: true}]})
        ]))
        .pipe(gulp.dest('./public/assets/images'));
});

/* ----- Copy Fonts ----- */
gulp.task('copy:fonts', function() {
    return gulp.src('./src/fonts/**')
        .pipe(gulp.dest('./public/fonts'));
});

/* ----- Copy HTML ----- */
gulp.task('copy:html', function() {
    return gulp.src('./src/*.blade.php')
        .pipe(gulp.dest('./resources/views'));
});

/* ----- Copy JS ----- */
gulp.task('copy:js', function() {
    return gulp.src('./src/js/*.js')
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets:['@babel/env']
        }))
        .pipe(concat('all.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./public/js'));
});

/* ----- Copy in Build ----- */
gulp.task('copy', gulp.parallel('copy:fonts', 'copy:html', 'copy:js', 'imagemin'));

/* ----- Watchers ----- */
gulp.task('watch', function(){
    gulp.watch('./src/*.html', gulp.series('copy:html'));
    gulp.watch('./src/js/*.js', gulp.series('copy:js'));
    gulp.watch('./src/style/**/*.scss', gulp.series('sass'));
});

/* ----- Default ----- */
gulp.task('default', gulp.series(
    gulp.parallel('sass', 'copy'),
    gulp.parallel('watch', 'server')
));