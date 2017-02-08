# PHP Color Mixer

*Mix CSS colors like paint.*

Supports the [CSS color keywords up to Color Module Level 4][13] and
hexadecimal values with or without a leading hash `#`

See [`example.php`][4] for some basic usage mixing 5 colors.
The background color and the 6th panel are the mix of the given colors.

```php
use jpuck\ColorMixer\Mixer;

$colors = [
    'rebeccapurple',
    '#33Ab42',
    '000000',
    '#00f',
    'red',
];

$mix = ( new Mixer(...$colors) )->mix()->hex();
```

[![color output from example.php][14]][4]

## Installation

Requires PHP 7

Registered on [packagist][6] for easy installation using [composer][5].

    composer require jpuck/color-mixer

Branch      | Status
----------- | ------
[master][1] | [![Build Status][3]][2] [![Codecov][8]][7]

[![License][11]][10]
[![Total Downloads][12]][10]
[![Latest Stable Version][9]][10]

[1]:https://github.com/jpuck/color-mixer
[2]:https://travis-ci.org/jpuck/color-mixer
[3]:https://travis-ci.org/jpuck/color-mixer.svg?branch=master
[4]:./public/example.php
[5]:https://getcomposer.org/
[6]:https://packagist.org/packages/jpuck/color-mixer
[7]:https://codecov.io/gh/jpuck/color-mixer/branch/master
[8]:https://img.shields.io/codecov/c/github/jpuck/color-mixer/master.svg
[9]:https://poser.pugx.org/jpuck/color-mixer/v/stable
[10]:https://github.com/jpuck/avhost/releases/latest
[11]:https://poser.pugx.org/jpuck/color-mixer/license
[12]:https://img.shields.io/github/downloads/jpuck/color-mixer/total.svg
[13]:https://developer.mozilla.org/en-US/docs/Web/CSS/color_value#Color_keywords
[14]:./docs/images/example.png
