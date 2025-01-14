/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php", 
        "./src/**/*.{html,js}",
        "node_modules/preline/dist/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
      extend: {},
    },
    plugins: [
        require('preline/plugin'),

    ],
  };
