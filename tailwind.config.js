// module.exports = {
//   purge: [
//     './resources/views/**/*.blade.php',
//     './resources/css/**/*.css',
//   ],
//   theme: {
//     extend: {}
//   },
//   variants: {},
//   plugins: [
//     require('@tailwindcss/ui'),
//   ]
// }

module.exports = {
  content: [
    './resources/views/**/*.blade.php', // Adjust paths based on your project structure
    './resources/js/**/*.js',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}