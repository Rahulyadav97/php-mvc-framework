<?php


namespace app\core;


class Database
{
    public \PDO $pdo;

    public function __construct(array $config)
    {
        $dsn=$config['dsn'] ?? '';
        $user=$config['user'] ?? '';
        $password=$config['password'] ?? '';
        $this->pdo = new \PDO($dsn,$user,$password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
      $this->createMigrationsTable();
      $appliedMigration = $this->getAppliedMigrations();
        $newMigrations = [];
      $files = scandir(Application::$Root_DIR.'/migration');
      $toApplyMigrations = array_diff($files,$appliedMigration);

      foreach ($toApplyMigrations as $migration){
          if ($migration == '.' || $migration == '..') continue;
          echo "including ".$migration;
                         require_once Application::$Root_DIR.'/migration/'.$migration;

               $className = pathinfo($migration,PATHINFO_FILENAME);
               $instance = new $className();
               echo "Applying migration".$migration;
               $instance->up();
          $newMigrations[] = $migration;
      }
        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("There are no migrations to apply");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
    protected function saveMigrations(array $newMigrations)
    {
        $str = implode(',', array_map(fn($m) => "('$m')", $newMigrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");
        $statement->execute();
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    private function log($message)
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
    }


}