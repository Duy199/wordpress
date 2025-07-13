const sass = require('sass'); // 👈 import sass từ package

module.exports = function(grunt) {
  grunt.initConfig({
    sass: {
      options: {
        implementation: sass, // 👈 add dòng này
        sourceMap: false
      },
      dist: {
        files: {
          'assets/build/style.min.css': 'assets/scss/style.scss'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/build/js/custom.min.js': [
            'assets/js/custom.js'
          ]
        }
      }
    },
    watch: {
      css: {
        files: ['assets/scss/**/*.scss'],
        tasks: ['sass']
      },
      js: {
        files: ['assets/js/**/*.js'],
        tasks: ['uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['sass', 'uglify']);
};
