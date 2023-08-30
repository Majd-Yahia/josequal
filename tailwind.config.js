import preset from './vendor/filament/support/tailwind.config.preset'
import { interpolateColor } from 'tailwindcss/lib/util/interpolateColor';

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
          colors: {
            primary: {
                50: '#E3F8FF',
                100: '#B3ECFF',
                200: '#81DEFD',
                300: '#5ED0FA',
                400: '#40C3F7',
                500: '#02BCE2',
                600: '#00A4C7',
                700: '#008AA5',
                800: '#007D8A',
                900: '#005670',
              },
              secondary: {
                50: '#E4F3F7',
                100: '#BCDEE8',
                200: '#92C9D8',
                300: '#6DB4C9',
                400: '#4D9AB0',
                500: '#012D47',
                600: '#00456B',
                700: '#005C8E',
                800: '#0071B1',
                900: '#0085D4',
              },
          },
        },
      },
}
