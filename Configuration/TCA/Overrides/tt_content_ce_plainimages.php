<?php
defined('TYPO3_MODE') || die();

$ce_element_name = 'ce_plainimages';
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
            image
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
