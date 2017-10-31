const path = require('path');
const HtmlPlugin= require('html-webpack-plugin')
const UglifyJsPlugin= require('Uglifyjs-webpack-plugin')
const ExtractTextPlugin=require("extract-text-webpack-plugin")
const glob=require('glob');
const PurifyCSSPlugin = require("purifycss-webpack");
const webpack=require('webpack')
const entry = require('./webpack_config/entry_config.js')
const CopyWebpackPlugin = require('copy-webpack-plugin')
module.exports={
    entry:entry,
    output:{
        path:path.resolve(__dirname,'dist'),
        filename:'[name].js',
        publicPath:'http://127.0.0.1:8081/'
    },
    module:{
        rules:[
            {
                test:/\.css$/,
                //use:['style-loader','css-loader']
                use:ExtractTextPlugin.extract({
                    fallback:"style-loader",
                    use:[{
                        loader:"css-loader",
                        options:{importLoaders:1},
                },'postcss-loader']


                })
            },{
                test:/\.(png|jpg|gif)/,
                use:[{
                    loader:'url-loader',
                    options:{
                        limit:500,
                        outputPath:'images/'
                    }
                }]
            }, {
                test:/\.scss$/,
                use:ExtractTextPlugin.extract({
                    fallback:"style-loader",
                    use:[{loader:"css-loader"}, {loader:"sass-loader"}]
                })
            }, {
                test:/\.(js|jsx)$/,
                use:{
                    loader:'babel-loader',
                    options:{
                        presets:['env','react']
                    }
                }
            }
        ]
    },
    plugins:[
        new HtmlPlugin({
            minify:{
                removeAttributeQuotes:true
            },
            hash:true,
            template:'./src/index.html'
        }),
        // new UglifyJsPlugin(),
        new ExtractTextPlugin("css/[name].css"),
        // new PurifyCSSPlugin({
        //     paths:glob.sync(path.join(__dirname,'src/*.html')),
        // }),
        new webpack.BannerPlugin('chen'),
        new webpack.ProvidePlugin({
            $:"jquery"}),
        new webpack.optimize.CommonsChunkPlugin({
            name:['jquery','vue'],
            filename:"assets/js/[name].js",
            minChunks:2
        })
        // new CopyWebpackPlugin([{
        //     from : __dirname + '/src/public',
        //     to : './public'
        // }])
    ],
    devServer:{
        contentBase:path.resolve(__dirname,'dist'),
        host:'127.0.0.1',
        compress:true,
        port:8081

    },
    watchOptions:{
        poll:1000,
        aggregeateTimeout:500,
        ignore:/node_modules/
    }
}