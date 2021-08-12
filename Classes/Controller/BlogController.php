<?php
namespace ExtbaseBook\Simpleblog\Controller;


use ExtbaseBook\Simpleblog\Domain\Model\Blog;
use ExtbaseBook\Simpleblog\Property\TypeConverter\UploadedFileReferenceConverter;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
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
 * BlogController
 */
class BlogController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{   /**
     * blogRepository
     *
     * @var \ExtbaseBook\Simpleblog\Domain\Repository\BlogRepository
     */
    protected $blogRepository = null;

    /**
     * @param \ExtbaseBook\Simpleblog\Domain\Repository\BlogRepository $blogRepository
     */
    public function injectBlogRepository(\ExtbaseBook\Simpleblog\Domain\Repository\BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @param string $search
     */
    public function listAction(string $search = ''): void
    {
        DebuggerUtility::var_dump($search);
        $limit = ($this->settings['blog']['max']) ?: null;

        $this->view->assign('blogs', $this->blogRepository->findSearchForm($search, $limit));
        $this->view->assign('search', $search);

        //$blogs = $this->blogRepository->findSearchWord('Blog');
        //$this->view->assign('blogs', $blogs);
    }

    /**
     * action new
     *
     * @param Blog $blog
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function newAction(Blog $blog)
    {
        /*for ($i = 1; $i <= 3; $i++){
            /** @var Blog $blog */ /*
            $blog = $this->objectManager->get(Blog::class);
            $blog->setTitle('Der '.$i.'. Blog');
            $this->blogRepository->add($blog);
        }
        */
        $this->blogRepository->add($blog);
        $this->addFlashMessage('Danke', 'Wurde angelegt', AbstractMessage::OK, true);

        $this->redirect("list");
    }


    /**
     * @param Blog|null $blog
     *
     */
    public function newFormAction(Blog $blog = null): void
    {
        //$this->view->assign('blog', $blog);
        $this->view->assign('blog', $blog);

    }

    /**
     * @param Blog $blog
     */
    public function showAction(Blog $blog): void
    {
        $this->view->assign('blog', $blog);
    }

    /**
     * Show form to update an existing Blog
     *
     * @param Blog $blog
     */
    public function updateFormAction(Blog $blog): void
    {
        $this->view->assign('blog', $blog);
    }

    /**
     * @param Blog $blog
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     */
    public function updateAction(Blog $blog): void
    {
        $this->blogRepository->update($blog);
        $this->redirect("list");

    }

    /**
     * @param Blog $blog
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function deleteAction(Blog $blog): void
    {
        $this->blogRepository->remove($blog);
        $this->redirect("list");
    }

    /**
     * @param Blog $blog
     */
    public function deleteConfirmAction(Blog $blog): void
    {
        $this->view->assign('blog', $blog);
    }

    /**
     * Set TypeConverter configuration for image upload
     */
    protected function setTypeConverterConfigurationForImageUpload($argumentName): void
    {
        $uploadConfiguration = [UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS =>
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
            UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER =>
                '1:/simpleblog/',
        ];
        /** @var PropertyMappingConfiguration $propertyMappingConfiguration */
        $propertyMappingConfiguration = $this->arguments[$argumentName]->getPropertyMappingConfiguration();
        $propertyMappingConfiguration->forProperty('image')->setTypeConverterOptions(
            UploadedFileReferenceConverter::class,
            $uploadConfiguration);
    }

    /**
     * Set TypeConverter option for image upload
     */
    public function initializeNewAction(): void
    {
        $this->setTypeConverterConfigurationForImageUpload('blog');
    }

    /**
     * Set TypeConverter option for image upload
     */
    public function initializeUpdateAction(): void
    {
        $this->setTypeConverterConfigurationForImageUpload('blog');

    }



    }
