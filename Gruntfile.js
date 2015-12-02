module.exports = function(grunt) {

    grunt.initConfig({
		concat: {
			css: {
					src: [
						'bower_components/bootstrap/dist/css/bootstrap.min.css', 'bower_components/font-awesome/css/font-awesome.min.css',
						'bower_components/ionicons/css/ionicons.min.css',
						'bower_components/admin-lte/dist/css/AdminLTE.min.css',
						'bower_components/admin-lte/plugins/iCheck/square/blue.css'
					],
					dest: 'assets/css/main.css'
				},
			js: {
					src: [
						'bower_components/jquery-legacy/dist/jquery.min.js',
						'bower_components/bootstrap/dist/js/bootstrap.min.js',
						'bower_components/admin-lte/plugins/iCheck/icheck.min.js'
					],
					dest: 'assets/js/app.js'
				}
		},
		uglify: {
			dist: {
				src: 'assets/js/app.js',
				dest: 'assets/js/app.min.js'
			}
		},
		cssmin: {
			dist: {
				src: 'assets/css/main.css',
				dest: 'assets/css/main.min.css'
			}
		},
		jsmin: {
			dist: {
				src: 'assets/js/app.s',
				dest: 'assets/js/app.min.js'
			}
		},
		clean: [
			'assets'
		],	
    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', ['clean','concat', 'uglify', 'cssmin']);
};