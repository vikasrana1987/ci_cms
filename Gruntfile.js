module.exports = function(grunt) {

    grunt.initConfig({
		concat: {
			css: {
					src: [
						'bower_components/bootstrap/dist/css/bootstrap.min.css', 'bower_components/font-awesome/css/font-awesome.min.css',
						'bower_components/ionicons/css/ionicons.min.css',
						'bower_components/admin-lte/dist/css/AdminLTE.min.css',
						'bower_components/admin-lte/dist/css/skins/_all-skins.min.css',
						'bower_components/admin-lte/plugins/iCheck/square/blue.css',
						'bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
						'src/css/custom.css'
					],
					dest: 'assets/css/main.css'
				},
			js: {
					src: [
						'bower_components/jquery-legacy/dist/jquery.min.js',
						'bower_components/bootstrap/dist/js/bootstrap.min.js',
						'bower_components/admin-lte/plugins/iCheck/icheck.min.js',
						'bower_components/admin-lte/plugins/fastclick/fastclick.js',
						'bower_components/admin-lte/dist/js/app.min.js',
						'bower_components/admin-lte/plugins/sparkline/jquery.sparkline.min.js',
						'bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
						'bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
						'bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js',
						'bower_components/admin-lte/plugins/chartjs/Chart.min.js',
						'bower_components/admin-lte/dist/js/pages/dashboard2.js',
						'bower_components/admin-lte/dist/js/demo.js',
						'bower_components/jquery-validation/dist/jquery.validate.min.js',
						'src/js/custom.js'
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
		}/* ,
		clean: [
			'assets'
		] */	
    });

    //grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', [/* 'clean', */'concat', 'uglify', 'cssmin']);
};