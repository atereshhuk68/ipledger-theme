/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
const { src, parallel, watch, dest } = require("gulp");
const _sass = require('gulp-sass')(require('sass'));
const _autoprefixer = require("gulp-autoprefixer");
const _webpack = require("webpack-stream");
require('dotenv').config();
const path = require('path');
const TerserPlugin = require("terser-webpack-plugin");

const args = require('yargs').argv;

const mode = args.mode || null;

//* Webpack Mode
let isDev = null;

if (mode) {
	isDev = false;
} else {
	isDev = true;
}

//* Конвертация стилей
const sassScss = () => {
	return src("source/scss/*.scss")
		.pipe(
			_sass({
				includePaths: ["source/assets/scss"],
				errLogToConsole: isDev,
				outputStyle: isDev ? "expanded" : "compressed",
			})
		)
		.pipe(_autoprefixer())
		.pipe(dest("./"));
};
exports.styles = parallel(sassScss);
//* Webpack Mode

//* Webpack Config
let webpackConf = {
	entry: {
		all: path.resolve(__dirname, 'source/js/index.js'),
		["virtual-select"]: path.resolve(__dirname, 'source/js/vs.js'),
		sliders: path.resolve(__dirname, 'source/js/sliders.js')
	},
	watch: isDev,
	mode: isDev ? 'development' : 'production',
	devtool: isDev ? 'source-map' : false,
	output: {
		filename: '[name].js',
		path: path.join(__dirname, 'assets/js/'),
		publicPath: '/'
	},
	module: {
		rules: [{
			test: /\.m?js$/,
			exclude: /node_modules/,
			use: {
				loader: "babel-loader",
				options: {
					presets: ["@babel/preset-env"],
					comments: false,
					compact: !isDev,
					ignore: [
						"source/assets/js/libs"
					]
				}
			},
		}, ],
	},
	optimization: {
		minimize: !isDev,
		minimizer: [new TerserPlugin()],
		mergeDuplicateChunks: !isDev,
		splitChunks: {
			cacheGroups: {
				vendor: {
					name: 'vendors',
					test: /[\\/]node_modules[\\/](swiper)[\\/]/,
					chunks: 'all'
				}
			}
		}
	},
};
const jsTask = () => {
	return src("source/js/index.js")
		.pipe(_webpack(webpackConf))
		.pipe(dest("assets/js/"));
};
exports.js = jsTask;

//* Watch
const startWatch = () => {
	watch("source/scss/**/*.scss", sassScss);
};
//? Задача для работы
exports.default = parallel(sassScss, startWatch, jsTask);
// exports.default = parallel(sassScss, startWatch, cssBundle);
