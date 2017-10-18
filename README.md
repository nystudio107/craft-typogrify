# Typogrify plugin for Craft CMS 3.x

Typogrify prettifies your web typography by preventing ugly quotes and 'widows' and more

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to require the plugin:

        composer require nystudio107/craft3-typogrify

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Typogrify.

## Typogrify Overview

Typogrify takes text, rich text, or HTML, and applies typographic best practices to make it look beautiful for display on the web.

It does things like smart "curly" printer's quotes, en-dash & em-dash, language-specific hyphenation, handles "widows", and a whole lot more.

It allows you to "client-proof" sites by applying all of these typographic nicities to text before it's displayed, no matter where the text comes from.

This plugin is roughly a Craft 3 port of Jamie Pittock's wonderful [Craft-Typogrify](https://github.com/jamiepittock/craft-typogrify) plugin for Craft 2.x, and uses the [php-typography](https://github.com/mundschenk-at/php-typography) and [php-smartypants](https://github.com/michelf/php-smartypants) to do its thing.

## Configuring Typogrify

There's no configuration necessary for Typogrify, but it does provide a `config.php` file that you can use to tweak its behavior to your heart's content.

If you want to change Typogrify's default settings, copy the `src/config.php` it to `craft/config` as `typogrify.php` and make your changes there.

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
{% filter typogrify %}
    <p>Your text here</p>
{% endfilter %}

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

## Advanced Usage

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

## Typogrify Roadmap

Some things to do, and ideas for potential features:

* Release it

Brought to you by [nystudio107](https://nystudio107.com/)
