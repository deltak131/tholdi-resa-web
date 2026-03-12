<?php

namespace App\Http\Model\Base;

use \Exception;
use \PDO;
use App\Http\Model\Souscriptionassurance as ChildSouscriptionassurance;
use App\Http\Model\SouscriptionassuranceQuery as ChildSouscriptionassuranceQuery;
use App\Http\Model\Map\SouscriptionassuranceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `souscriptionAssurance` table.
 *
 * @method     ChildSouscriptionassuranceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSouscriptionassuranceQuery orderByDatesouscription($order = Criteria::ASC) Order by the dateSouscription column
 * @method     ChildSouscriptionassuranceQuery orderByIdtypeassurance($order = Criteria::ASC) Order by the idTypeAssurance column
 * @method     ChildSouscriptionassuranceQuery orderByCodereservation($order = Criteria::ASC) Order by the codeReservation column
 *
 * @method     ChildSouscriptionassuranceQuery groupById() Group by the id column
 * @method     ChildSouscriptionassuranceQuery groupByDatesouscription() Group by the dateSouscription column
 * @method     ChildSouscriptionassuranceQuery groupByIdtypeassurance() Group by the idTypeAssurance column
 * @method     ChildSouscriptionassuranceQuery groupByCodereservation() Group by the codeReservation column
 *
 * @method     ChildSouscriptionassuranceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSouscriptionassuranceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSouscriptionassuranceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSouscriptionassuranceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSouscriptionassuranceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSouscriptionassuranceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSouscriptionassuranceQuery leftJoinTypeassurance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Typeassurance relation
 * @method     ChildSouscriptionassuranceQuery rightJoinTypeassurance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Typeassurance relation
 * @method     ChildSouscriptionassuranceQuery innerJoinTypeassurance($relationAlias = null) Adds a INNER JOIN clause to the query using the Typeassurance relation
 *
 * @method     ChildSouscriptionassuranceQuery joinWithTypeassurance($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Typeassurance relation
 *
 * @method     ChildSouscriptionassuranceQuery leftJoinWithTypeassurance() Adds a LEFT JOIN clause and with to the query using the Typeassurance relation
 * @method     ChildSouscriptionassuranceQuery rightJoinWithTypeassurance() Adds a RIGHT JOIN clause and with to the query using the Typeassurance relation
 * @method     ChildSouscriptionassuranceQuery innerJoinWithTypeassurance() Adds a INNER JOIN clause and with to the query using the Typeassurance relation
 *
 * @method     ChildSouscriptionassuranceQuery leftJoinReservation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reservation relation
 * @method     ChildSouscriptionassuranceQuery rightJoinReservation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reservation relation
 * @method     ChildSouscriptionassuranceQuery innerJoinReservation($relationAlias = null) Adds a INNER JOIN clause to the query using the Reservation relation
 *
 * @method     ChildSouscriptionassuranceQuery joinWithReservation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Reservation relation
 *
 * @method     ChildSouscriptionassuranceQuery leftJoinWithReservation() Adds a LEFT JOIN clause and with to the query using the Reservation relation
 * @method     ChildSouscriptionassuranceQuery rightJoinWithReservation() Adds a RIGHT JOIN clause and with to the query using the Reservation relation
 * @method     ChildSouscriptionassuranceQuery innerJoinWithReservation() Adds a INNER JOIN clause and with to the query using the Reservation relation
 *
 * @method     \App\Http\Model\TypeassuranceQuery|\App\Http\Model\ReservationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSouscriptionassurance|null findOne(?ConnectionInterface $con = null) Return the first ChildSouscriptionassurance matching the query
 * @method     ChildSouscriptionassurance findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSouscriptionassurance matching the query, or a new ChildSouscriptionassurance object populated from the query conditions when no match is found
 *
 * @method     ChildSouscriptionassurance|null findOneById(int $id) Return the first ChildSouscriptionassurance filtered by the id column
 * @method     ChildSouscriptionassurance|null findOneByDatesouscription(string $dateSouscription) Return the first ChildSouscriptionassurance filtered by the dateSouscription column
 * @method     ChildSouscriptionassurance|null findOneByIdtypeassurance(int $idTypeAssurance) Return the first ChildSouscriptionassurance filtered by the idTypeAssurance column
 * @method     ChildSouscriptionassurance|null findOneByCodereservation(int $codeReservation) Return the first ChildSouscriptionassurance filtered by the codeReservation column
 *
 * @method     ChildSouscriptionassurance requirePk($key, ?ConnectionInterface $con = null) Return the ChildSouscriptionassurance by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSouscriptionassurance requireOne(?ConnectionInterface $con = null) Return the first ChildSouscriptionassurance matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSouscriptionassurance requireOneById(int $id) Return the first ChildSouscriptionassurance filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSouscriptionassurance requireOneByDatesouscription(string $dateSouscription) Return the first ChildSouscriptionassurance filtered by the dateSouscription column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSouscriptionassurance requireOneByIdtypeassurance(int $idTypeAssurance) Return the first ChildSouscriptionassurance filtered by the idTypeAssurance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSouscriptionassurance requireOneByCodereservation(int $codeReservation) Return the first ChildSouscriptionassurance filtered by the codeReservation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSouscriptionassurance[]|Collection find(?ConnectionInterface $con = null) Return ChildSouscriptionassurance objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSouscriptionassurance> find(?ConnectionInterface $con = null) Return ChildSouscriptionassurance objects based on current ModelCriteria
 *
 * @method     ChildSouscriptionassurance[]|Collection findById(int|array<int> $id) Return ChildSouscriptionassurance objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildSouscriptionassurance> findById(int|array<int> $id) Return ChildSouscriptionassurance objects filtered by the id column
 * @method     ChildSouscriptionassurance[]|Collection findByDatesouscription(string|array<string> $dateSouscription) Return ChildSouscriptionassurance objects filtered by the dateSouscription column
 * @psalm-method Collection&\Traversable<ChildSouscriptionassurance> findByDatesouscription(string|array<string> $dateSouscription) Return ChildSouscriptionassurance objects filtered by the dateSouscription column
 * @method     ChildSouscriptionassurance[]|Collection findByIdtypeassurance(int|array<int> $idTypeAssurance) Return ChildSouscriptionassurance objects filtered by the idTypeAssurance column
 * @psalm-method Collection&\Traversable<ChildSouscriptionassurance> findByIdtypeassurance(int|array<int> $idTypeAssurance) Return ChildSouscriptionassurance objects filtered by the idTypeAssurance column
 * @method     ChildSouscriptionassurance[]|Collection findByCodereservation(int|array<int> $codeReservation) Return ChildSouscriptionassurance objects filtered by the codeReservation column
 * @psalm-method Collection&\Traversable<ChildSouscriptionassurance> findByCodereservation(int|array<int> $codeReservation) Return ChildSouscriptionassurance objects filtered by the codeReservation column
 *
 * @method     ChildSouscriptionassurance[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSouscriptionassurance> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SouscriptionassuranceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Http\Model\Base\SouscriptionassuranceQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Http\\Model\\Souscriptionassurance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSouscriptionassuranceQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSouscriptionassuranceQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSouscriptionassuranceQuery) {
            return $criteria;
        }
        $query = new ChildSouscriptionassuranceQuery();
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
     * @return ChildSouscriptionassurance|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SouscriptionassuranceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SouscriptionassuranceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSouscriptionassurance A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, dateSouscription, idTypeAssurance, codeReservation FROM souscriptionAssurance WHERE id = :p0';
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
            /** @var ChildSouscriptionassurance $obj */
            $obj = new ChildSouscriptionassurance();
            $obj->hydrate($row);
            SouscriptionassuranceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSouscriptionassurance|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(SouscriptionassuranceTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(SouscriptionassuranceTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SouscriptionassuranceTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dateSouscription column
     *
     * Example usage:
     * <code>
     * $query->filterByDatesouscription('2011-03-14'); // WHERE dateSouscription = '2011-03-14'
     * $query->filterByDatesouscription('now'); // WHERE dateSouscription = '2011-03-14'
     * $query->filterByDatesouscription(array('max' => 'yesterday')); // WHERE dateSouscription > '2011-03-13'
     * </code>
     *
     * @param mixed $datesouscription The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDatesouscription($datesouscription = null, ?string $comparison = null)
    {
        if (is_array($datesouscription)) {
            $useMinMax = false;
            if (isset($datesouscription['min'])) {
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION, $datesouscription['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datesouscription['max'])) {
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION, $datesouscription['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SouscriptionassuranceTableMap::COL_DATESOUSCRIPTION, $datesouscription, $comparison);

        return $this;
    }

    /**
     * Filter the query on the idTypeAssurance column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtypeassurance(1234); // WHERE idTypeAssurance = 1234
     * $query->filterByIdtypeassurance(array(12, 34)); // WHERE idTypeAssurance IN (12, 34)
     * $query->filterByIdtypeassurance(array('min' => 12)); // WHERE idTypeAssurance > 12
     * </code>
     *
     * @see       filterByTypeassurance()
     *
     * @param mixed $idtypeassurance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdtypeassurance($idtypeassurance = null, ?string $comparison = null)
    {
        if (is_array($idtypeassurance)) {
            $useMinMax = false;
            if (isset($idtypeassurance['min'])) {
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE, $idtypeassurance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtypeassurance['max'])) {
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE, $idtypeassurance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE, $idtypeassurance, $comparison);

        return $this;
    }

    /**
     * Filter the query on the codeReservation column
     *
     * Example usage:
     * <code>
     * $query->filterByCodereservation(1234); // WHERE codeReservation = 1234
     * $query->filterByCodereservation(array(12, 34)); // WHERE codeReservation IN (12, 34)
     * $query->filterByCodereservation(array('min' => 12)); // WHERE codeReservation > 12
     * </code>
     *
     * @see       filterByReservation()
     *
     * @param mixed $codereservation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCodereservation($codereservation = null, ?string $comparison = null)
    {
        if (is_array($codereservation)) {
            $useMinMax = false;
            if (isset($codereservation['min'])) {
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_CODERESERVATION, $codereservation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codereservation['max'])) {
                $this->addUsingAlias(SouscriptionassuranceTableMap::COL_CODERESERVATION, $codereservation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SouscriptionassuranceTableMap::COL_CODERESERVATION, $codereservation, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \App\Http\Model\Typeassurance object
     *
     * @param \App\Http\Model\Typeassurance|ObjectCollection $typeassurance The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTypeassurance($typeassurance, ?string $comparison = null)
    {
        if ($typeassurance instanceof \App\Http\Model\Typeassurance) {
            return $this
                ->addUsingAlias(SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE, $typeassurance->getId(), $comparison);
        } elseif ($typeassurance instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(SouscriptionassuranceTableMap::COL_IDTYPEASSURANCE, $typeassurance->toKeyValue('PrimaryKey', 'Id'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterByTypeassurance() only accepts arguments of type \App\Http\Model\Typeassurance or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Typeassurance relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinTypeassurance(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Typeassurance');

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
            $this->addJoinObject($join, 'Typeassurance');
        }

        return $this;
    }

    /**
     * Use the Typeassurance relation Typeassurance object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\TypeassuranceQuery A secondary query class using the current class as primary query
     */
    public function useTypeassuranceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTypeassurance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Typeassurance', '\App\Http\Model\TypeassuranceQuery');
    }

    /**
     * Use the Typeassurance relation Typeassurance object
     *
     * @param callable(\App\Http\Model\TypeassuranceQuery):\App\Http\Model\TypeassuranceQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withTypeassuranceQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useTypeassuranceQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to Typeassurance table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Http\Model\TypeassuranceQuery The inner query object of the EXISTS statement
     */
    public function useTypeassuranceExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Http\Model\TypeassuranceQuery */
        $q = $this->useExistsQuery('Typeassurance', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to Typeassurance table for a NOT EXISTS query.
     *
     * @see useTypeassuranceExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Http\Model\TypeassuranceQuery The inner query object of the NOT EXISTS statement
     */
    public function useTypeassuranceNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Http\Model\TypeassuranceQuery */
        $q = $this->useExistsQuery('Typeassurance', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to Typeassurance table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Http\Model\TypeassuranceQuery The inner query object of the IN statement
     */
    public function useInTypeassuranceQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Http\Model\TypeassuranceQuery */
        $q = $this->useInQuery('Typeassurance', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to Typeassurance table for a NOT IN query.
     *
     * @see useTypeassuranceInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Http\Model\TypeassuranceQuery The inner query object of the NOT IN statement
     */
    public function useNotInTypeassuranceQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Http\Model\TypeassuranceQuery */
        $q = $this->useInQuery('Typeassurance', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Filter the query by a related \App\Http\Model\Reservation object
     *
     * @param \App\Http\Model\Reservation|ObjectCollection $reservation The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByReservation($reservation, ?string $comparison = null)
    {
        if ($reservation instanceof \App\Http\Model\Reservation) {
            return $this
                ->addUsingAlias(SouscriptionassuranceTableMap::COL_CODERESERVATION, $reservation->getCodereservation(), $comparison);
        } elseif ($reservation instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(SouscriptionassuranceTableMap::COL_CODERESERVATION, $reservation->toKeyValue('PrimaryKey', 'Codereservation'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterByReservation() only accepts arguments of type \App\Http\Model\Reservation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Reservation relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinReservation(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Reservation');

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
            $this->addJoinObject($join, 'Reservation');
        }

        return $this;
    }

    /**
     * Use the Reservation relation Reservation object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Http\Model\ReservationQuery A secondary query class using the current class as primary query
     */
    public function useReservationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinReservation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Reservation', '\App\Http\Model\ReservationQuery');
    }

    /**
     * Use the Reservation relation Reservation object
     *
     * @param callable(\App\Http\Model\ReservationQuery):\App\Http\Model\ReservationQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withReservationQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useReservationQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to Reservation table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Http\Model\ReservationQuery The inner query object of the EXISTS statement
     */
    public function useReservationExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Http\Model\ReservationQuery */
        $q = $this->useExistsQuery('Reservation', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to Reservation table for a NOT EXISTS query.
     *
     * @see useReservationExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Http\Model\ReservationQuery The inner query object of the NOT EXISTS statement
     */
    public function useReservationNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Http\Model\ReservationQuery */
        $q = $this->useExistsQuery('Reservation', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to Reservation table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Http\Model\ReservationQuery The inner query object of the IN statement
     */
    public function useInReservationQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Http\Model\ReservationQuery */
        $q = $this->useInQuery('Reservation', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to Reservation table for a NOT IN query.
     *
     * @see useReservationInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Http\Model\ReservationQuery The inner query object of the NOT IN statement
     */
    public function useNotInReservationQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Http\Model\ReservationQuery */
        $q = $this->useInQuery('Reservation', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSouscriptionassurance $souscriptionassurance Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($souscriptionassurance = null)
    {
        if ($souscriptionassurance) {
            $this->addUsingAlias(SouscriptionassuranceTableMap::COL_ID, $souscriptionassurance->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the souscriptionAssurance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SouscriptionassuranceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SouscriptionassuranceTableMap::clearInstancePool();
            SouscriptionassuranceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SouscriptionassuranceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SouscriptionassuranceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SouscriptionassuranceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SouscriptionassuranceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
