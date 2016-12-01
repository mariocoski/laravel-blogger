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
    mix.copy('./bower_components/list.pagination.js/dist/list.pagination.js','./resources/assets/js/libs/list.pagination.js')
    .copy('./node_modules/tinymce','./public/js/tinymce')
       .copy('./node_modules/toastr/build/toastr.css','./resources/assets/sass/toastr.css')
       .copy('./node_modules/rrssb/css/rrssb.css','./resources/assets/sass/rrssb.css')
       .sass(['toastr.css','app.scss','rrssb.css'],'./public/css/app.css')
       .sass('auth.scss')
       .webpack('app.js');
       //.semanticBuild();
});
