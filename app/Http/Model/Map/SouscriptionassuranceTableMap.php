<?php

namespace App\Http\Model\Map;

use App\Http\Model\Souscriptionassurance;
use App\Http\Model\SouscriptionassuranceQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'souscriptionAssurance' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SouscriptionassuranceTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.SouscriptionassuranceTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'souscriptionAssurance';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Souscriptionassurance';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\App\\Http\\Model\\Souscriptionassurance';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Souscriptionassurance';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'souscriptionAssurance.id';

    /**
     * the column name for the dateSouscription field
     */
    public const COL_DATESOUSCRIPTION = 'souscriptionAssurance.dateSouscription';

    /**
     * the column name for the idTypeAssurance field
     */
    public const COL_IDTYPEASSURANCE = 'souscriptionAssurance.idTypeAssurance';

    /**
     * the column name for the codeReservation field
     */
    public const COL_CODERESERVATION = 'souscriptionAssurance.codeReservation';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'Datesouscription', 'Idtypeassurance', 'Codereservation', ],
        self::TYPE_CAMELNAME     => ['id', 'datesouscription', 'idtypeassurance', 'codereservation', ],
        self::TYPE_COLNAME       => [SouscriptionassuranceTableMap::COL_ID, SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION, SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE, SouscriptionassuranceTableMap::COL_CODERESERVATION, ],
        self::TYPE_FIELDNAME     => ['id', 'dateSouscription', 'idTypeAssurance', 'codeReservation', ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'Datesouscription' => 1, 'Idtypeassurance' => 2, 'Codereservation' => 3, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'datesouscription' => 1, 'idtypeassurance' => 2, 'codereservation' => 3, ],
        self::TYPE_COLNAME       => [SouscriptionassuranceTableMap::COL_ID => 0, SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION => 1, SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE => 2, SouscriptionassuranceTableMap::COL_CODERESERVATION => 3, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'dateSouscription' => 1, 'idTypeAssurance' => 2, 'codeReservation' => 3, ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Souscriptionassurance.Id' => 'ID',
        'id' => 'ID',
        'souscriptionassurance.id' => 'ID',
        'SouscriptionassuranceTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'souscriptionAssurance.id' => 'ID',
        'Datesouscription' => 'DATESOUSCRIPTION',
        'Souscriptionassurance.Datesouscription' => 'DATESOUSCRIPTION',
        'datesouscription' => 'DATESOUSCRIPTION',
        'souscriptionassurance.datesouscription' => 'DATESOUSCRIPTION',
        'SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION' => 'DATESOUSCRIPTION',
        'COL_DATESOUSCRIPTION' => 'DATESOUSCRIPTION',
        'dateSouscription' => 'DATESOUSCRIPTION',
        'souscriptionAssurance.dateSouscription' => 'DATESOUSCRIPTION',
        'Idtypeassurance' => 'IDTYPEASSURANCE',
        'Souscriptionassurance.Idtypeassurance' => 'IDTYPEASSURANCE',
        'idtypeassurance' => 'IDTYPEASSURANCE',
        'souscriptionassurance.idtypeassurance' => 'IDTYPEASSURANCE',
        'SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE' => 'IDTYPEASSURANCE',
        'COL_IDTYPEASSURANCE' => 'IDTYPEASSURANCE',
        'idTypeAssurance' => 'IDTYPEASSURANCE',
        'souscriptionAssurance.idTypeAssurance' => 'IDTYPEASSURANCE',
        'Codereservation' => 'CODERESERVATION',
        'Souscriptionassurance.Codereservation' => 'CODERESERVATION',
        'codereservation' => 'CODERESERVATION',
        'souscriptionassurance.codereservation' => 'CODERESERVATION',
        'SouscriptionassuranceTableMap::COL_CODERESERVATION' => 'CODERESERVATION',
        'COL_CODERESERVATION' => 'CODERESERVATION',
        'codeReservation' => 'CODERESERVATION',
        'souscriptionAssurance.codeReservation' => 'CODERESERVATION',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('souscriptionAssurance');
        $this->setPhpName('Souscriptionassurance');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Http\\Model\\Souscriptionassurance');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('dateSouscription', 'Datesouscription', 'DATE', false, null, null);
        $this->addForeignKey('idTypeAssurance', 'Idtypeassurance', 'INTEGER', 'typeAssurance', 'id', true, null, null);
        $this->addForeignKey('codeReservation', 'Codereservation', 'INTEGER', 'reservation', 'codeReservation', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Typeassurance', '\\App\\Http\\Model\\Typeassurance', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idTypeAssurance',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Reservation', '\\App\\Http\\Model\\Reservation', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':codeReservation',
    1 => ':codeReservation',
  ),
), null, null, null, false);
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? SouscriptionassuranceTableMap::CLASS_DEFAULT : SouscriptionassuranceTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Souscriptionassurance object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SouscriptionassuranceTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SouscriptionassuranceTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SouscriptionassuranceTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SouscriptionassuranceTableMap::OM_CLASS;
            /** @var Souscriptionassurance $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SouscriptionassuranceTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SouscriptionassuranceTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SouscriptionassuranceTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Souscriptionassurance $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SouscriptionassuranceTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SouscriptionassuranceTableMap::COL_ID);
            $criteria->addSelectColumn(SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION);
            $criteria->addSelectColumn(SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE);
            $criteria->addSelectColumn(SouscriptionassuranceTableMap::COL_CODERESERVATION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.dateSouscription');
            $criteria->addSelectColumn($alias . '.idTypeAssurance');
            $criteria->addSelectColumn($alias . '.codeReservation');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(SouscriptionassuranceTableMap::COL_ID);
            $criteria->removeSelectColumn(SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION);
            $criteria->removeSelectColumn(SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE);
            $criteria->removeSelectColumn(SouscriptionassuranceTableMap::COL_CODERESERVATION);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.dateSouscription');
            $criteria->removeSelectColumn($alias . '.idTypeAssurance');
            $criteria->removeSelectColumn($alias . '.codeReservation');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(SouscriptionassuranceTableMap::DATABASE_NAME)->getTable(SouscriptionassuranceTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Souscriptionassurance or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Souscriptionassurance object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SouscriptionassuranceTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Http\Model\Souscriptionassurance) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SouscriptionassuranceTableMap::DATABASE_NAME);
            $criteria->add(SouscriptionassuranceTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SouscriptionassuranceQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SouscriptionassuranceTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SouscriptionassuranceTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the souscriptionAssurance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SouscriptionassuranceQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Souscriptionassurance or Criteria object.
     *
     * @param mixed $criteria Criteria or Souscriptionassurance object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SouscriptionassuranceTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Souscriptionassurance object
        }

        if ($criteria->containsKey(SouscriptionassuranceTableMap::COL_ID) && $criteria->keyContainsValue(SouscriptionassuranceTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SouscriptionassuranceTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SouscriptionassuranceQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
