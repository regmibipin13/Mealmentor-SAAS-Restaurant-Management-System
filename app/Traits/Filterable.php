<?php

namespace App\Traits;

trait Filterable
{
    public function scopeFilters($query)
    {
        $fillables = $this->getFillable();
        array_push($fillables, 'id');
        foreach ($fillables as $key => $name) {
            if (request()->has($name) && $this->isValidValue(request()->$name)) {
                $query->where($name, 'like', '%' . request()->$name . '%');
            }
        }
        return $query;
    }

    public function isValidValue($value)
    {
        if ($value !== null && $value !== '' && $value !== 'all') {
            return true;
        }
        return false;
    }
}
