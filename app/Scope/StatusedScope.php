<?php namespace App\Scope;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class StatusedScope implements Scope 
{
	public function apply(Builder $builder, Model $model)
	{
		$builder->where('status', 'PUBLISHED');
	}

	public function remove(Builder $builder, Model $model)
	{
		$query = $builder->getQuery();
		
		foreach ((array) $query->wheres as $key => $where)
		{
			// mengecek apakah opsi where ini merupakan constraint untuk published
			if ($where['type'] == 'Basic' && $where['column'] == 'status' && $where['value'] == 'PUBLISHED') {
				// menghapus query dari opsi where
				unset($query->wheres[$key]);
				$query->wheres = array_values($query->wheres);
				// menghapus binding
				$bindings = $query->getRawBindings()['where'];
				unset($bindings[$key]);
				$query->setBindings($bindings);
			}
		}
		return $query;
	}
}