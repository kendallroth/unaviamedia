var gulp = require("gulp");
var $    = require("gulp-load-plugins")();

gulp.task("sass", function() {
	setTimeout(function() {
		return gulp.src("src/scss/app.scss")
			//Compile the SCSS to CSS
			.pipe($.sass({
				includePaths: [
					"bower_components/foundation-sites/scss",
					"bower_components/motion_ui/src"
				]
			}))
			//Add vendor prefixes to CSS
			.pipe($.autoprefixer({
				browsers: ["last 2 version"],
				cascade: false
			}))
			//Output the CSS
			.pipe(gulp.dest("dist/css"));
	}, 500);
});

gulp.task("scripts", function() {
	return gulp.src(["src/app.js"])
		//Output the JS
		.pipe(gulp.dest("dist/js"));
});


//Gulp watch task
gulp.task("watch", ["sass", "scripts"], function() {
	gulp.watch("src/scss/*.scss", ["sass"]);
	gulp.watch("src/js*.js", ["scripts"]);
});

//Default gulp task
gulp.task("default", ["watch"]);
