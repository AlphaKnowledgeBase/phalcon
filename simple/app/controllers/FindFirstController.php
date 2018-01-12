<?php

use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Query\Builder;

class FindFirstController extends ControllerBase {

	public function indexAction() {
		$this->view->robots = Robots::findFirst();

		$robot = Robots::findFirst([
			"type = 'virtual'",
			"order" => "name",
		]);
		$this->view->setVar('robot_type', $robot);

		$robots_query = Robots::query()
			->where('type = :type:')
			->bind(['type' => 'mechanical'])
			->limit(1)
			->execute();
		$this->view->setVar('robots_query', $robots_query);
	}

	/*-----====== FIND_FIRST ======-----*/
	public function findFirstAction() {
		/**
		 * @author Vyacheslav Shetinskiy
		 * @param mixed $parameters
		 * @return \Phalcon\Mvc\Model\ResultsetInterface
		 */

		// Query the first record that matches the specified conditions
		// What's the first robot in robots table?
		$robot = Robots::findFirst();
		echo "The robot name is ", $robot->name;

		// What's the first mechanical robot in robots table?
		$robot = Robots::findFirst(
			"type = 'mechanical'"
		);
		echo "The first mechanical robot name is ", $robot->name;

		// Get first virtual robot ordered by name
		$robot = Robots::findFirst(
			[
				"type = 'virtual'",
				"order" => "name",
			]
		);
		echo "The first virtual robot name is ", $robot->name;
	}
}

