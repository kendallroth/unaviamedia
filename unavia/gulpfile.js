var gulp = require('gulp');
var $    = require('gulp-load-plugins')();

var sassPaths = [
  'bower_components/foundation-sites/scss',
  'bower_components/motion-ui/src'
];

gulp.task("sass", function() {
	setTimeout(function() {
		return gulp.src("src/scss/app.scss")
			//Compile the SCSS to css
			.pipe($.sass({includePaths: [
				"bower_components/foundation-sites/scss",
				"bower_components/motion_ui/src"
			]}))
			//Rename the compiled CSS file - UNNEEDED
			//.pipe($.rename("app.css"))
			//Automatically add vendor prefixes to CSS
			.pipe($.autoprefixer({
				browsers: ["last 2 version"],
				cascade: false
			}))
			//Output the CSS
			.pipe(gulp.dest("dist/css/"));
	}, 500);
});

gulp.task("scripts", function() {
	return gulp.src(["src/js/app.js"])
		//Output the JS
		.pipe(gulp.dest("dist/js"));
});

gulp.task("images", function() {
	return gulp.src("src/images/*")
		.pipe(gulp.dest("dist/images"));
});

gulp.task("icons", function() {
	return gulp.src("src/icons/*")
		.pipe(gulp.dest("dist/icons"));
});

//Gulp watch task
gulp.task("watch", ["sass", "scripts"], function() {
	gulp.watch("src/scss/*.scss", ["sass"]);
	gulp.watch("src/js/*.js", ["scripts"]);
});

//Default gulp task
gulp.task("default", ["watch"]);

/*gulp.task('sass', function() {
  return gulp.src('scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('css'));
});*/

//gulp.task('default', ['sass'], function() {
//  gulp.watch(['scss/**/*.scss'], ['sass']);
//});
