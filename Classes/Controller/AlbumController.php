<?php
namespace TYPO3\T3music\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Pascal Alich <pascal@alichs.de>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package t3music
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AlbumController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	protected $logger;
	
	
	function __construct() {
		$this->logger = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Log\\LogManager')->getLogger(__CLASS__);
	}
	
	/**
	 * albumRepository
	 *
	 * @var \TYPO3\T3music\Domain\Repository\AlbumRepository
	 * @inject
	 */
	protected $albumRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$albums = $this->albumRepository->findAll();
		$this->view->assign('albums', $albums);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\T3music\Domain\Model\Album $album
	 * @return void
	 */
	public function showAction(\TYPO3\T3music\Domain\Model\Album $album = NULL) {
		if ($album == NULL) {
			$albumId = intval($this->settings['showSingleAlbumUid']);
			$album = $this->albumRepository->findByUid($albumId);
		}
		$this->view->assign('album', $album);
	}
	
	/**
	 * action buy
	 *
	 * @param \TYPO3\T3music\Domain\Model\Album $album
	 * @param \TYPO3\T3music\Domain\Model\Track $track
	 * @param string $type
	 * @return void
	 */
	public function buyAction(\TYPO3\T3music\Domain\Model\Album $album, \TYPO3\T3music\Domain\Model\Track $track = NULL, $type) {
		$albumTitle = $album->getTitle();
		$trackTitle = $track != NULL ? $track->getTitle() : '';
		
		
		$title;
		$price;
		switch ($type) {
			case "album.cd":
				$title = "Album '$albumTitle' (CD)";
				$price = floatval(str_replace(',', '.', $this->settings['album']['cd']['price']));
				break;
			case "album.mp3":
				$title = "Album '$albumTitle' (MP3s)";
				$price = floatval(str_replace(',', '.', $this->settings['album']['mp3']['price']));
				break;
			case "track.mp3":
				$title = "Album '$albumTitle', Track '$trackTitle' (MP3)";
				$price = floatval(str_replace(',', '.', $this->settings['track']['mp3']['price']));
				break;
		}
		$this->logger->info ( "buy action", array (
				'album' => $album->getTitle(),
				'track' => $track != NULL ? $track->getNumber() : '-', 
				'type' => $type,
				'title' => $title,
				'price' => $price,
				'settings' => $this->settings
		));
		
		$product = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\T3minishop\\Domain\\Model\\Product');
		$product->setTitle($title);
		$product->setPrice($price);
		
		$orderController = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\T3minishop\\Controller\\OrderController');
		$orderController->addProductAction($product);
		
		$this->redirect('show', NULL, NULL, array('album' => $album));
	}
	
}
?>