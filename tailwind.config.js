/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/**/*.css',
  ],
  theme: {
    extend: {
      colors: {
        'dark-blue': '#2E6EAC',
        'orange': '#F58634',
        'dark-grey': '#373435',
        'light-green': '#E0E7E0',
        'dark-green': '#2B411C',
        'yellow': '#FFCC29',
        'jacarta': '#2E6EAC',
        'jacarta-dark': '#1E4A7A',
      },
      fontFamily: {
        'gallant': ['Gallant', 'sans-serif'],
        'montserrat': ['Montserrat', 'sans-serif'],
        'georgia': ['Georgia', 'serif'],
        'futura-md-bt': ['Futura Md BT', 'sans-serif'],
      },
    },
  },
  plugins: [],
};