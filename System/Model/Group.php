<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        "groupable_type",
        "groupable_id",
        "parent",
        "slug",
        "description",
        "counter",
        "created_at",
        "updated_at"
    ];

    // public function meta(): Attribute {
    //     return Attribute::make(
    //         set: fn ($value) => json_encode($value),
    //         get: fn ($value) => json_decode($value)
    //     );
    // }

    public function users() {
        return $this->morphedByMany(\Hydra\User\Model\Store::class, "groupable");
    }

    public function meta() {
        return $this->morphMany(\Hydra\Model\Meta::class, "metable");
    }

    public function addMeta($data=null)
    {
        if( is_array($data) )
        {
            foreach( $data as $key => $value ) {
                $this->meta()->create(["key" => $key, "value" => $value]);
            }
        }
    }
}