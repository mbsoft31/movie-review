module.exports = {
  theme: {
    extend: {
        container: {
            center: true,
        },
        colors:{
            'primary': '#00BCD4',
            'primary-o-25': 'rgba(0, 188, 212, .25)',
            'primary-o-50': 'rgba(0, 188, 212, .50)',
            'primary-o-75': 'rgba(0, 188, 212, .75)',
            'primary-o-100': 'rgba(0, 188, 212, 1)',
        },
        opacity: {
            '10': '.1',
            '20': '.2',
            '30': '.3',
            '40': '.4',
            '50': '.5',
            '60': '.6',
            '70': '.7',
            '80': '.8',
            '90': '.9',
        },
        spacing: {
            '72': '18rem',
            '80': '20rem',
            '88': '22rem',
            '96': '24rem',
            '104': '26rem',
            '112': '28rem',
            '120': '30rem',
            '128': '32rem',
        },
        aspectRatio: { // defaults to {}
            'none': 0,
            'square': [1, 1], // or 1 / 1, or simply 1
            '16/9': [16, 9],  // or 16 / 9
            '4/3': [4, 3],    // or 4 / 3
            '21/9': [21, 9],  // or 21 / 9
        },
    },
  },
  variants: {
      aspectRatio: ['responsive'],
  },
  plugins: [
      require('tailwindcss-aspect-ratio')
  ],
}
