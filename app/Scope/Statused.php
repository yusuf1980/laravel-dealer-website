<?php namespace App\Scope;

trait Statused {
	public static function bootStatused()
	{
		static::addGlobalScope(new StatusedScope);
	}

	public static function withDrafts()
	{
		return with(new static)->newQueryWithoutScope(new StatusedScope);
	}
}