<?php

declare(strict_types=1);

$svg = file_get_contents(__DIR__ . '/../assets/img/visio_logo.svg');
if (!preg_match('/href="data:image\/png;base64,([^"]+)"/', $svg, $m)) {
    fwrite(STDERR, "PNG not found in SVG\n");
    exit(1);
}

$out = __DIR__ . '/../assets/img/visio_logo.png';
file_put_contents($out, base64_decode($m[1], true));
echo 'Written: ' . $out . ' (' . filesize($out) . " bytes)\n";
