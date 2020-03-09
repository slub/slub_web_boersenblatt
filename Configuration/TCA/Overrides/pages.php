<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'slub_web_boersenblatt',
    'Configuration/TsConfig/Page.tsconfig',
    'Page Configuration'
);
