
module.exports = {
  purge: [
    './resources/views/components/category-dropdown.blade.php',
    './resources/views/components/category-dropdownn.blade.php',
    './resources/views/components/dropdown-item.blade.php',
    './resources/views/components/dropdown-itemm.blade.php',
    './resources/views/components/dropdown.blade.php',
    './resources/views/components/dropdownn.blade.php',
    './resources/views/components/icon.blade.php',
    './resources/views/components/investigator-featured-card.blade.php',
    './resources/views/components/investigators-grid.blade.php',
    './resources/views/components/layout.blade.php',
    './resources/views/components/navbar.blade.php',
    './resources/views/investigators/index.blade.php',
    './resources/views/investigators/searcher.blade.php',
    './resources/views/investigators/show.blade.php',
    './resources/js/app.js',
    './resources/js/bootstrap.js'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        minWidth: {

            '0': '0',

            '1/4': '25%',

            '1/2': '50%',

            '3/4': '75%',

            'full': '100%',
           },
        maxWidth: {

            '1/4': '25%',

            '1/2': '50%',

            '3/4': '75%',

            '3/8': '37.5%',
           },
        colors: {
            'color': {
                'azul': '#141D26',
                'dorado': '#866716',
                'gris': '#B8B8B8',
                'gris-claro': '#E8E6E6',
                'gris-clarote': '#EFEDED',
                'links': '#416AFF',
                'fondo': '#F8F8F8',
                'footer': '#38393B',
                'iconito': '#989898',
              },
          },
          fontFamily: {
            open: ['Open Sans'],
            merri: ['Merriweather'],
          },

    },
  },
  variants: {
    extend: {
        backgroundColor: ['checked'],
        borderColor: ['checked'],
    },
  },
  plugins: [],
}
