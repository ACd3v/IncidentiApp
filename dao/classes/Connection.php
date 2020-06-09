<?php


class Connection{
    const HOSTNAME = 'localhost';
    const DB = 'incidentiapp';
    const USER = 'root';
    const PASSWORD = '';
    private static $conn = null;

    /***
     * Restituisce un oggetto della connessione al database.
     * @return type
     * @throws PDOException
     */
    public static function getConnection() {
        $dsn = "mysql:host=" . self::HOSTNAME .  ";dbname=" . self::DB;

        if(self::$conn == null) {
            try {
                //crea la connessione
                self::$conn = new PDO($dsn, self::USER, self::PASSWORD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connessione riuscita.<br>" . PHP_EOL;
            }

            catch (PDOException $e) {
                throw $e;
            }
        }

        return self::$conn;
    }
}
