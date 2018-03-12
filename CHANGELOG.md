# Typogrify Changelog

## 1.1.8 - 2018.03.12
### Added
* Fix the `getPhpTypographySettings()` Twig function to be named correctly

## 1.1.7 - 2018.02.01
### Added
* Renamed the composer package name to `craft-typogrify`

## 1.1.6 - 2018.01.21
### Added
* Added the `typogrifyFeed` filter/function for RSS feeds
* Added an optional `isTitle` (defaulting to `false`) for the `typogrify` filter

### Changed
* Code comments/cleanup

## 1.1.5 - 2018.01.06
### Changed
* Updated to `php-typography` ^6.0.0

## 1.1.4 - 2017.12.08
### Changed
* Set `set_french_punctuation_spacing` to `false` by default to avoid spaces before punctuation

## 1.1.3 - 2017.12.06
### Added
* Added `truncate`, `truncateOnWord`, and `stringy` text manipulation functions

### Changed
* Updated to require craftcms/cms `^3.0.0-RC1`
* Switched to `Craft::$app->view->registerTwigExtension` to register the Twig extension

## 1.1.2 - 2017-11-14
### Changed
* `singularize` and `pluralize` now both accept an optional `number` parameter
* `humanFileSize` now defaults to `1000` as the unit of measure, with nicer looking human abbreviations

## 1.1.1 - 2017-11-06
### Added
- Added `humanDuration()` and `humanRelativeTime()`

## 1.1.0 - 2017-11-05
### Added
- Added `humanFileSize()` to convert bytes to a human readable number, e.g.: 1024 becomes 1K
- Added a number of useful inflector functions such as `pluralize()`, `singularize()`, `transliterate()`, etc.
- Added a Variable so you can use `craft.typogrify.smartypants`, etc. if you wish

### Changed
- Code cleanup

## 1.0.3 - 2017-10-19
### Changed
- Set `set_ignore_parser_errors` to `true` to make it more lenient at parsing invalid HTML from Redactor
- Synced up the `config.php` and `Settings` model with the updated `php-typography` lib

## 1.0.2 - 2017-10-18
### Changed
- Switched to the more modern and maintained `mundschenk-at/php-typography` package

## 1.0.1 - 2017-10-16
### Changed
- Switched to `nystudio107\PhpTypography` to avoid minimum-stability issues

## 1.0.0 - 2017-10-14
### Added
- Initial release
