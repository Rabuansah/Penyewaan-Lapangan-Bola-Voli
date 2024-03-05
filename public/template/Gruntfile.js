module.exports = function(grunt) {
    grunt.initConfig({
		sass: {			
            dist: {
				options: {
					outputStyle: 'compressed'
				},
                files: [{
                    'assets/css/demo.css': 'assets/scss/demo.scss', 	                        /* 'Demo SCSS' */
                    'assets/css/main.css': 'assets/scss/main.scss', 	                        /* 'All main SCSS' */
                    'assets/css/dark.css': 'assets/scss/dark.scss', 	                        /* 'All main SCSS' */
                    'assets/css/rtl.css': 'assets/scss/rtl.scss', 	                        /* 'All main SCSS' */

                    'assets/css/blog.css': 'assets/scss/pages/blog.scss', 				        /* 'Blog App SCSS to CSS'   */
				}]
            }
        },  
        uglify: {
            my_target: {
                files: {
                    'assets/bundles/libscripts.bundle.js': ['assets/vendor/jquery/jquery-3.3.1.min.js', 'assets/vendor/bootstrap/js/popper.min.js','assets/vendor/bootstrap/js/bootstrap.bundle.js'], /* main js*/                    
                    'assets/bundles/vendorscripts.bundle.js': ['assets/vendor/metisMenu/metisMenu.js','assets/vendor/bootstrap-select/js/bootstrap-select.min.js'], /* coman js*/
                                        
                    //'assets/bundles/mainscripts.bundle.js':['assets/js/core.js'], /*coman js*/
                    'assets/bundles/c3.bundle.js':['assets/vendor/charts-c3/js/c3.min.js', 'assets/vendor/charts-c3/js/d3.v3.min.js'],                    

                    'assets/bundles/fullcalendarscripts.bundle.js': ['assets/vendor/fullcalendar/moment.min.js', 'assets/vendor/fullcalendar/fullcalendar.min.js'],   /* calender page js */
                    'assets/bundles/summernote.bundle.js':['assets/vendor/summernote/dist/summernote.js'],
                    'assets/bundles/markdown.bundle.js':['assets/vendor/markdown/markdown.js','assets/vendor/markdown/to-markdown.js','assets/vendor/markdown/bootstrap-markdown.js'],
                    'assets/bundles/datatablescripts.bundle.js': ['assets/vendor/jquery-datatable/jquery.dataTables.min.js','assets/vendor/jquery-datatable/dataTables.bootstrap4.min.js'], /* Jquery DataTable Plugin Js  */

                    //'assets/bundles/echarts.bundle.js':['assets/vendor/echart/echarts.min.js'],
                    'assets/bundles/jvectormap.bundle.js': ['assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js','assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js'],
                }
            }
        }                      
    });
    grunt.loadNpmTasks("grunt-sass");
    grunt.loadNpmTasks('grunt-contrib-uglify');
    
    grunt.registerTask("buildcss", ["sass"]);
    grunt.registerTask("buildjs", ["uglify"]);
};
