<?php
/**
 * Film
 *
 * @package Weborama
 * @subpackage models
 */

class Film extends Model
{
	protected $table = 'VO_films';

	protected $rows = [
					'fb_id' => "string",
					'title' => "string",
					'annee' => "integer",
					'author' => "string",
					'image' => "string",
					'vote' => "integer",
					'ajout_date' => "string",
				   ];
	public function __construct(){
		parent::__construct($this->table);
	}
}
