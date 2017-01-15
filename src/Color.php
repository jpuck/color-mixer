<?php namespace jpuck\ColorMixer;

use InvalidArgumentException;

class Color
{
    protected $hex;

    /**
     * Creates an instance of Color.
     *
     * @param string $hex CSS hexadecimal color with optional leading hash #
     *
     * @return Color Returns a new instance of Color.
     */
    public function __construct(string $hex)
    {
        if ( ! static::validateHexColorString($hex) ) {
            throw new InvalidArgumentException("$hex is not a valid string.");
        }

        $this->hex = strtoupper( ltrim($hex, '#') );
    }

    /**
     * Get the CSS hexadecimal color.
     *
     * @return string Returns hexadecimal color string with leading hash #.
     */
    public function hex(string ...$options) : string
    {
        $return = $this->hex;

        if ( ! in_array('no-hash', $options) ) {
            $return = '#'.$return;
        }

        return $return;
    }

    /**
     * Get the CSS decimal color.
     *
     * @return array Returns rgb integer decimal colors.
     */
    public function dec() : array
    {
        $colors = str_split( $this->hex('no-hash'), 2 );

        return array_map(function($color){
            return hexdec($color);
        }, $colors);
    }

    /**
     * Validates CSS hexadecimal color.
     *
     * @param string $hex CSS hexadecimal color with optional leading hash #
     *
     * @return bool Returns true if valid CSS hexadecimal color, otherwise false.
     */
    public static function validateHexColorString(string $hex) : bool
    {
        // optional leading hash #
        $length = strlen( ltrim($hex, '#') );

        // must be 3 or 6 characters
        switch ($length) {
            case 3: break;
            case 6: break;
            default: return false;
        }

        return preg_match('/^#?[0-9a-fA-F]{3,6}$/', $hex) === 1;
    }
}
