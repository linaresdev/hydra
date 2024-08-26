<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model {

    protected $table = 'taxonomies';

    protected $fillable = [
        "id",
        "taxonomies_id",
        "taxonomies_type",
        "taxonomy",
        "description",
        "counter",
        "created_at",
        "updated_at"
    ];
}