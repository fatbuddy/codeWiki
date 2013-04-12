<?php
/* Category Test cases generated on: 2013-04-12 15:09:43 : 1365804583*/
App::uses('Category', 'Model');

/**
 * Category Test Case
 *
 */
class CategoryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.category', 'app.post', 'app.posts_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Category = ClassRegistry::init('Category');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Category);

		parent::tearDown();
	}

}
