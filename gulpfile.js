// Importerar Gulp-metoder 
const {
    src,
    dest,
    watch,
    series,
    parallel
} = require('gulp');

// Importerar Gulp-plugins
const concat = require('gulp-concat'),
    csso = require('gulp-csso'),
    connect = require('gulp-connect'),
    clean = require('gulp-clean-fix'),
    terser = require('gulp-terser'),
    sass = require('gulp-sass'),
    babel = require('gulp-babel');

sass.compiler = require('node-sass');

// Sökvägar
const paths = {
    allFiles: 'src/**/*.*',
    htmlFiles: 'src/**/*.html',
    phpFiles: 'src/**/*.php',
    imageFolder: 'src/img/*.*',
    cssFiles: 'src/**/*.css',
    jsFiles: 'src/**/*.js',
    educationJs: 'src/js/education.js',
    employmentJs: 'src/js/employment.js',
    projectJs: 'src/js/project.js',
    popperJs: 'src/js/lib/popper.js',
    scssFiles: 'src/scss/*.scss',
    mainCSS: 'src/css/style.css',
    htAccess: 'src/.htaccess',
    cssLibraries: 'src/lib/*.css'
};

// Spinnar upp en server och skapar en lyssnare för olika typer av filer och uppgifter
function watchTask() {
    watch([paths.allFiles, paths.htmlFiles, paths.phpFiles, paths.imageFolder, paths.cssFiles, paths.jsFiles, paths.educationJs, paths.employmentJs, paths.projectJs, paths.popperJs, paths.scssFiles, paths.cssLibraries, paths.htAccess],
        parallel(copyHTML, copyPHP, copyImages, copyHtAccess, compileToSCSS, copyCSSLibraries, copyJSLibraries, jsTask));
    connect.server({
        root: 'pub',
        livereload: true
    });
}

// Kopierar HTML-filer till pub och laddar om webbläsaren
function copyHTML() {
    return src(paths.htmlFiles)
        .pipe(dest('pub'))
        .pipe(connect.reload());
}

function copyPHP() {
    return src(paths.phpFiles)
        .pipe(dest('pub'))
        .pipe(connect.reload());
}

function copyHtAccess() {
    return src(paths.htAccess)
        .pipe(dest('pub'))
}

// Kopierar bilder till pub och laddar om webbläsaren
function copyImages() {
    return src(paths.imageFolder)
        .pipe(dest('pub/img'))
        .pipe(connect.reload());
}

// Rensar pub-katalogen initialt
function cleanPub() {
    return src('pub')
        .pipe(clean());
}

// Konkatenerar och minifierar JS-filer och laddar om webbläsaren
function jsTask() {
    return src([paths.educationJs, paths.employmentJs, paths.projectJs])
        .pipe(concat('main.js'))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(terser())
        .pipe(dest('pub/js'))
        .pipe(connect.reload());
}

function copyJSLibraries() {
    return src([paths.popperJs])
        .pipe(dest('pub/js/lib'))
        .pipe(connect.reload());
}

// Konkatenerar SCSS-filerna, kompilerar SCSS till CSS, minifierar CSS-produkten och distribuerar filen i den publika CSS-katalogen
function compileToSCSS() {
    return src(paths.scssFiles)
        .pipe(sass().on('error', sass.logError))
        .pipe(csso())
        .pipe(concat('main.css'))
        .pipe(dest('pub/css'))
        .pipe(connect.reload());
}

function copyCSSLibraries() {
    return src(paths.cssLibraries)
        .pipe(dest('pub/lib'))
        .pipe(connect.reload());
}

// Rad av uppgifter som körs vid "gulp"-kommandot
exports.default = series(
    cleanPub,
    copyHTML,
    copyPHP,
    copyImages,
    copyHtAccess,
    compileToSCSS,
    copyCSSLibraries,
    copyJSLibraries,
    jsTask,
    watchTask
);