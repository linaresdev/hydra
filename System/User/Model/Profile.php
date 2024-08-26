<?php
namespace Hydra\User\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    protected $table = 'profiles';

    protected $fillable = [
        "id",
        "user_id",
        "title",
        "gender",
        "biography",
        "website",
        "created_at",
        "updated_at"
    ];

    public function user() {
        return $this->belongsTo(Store::class);
    }
}