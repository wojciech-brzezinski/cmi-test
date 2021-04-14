const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .addEntry('article', './assets/encore/article.ts')
    .addEntry('home', './assets/encore/home.ts')


    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .disableSingleRuntimeChunk()
    .enableTypeScriptLoader()
;

module.exports = Encore.getWebpackConfig();
