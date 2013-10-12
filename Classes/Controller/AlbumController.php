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
}
?>