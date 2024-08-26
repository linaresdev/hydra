<?php
namespace Hydra\Model;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $table = 'address';

    protected $fillable = [];

    protected $timestamps = false;

    protected $dateFormat = 'U'

}