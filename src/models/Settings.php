<?php
/**
 * Typogrify plugin for Craft CMS 3.x
 *
 * Typogrify prettifies your web typography by preventing ugly quotes and 'widows' and more
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\typogrify\models;

use craft\base\Model;
use craft\validators\ArrayValidator;
use PHP_Typography\Settings\Dash_Style;
use PHP_Typography\Settings\Quote_Style;

/**
 * @author    nystudio107
 * @package   Typogrify
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * sets whether input should be escaped by default
     *
     * @var bool
     */
    public bool $default_escape = false;

    /**
     * sets tags where typography of children will be untouched
     *
     * @var array
     */
    public array $set_tags_to_ignore = [
        "code",
        "head",
        "kbd",
        "object",
        "option",
        "pre",
        "samp",
        "script",
        "noscript",
        "noembed",
        "select",
        "style",
        "textarea",
        "title",
        "var",
        "math"
    ];

    /**
     * sets classes where typography of children will be untouched
     *
     * @var array
     */
    public array $set_classes_to_ignore = [
        "vcard",
        "noTypo"
    ];

    /**
     * sets IDs where typography of children will be untouched
     *
     * @var array
     */
    public array $set_ids_to_ignore = [
    ];

    /**
     * curl quotemarks
     *
     * @var bool
     */
    public bool $set_smart_quotes = true;

    /**
     * Primary quotemarks style
     * allowed values for $style
     *    "doubleCurled = "&ldquo;foo&rdquo;",
     *    "doubleCurledReversed = "&rdquo;foo&rdquo;",
     *    "doubleLow9 = "&bdquo;foo&rdquo;",
     *    "doubleLow9Reversed = "&bdquo;foo&ldquo;",
     *    "singleCurled = "&lsquo;foo&rsquo;",
     *    "singleCurledReversed = "&rsquo;foo&rsquo;",
     *    "singleLow9 = "&sbquo;foo&rsquo;",
     *    "singleLow9Reversed = "&sbquo;foo&lsquo;",
     *    "doubleGuillemetsFrench = "&laquo;&nbsp;foo&nbsp;&raquo;",
     *    "doubleGuillemets = "&laquo;foo&raquo;",
     *    "doubleGuillemetsReversed = "&raquo;foo&laquo;",
     *    "singleGuillemets = "&lsaquo;foo&rsaquo;",
     *    "singleGuillemetsReversed = "&rsaquo;foo&lsaquo;",
     *    "cornerBrackets = "&#x300c;foo&#x300d;",
     *    "whiteCornerBracket = "&#x300e;foo&#x300f;",
     *
     * @var string
     */
    public string $set_smart_quotes_primary = Quote_Style::DOUBLE_CURLED;

    /**
     * Secondary quotemarks style
     * allowed values for $style
     *    "doubleCurled = "&ldquo;foo&rdquo;",
     *    "doubleCurledReversed = "&rdquo;foo&rdquo;",
     *    "doubleLow9 = "&bdquo;foo&rdquo;",
     *    "doubleLow9Reversed = "&bdquo;foo&ldquo;",
     *    "singleCurled = "&lsquo;foo&rsquo;",
     *    "singleCurledReversed = "&rsquo;foo&rsquo;",
     *    "singleLow9 = "&sbquo;foo&rsquo;",
     *    "singleLow9Reversed = "&sbquo;foo&lsquo;",
     *    "doubleGuillemetsFrench = "&laquo;&nbsp;foo&nbsp;&raquo;",
     *    "doubleGuillemets = "&laquo;foo&raquo;",
     *    "doubleGuillemetsReversed = "&raquo;foo&laquo;",
     *    "singleGuillemets = "&lsaquo;foo&rsaquo;",
     *    "singleGuillemetsReversed = "&rsaquo;foo&lsaquo;",
     *    "cornerBrackets = "&#x300c;foo&#x300d;",
     *    "whiteCornerBracket = "&#x300e;foo&#x300f;",
     *
     * @var string
     */
    public string $set_smart_quotes_secondary = Quote_Style::SINGLE_CURLED;

    /**
     * replaces "a--a" with En Dash " -- " and "---" with Em Dash
     *
     * @var bool
     */
    public bool $set_smart_dashes = true;

    /**
     * Sets the typographical conventions used by smart_dashes.
     *
     * Allowed values for $style:
     * - "traditionalUS"
     * - "international"
     *
     * @var string
     */
    public string $set_smart_dashes_style = Dash_Style::TRADITIONAL_US;

    /**
     * replaces "..." with "…"
     *
     * @var bool
     */
    public bool $set_smart_ellipses = true;

    /**
     * replaces "creme brulee" with "crème brûlée"
     *
     * @var bool
     */
    public bool $set_smart_diacritics = true;

    /**
     * defines hyphenation language for text
     *
     * @var string
     */
    public string $set_diacritic_language = "en-US";

    /**
     * $customReplacements must be
     *    an array formatted array(needle=>replacement, needle=>replacement...), or
     *    a string formatted `"needle"=>"replacement","needle"=>"replacement",...`
     *
     * @var array
     */
    public array $set_diacritic_custom_replacements = [
    ];

    /**
     * replaces (r) (c) (tm) (sm) (p) (R) (C) (TM) (SM) (P) with ® © ™ ℠ ℗
     *
     * @var bool
     */
    public bool $set_smart_marks = true;

    /**
     * replaces 1*4 with 1x4, etc.
     *
     * @var bool
     */
    public bool $set_smart_math = true;

    /**
     * replaces 2^4 with 2<sup>4</sup>
     *
     * @var bool
     */
    public bool $set_smart_exponents = true;

    /**
     * replaces 1/4  with <sup>1</sup>&#8260;<sub>4</sub>
     *
     * @var bool
     */
    public bool $set_smart_fractions = true;

    /**
     * Enables/disables replacement of 1st with 1<sup>st</sup>
     *
     * @var bool
     */
    public bool $set_smart_ordinal_suffix = true;

    /**
     * single character words are forced to next line with insertion of &nbsp;
     *
     * @var bool
     */
    public bool $set_single_character_word_spacing = true;

    /**
     * fractions are kept together with insertion of &nbsp;
     *
     * @var bool
     */
    public bool $set_fraction_spacing = true;

    /**
     * units and values are kept together with insertion of &nbsp;
     *
     * @var bool
     */
    public bool $set_unit_spacing = true;

    /**
     * Enables/disables extra whitespace before certain punction marks, as is the French custom.
     *
     * @param bool
     */
    public bool $set_french_punctuation_spacing = false;

    /**
     * a list of units to keep with their values
     *
     * @var array
     */
    public array $set_units = [
    ];

    /**
     * Em and En dashes are wrapped in thin spaces
     *
     * @var bool
     */
    public bool $set_dash_spacing = true;

    /**
     * Remove extra space characters
     *
     * @var bool
     */
    public bool $set_space_collapse = true;

    /**
     * Enable usage of true "no-break narrow space" (&#8239;) instead of the normal no-break space (&nbsp;).
     *
     * @var bool
     */
    public bool $set_true_no_break_narrow_space = false;

    /**
     * enables widow handling
     *
     * @var bool
     */
    public bool $set_dewidow = true;

    /**
     * establishes maximum length of a widows that will be protected
     *
     * @var int
     */
    public int $set_max_dewidow_length = 5;

    /**
     * establishes the maximum number of words considered for dewidowing.
     *
     * @var int
     */
    public int $set_dewidow_word_number = 1;

    /**
     * establishes maximum length of pulled text to keep widows company
     *
     * @var int
     */
    public int $set_max_dewidow_pull = 5;

    /**
     * enables wrapping at hard hyphens internal to a word with the insertion of a zero-width-space
     *
     * @var bool
     */
    public bool $set_wrap_hard_hyphens = true;

    /**
     * enables wrapping of urls
     *
     * @var bool
     */
    public bool $set_url_wrap = true;

    /**
     * enables wrapping of email addresses
     *
     * @var bool
     */
    public bool $set_email_wrap = true;

    /**
     * establishes minimum character requirement after a url wrapping point
     *
     * @var int
     */
    public int $set_min_after_url_wrap = 5;

    /**
     * wrap ampersands in <span class="amp">
     *
     * @var bool
     */
    public bool $set_style_ampersands = true;

    /**
     * wrap caps in <span class="caps">
     *
     * @var bool
     */
    public bool $set_style_caps = true;

    /**
     * wrap initial quotes in <span class="quo"> or <span class="dquo">
     *
     * @var bool
     */
    public bool $set_style_initial_quotes = true;

    /**
     * wrap numbers in <span class="numbers">
     *
     * @var bool
     */
    public bool $set_style_numbers = true;

    /**
     * sets tags where initial quotes and guillemets should be styled
     *
     * @var array
     */
    public array $set_initial_quote_tags = [
        "p",
        "h1",
        "h2",
        "h3",
        "h4",
        "h5",
        "h6",
        "blockquote",
        "li",
        "dd",
        "dt"
    ];

    /**
     * enables hyphenation of text
     *
     * @var bool
     */
    public bool $set_hyphenation = true;

    /**
     * defines hyphenation language for text
     *
     * @var string
     */
    public string $set_hyphenation_language = "en-US";

    /**
     * establishes minimum length of a word that may be hyphenated
     *
     * @var int
     */
    public int $set_min_length_hyphenation = 5;

    /**
     * establishes minimum character requirement before a hyphenation point
     *
     * @var int
     */
    public int $set_min_before_hyphenation = 3;

    /**
     * establishes minimum character requirement after a hyphenation point
     *
     * @var int
     */
    public int $set_min_after_hyphenation = 2;

    /**
     * allows/disallows hyphenation of title/heading text
     *
     * @var bool
     */
    public bool $set_hyphenate_headings = true;

    /**
     * allows hyphenation of strings of all capital characters
     *
     * @var bool
     */
    public bool $set_hyphenate_all_caps = true;

    /**
     * allows hyphenation of strings of all capital characters
     *
     * @var bool
     */
    public bool $set_hyphenate_title_case = true;

    /**
     * defines custom word hyphenations
     * expected input is an array of words with all hyphenation points marked with a hard hyphen
     *
     * @var array
     */
    public array $set_hyphenation_exceptions = [
    ];

    /**
     * Enable lenient parser error handling (HTML is "best guess" if enabled).
     *
     * @var bool
     */
    public bool $set_ignore_parser_errors = true;

    /**
     * Sets an optional handler for parser errors. Invalid callbacks will be silently ignored
     *
     * @var callable|null
     */
    public $set_parser_errors_handler = null;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [
                [
                    'set_smart_quotes_primary',
                    'set_smart_quotes_secondary',
                    'set_smart_quotes_secondary',
                    'set_diacritic_language',
                    'set_hyphenation_language',
                ],
                'string',
            ],
            [
                [
                    'set_max_dewidow_length',
                    'set_dewidow_word_number',
                    'set_max_dewidow_pull',
                    'set_min_after_url_wrap',
                    'set_min_length_hyphenation',
                    'set_min_before_hyphenation',
                    'set_min_after_hyphenation',
                ],
                'integer',
            ],
            [
                [
                    'set_smart_quotes',
                    'set_smart_dashes',
                    'set_smart_ellipses',
                    'set_smart_diacritics',
                    'set_smart_dashes',
                    'set_smart_ellipses',
                    'set_smart_diacritics',
                    'set_smart_marks',
                    'set_smart_math',
                    'set_smart_exponents',
                    'set_smart_fractions',
                    'set_smart_ordinal_suffix',
                    'set_single_character_word_spacing',
                    'set_fraction_spacing',
                    'set_unit_spacing',
                    'set_dash_spacing',
                    'set_space_collapse',
                    'set_true_no_break_narrow_space',
                    'set_dewidow',
                    'set_wrap_hard_hyphens',
                    'set_url_wrap',
                    'set_email_wrap',
                    'set_style_ampersands',
                    'set_style_caps',
                    'set_style_initial_quotes',
                    'set_style_numbers',
                    'set_hyphenation',
                    'set_hyphenate_headings',
                    'set_hyphenate_all_caps',
                    'set_hyphenate_title_case',
                    'set_ignore_parser_errors',
                ],
                'boolean',
            ],
            [
                [
                    'set_tags_to_ignore',
                    'set_classes_to_ignore',
                    'set_ids_to_ignore',
                    'set_diacritic_custom_replacements',
                    'set_units',
                    'set_initial_quote_tags',
                    'set_hyphenation_exceptions',
                ],
                ArrayValidator::class,
            ],
            [
                [
                    'set_parser_errors_handler',
                ],
                'safe',
            ],
        ];
    }
}
