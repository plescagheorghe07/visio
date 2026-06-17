<?php
/** @var string $from Section id source */
/** @var string $to Section id target */
/** @var int $index Bridge index for alternating curves */
$from = $from ?? 'home';
$to = $to ?? 'about';
$index = $index ?? 0;
$flip = $index % 2 === 1;
$pathA = $flip
    ? 'M0,80 C200,20 400,140 600,60 S900,10 1200,70'
    : 'M0,60 C180,120 360,10 540,80 S820,130 1200,50';
$pathB = $flip
    ? 'M0,100 C250,40 500,160 750,80 S1000,20 1200,90'
    : 'M0,90 C220,30 440,150 660,70 S880,110 1200,40';
?>
<div class="wave-bridge" data-bridge-from="<?= e($from) ?>" data-bridge-to="<?= e($to) ?>" aria-hidden="true">
    <svg class="wave-bridge-svg" viewBox="0 0 1200 160" preserveAspectRatio="none">
        <defs>
            <linearGradient id="waveGrad<?= $index ?>" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="var(--gradient-1)" stop-opacity="0"/>
                <stop offset="30%" stop-color="var(--gradient-1)" stop-opacity="0.6"/>
                <stop offset="70%" stop-color="var(--gradient-2)" stop-opacity="0.6"/>
                <stop offset="100%" stop-color="var(--gradient-3)" stop-opacity="0"/>
            </linearGradient>
        </defs>
        <path class="wave-path wave-path--bg" d="<?= $pathA ?>" fill="none" stroke="url(#waveGrad<?= $index ?>)" stroke-width="2" opacity="0.15"/>
        <path class="wave-path wave-path--fg connector-path" d="<?= $pathB ?>" fill="none" stroke="url(#waveGrad<?= $index ?>)" stroke-width="2.5"/>
    </svg>
    <a href="#<?= e($from) ?>" class="wave-node wave-node--start" title="<?= e(__('nav_' . $from)) ?>">
        <span class="wave-node-dot"></span>
        <span class="wave-node-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/></svg>
        </span>
    </a>
    <a href="#<?= e($to) ?>" class="wave-node wave-node--end" title="<?= e(__('nav_' . $to)) ?>">
        <span class="wave-node-dot"></span>
        <span class="wave-node-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
    </a>
</div>
