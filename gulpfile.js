var elixir = require('laravel-elixir');

require('laravel-elixir-sass-compass');

elixir(function(mix) {
    mix.compass('../../scss/style.scss', 'public/css/', {
		style:"compressed",
		sass:"./resources/scss",
	})
    .scriptsIn('../../js','publicscript.js');
});
