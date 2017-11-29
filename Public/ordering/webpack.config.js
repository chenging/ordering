const webpack = require('webpack');
const path = require('path');
// const HtmlWebpackPlugin = require('html-webpack-plugin');//字符串模板
const ExtractTextPlugin = require('extract-text-webpack-plugin');//拆分css样式为独立文件
module.exports = {
    entry: './main.js',
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'index.js'
    },
    module: {
        loaders: [
            {
                test: /\.(css|sass|scss)?$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader!autoprefixer-loader!sass-loader"),
                exclude: /node_modules/
            },
            {
                test: /\.(png|jpg|gif|svg|woff2?|eot|ttf)(\?.*)?$/,
                use: 'url-loader?limit=50000',
                exclude: /node_modules/
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                exclude: /node_modules/
            },
            {
                test: /\.js$/,
                loader: 'babel-loader?presets=es2015',
                exclude: /node_modules/,
                query:{
                    presets: ['es2015', 'stage-0'],  
                    plugins: ['transform-runtime']                      
                }
            },
        ]
    },
    plugins: [
        // new webpack.DefinePlugin({
        //     'process.env': {
        //       NODE_ENV: JSON.stringify('production')
        //     }
        //   }),
        // new webpack.optimize.UglifyJsPlugin(),//代码压缩插件，webpack自带,用于生成环境
        // new HtmlWebpackPlugin({
        //     template: './index.html'
        // })
    ]
}
