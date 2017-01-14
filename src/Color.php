<?php namespace jpuck\ColorMixer;

use InvalidArgumentException;

class Color
{
    public function __construct($colorOrRed, $green = null, $blue = null)
    {
        $hex = $colorOrRed;
        if ( ! static::validateHexColorString($hex) ) {
            throw new InvalidArgumentException("$hex is not a valid string.");
        }
    }

    public static function validateHexColorString(string $color) : bool
    {
        // optional leading hash #
        $length = strlen( ltrim($color, '#') );

        // must be 3 or 6 characters
        switch ($length) {
            case 3: break;
            case 6: break;
            default: return false;
        }

        return preg_match('/^#?[0-9a-fA-F]{3,6}$/', $color) === 1;
    }
}
