<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class App extends Model
{
    use HasFactory;

    protected $table = 'apps';

    protected $fillable = [
        "id",
        "type",
        "parent",
        "slug",
        "driver",
        "serial",
        "activated",
        "created_at",
        "updated_at"
    ];

    
    public function configs() {
        return $this->morphMany(\Hydra\Model\Config::class, "configable");
    }

    public function meta() {
        return $this->morphMany(\Hydra\Model\Meta::class, "metable");
    }

    public function info(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => new AppMeta( $this->meta() )
        );
    }

    public function addConfig($data)
    {
        foreach( $data as $key => $value )
        {
            $this->config()->create(["key" => $key, "value" => $value]);
        }

        return $this;
    }
    public function addMeta($type, $data) 
    {
        foreach( $data as $key => $value )
        {
            $this->meta()->create([
                "type" => $type,
                "key"  => $key,
                "value" => $value
            ]);
        }

        return $this;
    }

    public function groups() {
        return $this->morphToMany(\Hydra\Model\Term::class, "taxonomies");
    }

    ## QUERY
    public function library( $slug ) {
        return $this->where("type", "library")->where("slug", $slug)->first() ?? null;
    }

}