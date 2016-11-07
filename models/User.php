<?php
/**
 * User
 *
 * @package Weborama
 * @subpackage models
 */

class User extends Model
{
	protected $table = 'VO_users';

	protected $rows = [
					'pseudo' => "string",
					'email' => "email",
					'password' => "string",
				   ];
	public function __construct(){
		parent::__construct($this->table);
	}
}
