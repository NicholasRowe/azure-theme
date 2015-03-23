module.exports = function(grunt) {

  // Global variables to create template paths

  var globalConfig = {
   images: 'images',
   styles: 'styles',
   fonts: 'fonts',
   scripts: 'js/vendor',
   bower_path: 'bower_components'
 };

  // https://github.com/gruntjs/grunt-contrib-copy
  // Copies files from the source dir to the distribution dir.
  grunt.loadNpmTasks('grunt-contrib-copy');

  // https://github.com/gruntjs/grunt-contrib-watch
  // Watches predefined files or paths and triggers actions on changes, updates or deletions.
  grunt.loadNpmTasks('grunt-contrib-watch');

  // https://github.com/Ensighten/spritesmith
  // Utility that takes image files and generates spritesheets and coordinate maps.
  grunt.loadNpmTasks('grunt-spritesmith');

  // https://github.com/gruntjs/grunt-contrib-sass
  // Compile Sass to CSS
  grunt.loadNpmTasks('grunt-sass');

  // https://github.com/gruntjs/grunt-contrib-jshint
  // Validates our Javascript files with JSHint. Very useful and a small life safer.
  grunt.loadNpmTasks('grunt-contrib-jshint');

  // -----------------------------------------
  //  Start this bad boy up...
  // -----------------------------------------
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // Sass task to include foundation and to compile our css
    sass: {
      options: {
        // includePaths: ['bower_components/foundation/scss']
        sourceMap: true
      },
      dist: {
        options: {
          outputStyle: 'nested' // this allows best viewing
        },
        files: {
          'css/global.css': 'scss/global.scss'
        }        
      }
    }, // End Sass

    // Please sir, can you watch my css files?
    watch: {
      options:
      {
        livereload: true
      },
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass']
      }
    }, // End Watch

    // Make us loads of pretty sprites please. Optimized for maximum efficiency for R.Carey.
    // For best packing, use binary-tree which uses a solution to the rectangle packing problem.
    // If you are worried about sprites being visible within other sprites, use alt-diagonal.
    sprite: {
      all: {
        src: 'images/sprites/*.png',
        destImg: 'images/sprites.png',
        destCSS: 'styles/scss/_sprites.scss',
        imgPath: '/images/sprites.png',
        'algorithmOpts': {
          'sort': 'binary-tree'
        },
      }
    }// End Sprite

  });

grunt.registerTask('build', ['sass']);
grunt.registerTask('default', ['build','watch']);

}