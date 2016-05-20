<?php

/**
 * File       InterfaceTest_MySQL.php
 * @category  PHPUINT with MySQL
 * @author    WU WEI <wuweihku@163.com>
 */

require_once "selfdefine/CurlPost.php";
require_once "selfdefine/Generic_DatabaseTestCase.php";

class InterfaceTest_MySQL implements Generic_DatabaseTestCase
{

	
	/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
	public static function setUpBeforeClass()
	{
		$db_con = $this->getConnection();
	}


    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     * 这里用查询SQL数据集
	 */
    public function getDataSet()
    {
		$ds = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($db_con);
		$ds->addTable('accounts', 'SELECT action,internal,appId,from,signature,username,expected FROM accounts');
    }




	public static function tearDownAfterClass()
	{
		$db_con = NULL;
	}





}
?>
