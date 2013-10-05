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
class Track extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * number
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $number;

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Track length in format minutes:seconds
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $length;

	/**
	 * Song in full length
	 *
	 * @var \string
	 */
	protected $fullFile;

	/**
	 * Song in sample length
	 *
	 * @var \string
	 */
	protected $sampleFile;

	/**
	 * Returns the number
	 *
	 * @return \integer $number
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Sets the number
	 *
	 * @param \integer $number
	 * @return void
	 */
	public function setNumber($number) {
		$this->number = $number;
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
	 * Returns the length
	 *
	 * @return \string $length
	 */
	public function getLength() {
		return $this->length;
	}

	/**
	 * Sets the length
	 *
	 * @param \string $length
	 * @return void
	 */
	public function setLength($length) {
		$this->length = $length;
	}

	/**
	 * Returns the fullFile
	 *
	 * @return \string $fullFile
	 */
	public function getFullFile() {
		return $this->fullFile;
	}

	/**
	 * Sets the fullFile
	 *
	 * @param \string $fullFile
	 * @return void
	 */
	public function setFullFile($fullFile) {
		$this->fullFile = $fullFile;
	}

	/**
	 * Returns the sampleFile
	 *
	 * @return \string $sampleFile
	 */
	public function getSampleFile() {
		return $this->sampleFile;
	}

	/**
	 * Sets the sampleFile
	 *
	 * @param \string $sampleFile
	 * @return void
	 */
	public function setSampleFile($sampleFile) {
		$this->sampleFile = $sampleFile;
	}

}
?>