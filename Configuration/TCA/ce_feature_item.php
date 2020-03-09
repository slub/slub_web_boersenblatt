<?php
defined('TYPO3_MODE') || die();

$ce_element_name = 'ce_feature';
$pathLangFile = 'LLL:EXT:slub_web_boersenblatt/Resources/Private/Language/locallang.xlf:';

return [
    'ctrl' => [
        'title' => $pathLangFile . $ce_element_name . '_item',
        'label' => 'header',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'ORDER BY sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'hideTable' => 'false',
        'searchFields' => '
            bodytext
        ',
        'typeicon_classes' => [
            'default' => $ce_element_name . '_item',
        ],
        'thumbnail' => 'image'
    ],

    'interface' => [
        'showRecordFieldList' => '
            sys_language_uid,
            l10n_parent,
            l10n_diffsource,
            hidden,
            header,
            image,
            bodytext
        ',
    ],
    'palettes' => [
        'general' => [
            'label' => $pathLangFile . 'ce_elements.palettes.general',
            'showitem' => '
                image,--linebreak--,
                header,--linebreak--,
                bodytext,--linebreak--,
                link,--linebreak--,
                linktext
            '
        ],
        'language' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.language',
            'showitem' => 'sys_language_uid,l10n_parent,l10n_diffsource',
        ],
        'visibility' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.visibility',
            'showitem' => 'hidden',
        ],
        'access' => [
            'label' => $pathLangFile . 'ce_elements.palettes.access',
            'showitem' => 'starttime, endtime',
        ],
    ],
    'types' => [
        '1' => ['showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                ---palettes---;;general,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                ---palettes---;;language,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
                ---palettes---;;visibility,
                ---palettes---;;access
        '],
    ],
    'columns' => [
        //Custom fields
        'bodytext' => [
            'exclude' => true,
            'label' => $pathLangFile . 'ce_field_text.label_default',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'eval' => 'trim'
            ]
        ],
        'header' => [
            'exclude' => true,
            'label' => $pathLangFile . 'ce_field_header.label_default',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'image' => [
            'label' => $pathLangFile . 'ce_field_image.label_default',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                '
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                '
                            ]
                        ],
                    ],
                    'minitems' => 1,
                    'maxitems' => 1,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            )
        ],
        'link' => [
            'exclude' => true,
            'label' => $pathLangFile . 'ce_field_link.label_default',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'title' => $pathLangFile . 'ce_field_link.label_default',
                        ],
                    ],
                ],
                'softref' => 'typolink'
            ],
        ],
        'linktext' => [
            'exclude' => true,
            'label' => $pathLangFile . 'ce_field_linktext.label_default',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
    ]
];
