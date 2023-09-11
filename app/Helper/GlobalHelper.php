<?php

use App\Models\setting\academic_session;

function getCurrentAcademicSession($obj = true)
{
    $academic_session = academic_session::query()->where('is_active', true)->first();
    return ($obj ? $academic_session->name : $academic_session->id);
}

function checkIfElementExistInCollection($collections, $key, $value)
{
    $check =  $collections->contains(function ($collection, $k) use ($value, $key) {
        return $collection->$key == $value;
    });

    return $check;
}
