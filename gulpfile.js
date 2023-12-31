const gulp = require("gulp");
const browserSync = require("browser-sync").create();
const gulpSass = require("gulp-sass");
const nodeSass = require("node-sass");
const sass = gulpSass(nodeSass);
const autoprefixer = require("gulp-autoprefixer");
const concat = require("gulp-concat"); 

function minSass() {
  return gulp
    .src("./scss/**/*.scss")
    .pipe(
      sass({
        outputStyle: "compressed",
      })
    )
    .pipe(
      autoprefixer({ 
        cascade: true,
      })
    )
    .pipe(concat("style.css"))
    .pipe(gulp.dest("assets/css/"))
    .pipe(browserSync.stream());
}
gulp.task("minsass", minSass);

function minJS() {
  return gulp
    .src(["./assets/js/main.js"])
    .pipe(concat("all.min.js"))
    .pipe(gulp.dest("assets/js/"))
    .pipe(browserSync.stream());
}
gulp.task("minjs", minJS);

function pluginJS() {
  return gulp
    .src([ 
      "lib/jquery/jquery.min.js",  
      "lib/aos/aos.js",  
      "lib/swiper/swiper.min.js",
    ])
    .pipe(concat("libs.js"))
    .pipe(gulp.dest("assets/js/"))
    .pipe(browserSync.stream());
}
gulp.task("libsjs", pluginJS);
 
function pluginCSS() {
  return gulp
  .src([ 
    'lib/aos/aos.css',
    "lib/swiper/swiper.min.css", 
  ])
  .pipe(concat('libs.css'))
  .pipe(gulp.dest('assets/css/'))
  .pipe(browserSync.stream());
}
gulp.task('libscss', pluginCSS);
  
function watch() {
  gulp.watch("./scss/*.scss", minSass);
  gulp.watch("assets/js/*.js", minJS);
  gulp.watch(["*.html"]).on("change", browserSync.reload);
}
gulp.task("watch", watch);
 
gulp.task(
  "default",
  gulp.parallel("watch", "libsjs", "libscss", "minjs", "minsass")
);
