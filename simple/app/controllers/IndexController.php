<?php

class IndexController extends ControllerBase {

	public function indexAction() {
		//TODO INIT BEFORE AFTER SETTINGS
		//TODO query builders
		//TODO sql,orm,querybuilder
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

	/*-----====== COUNT ======-----*/
	public function countAction() {
		/**
		 * @author Vyacheslav Shetinskiy
		 * @param mixed $parameters
		 * @return \Phalcon\Mvc\Model\ResultsetInterface
		 */

		//Counts how many records match the specified conditions
		// How many robots are there?
		$number = Robots::count();
		echo "There are ", $number, "<br>";

		// How many mechanical robots are there?
		$number = Robots::count("type = 'mechanical'");
		echo "There are ", $number, " mechanical robots<br>";
	}

	/*-----====== SUM ======-----*/
	public function sumAction() {
		/**
		 * @author Vyacheslav Shetinskiy
		 * @param mixed $parameters
		 * @return \Phalcon\Mvc\Model\ResultsetInterface
		 */

		//Calculates the sum on a column for a result-set of rows that match the specified conditions
		// How much are all robots?
		$sum = Robots::sum(
			[
				"column" => "price",
			]
		);
		echo "The total price of robots is ", $sum, "<br>";

		// How much are mechanical robots?
		$sum = Robots::sum(
			[
				"type = 'mechanical'",
				"column" => "price",
			]
		);
		echo "The total price of mechanical robots is  ", $sum, "<br>";
	}

	/*-----====== AVARAGE ======-----*/
	public function averageAction() {
		/**
		 * @author Vyacheslav Shetinskiy
		 * @param mixed $parameters
		 * @return \Phalcon\Mvc\Model\ResultsetInterface
		 */

		//Returns the average value on a column for a result-set of rows matching the specified conditions
		// What's the average price of robots?
		$average = Robots::average(
			[
				"column" => "price",
			]
		);
		echo "The average price is ", $average, "<br>";

		// What's the average price of mechanical robots?
		$average = Robots::average(
			[
				"type = 'mechanical'",
				"column" => "price",
			]
		);
		echo "The average price of mechanical robots is ", $average, "<br>";
	}

	/*-----====== MINIMIM ======-----*/
	public function minimumAction() {
		/**
		 * @author Vyacheslav Shetinskiy
		 * @param mixed $parameters
		 * @return \Phalcon\Mvc\Model\ResultsetInterface
		 */

		// Returns the minimum value of a column for a result-set of rows that match the specified conditions
		// What is the minimum robot id?
		$id = Robots::minimum(
			[
				"column" => "id",
			]
		);
		echo "The minimum robot id is: ", $id;

		// What is the minimum id of mechanical robots?
		$sum = Robots::minimum(
			[
				"type = 'mechanical'",
				"column" => "id",
			]
		);
		echo "The minimum robot id of mechanical robots is ", $id;
	}

	/*-----====== MAXIMUM ======-----*/
	public function maximumAction() {
		/**
		 * @author Vyacheslav Shetinskiy
		 * @param mixed $parameters
		 * @return \Phalcon\Mvc\Model\ResultsetInterface
		 */

		// Returns the maximum value of a column for a result-set of rows that match the specified conditions
		// What is the maximum robot id?
		$id = Robots::maximum(
			[
				"column" => "id",
			]
		);
		echo "The maximum robot id is: ", $id, "<br>";

		// What is the maximum id of mechanical robots?
		$id = Robots::maximum(
			[
				"type = 'mechanical'",
				"column" => "id",
			]
		);
		echo "The maximum robot id of mechanical robots is ", $id, "<br>";
	}
}