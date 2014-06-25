<?php

namespace Craue\FormFlowBundle\Tests\FormFlow\Event;

use Craue\FormFlowBundle\FormFlow\Event\PostBindSavedDataEvent;

/**
 * @group unit
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2014 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class PostBindSavedDataEventTest extends \PHPUnit_Framework_TestCase {

	public function testEvent() {
		$formData = array('blah' => '123');
		$stepNumber = 2;

		$event = new PostBindSavedDataEvent($this->getMockForAbstractClass('\Craue\FormFlowBundle\FormFlow\FormFlow'), $formData, $stepNumber);

		$this->assertEquals($formData, $event->getFormData());
		$this->assertEquals($stepNumber, $event->getStepNumber());
	}

}
