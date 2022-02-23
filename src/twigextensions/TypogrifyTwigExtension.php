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
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author    nystudio107
 * @package   Typogrify
 * @since     1.0.0
 */
class TypogrifyTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'Typogrify';
    }

    /**
     * @inheritdoc
     */
    public function getFilters(): array
    {
        $variable = Typogrify::$variable;
        return [
            new TwigFilter('typogrify', [$variable, 'typogrify']),
            new TwigFilter('typogrifyFeed', [$variable, 'typogrifyFeed']),
            new TwigFilter('smartypants', [$variable, 'smartypants']),
            new TwigFilter('truncate', [$variable, 'truncate']),
            new TwigFilter('truncateOnWord', [$variable, 'truncateOnWord']),
            new TwigFilter('stringy', [$variable, 'stringy']),
            new TwigFilter('humanFileSize', [$variable, 'humanFileSize']),
            new TwigFilter('humanDuration', [$variable, 'humanDuration']),
            new TwigFilter('humanRelativeTime', [$variable, 'humanRelativeTime']),
            new TwigFilter('ordinalize', [$variable, 'ordinalize']),
            new TwigFilter('pluralize', [$variable, 'pluralize']),
            new TwigFilter('singularize', [$variable, 'singularize']),
            new TwigFilter('transliterate', [$variable, 'transliterate']),
            new TwigFilter('wordLimit', [$variable, 'wordLimit']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions(): array
    {
        $variable = Typogrify::$variable;
        return [
            new TwigFunction('typogrify', [$variable, 'typogrify']),
            new TwigFunction('typogrifyFeed', [$variable, 'typogrifyFeed']),
            new TwigFunction('smartypants', [$variable, 'smartypants']),
            new TwigFunction('getPhpTypographySettings', [$variable, 'getPhpTypographySettings']),
            new TwigFunction('truncate', [$variable, 'truncate']),
            new TwigFunction('truncateOnWord', [$variable, 'truncateOnWord']),
            new TwigFunction('stringy', [$variable, 'stringy']),
            new TwigFunction('humanFileSize', [$variable, 'humanFileSize']),
            new TwigFunction('humanDuration', [$variable, 'humanDuration']),
            new TwigFunction('humanRelativeTime', [$variable, 'humanRelativeTime']),
            new TwigFunction('ordinalize', [$variable, 'ordinalize']),
            new TwigFunction('pluralize', [$variable, 'pluralize']),
            new TwigFunction('singularize', [$variable, 'singularize']),
            new TwigFunction('transliterate', [$variable, 'transliterate']),
            new TwigFunction('wordLimit', [$variable, 'wordLimit']),
        ];
    }
}
