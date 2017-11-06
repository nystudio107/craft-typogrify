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
     * Translate bytes into something human-readable
     * For example, 1024 to 1K
     *
     * @param     $bytes
     * @param int $decimals
     *
     * @return \Twig_Markup
     */
    public function humanFileSize($bytes, $decimals = 1)
    {
        return Template::raw(Typogrify::$plugin->typogrify->humanFileSize($bytes, $decimals));
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
     *
     * @return \Twig_Markup
     */
    public function pluralize(string $word)
    {
        return Template::raw(Typogrify::$plugin->typogrify->pluralize($word));
    }

    /**
     * Converts a word to its singular form
     * For example, 'apples' will become 'apple', and 'children' will become 'child'
     *
     * @param string $word
     *
     * @return \Twig_Markup
     */
    public function singularize(string $word)
    {
        return Template::raw(Typogrify::$plugin->typogrify->singularize($word));
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
