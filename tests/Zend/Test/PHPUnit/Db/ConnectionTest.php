<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Test
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: ConnectionTest.php 23775 2011-03-01 17:25:24Z ralph $
 */

require_once "Zend/Test/DbAdapter.php";
require_once "Zend/Test/PHPUnit/Db/Connection.php";

/**
 * @category   Zend
 * @package    Zend_Test
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @group      Zend_Test
 */
class Zend_Test_PHPUnit_Db_ConnectionTest extends PHPUnit_Framework_TestCase
{
    protected $adapterMock;

    public function setUp()
    {
        $this->adapterMock = $this->getMock('Zend_Test_DbAdapter');
    }

    /**
     * @return Zend_Test_PHPUnit_Db_Connection
     */
    public function createConnection()
    {
        $connection = new Zend_Test_PHPUnit_Db_Connection($this->adapterMock, "schema");
        return $connection;
    }

    public function testCloseConnection()
    {
        $this->adapterMock->expects($this->once())
                    ->method('closeConnection');

        $connection = $this->createConnection();
        $connection->close();
    }

    public function testCreateQueryTable()
    {
        $connection = $this->createConnection();
        $ret = $connection->createQueryTable("foo", "foo");

        $this->assertType('Zend_Test_PHPUnit_Db_DataSet_QueryTable', $ret);
    }

    public function testGetSchema()
    {
        $fixtureSchema = "schema";
        $connection = new Zend_Test_PHPUnit_Db_Connection($this->adapterMock, $fixtureSchema);

        $this->assertEquals($fixtureSchema, $connection->getSchema());
    }

    public function testGetMetaData()
    {
        $connection = $this->createConnection();
        $metadata = $connection->getMetaData();

        $this->assertType('Zend_Test_PHPUnit_Db_Metadata_Generic', $metadata);
    }

    public function testGetTruncateCommand()
    {
        $connection = $this->createConnection();

        $this->assertEquals("DELETE", $connection->getTruncateCommand());
    }
}