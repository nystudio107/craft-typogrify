[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nystudio107/craft-typogrify/badges/quality-score.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-typogrify/?branch=v1) [![Code Coverage](https://scrutinizer-ci.com/g/nystudio107/craft-typogrify/badges/coverage.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-typogrify/?branch=v1) [![Build Status](https://scrutinizer-ci.com/g/nystudio107/craft-typogrify/badges/build.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-typogrify/build-status/v1) [![Code Intelligence Status](https://scrutinizer-ci.com/g/nystudio107/craft-typogrify/badges/code-intelligence.svg?b=v1)](https://scrutinizer-ci.com/code-intelligence)

# Typogrify plugin for Craft CMS 3.x

Typogrify prettifies your web typography by preventing ugly quotes and 'widows' and more

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to require the plugin:

        composer require nystudio107/craft-typogrify

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Typogrify.

You can also install Typogrify via the **Plugin Store** in the Craft Control Panel.

## Typogrify Overview

Typogrify takes text, rich text, or HTML, and applies typographic best practices to make it look beautiful for display on the web.

It does things like smart "curly" printer's quotes, en-dash & em-dash, language-specific hyphenation, handles "widows", and a whole lot more.

It allows you to "client-proof" sites by applying all of these typographic nicities to text before it's displayed, no matter where the text comes from.

Typogrify also has some handy _inflector_ functions to do things like give you the plural or singular version of a word, human-readable relative times/durations, human-readable file sizes, and more.

This plugin is roughly a Craft 3 port of Jamie Pittock's wonderful [Craft-Typogrify](https://github.com/jamiepittock/craft-typogrify) plugin for Craft 2.x, and uses the [php-typography](https://github.com/mundschenk-at/php-typography) and [php-smartypants](https://github.com/michelf/php-smartypants) to do its thing.

## Configuring Typogrify

There's no configuration necessary for Typogrify, but it does provide a `config.php` file that you can use to tweak its behavior to your heart's content.

If you want to change Typogrify's default settings, copy the `src/config.php` to `craft/config` as `typogrify.php` and make your changes there.

Once copied to `craft/config`, this file will be multi-environment aware as well, so you can have different settings groups for each environment, just as you do for `general.php`.

## Using Typogrify

Typogrify provides two filters for prettifying your text:

### typogrify

Uses [php-typography](https://github.com/mundschenk-at/php-typography) to apply typographic best practices to text, rich text, and HTML.

Usage:

```
{{ content |typogrify }}
```

Or:
```
{{  typogrify(content) }}
```

Or:

```
{% filter typogrify %}
    <p>Your text here</p>
{% endfilter %}

```

Or:

```
{{ craft.typogrify.typogrify(content) }}
```

There is also an optional second parameter `isTitle` (which defaults to `false`) to give Typogrify a hint as to whether the entity that is being passed in is a title or not. This allows it to not hyphenate titles, for instance, depending on the `set_hyphenate_headings` config setting (see below). Examples:

```
{{ content |typogrify(true) }}
```

Or:
```
{{  typogrify(content, true) }}
```


So what does it actually do? Well, a lot:

*   Hyphenation — over 50 languages supported via `&shy;`
*   Space control, including:
    -   widow protection
    -   gluing values to units
    -   forced internal wrapping of long URLs & email addresses
*   Intelligent character replacement, including smart handling of:
    -   quote marks (‘single’, “double”)
    -   dashes ( – )
    -   ellipses (…)
    -   trademarks, copyright & service marks (™ ©)
    -   math symbols (5×5×5=53)
    -   fractions (<sup>1</sup>⁄<sub>16</sub>)
    -   ordinal suffixes (1<sup>st</sup>, 2<sup>nd</sup>)
*   CSS hooks for styling:
    -   ampersands,
    -   uppercase words,
    -   numbers,
    -   initial quotes & guillemets.

...and more. If you don't like the default behavior, you can enable, disable, or change any of the settings via the `config.php` file. See the **Configuring Typogrify** section for details.

For RSS feeds, there is an additional `typogrifyFeed` filter/function that applies all of the same typogrify treatments, but in a way that is appropriate for RSS (or similar) feeds — i.e. excluding processes that may cause issues in contexts with limited character set intelligence.

Usage:

```
{{ content |typogrifyFeed }}
```

Or:
```
{{  typogrifyFeed(content) }}
```

Or:

```
{% filter typogrifyFeed %}
    <p>Your text here</p>
{% endfilter %}

```

Or:

```
{{ craft.typogrify.typogrifyFeed(content) }}
```

#### Security

In ordered to work, Typogrify outputs raw HTML. Any untrusted string coming from user input, etc. should be escaped _before_ passing it into Typogrify, e.g.:

```twig
{{ craft.request.getParam('untrusted') | escape | typogrify }}
```

There is also a `config.php` setting called `default_escape` that will by default auto-escape all text passed in to the `typogrify` filter.

#### Advanced Usage

Should you need advanced control over Typogrify in your templates, you can use the `getPhpTypographySettings()` Twig function:

```
{% set phpTypographySettings = getPhpTypographySettings() %}
```

This returns a `\PHP_Typography\Settings` object to your templates that Typogrify uses to do its thing. Then you can do advanced or dynamic configuration changes such as:

```
{% do phpTypographySettings.set_hyphenation_language('fr') %}
{% do phpTypographySettings.set_diacritic_language('fr') %}
```

...or anything else you care to do. See the [PhpTypography Settings class](https://github.com/mundschenk-at/php-typography/blob/master/src/class-settings.php) for details.

#### Troubleshooting

If it doesn't look like Typogrify is doing anything to the HTML you're passing it, it is probably malformed HTML (syntax errors, missing closing tags, etc.). Fix your HTML, and Typogrify will prettify it!

### smartypants

Applies [smarty pants](https://github.com/michelf/php-smartypants) to curl quotes.

The `smartypants` filter is provided primary to make upgrading sites from Craft 2.x to Craft 3.x easier, if you were using the Craft 2.x Tyopgrify plugin already. The `typogrify` filter does everything that the `smartypants` filter can do, and more.

Usage:

```
{{ content |smartypants }}
```

Or:

```
{% filter smartypants %}
    <p>Your text here</p>
{% endfilter %}

```

Or:

```
{{ craft.typogrify.smartypants(content) }}
```

### Text Manipulation

Typogrify provides a several text manipulation functions, and will also give you a full [Stringy](https://github.com/danielstjules/Stringy) object in your templates if you have advanced string manipulation needs.

```
{{ someString |striptags |truncate(20) }}
```

**truncate** - Truncates a string to a given length in a multi-byte friendly way. It first strips any HTML tags from the string before performing truncation.

Usage:

```
{{ someString |truncate(20) }}
```

Or:

```
{{ craft.typogrify.truncate(someString, 20) }}
```

`truncate` also accepts an optional parameter that will be appended to the string if it is truncated (this defaults to '…'):

```
{{ truncate(someString, 20, '-') }}
```

**truncateOnWord** - Truncates a string to a given length in a multi-byte friendly way, while ensuring that it does not split words. It first strips any HTML tags from the string before performing truncation.

Usage:

```
{{ someString |truncateOnWord(20) }}
```

Or:

```
{{ craft.typogrify.truncateOnWord(someString, 20) }}
```

`truncateOnWord` also accepts an optional parameter that will be appended to the string if it is truncated (this defaults to '…'):

```
{{ truncate(truncateOnWord, 20, '-') }}
```

**wordLimit** - Truncates a string by the number of words to a given length. It first strips any HTML tags from the string before performing truncation.

Usage:

```
{{ someString |wordLimit(20) }}
```

Or:

```
{{ craft.typogrify.wordLimit(someString, 20) }}
```

`wordLimit` also accepts an optional parameter that will be appended to the string if it is truncated (this defaults to '…'):

```
{{ wordLimit(someString, 20, '-') }}
```

**stringy** - Returns a new [Stringy](https://github.com/danielstjules/Stringy) object to your templates, so you can access all of the advanced string manipulation that [Stringy](https://github.com/danielstjules/Stringy) has to offer.

It does *not* strip HTML tags from the string, if you wish to do that, you can use the Twig [striptags](https://twig.symfony.com/doc/2.x/filters/striptags.html) filter.


Usage:

```
{% set someString = stringy('foobar') %}
{{ someString.longestCommonPrefix('foobaz') }}
```

Or:

```
{% set someString = craft.typogrify.stringy('foobar') %}
{{ someString.longestCommonPrefix('foobaz') }}
```

`stringy` also accepts an optional parameter allows you to specify the character encoding:

```
{% set someString = stringy('foobar', 'UTF-8') %}
{{ someString.longestCommonPrefix('foobaz') }}
```

### Human-Readable Formats

Typogrify can output human-readable durations, relative times, and file sizes. These are all localized based on the current Craft site language.

**humanFileSize** - Translate bytes into something human-readable. For example, 1024 to 1K

Usage:

```
{{ 1240547 |humanFileSize }}
```

Or:

```
{{ craft.typogrify.humanFileSize(1240547) }}
```

`humanFileSize` also accepts an optional parameter to indicate how many decimal places to use (it defaults to 1):

```
{{ humanFileSize(1240547, 2) }}
```

**humanDuration** - Represents the value as duration in human readable format. For example, `131` represents `2 minutes, 11 seconds`

Usage:

```
{{ 131 |humanDuration }}
```

Or:

```
{{ craft.typogrify.humanDuration(131) }}
```

`humanDuration` will accept a `\DateInterval` object, a number in seconds, or an [ISO8601 duration](https://en.wikipedia.org/wiki/ISO_8601#Durations) format

**humanRelativeTime** - Formats the value as the time interval between a date and now in human readable form. For example, `in two days` or `3 months ago`

Usage:

```
{{ someDateTime |humanRelativeTime }}
```

Or:

```
{{ craft.typogrify.humanRelativeTime(someDateTime) }}
```

`humanRelativeTime` will accept a `\DateTime` object, a `\DateInterval` object, a UNIX timestamp, or a string that can be [parsed to create a DateTime object](http://php.net/manual/en/datetime.formats.php).

An optional second parameter lets you specify what to use as a reference time instead of `now` (it defaults to `now`):

```
{{ humanRelativeTime(someDateTime, referenceDateTime) }}
```

### Inflectors

Typogrify also provides a number of _inflectors_ that allow you to do things like give you the plural or singular version of a word, and more.

**ordinalize** - Converts number to its ordinal English form. For example, converts 13 to 13th, 2 to 2nd

Usage:

```
{{ 13 |ordinalize }}
```

Or:

```
{{ craft.typogrify.ordinalize(13) }}
```

**pluralize** - Converts a word to its plural form. For example, 'apple' will become 'apples', and 'child' will become 'children'

Usage:

```
{{ 'apple' |pluralize }}
```

Or:

```
{{ craft.typogrify.pluralize('apple') }}
```

An optional number can be passed in as a second parameter, which will cause it to only pluralize the word if the number is not `1`. For example:


```
{% set numApples = 1 %}
{{ 'apple' |pluralize(numApples) }}
```

Or:

```
{% set numApples = 1 %}
{{ craft.typogrify.pluralize('apple', numApples) }}
```

In both examples, the number is `1` so the word would not be pluralized.

**singularize** - Converts a word to its singular form. For example, 'apples' will become 'apple', and 'children' will become 'child'

Usage:

```
{{ 'children' |singularize }}
```

Or:

```
{{ craft.typogrify.singularize('children') }}
```

An optional number can be passed in as a second parameter, which will cause it to only pluralize the word if the number is `1`. For example:


```
{% set numChildren = 2 %}
{{ 'children' |singularize(numChildren) }}
```

Or:

```
{% set numChildren = 2 %}
{{ craft.typogrify.singularize('children', numChildren) }}
```

In both examples, the number is `2` so the word would not be singularized.

**transliterate** - Returns transliterated version of a string. For example, `获取到 どちら Українська: ґ,є, Српска: ђ, њ, џ! ¿Español?` will be transliterated to `huo qu dao dochira Ukrainsʹka: g,e, Srpska: d, n, d! ¿Espanol?`

Usage:

```
{{ content |transliterate }}
```

Or:

```
{% filter transliterate %}
    <p>Your text here</p>
{% endfilter %}

```

Or:

```
{{  craft.typogrify.transliterate(content) }}
```

## Typogrify Roadmap

Some things to do, and ideas for potential features:

* Whatever else @mikestecker asks for

Brought to you by [nystudio107](https://nystudio107.com/)
