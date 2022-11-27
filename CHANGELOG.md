# Typogrify Changelog

## 4.0.1 - 2022.11.27
### Changed
* Switch to VitePress `^1.0.0-alpha.29` for the documentation
* Add the correct Algolia keys for the doc search functionality
* Add `allow-plugins` to the `composer.json` to enable CI to work

### Fixed
* Fixed an issue where `null` or other non-string values were not typecast when passed to `truncate()` or `truncateOnWord()`

## 4.0.0 - 2022.05.24
### Added
* Initial Craft CMS 4 release

### Fixed
* Fixed the various filters to allow for the passing of empty values via ([#73](https://github.com/nystudio107/craft-typogrify/pull/73))

## 4.0.0-beta.2 - 2022.03.04

### Fixed

* Updated types for Craft CMS `4.0.0-alpha.1` via Rector

## 4.0.0-beta.1 - 2022.02.22

### Added

* Initial Craft CMS 4 compatibility

## 1.1.19 - 2022.02.22
### Added

* Add `.gitattributes` & `CODEOWNERS`

### Changed

* Switched documentation system to VitePress
* Use Textlint for the documentation
* Build documentation automatically via GitHub action

## 1.1.18 - 2019.04.30
### Changed
* Fixed an issue where `wordLimit` turns "à" characters into "�"
* Updated Twig namespacing to be compliant with deprecated class aliases in 2.7.x

## 1.1.17 - 2019.03.20
### Changed
* Fixed an issue where `wordLimit` always appended the ellipsis, regardless of whether truncation happened or not
* Allow for escaping inputs by default

## 1.1.16 - 2018.11.08
### Changed
* Fixed an issue with `pluralize` and `singularize` not respecting the `$number` passed in

## 1.1.15 - 2018.10.09
### Changed
* Allow `null` to be passed in to the various filters
* Once again, revert to not auto-escaping text that is passed in

## 1.1.14 - 2018.10.05
### Changed
* Refactored the Twig Extension to use the same methods that the Variable does
* Normalize text passed in by escaping untrusted strings

## 1.1.13 - 2018.10.05
### Changed
* Reverted `\Twig_Markup` regression; added a note to the docs

## 1.1.12 - 2018.10.04
### Changed
* Fixed an issue where Typogrify could return a `\Twig_Markup` from unsafe input
 
## 1.1.11 - 2018.06.12
### Added
* Added `wordLimit` Twig filter/function that truncates a string by the number of words to a given length

## 1.1.10 - 2018.04.25
### Added
* Added the ability to set the the maximum number of words considered for dewidowing

## 1.1.9 - 2018.03.20
### Changed
* Fixed the `singularize` service method to properly singularize words

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
