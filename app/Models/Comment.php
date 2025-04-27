<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class Comment extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

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

    public function comments(int $postId)
    {
        $comments = $this->select('
            comments.id,
            comments.comment,
            users.firstName as userFirstName,
            users.lastName as userLastName,
            users.id as userId,
            users.image as avatar,
            comments.created_at,
        ')->join(
            'users',
            'comments.user_id = users.id'
        )->where(
            'post_id',
            $postId
        )->findAll();

        if (!$comments) {
            return [];
        }

        $commentsIds = [];
        foreach ($comments as $comment) {
            $commentsIds[] = $comment->id;
        }

        $replies = (new Reply())->replies($commentsIds);

        $commentsData = new stdClass();
        foreach ($comments as $index => $comment) {

            $commentsData->comments[] = $comment;
            $commentsData->comments[$index]->isAuthor = !session()->has('auth') ? false : (session()->get('user')->id == $comment->userId ? true : false);

            foreach ($replies as $indexReply => $reply) {

                if ($comment->id == $reply->comment_id) {
                    $commentsData->comments[$index]->replies[$indexReply] = $reply;
                    $commentsData->comments[$index]->replies[$indexReply]->isAuthor = !session()->has('auth') ? false : (session()->get('user')->id == $reply->userId ? true : false);
                }
            }

        }
        
//        echo "<pre>";
//        var_dump($commentsData);
//        echo "</pre>";
//        die();
        return $commentsData;

    }
}
