<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';

    protected $fillable = [
        "id",
        "type",
        "parent",
        "slug",
        "name",
        "activated",
        "created_at",
        "updated_at"
    ];

    public function apps() {
        return $this->morphedByMany(\Hydra\Model\App::class, "taxonomies");
    }

    public function configs() {
        return $this->morphedByMany(\Hydra\Model\Config::class, "taxonomies");
    }

    public function meta() {
        return $this->morphMany(\Hydra\Model\Meta::class, "metable");
    }

    public function users() {
        return $this->morphedByMany(\Hydra\User\Model\Store::class, "taxonomies");
    }

    public function taxonomies() {
        return $this->morphMany(\Hydra\Model\Taxonomy::class, "taxonomies");
    }

    public function createTaxonomy($data)
    {
        return $this->taxonomies()->create($data);
    }
}