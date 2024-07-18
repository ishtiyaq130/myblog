/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
        colors: {
            primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
          },
          gridTemplateColumns: {
            // Simple 16 column grid
            '16': 'repeat(16, minmax(0, 1fr))',

            // Complex site-specific column configuration
            'footer': '200px minmax(900px, 1fr) 100px',
          }
    },
  },
  plugins: [],
}

