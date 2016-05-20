<?php
/**
 * File		Generic_DatabaseTestCase.php
 * 通用的抽象 TestCase 类，并且可以为每个测试用例指定不同的数据基境
 */
abstract class Generic_DatabaseTestCase extends PHPUnit_Extensions_Database_TestCase
{
    // 只实例化 pdo 一次，供测试的清理和基境读取使用。
    static private $pdo = null;

    // 对于每个测试，只实例化 PHPUnit_Extensions_Database_DB_IDatabaseConnection 一次。
    private $conn = null;

    final public function getConnection()
    {
        if ($this->conn === null) { 
            if (self::$pdo == null) {
                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
            }
           $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']); 
        }

        return $this->conn; 
    }
}
?>
