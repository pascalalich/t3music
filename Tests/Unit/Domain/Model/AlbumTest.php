<?php

namespace TYPO3\T3music\Tests;
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \TYPO3\T3music\Domain\Model\Album.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Music
 *
 * @author Pascal Alich <pascal@alichs.de>
 */
class AlbumTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\T3music\Domain\Model\Album
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\T3music\Domain\Model\Album();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getYearReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getYear()
		);
	}

	/**
	 * @test
	 */
	public function setYearForIntegerSetsYear() { 
		$this->fixture->setYear(12);

		$this->assertSame(
			12,
			$this->fixture->getYear()
		);
	}
	
	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImageForStringSetsImage() { 
		$this->fixture->setImage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImage()
		);
	}
	
	/**
	 * @test
	 */
	public function getTracksReturnsInitialValueForTrack() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getTracks()
		);
	}

	/**
	 * @test
	 */
	public function setTracksForObjectStorageContainingTrackSetsTracks() { 
		$track = new \TYPO3\T3music\Domain\Model\Track();
		$objectStorageHoldingExactlyOneTracks = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneTracks->attach($track);
		$this->fixture->setTracks($objectStorageHoldingExactlyOneTracks);

		$this->assertSame(
			$objectStorageHoldingExactlyOneTracks,
			$this->fixture->getTracks()
		);
	}
	
	/**
	 * @test
	 */
	public function addTrackToObjectStorageHoldingTracks() {
		$track = new \TYPO3\T3music\Domain\Model\Track();
		$objectStorageHoldingExactlyOneTrack = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneTrack->attach($track);
		$this->fixture->addTrack($track);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTrack,
			$this->fixture->getTracks()
		);
	}

	/**
	 * @test
	 */
	public function removeTrackFromObjectStorageHoldingTracks() {
		$track = new \TYPO3\T3music\Domain\Model\Track();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($track);
		$localObjectStorage->detach($track);
		$this->fixture->addTrack($track);
		$this->fixture->removeTrack($track);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getTracks()
		);
	}
	
}
?>