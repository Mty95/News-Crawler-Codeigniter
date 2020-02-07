<?php

class MY_Form_validation extends CI_Form_validation
{
    public function __construct(array $rules = array())
    {
        parent::__construct($rules);
    }

    public function valid_code($str, $params): bool
    {
        $params = $params === '' ? [] : explode(',', $params);
        $minLetter = $params[0] ?? 1;
        $minNumber = $params[1] ?? 1;

        $this->set_message('valid_code', "El campo %s debe tener al menos {$minLetter} letra y {$minNumber} número.");

        return (bool) preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/', $str);
    }

	/**
	 * Exists
	 *
	 * The field under validation must exist on a given database table.
	 * Usage:
	 * 			exists[table.field]
	 *
	 * @param string $value
	 * @param string $params
	 * @return bool
	 */
    public function exists(string $value, string $params): bool
	{
		sscanf($params, '%[^.].%[^.]', $table, $field);
		$db =& get_instance()->db;

		return $db->limit(1)->get_where($table, [$field => $value])->num_rows() !== 0;
    }

	public function accepted(string $value, string $params): bool
	{

    }
}
