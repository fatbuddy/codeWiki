<?php
/* BusinessTypesBusinessTypes Test cases generated on: 2012-05-09 13:35:05 : 1336595705*/
App::uses('BusinessTypesBusinessTypesController', 'Controller');

/**
 * TestBusinessTypesBusinessTypesController *
 */
class TestBusinessTypesBusinessTypesController extends BusinessTypesBusinessTypesController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * BusinessTypesBusinessTypesController Test Case
 *
 */
class BusinessTypesBusinessTypesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.business_types_business_type', 'app.business_type', 'app.campaign', 'app.user', 'app.user_profile', 'app.api_key', 'app.location', 'app.click', 'app.location_impression', 'app.campaigns_location', 'app.business_types_location', 'app.campaign_source');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->BusinessTypesBusinessTypes = new TestBusinessTypesBusinessTypesController();
		$this->BusinessTypesBusinessTypes->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessTypesBusinessTypes);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {

	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {

	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {

	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {

	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {

	}

}
