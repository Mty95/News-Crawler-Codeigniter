<?php

namespace App\Exceptions;

use Throwable;

class ValidationFieldException extends \Exception
{
	protected $field = '';

	private function __construct($message = '')
	{
		parent::__construct($message);
	}

	private function setField(string $field): void
	{
		$this->field = $field;
	}

	public function getField(): string
	{
		return $this->field;
	}

	public static function notValid(string $message, string $field): ValidationFieldException
	{
		$exception = new static($message);
		$exception->setField($field);
		return $exception;
	}
}
