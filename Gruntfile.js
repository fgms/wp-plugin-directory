module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less: {
      development: {
        options: {
            paths: ['assets/less/mixins','assets/less'],
          compress: false,
          yuicompress: false,
          syncImport: true,
          strictImports: true
        },
        files: {
          "assets/css/style.css": "assets/less/style.less" // destination file and source file
        }
      }
    },
    watch: {
      scripts: {
        files: ['assets/less/**/*.less'],
        tasks: ['less'],
        options: {
          spawn: false,
        },
      },
    },
  });
  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  // Default task(s).
  grunt.registerTask('default', ['less']);
};
