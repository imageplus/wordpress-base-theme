/**
 * Add all custom functionality into extend as otherwise classes may be overwritten
 * @link https://tailwindcss.com/docs/configuration
 */
module.exports = {
  purge: [], //see @link above "Removing unused CSS" section
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: "#000000",
        secondary: "#FFFFFF"
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
