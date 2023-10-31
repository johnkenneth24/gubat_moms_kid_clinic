const mix = require("laravel-mix");

mix
  .js("resources/js/app.js", "public/js")
  .copyDirectory("resources/assets", "public/assets");
