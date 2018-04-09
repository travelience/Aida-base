const mix = require('laravel-mix')
const ImageminPlugin = require('imagemin-webpack-plugin').default

mix.webpackConfig({
  plugins: [
    new ImageminPlugin({
      pngquant: {
        quality: '80'
      },
      test: /\.(jpe?g|png|gif|svg)$/i
    })
  ]
})

mix.setPublicPath('public')
mix.js('assets/js/app.js', 'public/js', { outputStyle: 'compressed' })
mix.sass('assets/sass/app.scss', 'public/css', { outputStyle: 'compressed' })
mix.copy('assets/img', 'public/img', true)
mix.version()

// options
mix.options({
  processCssUrls: true
})
