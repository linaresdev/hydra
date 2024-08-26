<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $table = 'medias';

    protected $fillable = [
        "id",
        "mediable_type",
        "mediable_id",
        "type",
        "name", 
        "description",
        "mime",
        "url",
        "activated",
        "created_at",
        "updated_at"
    ];
}