const { dest, parallel, series, src, watch } = require('gulp')
const autoprefixer = require('gulp-autoprefixer')
const concat = require('gulp-concat')
const cond = require('gulp-if')
const csso = require('gulp-csso')
const del = require('del')
const sass = require('gulp-sass')
const less = require('gulp-less')
const sourcemaps = require('gulp-sourcemaps')
const terser = require('gulp-terser')

const paths = {
  less: {
    src: [
      './less/Digitalcollections.less'
    ],
    watch: './less/**/*.less',
    dest: '../Resources/Public/Styles/'
  },
  scss: {
    src: [
      './scss/main.scss'
    ],
    watch: './scss/**/*.scss',
    dest: '../Resources/Public/Styles/'
  },
  js: {
    src: [
      './node_modules/jquery/dist/jquery.min.js',
      './node_modules/jquery.cookiebar/jquery.cookieBar.min.js',
      './node_modules/lightcase/src/js/lightcase.js',
      './node_modules/swiper/js/swiper.min.js',
      './js/*.js'
    ],
    watch: './js/**/*.js',
    dest: '../Resources/Public/JavaScript/'
  }
}

let PRODUCTION = false

function setProduction (done) {
  PRODUCTION = true
  done()
}

function scss (done) {
  del([
    paths.scss.dest + 'main.css'
  ], {
    force: true
  })
  src(paths.scss.src)
    .pipe(cond(!PRODUCTION, sourcemaps.init()))
    .pipe(sass({
      outputStyle: 'compact'
    }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cond(!PRODUCTION, sourcemaps.write('.')))
    .pipe(cond(PRODUCTION, csso({
      restructure: true,
      comments: false
    })))
    .pipe(dest(paths.scss.dest))
  done()
}

function lessrun (done) {
  del([
    paths.less.dest + 'Digitalcollections.css'
  ], {
    force: true
  })
  src(paths.less.src)
    .pipe(less({
    }))
    .pipe(autoprefixer())
    .pipe(dest(paths.less.dest))
  done()
}

function js (done) {
  del([
    paths.js.dest + '*.*'
  ], {
    force: true
  })
  src(paths.js.src)
    .pipe(cond(!PRODUCTION, sourcemaps.init()))
    .pipe(concat('script.js'))
    .pipe(cond(PRODUCTION, terser({
      ecma: 6,
      mangle: true
    })))
    .pipe(cond(!PRODUCTION, sourcemaps.write('.')))
    .pipe(dest(paths.js.dest))
  done()
}

function observe () {
  watch(paths.scss.watch, scss)
  watch(paths.less.watch, lessrun)
  watch(paths.js.watch, js)
}

exports.default = series(
  parallel(
    scss, lessrun, js
  ),
  observe
)

exports.prod = series(
  setProduction,
  parallel(
    scss, lessrun, js
  )
)
