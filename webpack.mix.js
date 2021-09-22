const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix
	.js("resources/js/app.js", "assets/js")
	.sass("resources/scss/app.scss", "assets/css")
	.options({
		postCss: [ tailwindcss('./tailwind.config.js') ],
	})
	.sourceMaps();
