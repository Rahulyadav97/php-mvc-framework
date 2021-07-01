<?php

class r0003_poets
{
    public function up()
    {
        $db =   \app\core\Application::$app->db;
        $SQL = "CREATE TABLE `poet` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `image` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db =   \app\core\Application::$app->db;
        $SQL = "drop table poet";
        $db->pdo->exec($SQL);
    }
}