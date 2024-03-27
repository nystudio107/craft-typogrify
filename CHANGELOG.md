# Typogrify Changelog

## 4.0.3 - 2024.03.27
### Fixed
* Fixed a regression that happened when modernizing the `default_escape` functionality ([#86](https://github.com/nystudio107/craft-typogrify/issues/86))

## 4.0.2 - 2024.03.27
### Added
* Add `phpstan` and `ecs` code linting
* Add `code-analysis.yaml` GitHub action

### Changed
* Updated docs to use node 20 & a new sitemap plugin
* PHPstan code cleanup
* ECS code cleanup

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
