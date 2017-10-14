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

use Debach\PhpTypography\PhpTypography;
use Michelf\SmartyPants;

use craft\base\Component;

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
     * @var PhpTypography
     */
    public $phpTypography;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();

        // Create a new PhpTypography instance
        $this->phpTypography = new PhpTypography();

        // Apply our default settings
        $settings = Typogrify::$plugin->getSettings();
        if ($settings !== false) {
            $settingsArray = $settings->toArray();
            foreach ($settingsArray as $key => $value) {
                $this->phpTypography->{$key}($value);
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

        return $this->phpTypography->process($text);
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
}
