// Project configuration.
module.exports = function (grunt) {

grunt.initConfig({

  uglify: {
    my_target: {
      files: {
        'js/min/plugin.min.js': ['js/lightbox.js', 'js/bxslider.js', 'js/hc-scripts.js']
      }
    }
  },

  sass: {
      dev: {
        options: {
          style: 'compact',
          sourcemap: 'none'
        },
        files: {
          'css/style.css': 'scss/style.scss'
        }
      },
      live: {
        options: {
          style: 'compressed',
        },
        files: {
          'css/style.min.css': 'scss/style.scss'
        }
      }
    },

    autoprefixer: {
      options: {
        map: true
      },
      dist: {
        files: {
          'css/style.css': 'css/style.css',
          'css/style.min.css': 'css/style.min.css',
        }
      }
    },

    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['sass', 'autoprefixer'],
        options: {
          livereload: true,
        },
      },
      scripts: {
    files: ['js/*.js'],
    tasks: ['uglify']

  },

    },

});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('default', ['watch']);

};