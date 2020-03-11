<?php
defined('TYPO3_MODE') || die();

$ce_element_name = 'ce_feature';
$pathLangFile = 'LLL:EXT:slub_web_boersenblatt/Resources/Private/Language/locallang.xlf:';

/***************
 * Add Content Element
 */
if (!is_array($GLOBALS['TCA']['tt_content']['types'][$ce_element_name])) {
    $GLOBALS['TCA']['tt_content']['types'][$ce_element_name] = [];
}

/***************
 * Add Content Element to Selector List
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        $pathLangFile . $ce_element_name . '.title',
        $ce_element_name,
        $ce_element_name,
    ],
    '--div--',
    'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$ce_element_name] = $ce_element_name;

/***************
 * Content Palette
 */
$GLOBALS['TCA']['tt_content']['palettes'][$ce_element_name] = [
    'showitem' => '
            header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.html_formlabel,
            --linebreak--,
            ' . $ce_element_name . '_item
        ',
];

/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types'][$ce_element_name] = [
    'showitem' => '
           --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;; ' . $ce_element_name . ',
        ',
];

/***************
 * Register fields
 */
$GLOBALS['TCA']['tt_content']['columns'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['columns'],
    [
        $ce_element_name . '_item' => [
            'label' => $pathLangFile . $ce_element_name . '_item.title',
            'config' => [
                'type' => 'inline',
                'foreign_table' => $ce_element_name . '_item',
                'foreign_field' => 'tt_content',
                'minitems' => 0,
                'maxitems' => 3,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => false,
                    'headerThumbnail' => [
                        'field' => 'uid_local',
                        'width' => '45',
                        'height' => '45c',
                    ],
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'sort' => false,
                        'hide' => true,
                        'delete' => true,
                        'dragdrop' => true,
                        'localize' => true,
                    ],
                ],
                'behaviour' => [
                    'mode' => 'select',
                ],
            ],
        ],
    ]
);
