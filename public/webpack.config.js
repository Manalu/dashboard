const path = require('path');

module.exports = {
  entry: {
    "customer/index": './src/customer/index.js',
    "order/index": './src/order/index.js',
    "home/index": './src/home/index.js',
    "revenue/index": './src/revenue/index.js'
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist')
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.styl$/,
        exclude: /node_modules/,
        use: ['style-loader', 'css-loader', 'stylus-loader'],
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: ['eslint-loader']
      }
    ]
  }
};
