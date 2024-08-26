<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $table = 'counters';

    protected $fillable = [
        "id",
        "slug",
        "description",
        "counter"
    ];

    public $timestamps = false;

    public function users() {
        return $this->belongsTo(\Hydra\User\Model\Store::class, "contable_id", "id");
    }
}