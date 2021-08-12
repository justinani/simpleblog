<?php
namespace ExtbaseBook\Simpleblog\Domain\Model;


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
 * Comments
 */
class Comment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * comment
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $comment = '';

    /**
     * Comment date/time
     * 
     * @var \DateTime
     */
    protected $commentdate = null;

    /**
     * Returns the comment
     * 
     * @return string $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the comment
     * 
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Returns the commentdate
     * 
     * @return \DateTime $commentdate
     */
    public function getCommentdate()
    {
        return $this->commentdate;
    }

    /**
     * Sets the commentdate
     * 
     * @param \DateTime $commentdate
     * @return void
     */
    public function setCommentdate(\DateTime $commentdate)
    {
        $this->commentdate = $commentdate;
    }
}
