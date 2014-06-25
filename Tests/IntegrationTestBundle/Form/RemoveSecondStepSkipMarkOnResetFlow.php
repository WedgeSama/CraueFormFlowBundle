<?php

namespace Craue\FormFlowBundle\Tests\IntegrationTestBundle\Form;

use Craue\FormFlowBundle\FormFlow\FormFlow;
use Craue\FormFlowBundle\FormFlow\FormFlowInterface;

/**
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2014 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class RemoveSecondStepSkipMarkOnResetFlow extends FormFlow {

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return 'removeSecondStepSkipMarkOnReset';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function loadStepsConfig() {
		return array(
			array(
				'label' => 'step1',
			),
			array(
				'label' => 'step2',
				'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
					return $estimatedCurrentStepNumber > 1;
				},
			),
			array(
				'label' => 'step3',
			),
		);
	}

}
