<?php
namespace ExtbaseBook\Simpleblog\Domain\Repository;


use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/***
 *
 * This file is part of the "Simple Blog Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 Autor Name <xxx@xx.de>, Beispiel Company
 *
 ***/
/**
 * The repository for Blogs
 */
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @param String $search
     * @param int|null $limit
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findSearchForm($search, $limit): QueryResult {
        /** @var QueryInterface $query */
        $query = $this->createQuery();
        $query->matching(
            $query->logicalOr([
                $query->like('title', '%' . $search . '%'),
                $query->like('description', '%' . $search . '%')
            ])

        );
        $query->setOrderings(['title' => QueryInterface::ORDER_ASCENDING]);

        $limit  = intval($limit);
        if ($limit> 0) {
            $query->setLimit($limit);
        }





        /*$queryParser = $this->objectManager->get(Typo3DbQueryParser::class);
        DebuggerUtility::var_dump(
            $queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL()
        );*/
        return $query->execute();
    }
}
