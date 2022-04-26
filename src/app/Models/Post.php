<?php

namespace App\Models;

use PDO;

class Post extends Model
{
    public function getInitialPosts()
    {
        $sql = "
            SELECT
                u.username, 
                a.image as avatar, 
                p.image, 
                p.caption,
                l.likes,
                c.comments
            FROM posts p 
            LEFT JOIN users u 
            ON p.user_id = u.id 
            LEFT JOIN avatars a 
            ON a.user_id = u.id
            LEFT JOIN (
                SELECT 
                    post_id, COUNT(post_id) as `likes` 
                FROM likes
                GROUP BY post_id
            ) l ON (l.post_id = p.id)
            LEFT JOIN (
                SELECT 
                    post_id, COUNT(post_id) as `comments` 
                FROM comments
                GROUP BY post_id
            ) c ON (c.post_id = p.id)
            ORDER BY p.id 
            DESC LIMIT 15
        ";

        $connect = $this->db->connect();

        return $connect->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function createPost($user, $image, $caption)
    {
        $sql = "
            INSERT INTO posts
                (user_id, image, caption)
            VALUES
                (:user, :image, :caption)
        ";

        $connect = $this->db->connect();

        $stmt = $connect->prepare($sql);
        $stmt->execute([
            ':user' => $user,
            ':image' => $image,
            ':caption' => $caption
        ]);

        return [
            "text" => "Post Added"
        ];
    }
}
