# Typogrify Changelog

All notable changes to this project will be documented in this file.

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
