<?php
defined('TYPO3_MODE') || die();

$pathLangFile = 'LLL:EXT:slub_web_boersenblatt/Resources/Private/Language/locallang.xlf:';

//set default CType (text)
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['default'] = 'text';

//Remove Translate to / '' or prefixLangTitle
$GLOBALS['TCA']['tt_content']['columns']['header']['l10n_mode'] = 'prefixLangTitle';
$GLOBALS['TCA']['tt_content']['columns']['bodytext']['l10n_mode'] = 'prefixLangTitle';

/***************
 * Add content element group to seletor list
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        $pathLangFile . 'content.div_custom_content',
        '--div--'
    ],
    '--div--',
    'before'
);
