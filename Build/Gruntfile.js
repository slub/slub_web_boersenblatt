


module.exports = function(grunt) {

    const sass = require('sass');

    require('jit-grunt')(grunt);

    grunt.initConfig({
        less: {
            development: {
                options: {
                    sourceMap: true,
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    "Resources/Public/Css/Digitalcollections.css" : "Build/less/Digitalcollections.less",
                }
            }
        },
        sass: {
            development: {
              options: {
                implementation: sass,
                sourcemap: false,
              },
              files: {
                'Resources/Public/Css/main.css': 'Build/scss/main.scss'
              }
            },
        },
        terser: {
            development: {
                options: {
                    compress: true,
                    output: {
                        comments: false
                    }
                },
                files: {
                        "Resources/Public/JavaScript/script.js" : [
                            'Build/node_modules/jquery/dist/jquery.min.js',
                            'Build/node_modules/jquery.cookiebar/jquery.cookieBar.min.js',
                            'Build/node_modules/lightcase/src/js/lightcase.js',
                            'Build/node_modules/swiper/js/swiper.min.js',
                            'Build/js/vendor/*.js',
                            'Build/js/*.js'
                        ],
                }
            }
        },
        watch: {
            sass: {
                files: ['Build/scss/**/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false
                }
            },
            styles: {
                files: ['Build/less/**/*.less'],
                tasks: ['less'],
                options: {
                    spawn: false
                }
            },
            js: {
                files: ['Build/js/*.js'],
                tasks: ['terser'],
                options: {
                    spawn: false
                }
            },
        }
    });
    grunt.file.setBase('../');
    grunt.registerTask('default', ['terser','sass', 'less','watch']);
};
