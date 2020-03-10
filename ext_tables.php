<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

/***************
 * Allow IRRE elements at Standard Pages
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('ce_feature_item');
