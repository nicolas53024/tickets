<?php


namespace App\Models;

use App\Libraries\BaseModel;

class UserModel extends BaseModel
{

    public $table_name= 'users';

    public function __construct()
    {
        parent::__construct();
    }

    

}
