var gulp	= require("gulp");
var del		= require("del");
var $    	= require("gulp-load-plugins")();

gulp.task("clean-css", function() {
	return del([
		"dist/css/app.css"
	]);
});

gulp.task("clean-js", function() {
	return del([
		"dist/js/app.js"
	]);
});

gulp.task("sass", ["clean-css"], function() {
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

//TODO: Add script minification
gulp.task("scripts", ["clean-js"], function() {
	return gulp.src(["src/js/app.js", "src/js/utilities.js"])
		//Output the JS
		.pipe(gulp.dest("dist/js"));
});


//Gulp watch task
gulp.task("watch", ["sass", "scripts", "fonts"], function() {
	gulp.watch("src/scss/*.scss", ["sass"]);
	gulp.watch("src/js/*.js", ["scripts"]);
});

//Default gulp task
gulp.task("default", ["watch"]);
