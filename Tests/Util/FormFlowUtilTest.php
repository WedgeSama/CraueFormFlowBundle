<?php

namespace Craue\FormFlowBundle\Tests\Util;

use Craue\FormFlowBundle\Util\FormFlowUtil;

/**
 * @group unit
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2014 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class FormFlowUtilTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var FormFlowUtil
	 */
	protected $util;

	protected function setUp() {
		$this->util = new FormFlowUtil();
	}

	public function testAddRouteParameters() {
		/* @var $flowStub \PHPUnit_Framework_MockObject_MockObject|\Craue\FormFlowBundle\Form\FormFlow */
		$flowStub = $this->getMock('\Craue\FormFlowBundle\Form\FormFlow', array('getName', 'loadStepsConfig'));

		$flowStub
			->expects($this->once())
			->method('loadStepsConfig')
			->will($this->returnValue(array(
				array(),
				array(),
			)))
		;

		$instanceId = 'xyz';
		$flowStub->setInstanceId($instanceId);

		$flowStub->nextStep();

		$actualParameters = $this->util->addRouteParameters(array('key' => 'value'), $flowStub);

		$this->assertEquals(array('key' => 'value', 'instance' => $instanceId, 'step' => 1), $actualParameters);
	}

	public function testAddRouteParameters_explicitStepNumber() {
		/* @var $flowStub \PHPUnit_Framework_MockObject_MockObject|\Craue\FormFlowBundle\Form\FormFlow */
		$flowStub = $this->getMock('\Craue\FormFlowBundle\Form\FormFlow', array('getName'));

		$instanceId = 'xyz';
		$flowStub->setInstanceId($instanceId);

		$actualParameters = $this->util->addRouteParameters(array('key' => 'value'), $flowStub, 5);

		$this->assertEquals(array('key' => 'value', 'instance' => $instanceId, 'step' => 5), $actualParameters);
	}

	public function testRemoveRouteParameters() {
		/* @var $flowStub \PHPUnit_Framework_MockObject_MockObject|\Craue\FormFlowBundle\Form\FormFlow */
		$flowStub = $this->getMock('\Craue\FormFlowBundle\Form\FormFlow', array('getName'));

		$actualParameters = $this->util->removeRouteParameters(array('key' => 'value', 'instance' => 'xyz', 'step' => 2), $flowStub);

		$this->assertEquals(array('key' => 'value'), $actualParameters);
	}

}
