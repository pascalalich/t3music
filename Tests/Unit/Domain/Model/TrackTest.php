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
 * Test case for class \TYPO3\T3music\Domain\Model\Track.
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
class TrackTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\T3music\Domain\Model\Track
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\T3music\Domain\Model\Track();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNumberReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getNumber()
		);
	}

	/**
	 * @test
	 */
	public function setNumberForIntegerSetsNumber() { 
		$this->fixture->setNumber(12);

		$this->assertSame(
			12,
			$this->fixture->getNumber()
		);
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
	public function getLengthReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLengthForStringSetsLength() { 
		$this->fixture->setLength('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLength()
		);
	}
	
	/**
	 * @test
	 */
	public function getFullFileReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFullFileForStringSetsFullFile() { 
		$this->fixture->setFullFile('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFullFile()
		);
	}
	
	/**
	 * @test
	 */
	public function getSampleFileReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSampleFileForStringSetsSampleFile() { 
		$this->fixture->setSampleFile('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSampleFile()
		);
	}
	
}
?>