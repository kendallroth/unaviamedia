var gulp	= require("gulp");
var gutil	= require("gulp-util");
var $    	= require("gulp-load-plugins")();

gulp.task("sass", function() {
	return gulp.src("src/scss/app.scss")
		//Compile the SCSS to CSS
		.pipe($.sass({
			includePaths: [
				"bower_components/foundation-sites/scss",
				"bower_components/motion_ui/src",
				"bower_components/foundation-icon-fonts"
			]
		}))
		//Add vendor prefixes to CSS
		.pipe($.autoprefixer({
			browsers: ["last 2 version"],
			cascade: false
		}))
		//Output the CSS
		.pipe(gulp.dest("dist/css"));
});

//Copy fonts to the output directory
gulp.task("fonts", function() {
	return gulp.src("bower_components/foundation-icon-fonts/**/*.{ttf,woff,eof,svg}")
		//Copy the fonts
		.pipe(gulp.dest("dist/css"));
});

//TODO: Add script concatenation and minification
gulp.task("scripts", function() {
	return gulp.src(["src/js/app.js", "src/js/utilities.js"])
		//Output the JS
		.pipe(gulp.dest("dist/js"));
});


//Gulp build task
gulp.task("build", ["sass", "scripts", "fonts"], function() {
	gutil.log("Building...");
});

//Gulp watch task
gulp.task("watch", ["sass", "scripts", "fonts"], function() {
	gulp.watch("src/scss/**/*.scss", ["sass"]);
	gulp.watch("src/js/**/*.js", ["scripts"]);
});

//Default gulp task
gulp.task("default", ["build"]);
