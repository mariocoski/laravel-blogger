const elixir = require('laravel-elixir');
const gulp  = require('gulp');

//this will build all dist from ./semantic/src/ and place it in public/assets/
const build = require('./semantic/tasks/build');
const Task = elixir.Task;
gulp.task('build', 'Builds all files from source',build);
elixir.extend('semanticBuild', () => {
     new Task('semanticBuild', () => {
         gulp.start('build');
     });
});

//run all essential tasks
elixir(mix => {
    mix.copy('./node_modules/list.pagination.js/dist/list.pagination.js','resources/assets/js/libs/list.pagination.js')
       .copy('./node_modules/tinymce','public/js/tinymce')
       .copy('./node_modules/croppie/croppie.min.js','public/js/croppie.min.js')
       .copy('./node_modules/rrssb/css/rrssb.css','resources/assets/sass/rrssb.css')
       .sass(['app.scss','rrssb.css'],'public/css/app.css')
       .webpack('app.js')
       .semanticBuild();
});
