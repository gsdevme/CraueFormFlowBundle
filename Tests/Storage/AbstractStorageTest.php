<?php

namespace Craue\FormFlowBundle\Tests\Storage;

use Craue\FormFlowBundle\Storage\StorageInterface;

/**
 * @group unit
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2013 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
abstract class AbstractStorageTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var StorageInterface
	 */
	protected $storage;

	/**
	 * {@inheritDoc}
	 */
	protected function setUp() {
		$this->storage = $this->getStorageImplementation();
	}

	/**
	 * @return StorageInterface
	 */
	abstract protected function getStorageImplementation();

	public function testSet() {
		$this->storage->set('foo', 'bar');
		$this->assertTrue($this->storage->has('foo'));
		$this->assertEquals('bar', $this->storage->get('foo'));
	}

	public function testGet() {
		$this->assertNull($this->storage->get('foo'));
	}

	public function testHas() {
		$this->assertFalse($this->storage->has('foo'));
	}

	public function testRemove() {
		$this->assertNull($this->storage->remove('foo'));

		$this->storage->set('foo', 'bar');
		$this->assertEquals('bar', $this->storage->remove('foo'));
	}

}
