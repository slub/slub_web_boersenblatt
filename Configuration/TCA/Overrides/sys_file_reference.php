<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['sys_file_reference']['columns']['crop']['config']['cropVariants']['default'] = [
    'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.crop_variant.default',
    'allowedAspectRatios' => [
        '4:5' => [
            'title' => 'Default',
            'value' => 0.7504690
        ],
        'NaN' => [
            'title' => 'Free',
            'value' => 0.0
        ],
    ],
];
