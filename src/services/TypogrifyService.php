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
}
