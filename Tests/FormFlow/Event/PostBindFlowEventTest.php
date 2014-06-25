<?php

namespace Craue\FormFlowBundle\Tests\FormFlow\Event;

use Craue\FormFlowBundle\FormFlow\Event\PostBindFlowEvent;

/**
 * @group unit
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2014 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class PostBindFlowEventTest extends \PHPUnit_Framework_TestCase {

	public function testEvent() {
		$formData = array('blah' => '123');

		$event = new PostBindFlowEvent($this->getMockForAbstractClass('\Craue\FormFlowBundle\FormFlow\FormFlow'), $formData);

		$this->assertEquals($formData, $event->getFormData());
	}

}
