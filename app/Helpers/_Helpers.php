<?php
$helpers = [
    'Address.php',
    'Array.php',
    'Image.php',
    'Other.php',
    'Time.php',
];

foreach ($helpers as $helperFileName) {
    include __DIR__ . '/' . $helperFileName;
}
