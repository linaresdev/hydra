<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    protected $fillable = [
        "id",
        "parent",
        "commentable_type",
        "commentable_id",
        "author",
        "author_email",
        "body",
        "comment_count"
        "activated",
        "created_at",
        "updated_at"
    ];
}