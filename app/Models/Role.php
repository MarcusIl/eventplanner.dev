<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // Specify the table name if different from "roles"
    protected $primaryKey = 'id'; // Specify the primary key if different from "id"
    public $timestamps = false; // Set to "true" if your table has "created_at" and "updated_at" columns

    // Define any relationships or other logic related to the Role model
}
