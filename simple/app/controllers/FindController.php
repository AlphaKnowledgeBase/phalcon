<?php

use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Query\Builder;

class FindController extends ControllerBase {

	public function indexAction() {
		$robots                            = Robots::find();
		$this->view->robots_count_method   = $robots->count();
		$this->view->robots_count_function = count($robots);
		$this->view->setVar('robots_array', $robots->toArray());

		$robots2 = Robots::find([
			"type = 'virtual'",
			"order" => "name",
			"limit" => 100,
		]);
		$robots3 = Robots::find([
			'columns' => ['id', 'name', 'type'],
			"conditions" => "id = ?1",
			"bind" => [
				1 => "4",
			]
		]);

		$queryBuilder = new Builder([
			"models" => ["Robots"],
			"columns" => ["id", "name", "type"],
			"group" => ["id", "name"],
			"order" => ["name", "id"],
			"limit" => 20,
			"offset" => 20,
		]);

		$query   = new Query("SELECT * FROM Robots",$this->getDI());
		$robots4 = $query->execute()->toArray();

		$this->view->setVars(['virtual_robots' => $robots2,
		                      'robots_column' => $robots3,
		                      'robots_builder' => $queryBuilder->getPhql(),
		                      'robots_query' => $robots4,
		]);
	}

	/*-----====== FIND ======-----*/
	public function findAction() {
		/**
		 * @author Vyacheslav Shetinskiy
		 * @param mixed $parameters
		 * @return \Phalcon\Mvc\Model\ResultsetInterface
		 */

		//Query for a set of records that match the specified conditions
		// How many robots are there?
		$robots1 = Robots::find();
		echo "There are ", count($robots1), "<br>";

		// How many mechanical robots are there?
		$robots2 = Robots::find(
			"type = 'mechanical'"
		);
		echo "There are ", count($robots2), "<br>";

		// Get and print virtual robots ordered by name
		$robots3 = Robots::find(
			[
				"type = 'virtual'",
				"order" => "name",
			]
		);
		foreach ($robots3 as $robot) {
			echo $robot->name, "<br>";
		}

		// Get first 100 virtual robots ordered by name
		$robots4 = Robots::find(
			[
				"type = 'virtual'",
				"order" => "name",
				"limit" => 100,
			]
		);
		foreach ($robots4 as $robot) {
			echo $robot->name, "<br>";
		}
	}
}

