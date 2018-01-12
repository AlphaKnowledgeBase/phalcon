<?php

class Robots extends \Phalcon\Mvc\Model {

	/**
	 *
	 * @var integer
	 * @Primary
	 * @Identity
	 * @Column(type="integer", length=11, nullable=false)
	 */
	protected $id;

	/**
	 *
	 * @var string
	 * @Column(type="string", length=100, nullable=false)
	 */
	protected $name;

	/**
	 *
	 * @var string
	 * @Column(type="string", length=100, nullable=false)
	 */
	protected $type;

	/**
	 *
	 * @var integer
	 * @Column(type="integer", length=11, nullable=false)
	 */
	protected $year;

	/**
	 *
	 * @var string
	 * @Column(type="string", nullable=true)
	 */
	protected $date_created;



	/**
	 * Method to set the value of field id
	 *
	 * @param integer $id
	 * @return $this
	 */
	public function setId($id) {
		$this->id = $id;

		return $this;
	}

	/**
	 * Method to set the value of field name
	 *
	 * @param string $name
	 * @return $this
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Method to set the value of field type
	 *
	 * @param string $type
	 * @return $this
	 */
	public function setType($type) {
		$this->type = $type;

		return $this;
	}

	/**
	 * Method to set the value of field year
	 *
	 * @param integer $year
	 * @return $this
	 */
	public function setYear($year) {
		$this->year = $year;

		return $this;
	}

	/**
	 * Method to set the value of field date_created
	 *
	 * @param string $date_created
	 * @return $this
	 */
	public function setDateCreated($date_created) {
		$this->date_created = $date_created;

		return $this;
	}

	/**
	 * Returns the value of field id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Returns the value of field name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Returns the value of field type
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Returns the value of field year
	 *
	 * @return integer
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Returns the value of field date_created
	 *
	 * @return string
	 */
	public function getDateCreated() {
		return $this->date_created;
	}

	/**
	 * Initialize method for model.
	 */
	public function initialize() {
		$this->setSchema("micro_app");
		$this->setSource("robots");
	}

	/**
	 * Returns table name mapped in the model.
	 *
	 * @return string
	 */
	public function getSource() {
		return 'robots';
	}

	/**
	 * Allows to query a set of records that match the specified conditions
	 *
	 * @param mixed $parameters
	 * @return Robots[]|Robots|\Phalcon\Mvc\Model\ResultSetInterface
	 */
	public static function find($parameters = null) {
		return parent::find($parameters);
	}

	/**
	 * Allows to query the first record that match the specified conditions
	 *
	 * @param mixed $parameters
	 * @return Robots|\Phalcon\Mvc\Model\ResultInterface
	 */
	public static function findFirst($parameters = null) {
		return parent::findFirst($parameters);
	}

	/**
	 * Independent Column Mapping.
	 * Keys are the real names in the table and the values their names in the application
	 *
	 * @return array
	 */
	public function columnMap() {
		return [
			'id' => 'id',
			'name' => 'name',
			'type' => 'type',
			'year' => 'year',
			'date_created' => 'date_created'
		];
	}

}
