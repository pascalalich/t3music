<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_t3music_domain_model_track'] = array(
	'ctrl' => $TCA['tx_t3music_domain_model_track']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, number, title, length, full_file, sample_file',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, number, title, length, full_file, sample_file,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_t3music_domain_model_track',
				'foreign_table_where' => 'AND tx_t3music_domain_model_track.pid=###CURRENT_PID### AND tx_t3music_domain_model_track.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'number' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3music/Resources/Private/Language/locallang_db.xlf:tx_t3music_domain_model_track.number',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3music/Resources/Private/Language/locallang_db.xlf:tx_t3music_domain_model_track.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'length' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3music/Resources/Private/Language/locallang_db.xlf:tx_t3music_domain_model_track.length',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'full_file' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3music/Resources/Private/Language/locallang_db.xlf:tx_t3music_domain_model_track.full_file',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file_reference',
				'uploadfolder' => 'uploads/tx_t3music',
				'allowed' => 'mp3',
				'disallowed' => '',
				'size' => 1,
			),
		),
		'sample_file' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3music/Resources/Private/Language/locallang_db.xlf:tx_t3music_domain_model_track.sample_file',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file_reference',
				'uploadfolder' => 'uploads/tx_t3music',
				'allowed' => 'mp3',
				'disallowed' => '',
				'size' => 1,
			),
		),
		'album' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);

?>