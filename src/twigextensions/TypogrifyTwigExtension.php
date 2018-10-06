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
        $variable = Typogrify::$variable;
        return [
            new \Twig_SimpleFilter('typogrify', [$variable, 'typogrify']),
            new \Twig_SimpleFilter('typogrifyFeed', [$variable, 'typogrifyFeed']),
            new \Twig_SimpleFilter('smartypants', [$variable, 'smartypants']),
            new \Twig_SimpleFilter('truncate', [$variable, 'truncate']),
            new \Twig_SimpleFilter('truncateOnWord', [$variable, 'truncateOnWord']),
            new \Twig_SimpleFilter('stringy', [$variable, 'stringy']),
            new \Twig_SimpleFilter('humanFileSize', [$variable, 'humanFileSize']),
            new \Twig_SimpleFilter('humanDuration', [$variable, 'humanDuration']),
            new \Twig_SimpleFilter('humanRelativeTime', [$variable, 'humanRelativeTime']),
            new \Twig_SimpleFilter('ordinalize', [$variable, 'ordinalize']),
            new \Twig_SimpleFilter('pluralize', [$variable, 'pluralize']),
            new \Twig_SimpleFilter('singularize', [$variable, 'singularize']),
            new \Twig_SimpleFilter('transliterate', [$variable, 'transliterate']),
            new \Twig_SimpleFilter('wordLimit', [$variable, 'wordLimit']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        $variable = Typogrify::$variable;
        return [
            new \Twig_SimpleFunction('typogrify', [$variable, 'typogrify']),
            new \Twig_SimpleFunction('typogrifyFeed', [$variable, 'typogrifyFeed']),
            new \Twig_SimpleFunction('smartypants', [$variable, 'smartypants']),
            new \Twig_SimpleFunction('getPhpTypographySettings', [$variable, 'getPhpTypographySettings']),
            new \Twig_SimpleFunction('truncate', [$variable, 'truncate']),
            new \Twig_SimpleFunction('truncateOnWord', [$variable, 'truncateOnWord']),
            new \Twig_SimpleFunction('stringy', [$variable, 'stringy']),
            new \Twig_SimpleFunction('humanFileSize', [$variable, 'humanFileSize']),
            new \Twig_SimpleFunction('humanDuration', [$variable, 'humanDuration']),
            new \Twig_SimpleFunction('humanRelativeTime', [$variable, 'humanRelativeTime']),
            new \Twig_SimpleFunction('ordinalize', [$variable, 'ordinalize']),
            new \Twig_SimpleFunction('pluralize', [$variable, 'pluralize']),
            new \Twig_SimpleFunction('singularize', [$variable, 'singularize']),
            new \Twig_SimpleFunction('transliterate', [$variable, 'transliterate']),
            new \Twig_SimpleFunction('wordLimit', [$variable, 'wordLimit']),
        ];
    }
}
