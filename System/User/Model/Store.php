<?php
namespace Hydra\User\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Store extends User {

    protected $table = 'users';

    protected $fillable = [
        "type",
        "name",
        "firstname",
        "lastname",
        "rnc",
        "cellphone",
        "user",
        "email",
        "email_verified_at",
        "password",
        "remember_token",
        "activated",
        "created_at",
        "updated_at"
    ];

    public function password(): Attribute {        
        return Attribute::make(
            set: fn ($value) => bcrypt($value)
        );
    }

    public function configs() {
        return $this->morphMany(\Hydra\Model\Config::class, "configable");
    }
    
    public function avatar() {
        return $this->morphOne(\Hydra\Model\Avatar::class, "avatable");
    }
    public function addAvatar($data) {
        return $this->avatar()->create($data);
    }

    public function meta() {
        return $this->morphMany(\Hydra\Model\Meta::class, "metable");
    }

    public function profile() {
        return $this->hasOne(Profile::class, "user_id");
    }

    public function addProfile( $data ) {
        return $this->profile()->create($data);
    }
}