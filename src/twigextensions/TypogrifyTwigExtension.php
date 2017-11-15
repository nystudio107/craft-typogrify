<?php
/**
 * Typogrify plugin for Craft CMS 3.x
 *
 * Typogrify prettifies your web typography by preventing ugly quotes and 'widows' and more
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\typogrify\twigextensions;

use nystudio107\typogrify\Typogrify;

use craft\helpers\Template;

/**
 * @author    nystudio107
 * @package   Typogrify
 * @since     1.0.0
 */
class TypogrifyTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Typogrify';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('typogrify', [$this, 'typogrify']),
            new \Twig_SimpleFilter('smartypants', [$this, 'smartypants']),
            new \Twig_SimpleFilter('humanFileSize', [$this, 'humanFileSize']),
            new \Twig_SimpleFilter('humanDuration', [$this, 'humanDuration']),
            new \Twig_SimpleFilter('humanRelativeTime', [$this, 'humanRelativeTime']),
            new \Twig_SimpleFilter('ordinalize', [$this, 'ordinalize']),
            new \Twig_SimpleFilter('pluralize', [$this, 'pluralize']),
            new \Twig_SimpleFilter('singularize', [$this, 'singularize']),
            new \Twig_SimpleFilter('transliterate', [$this, 'transliterate']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('typogrify', [$this, 'typogrify']),
            new \Twig_SimpleFunction('smartypants', [$this, 'smartypants']),
            new \Twig_SimpleFunction('getPhpTypography', [$this, 'getPhpTypography']),
            new \Twig_SimpleFunction('humanFileSize', [$this, 'humanFileSize']),
            new \Twig_SimpleFunction('humanDuration', [$this, 'humanDuration']),
            new \Twig_SimpleFunction('humanRelativeTime', [$this, 'humanRelativeTime']),
            new \Twig_SimpleFunction('ordinalize', [$this, 'ordinalize']),
            new \Twig_SimpleFunction('pluralize', [$this, 'pluralize']),
            new \Twig_SimpleFunction('singularize', [$this, 'singularize']),
            new \Twig_SimpleFunction('transliterate', [$this, 'transliterate']),
        ];
    }

    /**
     * @param string $text
     *
     * @return \Twig_Markup
     *
     */
    public function typogrify($text)
    {
        return Template::raw(Typogrify::$plugin->typogrify->typogrify($text));
    }

    /**
     * @param string $text
     *
     * @return \Twig_Markup
     */
    public function smartypants($text)
    {
        return Template::raw(Typogrify::$plugin->typogrify->smartypants($text));
    }

    /**
     * @return \PHP_Typography\Settings
     */
    public function getPhpTypographySettings()
    {
        return Typogrify::$plugin->typogrify->phpTypographySettings;
    }

    /**
     * Formats the value in bytes as a size in human readable form for example `12 KB`.
     *
     * This is the short form of [[asSize]].
     *
     * If [[sizeFormatBase]] is 1024, [binary prefixes](http://en.wikipedia.org/wiki/Binary_prefix)
     * (e.g. kibibyte/KiB, mebibyte/MiB, ...) are used in the formatting result.
     *
     * @param string|int|float $bytes    value in bytes to be formatted.
     * @param int              $decimals the number of digits after the decimal point.
     *
     * @return string the formatted result.
     */
    public function humanFileSize($bytes, $decimals = 1): string
    {
        return Template::raw(Typogrify::$plugin->typogrify->humanFileSize($bytes, $decimals));
    }

    /**
     * Represents the value as duration in human readable format.
     *
     * @param \DateInterval|string|int $value the value to be formatted. Acceptable formats:
     *  - [DateInterval object](http://php.net/manual/ru/class.dateinterval.php)
     *  - integer - number of seconds. For example: value `131` represents `2 minutes, 11 seconds`
     *  - ISO8601 duration format. For example, all of these values represent `1 day, 2 hours, 30 minutes` duration:
     *    `2015-01-01T13:00:00Z/2015-01-02T13:30:00Z` - between two datetime values
     *    `2015-01-01T13:00:00Z/P1D2H30M` - time interval after datetime value
     *    `P1D2H30M/2015-01-02T13:30:00Z` - time interval before datetime value
     *    `P1D2H30M` - simply a date interval
     *    `P-1D2H30M` - a negative date interval (`-1 day, 2 hours, 30 minutes`)
     *
     * @return string the formatted duration.
     */
    public function humanDuration($value)
    {
        return Template::raw(Typogrify::$plugin->typogrify->humanDuration($value));
    }

    /**
     * Formats the value as the time interval between a date and now in human readable form.
     *
     * This method can be used in three different ways:
     *
     * 1. Using a timestamp that is relative to `now`.
     * 2. Using a timestamp that is relative to the `$referenceTime`.
     * 3. Using a `DateInterval` object.
     *
     * @param int|string|\DateTime|\DateInterval $value the value to be formatted. The following
     * types of value are supported:
     *
     * - an integer representing a UNIX timestamp
     * - a string that can be [parsed to create a DateTime object](http://php.net/manual/en/datetime.formats.php).
     *   The timestamp is assumed to be in [[defaultTimeZone]] unless a time zone is explicitly given.
     * - a PHP [DateTime](http://php.net/manual/en/class.datetime.php) object
     * - a PHP DateInterval object (a positive time interval will refer to the past, a negative one to the future)
     *
     * @param int|string|\DateTime $referenceTime if specified the value is used as a reference time instead of `now`
     * when `$value` is not a `DateInterval` object.
     *
     * @return string the formatted result.
     */
    public function humanRelativeTime($value, $referenceTime = null)
    {
        return Template::raw(Typogrify::$plugin->typogrify->humanRelativeTime($value, $referenceTime));
    }

    /**
     * Converts number to its ordinal English form
     * For example, converts 13 to 13th, 2 to 2nd
     *
     * @param int $number
     *
     * @return \Twig_Markup
     */
    public function ordinalize(int $number)
    {
        return Template::raw(Typogrify::$plugin->typogrify->ordinalize($number));
    }

    /**
     * Converts a word to its plural form
     * For example, 'apple' will become 'apples', and 'child' will become 'children'
     *
     * @param string $word
     * @param int    $number
     *
     * @return \Twig_Markup
     */
    public function pluralize(string $word, int $number = 2)
    {
        return Template::raw(Typogrify::$plugin->typogrify->pluralize($word, $number));
    }

    /**
     * Converts a word to its singular form
     * For example, 'apples' will become 'apple', and 'children' will become 'child'
     *
     * @param string $word
     * @param int    $number
     *
     * @return \Twig_Markup
     */
    public function singularize(string $word, int $number = 1)
    {
        return Template::raw(Typogrify::$plugin->typogrify->singularize($word, $number));
    }

    /**
     * Returns transliterated version of a string
     * For example, 获取到 どちら Українська: ґ,є, Српска: ђ, њ, џ! ¿Español?
     * will be transliterated to huo qu dao dochira Ukrainsʹka: g,e, Srpska: d, n, d! ¿Espanol?
     *
     * @param string $string
     * @param null   $transliterator
     *
     * @return \Twig_Markup
     */
    public function transliterate(string $string, $transliterator = null)
    {
        return Template::raw(Typogrify::$plugin->typogrify->transliterate($string, $transliterator));
    }
}
