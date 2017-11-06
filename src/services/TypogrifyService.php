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
     * Translate bytes into something human-readable
     * For example, 1024 to 1K
     *
     * @param     $bytes
     * @param int $decimals
     *
     * @return string
     */
    public function humanFileSize($bytes, $decimals = 1): string
    {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[intval($factor)];
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
     *
     * @return string
     */
    public function pluralize(string $word): string
    {
        return Inflector::pluralize($word);
    }

    /**
     * Converts a word to its singular form
     * For example, 'apples' will become 'apple', and 'children' will become 'child'
     *
     * @param string $word
     *
     * @return string
     */
    public function singularize(string $word): string
    {
        return Inflector::singularize($word);
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
