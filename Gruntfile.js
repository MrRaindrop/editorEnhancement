module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        banner: '/*!\n' +
            ' * <%= pkg.title %> v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
            ' * Copyright <%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
            ' * Licensed under <%= pkg.license.type %> (<%= pkg.license.url %>)\n' +
            ' */\n',
        uglify: {
            options: {
                banner: '<%= banner %>'
            },
            main: {
                src: 'src/<%= pkg.name %>.js',
                dest: 'dist/<%= pkg.title %>/<%= pkg.name %>.min.js'
            }
        },
        copy: {
            php: {
                expand: true,
                cwd: 'src/',
                src: '*.php',
                dest: 'dist/<%= pkg.title %>/'
            }
        }
    });

    // Load the plugins.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');

    // Default task(s).
    grunt.registerTask('default', ['uglify', 'copy']);

};
