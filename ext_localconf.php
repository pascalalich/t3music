<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Albums',
	array(
		'Album' => 'list, show, buy',
		
	),
	// non-cacheable actions
	array(
		'Album' => 'buy',
		
	)
);

?>