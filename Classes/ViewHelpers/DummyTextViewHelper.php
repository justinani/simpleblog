<?php
namespace ExtbaseBook\Simpleblog\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class DummyTextViewHelper extends AbstractViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('length', 'int', 'Length of the dummy text');
    }


    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ): string
    {
        $length = intval($arguments['length'] ?: 100);
        //$dummytext = 'Lorem ipsum dolor sit amet. ';
        $dummytext = $renderChildrenClosure() ?: 'Lorem ipsum dolor sit amet.';
        $repeat = ceil($length / strlen($dummytext));
        $content = substr(str_repeat($dummytext . ' ', $repeat), 0, $length) . '.';



        return $content;
    }

}