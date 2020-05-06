const autoprefixer = require('gulp-autoprefixer'),
browserSync = require('browser-sync').create(),
cleanCSS = require('gulp-clean-css'),
connect = require('gulp-connect-php'),
gulp = require('gulp'),
rename = require('gulp-rename'),
sass = require('gulp-sass'),
sourcemaps = require('gulp-sourcemaps'),
uglify = require('gulp-uglify');

function scriptsLibraries() {
	return gulp.src([
			'node_modules/jquery/dist/jquery.min.js',
			'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
			'node_modules/smooth-scroll/dist/smooth-scroll.min.js',
			'node_modules/isotope-layout/dist/isotope.pkgd.min.js'
		])
		.pipe(gulp.dest('assets/js'))
		.pipe(browserSync.stream());
}

function styles() {
	return gulp.src([
			'src/scss/styles.scss'
		])
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(cleanCSS())
		.pipe(rename({suffix: ".min"}))
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest('assets/css'))
		.pipe(browserSync.stream());
}

function scripts() {
	return gulp.src([
			'src/js/main.js'
		])
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(rename({suffix: '.min'}))
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest('assets/js'))
		.pipe(browserSync.stream());
}

function watch() {
	browserSync.init({
		server: {
			baseDir: './'
		}
	});
	gulp.watch('src/scss/**/*.scss', styles);
	gulp.watch('src/js/**/*.js', scriptsLibraries);
	gulp.watch('src/js/**/*.js', scripts);
	gulp.watch('./*.html').on('change', browserSync.reload);
}

exports.scriptsLibraries = scriptsLibraries;
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;