<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        "id",
        "category_id",
        "postable_type",
        "postable_id",
        "password",
        "type",
        "guid",
        "exceptions",
        "status",
        "name",
        "title",
        "slug",
        "extract",
        "body",
        "comment_status",
        "comment_count",
        "activated",
        "created_at",
        "updated_at"
    ];
}
