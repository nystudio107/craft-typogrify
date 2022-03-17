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

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use nystudio107\typogrify\models\Settings;
use nystudio107\typogrify\services\TypogrifyService;
use nystudio107\typogrify\twigextensions\TypogrifyTwigExtension;
use nystudio107\typogrify\variables\TypogrifyVariable;
use yii\base\Event;

/**
 * Class Typogrify
 *
 * @author    nystudio107
 * @package   Typogrify
 * @since     1.0.0
 *
 * @property  Settings $settings
 * @property  TypogrifyService $typogrify
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

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSettings = false;
    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        $config['components'] = [
            'typogrify' => TypogrifyService::class,
        ];

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;
        self::$variable = new TypogrifyVariable();

        Craft::$app->view->registerTwigExtension(new TypogrifyTwigExtension());
        // Register our variables
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            static function (Event $event) {
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
    protected function createSettingsModel(): ?Model
    {
        return new Settings();
    }
}
