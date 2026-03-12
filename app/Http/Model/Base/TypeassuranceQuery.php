<?php

namespace App\Http\Model\Base;

use \Exception;
use \PDO;
use App\Http\Model\Typeassurance as ChildTypeassurance;
use App\Http\Model\TypeassuranceQuery as ChildTypeassuranceQuery;
use App\Http\Model\Map\TypeassuranceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `typeAssurance` table.
 *
 * @method     ChildTypeassuranceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTypeassuranceQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     ChildTypeassuranceQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildTypeassuranceQuery orderByDatecreation($order = Criteria::ASC) Order by the dateCreation column
 *
 * @method     ChildTypeassuranceQuery groupById() Group by the id column
 * @method     ChildTypeassuranceQuery groupByNom() Group by the nom column
 * @method     ChildTypeassuranceQuery groupByDescription() Group by the description column
 * @method     ChildTypeassuranceQuery groupByDatecreation() Group by the dateCreation column
 *
 * @method     ChildTypeassuranceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTypeassuranceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTypeassuranceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTypeassuranceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTypeassuranceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTypeassuranceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTypeassuranceQuery leftJoinSouscriptionassurance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Souscriptionassurance relation
 * @method     ChildTypeassuranceQuery rightJoinSouscriptionassurance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Souscriptionassurance relation
 * @method     ChildTypeassuranceQuery innerJoinSouscriptionassurance($relationAlias = null) Adds a INNER JOIN clause to the query using the Souscriptionassurance relation
 *
 * @method     ChildTypeassuranceQuery joinWithSouscriptionassurance($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Souscriptionassurance relation
 *
 * @method     ChildTypeassuranceQuery leftJoinWithSouscriptionassurance() Adds a LEFT JOIN clause and with to the query using the Souscriptionassurance relation
 * @method     ChildTypeassuranceQuery rightJoinWithSouscriptionassurance() Adds a RIGHT JOIN clause and with to the query using the Souscriptionassurance relation
 * @method     ChildTypeassuranceQuery innerJoinWithSouscriptionassurance() Adds a INNER JOIN clause and with to the query using the Souscriptionassurance relation
 *
 * @method     \App\Http\Model\SouscriptionassuranceQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTypeassurance|null findOne(?ConnectionInterface $con = null) Return the first ChildTypeassurance matching the query
 * @method     ChildTypeassurance findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildTypeassurance matching the query, or a new ChildTypeassurance object populated from the query conditions when no match is found
 *
 * @method     ChildTypeassurance|null findOneById(int $id) Return the first ChildTypeassurance filtered by the id column
 * @method     ChildTypeassurance|null findOneByNom(string $nom) Return the first ChildTypeassurance filtered by the nom column
 * @method     ChildTypeassurance|null findOneByDescription(string $description) Return the first ChildTypeassurance filtered by the description column
 * @method     ChildTypeassurance|null findOneByDatecreation(string $dateCreation) Return the first ChildTypeassurance filtered by the dateCreation column
 *
 * @method     ChildTypeassurance requirePk($key, ?ConnectionInterface $con = null) Return the ChildTypeassurance by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTypeassurance requireOne(?ConnectionInterface $con = null) Return the first ChildTypeassurance matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTypeassurance requireOneById(int $id) Return the first ChildTypeassurance filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTypeassurance requireOneByNom(string $nom) Return the first ChildTypeassurance filtered by the nom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTypeassurance requireOneByDescription(string $description) Return the first ChildTypeassurance filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTypeassurance requireOneByDatecreation(string $dateCreation) Return the first ChildTypeassurance filtered by the dateCreation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTypeassurance[]|Collection find(?ConnectionInterface $con = null) Return ChildTypeassurance objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildTypeassurance> find(?ConnectionInterface $con = null) Return ChildTypeassurance objects based on current ModelCriteria
 *
 * @method     ChildTypeassurance[]|Collection findById(int|array<int> $id) Return ChildTypeassurance objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildTypeassurance> findById(int|array<int> $id) Return ChildTypeassurance objects filtered by the id column
 * @method     ChildTypeassurance[]|Collection findByNom(string|array<string> $nom) Return ChildTypeassurance objects filtered by the nom column
 * @psalm-method Collection&\Traversable<ChildTypeassurance> findByNom(string|array<string> $nom) Return ChildTypeassurance objects filtered by the nom column
 * @method     ChildTypeassurance[]|Collection findByDescription(string|array<string> $description) Return ChildTypeassurance objects filtered by the description column
 * @psalm-method Collection&\Traversable<ChildTypeassurance> findByDescription(string|array<string> $description) Return ChildTypeassurance objects filtered by the description column
 * @method     ChildTypeassurance[]|Collection findByDatecreation(string|array<string> $dateCreation) Return ChildTypeassurance objects filtered by the dateCreation column
 * @psalm-method Collection&\Traversable<ChildTypeassurance> findByDatecreation(string|array<string> $dateCreation) Return ChildTypeassurance objects filtered by the dateCreation column
 *
 * @method     ChildTypeassurance[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildTypeassurance> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class TypeassuranceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Http\Model\Base\TypeassuranceQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Http\\Model\\Typeassurance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTypeassuranceQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTypeassuranceQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildTypeassuranceQuery) {
            return $criteria;
        }
        $query = new ChildTypeassuranceQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTypeassurance|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TypeassuranceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TypeassuranceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTypeassurance A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nom, description, dateCreation FROM typeAssurance WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTypeassurance $obj */
            $obj = new ChildTypeassurance();
            $obj->hydrate($row);
            TypeassuranceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildTypeassurance|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(TypeassuranceTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(TypeassuranceTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TypeassuranceTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TypeassuranceTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TypeassuranceTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nom column
     *
     * Example usage:
     * <code>
     * $query->filterByNom('fooValue');   // WHERE nom = 'fooValue'
     * $query->filterByNom('%fooValue%', Criteria::LIKE); // WHERE nom LIKE '%fooValue%'
     * $query->filterByNom(['foo', 'bar']); // WHERE nom IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nom The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNom($nom = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TypeassuranceTableMap::COL_NOM, $nom, $comparison);

        return $this;
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * $query->filterByDescription(['foo', 'bar']); // WHERE description IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $description The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDescription($description = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TypeassuranceTableMap::COL_DESCRIPTION, $description, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dateCreation column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecreation('2011-03-14'); // WHERE dateCreation = '2011-03-14'
     * $query->filterByDatecreation('now'); // WHERE dateCreation = '2011-03-14'
     * $query->filterByDatecreation(array('max' => 'yesterday')); // WHERE dateCreation > '2011-03-13'
     * </code>
     *
     * @param mixed $datecreation The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDatecreation($datecreation = null, ?string $comparison = null)
    {
        if (is_array($datecreation)) {
            $useMinMax = false;
            if (isset($datecreation['min'])) {
                $this->addUsingAlias(TypeassuranceTableMap::COL_DATECREATION, $datecreation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datecreation['max'])) {
                $this->addUsingAlias(TypeassuranceTableMap::COL_DATECREATION, $datecreation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(TypeassuranceTableMap::COL_DATECREATION, $datecreation, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \App\Http\Model\Souscriptionassurance object
     *
     * @param \App\Http\Model\Souscriptionassurance|ObjectCollection $souscriptionassurance the related object to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySouscriptionassurance($souscriptionassurance, ?string $comparison = null)
    {
        if ($souscriptionassurance instanceof \App\Http\Model\Souscriptionassurance) {
            $this
                ->addUsingAlias(TypeassuranceTableMap::COL_ID, $souscriptionassurance->getIdtypeassurance(), $comparison);

            return $this;
        } elseif ($souscriptionassurance instanceof ObjectCollection) {
            $this
                ->useSouscriptionassuranceQuery()
                ->filterByPrimaryKeys($souscriptionassurance->getPrimaryKeys())
                ->endUse();

            return $this;
        } else {
            throw new PropelException('filterBySouscriptionassurance() only accepts arguments of type \App\Http\Model\Souscriptionassurance or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Souscriptionassurance relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinSouscriptionassurance(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Souscriptionassurance');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Souscriptionassurance');
        }

        return $this;
    }

    /**
     * Use the Souscriptionassurance relation Souscriptionassurance object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\SouscriptionassuranceQuery A secondary query class using the current class as primary query
     */
    public function useSouscriptionassuranceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSouscriptionassurance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Souscriptionassurance', '\App\Http\Model\SouscriptionassuranceQuery');
    }

    /**
     * Use the Souscriptionassurance relation Souscriptionassurance object
     *
     * @param callable(\App\Http\Model\SouscriptionassuranceQuery):\App\Http\Model\SouscriptionassuranceQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withSouscriptionassuranceQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useSouscriptionassuranceQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to Souscriptionassurance table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Http\Model\SouscriptionassuranceQuery The inner query object of the EXISTS statement
     */
    public function useSouscriptionassuranceExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Http\Model\SouscriptionassuranceQuery */
        $q = $this->useExistsQuery('Souscriptionassurance', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to Souscriptionassurance table for a NOT EXISTS query.
     *
     * @see useSouscriptionassuranceExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Http\Model\SouscriptionassuranceQuery The inner query object of the NOT EXISTS statement
     */
    public function useSouscriptionassuranceNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Http\Model\SouscriptionassuranceQuery */
        $q = $this->useExistsQuery('Souscriptionassurance', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to Souscriptionassurance table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Http\Model\SouscriptionassuranceQuery The inner query object of the IN statement
     */
    public function useInSouscriptionassuranceQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Http\Model\SouscriptionassuranceQuery */
        $q = $this->useInQuery('Souscriptionassurance', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to Souscriptionassurance table for a NOT IN query.
     *
     * @see useSouscriptionassuranceInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Http\Model\SouscriptionassuranceQuery The inner query object of the NOT IN statement
     */
    public function useNotInSouscriptionassuranceQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Http\Model\SouscriptionassuranceQuery */
        $q = $this->useInQuery('Souscriptionassurance', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Exclude object from result
     *
     * @param ChildTypeassurance $typeassurance Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($typeassurance = null)
    {
        if ($typeassurance) {
            $this->addUsingAlias(TypeassuranceTableMap::COL_ID, $typeassurance->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the typeAssurance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TypeassuranceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TypeassuranceTableMap::clearInstancePool();
            TypeassuranceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TypeassuranceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TypeassuranceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TypeassuranceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TypeassuranceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
