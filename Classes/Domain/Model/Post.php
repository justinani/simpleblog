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
 * Posts
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Title of the post
     * 
     * @var string
     */
    protected $title = '';

    /**
     * Content of the post
     * 
     * @var string
     */
    protected $content = '';

    /**
     * Post date/time
     * 
     * @var \DateTime
     */
    protected $postdate = null;

    /**
     * Post comments
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Simpleblog\Domain\Model\Comment>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $comments = null;

    /**
     * Post author
     * 
     * @var \ExtbaseBook\Simpleblog\Domain\Model\Author
     */
    protected $author = null;

    /**
     * Post tags
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Simpleblog\Domain\Model\Tag>
     */
    protected $tags = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->comments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the content
     * 
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content
     * 
     * @param string $content
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Returns the postdate
     * 
     * @return \DateTime $postdate
     */
    public function getPostdate()
    {
        return $this->postdate;
    }

    /**
     * Sets the postdate
     * 
     * @param \DateTime $postdate
     * @return void
     */
    public function setPostdate(\DateTime $postdate)
    {
        $this->postdate = $postdate;
    }

    /**
     * Adds a Comment
     * 
     * @param \ExtbaseBook\Simpleblog\Domain\Model\Comment $comment
     * @return void
     */
    public function addComment(\ExtbaseBook\Simpleblog\Domain\Model\Comment $comment)
    {
        $this->comments->attach($comment);
    }

    /**
     * Removes a Comment
     * 
     * @param \ExtbaseBook\Simpleblog\Domain\Model\Comment $commentToRemove The Comment to be removed
     * @return void
     */
    public function removeComment(\ExtbaseBook\Simpleblog\Domain\Model\Comment $commentToRemove)
    {
        $this->comments->detach($commentToRemove);
    }

    /**
     * Returns the comments
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Simpleblog\Domain\Model\Comment> $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets the comments
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Simpleblog\Domain\Model\Comment> $comments
     * @return void
     */
    public function setComments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $comments)
    {
        $this->comments = $comments;
    }

    /**
     * Returns the author
     * 
     * @return \ExtbaseBook\Simpleblog\Domain\Model\Author $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     * 
     * @param \ExtbaseBook\Simpleblog\Domain\Model\Author $author
     * @return void
     */
    public function setAuthor(\ExtbaseBook\Simpleblog\Domain\Model\Author $author)
    {
        $this->author = $author;
    }

    /**
     * Adds a Tag
     * 
     * @param \ExtbaseBook\Simpleblog\Domain\Model\Tag $tag
     * @return void
     */
    public function addTag(\ExtbaseBook\Simpleblog\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }

    /**
     * Removes a Tag
     * 
     * @param \ExtbaseBook\Simpleblog\Domain\Model\Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(\ExtbaseBook\Simpleblog\Domain\Model\Tag $tagToRemove)
    {
        $this->tags->detach($tagToRemove);
    }

    /**
     * Returns the tags
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Simpleblog\Domain\Model\Tag> $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets the tags
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ExtbaseBook\Simpleblog\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }
}
