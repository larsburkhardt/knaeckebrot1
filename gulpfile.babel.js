
import gulp from 'gulp';
import yargs from 'yargs';
//import sass from 'gulp-sass';
//sass.compiler = require('sass');
const sass = require('gulp-sass')(require('sass'))

import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';

const server = browserSync.create();

const PRODUCTION = yargs.argv.prod;

const paths = {
    styles: {
        src: ['src/scss/styles.scss', 'src/scss/admin.scss', 'src/scss/editor.scss'], // hier für Woocommerce zweiten Pfad hinzufügen
        dest: 'dist/css'
    },
    images: {
        src: 'src/images/**/*.{jpg,jpeg,png,svg,gif}',
        dest: 'dist/images'
    },
    scripts: {
        src: ['src/js/knaeckebrot.js', 'src/js/admin.js'],
        dest: 'dist/js'
    },
    other: {
        src: ['src/**/*', '!src/{images, js, scss}', '!src/{images,js,scss}/**/*'],
        dest: 'dist'
    },
    package: {
        src: ['**/*', '!.vscode', '!node_modules{,/**}', '!packaged{,/**}', '!src{,/**}', '!.babelrc', '!.gitignore', '!gulpfile.babel.js', '!package-lock.json', '!package.json'],
        dest: 'packaged'
    }
}

// Browser Sync

export const serve = (done) => {
    server.init({
        proxy: "http://knaeckebrot1.local"
    });
    done();
}

export const reload = (done) => {
    server.reload();
    done();
}

// Clean up dist folder (gulp clean)

export const clean = () => del(['dist']);


// Style Task (gulp styles)

export const styles = () => {

    return gulp.src(paths.styles.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({ cascade: false, grid: true }))
        .pipe(gulpif(PRODUCTION, cleanCSS({ compatibility: 'ie8' })))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(server.stream());
}

// images task (gulp images)

export const images = () => {
    return gulp.src(paths.images.src)
        .pipe(gulpif(PRODUCTION, imagemin()))
        .pipe(gulp.dest(paths.images.dest));
}

// copy other folders (font etc) to dist (gulp copy)

export const copy = () => {
    return gulp.src(paths.other.src)
        .pipe(gulp.dest(paths.other.dest));
}

// scripts task (gulp scripts)

export const scripts = () => {
    return gulp.src(paths.scripts.src)
        .pipe(named())
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: ['@babel/preset-env'] //or ['babel-preset-env']
                            }
                        }
                    }
                ]
            },
            output: {
                filename: '[name].js'
            },
            externals: {
                jquery: 'jQuery'
            },
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            mode: PRODUCTION ? 'production' : 'development' //add this
        }))
        .pipe(gulp.dest(paths.scripts.dest));
}

// watch task (gulp watch)

export const watch = () => {
    gulp.watch('src/scss/**/*.scss', styles); // statt reload: .pipe(server.stream()) in Styles Task
    gulp.watch('src/js/**/*.js', gulp.series(scripts, reload));
    gulp.watch('**/*php', reload);
    gulp.watch(paths.images.src, gulp.series(images, reload));
    gulp.watch(paths.other.src, gulp.series(copy, reload));
}

// The Tasks for Development and Production

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));

export default dev; // run 'gulp dev' for development default task 
// package.json-- > Development: 'npm run start', Build: 'npm run build'


// Zip Task for theme bundle (siehe auch const paths) (gulp compress)

export const compress = () => {
    return gulp.src(paths.package.src)
        .pipe(replace('knaeckebrot', info.name)) // info.name = Themenamenamen anpassen in package.json!! Siehe import Zeile 27
        .pipe(zip(`${info.name}.zip`))
        .pipe(gulp.dest(paths.package.dest));
}

// Bundle Task (siehe auch package.json "scripts") --> "npm run bundle"

export const bundle = gulp.series(build, compress)