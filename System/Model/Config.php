<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';

    protected $fillable = [
        "id",
        "key",
        "value",
        "activated"
    ];

    public $timestamps = false;

    public function apps() {
        return $this->belongsTo(\Hydra\Model\App::class,"configable_id", "id");
    }

    public function users() {
        return $this->belongsTo(\Hydra\User\Model\Store::class, "configable_id", "id");
    }

    public function configable() {
        return $this->morphTo();
    }

    public function groups() {
        return $this->morphToMany(\Hydra\Model\Config::class, "taxonomies");
    }
}