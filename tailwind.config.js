module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('tailwindcss-plugins/pagination')({
      /* Customizations here... */
  }),
  ], 
}