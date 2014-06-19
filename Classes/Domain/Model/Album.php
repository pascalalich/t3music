<?php
namespace TYPO3\T3music\Domain\Model;

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
class Album extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * description
	 *
	 * @var \string
	 */
	protected $description;

	/**
	 * Year of publication
	 *
	 * @var \integer
	 */
	protected $year;

	/**
	 * Cover image
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $image;
	
	/**
	 * Available as CD?
	 *
	 * @var \boolean
	 */
	protected $cdAvailable;
	
	/**
	 * Available per download?
	 *
	 * @var \boolean
	 */
	protected $downloadAvailable;

	/**
	 * tracks
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\T3music\Domain\Model\Track>
	 */
	protected $tracks;

	/**
	 * __construct
	 *
	 * @return Album
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->tracks = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return \string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param \string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the year
	 *
	 * @return \integer $year
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Sets the year
	 *
	 * @param \integer $year
	 * @return void
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Returns the image
	 *
	 * @return \string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}
	
	/**
	 * Is the album available as CD?
	 * 
	 * @return boolean
	 */
	public function isCdAvailable() {
		return $this->cdAvailable;
	}
	
	/**
	 * Set CD available
	 * @param \boolean $cdAvailable
	 */
	public function setCdAvailable($cdAvailable) {
		$this->cdAvailable = $cdAvailable;
	}
	
	/**
	 * Is the album available per download?
	 * 
	 * @return boolean
	 */
	public function isDownloadAvailable() {
		return $this->downloadAvailable;
	}
	
	/**
	 * Set download available
	 * @param \boolean $downloadAvailable
	 */
	public function setDownloadAvailable($downloadAvailable) {
		$this->downloadAvailable = $downloadAvailable;
	}

	/**
	 * Adds a Track
	 *
	 * @param \TYPO3\T3music\Domain\Model\Track $track
	 * @return void
	 */
	public function addTrack(\TYPO3\T3music\Domain\Model\Track $track) {
		$this->tracks->attach($track);
	}

	/**
	 * Removes a Track
	 *
	 * @param \TYPO3\T3music\Domain\Model\Track $trackToRemove The Track to be removed
	 * @return void
	 */
	public function removeTrack(\TYPO3\T3music\Domain\Model\Track $trackToRemove) {
		$this->tracks->detach($trackToRemove);
	}

	/**
	 * Returns the tracks
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\T3music\Domain\Model\Track> $tracks
	 */
	public function getTracks() {
		return $this->tracks;
	}

	/**
	 * Sets the tracks
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\T3music\Domain\Model\Track> $tracks
	 * @return void
	 */
	public function setTracks(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tracks) {
		$this->tracks = $tracks;
	}
	
	/**
	 * Assumption: all tracks' full-length files are located in the same directory
	 * @return \string path to the album's full-length files
	 */
	public function getFullDirectory() {
		$directory = '';
		$this->tracks->rewind();
		if ($this->tracks->valid()) {
			$firstTrack = $this->tracks->current();
			$file = $firstTrack->getFullFile();
			if ($file != NULL) {
				if (($lastSlash = strrpos($file, '/')) !== false) {
					$directory = substr($file, 0, $lastSlash);
				}
			}
		}
		return $directory;
	}

}
?>