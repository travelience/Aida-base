const mix = require('laravel-mix')
const ImageminPlugin = require('imagemin-webpack-plugin').default
const tailwindcss = require('tailwindcss')
const path = require('path')
require('laravel-mix-purgecss')

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
  processCssUrls: false,
  postCss: [
    tailwindcss('./tailwind.js')
  ]
})

if (mix.inProduction()) {
  mix.purgeCss({
    enabled: true,
    globs: [
      path.join(__dirname, 'views/**/*.blade.php'),
      path.join(__dirname, 'assets/js/**/*.vue'),
      path.join(__dirname, 'assets/js/**/*.js')
    ],
    extensions: [
      'html',
      'js',
      'php',
      'vue'
    ]
  })
}else {
  mix.browserSync({
    proxy: 'aida-base.test',
    files: [
      'views/**/*.blade.php',
      'public/css/app.css'
    ]
  })
}
