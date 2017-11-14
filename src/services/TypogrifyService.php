<?php
/**
 * Typogrify plugin for Craft CMS 3.x
 *
 * Typogrify prettifies your web typography by preventing ugly quotes and 'widows' and more
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\typogrify\services;

use nystudio107\typogrify\Typogrify;

use Michelf\SmartyPants;

use Craft;
use craft\base\Component;

use yii\helpers\Inflector;

/**
 * @author    nystudio107
 * @package   Typogrify
 * @since     1.0.0
 */
class TypogrifyService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * @var \PHP_Typography\PHP_Typography
     */
    public $phpTypography;

    /**
     * @var \PHP_Typography\Settings
     */
    public $phpTypographySettings;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Create a new phpTypographySettings instance
        $this->phpTypographySettings = new \PHP_Typography\Settings();

        // Create a new PhpTypography instance
        $this->phpTypography = new \PHP_Typography\PHP_Typography();

        // Apply our default settings
        $settings = Typogrify::$plugin->getSettings();
        if ($settings !== false) {
            $settingsArray = $settings->toArray();
            foreach ($settingsArray as $key => $value) {
                $this->phpTypographySettings->{$key}($value);
            }
        }
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function typogrify($text)
    {
        if (empty($text)) {
            return '';
        }

        $result = $this->phpTypography->process($text, $this->phpTypographySettings);

        return $result;
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function smartypants($text)
    {
        if (empty($text)) {
            return '';
        }

        return SmartyPants::defaultTransform($text);
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
        $oldSize = Craft::$app->formatter->sizeFormatBase;
        Craft::$app->formatter->sizeFormatBase = 1000;
        $result = Craft::$app->formatter->asShortSize($bytes, $decimals);
        Craft::$app->formatter->sizeFormatBase = $oldSize;

        return $result;
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
        return Craft::$app->formatter->asDuration($value);
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
        return Craft::$app->formatter->asRelativeTime($value, $referenceTime);
    }

    /**
     * Converts number to its ordinal English form
     * For example, converts 13 to 13th, 2 to 2nd
     *
     * @param int $number
     *
     * @return string
     */
    public function ordinalize(int $number): string
    {
        return Inflector::ordinalize($number);
    }

    /**
     * Converts a word to its plural form
     * For example, 'apple' will become 'apples', and 'child' will become 'children'
     *
     * @param string $word
     * @param int    $number
     *
     * @return string
     */
    public function pluralize(string $word, int $number = 2): string
    {
        return abs($number) === 1 ? $word : Inflector::pluralize($word);
    }

    /**
     * Converts a word to its singular form
     * For example, 'apples' will become 'apple', and 'children' will become 'child'
     *
     * @param string $word
     * @param int    $number
     *
     * @return string
     */
    public function singularize(string $word, int $number = 1): string
    {
        return abs($number) === 1 ? Inflector::pluralize($word) : $word;
    }

    /**
     * Returns transliterated version of a string
     * For example, 获取到 どちら Українська: ґ,є, Српска: ђ, њ, џ! ¿Español?
     * will be transliterated to huo qu dao dochira Ukrainsʹka: g,e, Srpska: d, n, d! ¿Espanol?
     *
     * @param string $string
     * @param null   $transliterator
     *
     * @return string
     */
    public function transliterate(string $string, $transliterator = null): string
    {
        return Inflector::transliterate($string, $transliterator);
    }
}
