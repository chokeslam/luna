/**
 * Part of fusion project.
 *
 * @copyright  Copyright (C) 2018 Asikart.
 * @license    MIT
 */

const fusion = require('windwalker-fusion');

// The task `js`
fusion.task('js', function () {
  // Watch start
  fusion.watch([
    'asset/src/**/*.js',
  ]);
  // Watch end

  fusion.babel('asset/src/**/*.js', 'src/Resources/asset/js/');
  // Compile end
});

// The task `vue`
fusion.task('vue', function () {
  // Watch start
  fusion.watch([
    'asset/vue/**/*',
  ]);
  // Watch end

  // Compile Start
  fusion.vue('asset/vue/entries/**/*.js', 'src/Resources/asset/js/');
  // Compile end
});

// The task `css`
fusion.task('css', function () {
  // Watch start
  fusion.watch([
    'asset/scss/**/*.scss'
  ]);
  // Watch end

  // Compile Start
  fusion.sass('asset/scss/**/*.scss', 'src/Resources/asset/css/', { rebase: false });
  // Compile end
});

// The task `install`
fusion.task('install', function () {
  const nodePath = 'node_modules';
  const destPath = 'src/Resources/asset';

  fusion.copy(`${nodePath}/vue-slide-bar/dist/*`, `${destPath}/js/vue/`);
  fusion.copy(`${nodePath}/animate.css/*.css`, `${destPath}/css/animate/`);
  fusion.copy(`${nodePath}/wowjs/dist/*.js`, `${destPath}/js/wow/`);
  fusion.copy(`${nodePath}/jarallax/dist/*`, `${destPath}/js/jarallax/`);
  fusion.copy(`${nodePath}/tinymce/**/*`, `${destPath}/js/tinymce5/`);
  fusion.copy([
    `${nodePath}/tinymce-i18n/langs5/zh_TW.js`,
    `${nodePath}/tinymce-i18n/langs5/zh_CN.js`,
    `${nodePath}/tinymce-i18n/langs5/en_GB.js`,
    `${nodePath}/tinymce-i18n/langs5/ja.js`,
    `${nodePath}/tinymce-i18n/langs5/ko_KR.js`,
  ], `${destPath}/js/tinymce5/langs/`);
});

fusion.default(['js', 'css', 'vue']);

/*
 * APIs
 *
 * Compile entry:
 * fusion.js(source, dest, options = {})
 * fusion.babel(source, dest, options = {})
 * fusion.ts(source, dest, options = {})
 * fusion.typeScript(source, dest, options = {})
 * fusion.css(source, dest, options = {})
 * fusion.less(source, dest, options = {})
 * fusion.sass(source, dest, options = {})
 * fusion.copy(source, dest, options = {})
 *
 * Live Reload:
 * fusion.livereload(source, dest, options = {})
 * fusion.reload(file)
 *
 * Gulp proxy:
 * fusion.src(source, options)
 * fusion.dest(path, options)
 * fusion.task(name, deps, fn)
 * fusion.watch(glob, opt, fn)
 *
 * Stream Helper:
 * fusion.through(handler) // Same as through2.obj()
 *
 * Config:
 * fusion.disableNotification()
 * fusion.enableNotification()
 */
