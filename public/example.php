<div id="color-mixer-container">

<?php require_once __DIR__.'/../vendor/autoload.php';

use jpuck\ColorMixer\Mixer;

$colors = [
    'rebeccapurple',
    '#33Ab42',
    '000000',
    '#00f',
    'red',
];

$mix = (new Mixer(...$colors))->mix()->hex();

foreach ( $colors as $color ) { ?>
    <svg class="color-mixer-item">
        <rect
            width="100%"
            height="100%"
            style="fill:<?php echo $color; ?>"
        />
    </svg>
    <br/>
<?php } ?>
    <svg class="color-mixer-item">
        <rect
            width="100%"
            height="100%"
            style="fill:<?php echo $mix; ?>"
        />
    </svg>
</div>

<style>
html, body, #color-mixer-container {
    height: 100%;
}
body {
    margin: 0;
}
#color-mixer-container {
    display: flex;
    justify-content: space-around;
    background-color: <?php echo $mix; ?>;
}
.color-mixer-item {
    margin: 2%;
}
</style>
