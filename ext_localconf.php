<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        /**
         * Extension key
         */
        $extensionKey = 'slub_web_boersenblatt';

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTsConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $extensionKey . '/Configuration/TsConfig/User/Default.tsconfig">'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTsConfig(
            '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $extensionKey . '/Configuration/TsConfig/Page/" extensions="tsconfig">'
        );

        //register rte settings
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['sitepackage_default'] =
            'EXT:' . $extensionKey . '/Configuration/Yaml/Rte/Default.yaml';

        if (TYPO3_MODE === 'BE') {
            //register Icons
            $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                \TYPO3\CMS\Core\Imaging\IconRegistry::class
            );

            //Page
            $iconRegistry->registerIcon(
                'belayout-default',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:' . $extensionKey . '/Resources/Public/Icons/Page/Default.svg']
            );

            //Content
            $icons = [
                'ce_plainimages' => 'image',
                ];

            foreach ($icons as $key => $icon) {
                $iconRegistry->registerIcon(
                    $key,
                    \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
                    ['name' => $icon]
                );
            }
        }
    }
);
