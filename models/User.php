<?php

class User extends Model 
{
	public $validate_presence_of = [
		['name'],
		['email'],
		['password']
	];

	public $validate_uniqueness_of = [
		['email']
	];
}