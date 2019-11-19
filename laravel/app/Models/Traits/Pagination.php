<?php

namespace App\Models\Traits;

trait Pagination {
    public function addPagination($query,$request){
        return $query->paginate()->appends($request->query())->toJson();
    }
}