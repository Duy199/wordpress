module.exports = function (grunt) {
  // Cấu hình task
  grunt.initConfig({
    // Compile SCSS
    sass: {
      options: {
        implementation: require('sass'),
        sourceMap: true
      },
      dist: {
        files: {
          'assets/css/custom.css': 'assets/scss/style.scss'
        }
      }
    },

    // Minify CSS
    cssmin: {
      target: {
        files: {
          'assets/css/custom.min.css': ['assets/css/custom.css']
        }
      }
    },

    // Nối file JS
    concat: {
      dist: {
        src: [
          'assets/js/vendor/*.js',     // Vendor libs (GSAP, Swiper...)
          'assets/js/modules/*.js',    // Các module riêng
          'assets/js/custom.js'        // Main JS
        ],
        dest: 'assets/build/bundle.js'
      }
    },

    // Minify JS
    uglify: {
      build: {
        files: {
          'assets/build/bundle.min.js': ['assets/build/bundle.js']
        }
      }
    },

    // Watch SCSS & JS
    watch: {
      css: {
        files: ['assets/scss/**/*.scss'],
        tasks: ['sass', 'cssmin']
      },
      js: {
        files: ['assets/js/**/*.js'],
        tasks: ['concat', 'uglify']
      }
    }
  });

  // Load các plugin cần thiết
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Task mặc định
  grunt.registerTask('default', ['sass', 'cssmin', 'concat', 'uglify']);
};
