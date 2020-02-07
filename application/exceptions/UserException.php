<?php
namespace App\Exceptions;

class UserException extends \Exception
{
	public static function emailDoNotExists(): UserException
	{
		return new static('Este email no existe.');
	}

	public static function incorrectPassword(): UserException
	{
		return new static('Contraseña incorrecta');
	}
}
