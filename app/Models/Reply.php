<?php

namespace App\Models;

use CodeIgniter\Model;

class Reply extends Model
{
    protected $table            = 'replies';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_id', 'comment_id', 'comment'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function replies(array $commentsIds)
    {
        return $this->select('
            replies.id,
            replies.comment_id,
            replies.comment,
            users.firstName as userFirstName,
            users.lastName as userLastName,
            users.id as userId,
            users.image as avatar,
            replies.created_at,
        ')->join(
            'users',
            'replies.user_id = users.id'
        )->whereIn('comment_id', $commentsIds)->findAll();
    }
}
