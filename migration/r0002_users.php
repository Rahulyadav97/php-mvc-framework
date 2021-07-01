<?php
class r0002_users
{
    public function up()
    {
        $db =   \app\core\Application::$app->db;
        $SQL = "CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db =   \app\core\Application::$app->db;
        $SQL = "drop table users";
        $db->pdo->exec($SQL);
    }
}