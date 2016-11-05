<?php
/**
 * User
 *
 * @package Weborama
 * @subpackage models
 */

class Film extends Model
{
	protected $table = 'VO_films';

	protected $rows = [
					'pseudo' => "string",
					'email' => "email",
					'password' => "string",
				   ];
	public function __construct(){
		parent::__construct($this->table);
	}
}
