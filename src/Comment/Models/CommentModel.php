<?php

namespace App\Post\Models;

use App\Core\Models\AbstractModel;

class CommentModel extends AbstractModel
{
    
    public $id;
    public $content;
    public $post_id;
}