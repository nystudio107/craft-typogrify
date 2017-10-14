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

use Debach\PhpTypography\PhpTypography;

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
     * @return PhpTypography
     */
    public function getPhpTypography()
    {
        return Typogrify::$plugin->typogrify->phpTypography;
    }
}
