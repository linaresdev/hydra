<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model {

    protected $table = 'avatars';

    protected $fillable = [
        "avatable_type",
        "avatable_id",
        "name",
        "url",
        "activated",
        "created_at",
        "updated_at"
    ];
}