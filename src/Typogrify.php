<?php
/**
 * Typogrify plugin for Craft CMS 3.x
 *
 * Typogrify prettifies your web typography by preventing ugly quotes and 'widows' and more
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\typogrify;

use nystudio107\typogrify\services\TypogrifyService;
use nystudio107\typogrify\twigextensions\TypogrifyTwigExtension;
use nystudio107\typogrify\models\Settings;
use nystudio107\typogrify\variables\TypogrifyVariable;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class Typogrify
 *
 * @author    nystudio107
 * @package   Typogrify
 * @since     1.0.0
 *
 * @property  Settings         $settings
 * @property  TypogrifyService $typogrify
 * @method    Settings         getSettings()
 */
class Typogrify extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Typogrify
     */
    public static $plugin;

    /**
     * @var TypogrifyVariable
     */
    public static $variable;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        self::$variable = new TypogrifyVariable();

        Craft::$app->view->registerTwigExtension(new TypogrifyTwigExtension());
        // Register our variables
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('typogrify', self::$variable);
            }
        );

        Craft::info(
            Craft::t(
                'typogrify',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }
}
