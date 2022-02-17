<?php

namespace LiquidLight\DataSanitiser\Service;

abstract class AbstractSanitiser
{
	/**
	 * table
	 *
	 * What table should we be randomising?
	 *
	 * @var string
	 */
	protected $table;

	/**
	 * mapping
	 *
	 * The mapping array
	 *
	 * @var array
	 */
	protected $mapping = [];

	/**
	 * unique
	 *
	 * Fields that should be unique
	 *
	 * @var array
	 */
	protected $unique = [];


	/**
	 * setTable
	 *
	 * Set the table of the randomiser
	 *
	 * @param  string $table
	 * @return self
	 */
	protected function setTable(string $table): self
	{
		$this->table = trim($table);
		return $this;
	}

	/**
	 * getTable
	 *
	 * @return string
	 */
	public function getTable(): string
	{
		return $this->table;
	}

	/**
	 * setMapping
	 *
	 * Set the ranomiser mapping
	 *
	 * @param  array $mapping
	 * @return self
	 */
	protected function setMapping(array $mapping): self
	{
		$this->mapping = $mapping;
		return $this;
	}

	/**
	 * getMapping
	 *
	 * @return array
	 */
	public function getMapping(): array
	{
		return $this->mapping;
	}

	/**
	 * setUnique
	 *
	 * Set the fields which should be unique
	 *
	 * @param  array $unique
	 * @return self
	 */
	protected function setUnique(array $unique): self
	{
		foreach($unique as $field) {
			$this->unique[$field] = true;
		}
		return $this;
	}

	/**
	 * getUnique
	 *
	 * @return array
	 */
	public function getUnique(): array
	{
		return $this->unique;
	}

	/**
	 * setEqual
	 *
	 * Set the fields which equal each other
	 *
	 * @param  array $equal
	 * @return self
	 */
	protected function setEqual(array $equal): self
	{
		$this->equal = $equal;
		return $this;
	}

	/**
	 * getEqual
	 *
	 * @return array
	 */
	public function getEqual(): array
	{
		return $this->equal;
	}

}
