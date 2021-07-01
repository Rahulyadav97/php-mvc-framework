<?php

class r0001_initial
{
    public function up()
    {
      $db =   \app\core\Application::$app->db;
      $SQL = "CREATE TABLE `posts` (
  `id` int NOT NULL,
  `posted_by` int NOT NULL,
  `poet_id` int DEFAULT NULL,
  `title` varchar(600) NOT NULL,
  `post` text NOT NULL,
  `summary` text,
  `image` varchar(500) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";
      $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db =   \app\core\Application::$app->db;
        $SQL = "drop table posts";
        $db->pdo->exec($SQL);
    }
}