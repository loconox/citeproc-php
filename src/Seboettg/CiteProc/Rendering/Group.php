<?php
/**
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Rendering;
use Seboettg\CiteProc\Styles\AffixesTrait;
use Seboettg\CiteProc\Styles\DelimiterTrait;
use Seboettg\CiteProc\Styles\DisplayTrait;
use Seboettg\CiteProc\Util\Factory;
use Seboettg\Collection\ArrayList;


/**
 * Class Group
 * @package Seboettg\CiteProc\Rendering
 *
 * @author Sebastian Böttger <seboettg@gmail.com>
 */
class Group implements RenderingInterface
{
    use DelimiterTrait,
        AffixesTrait,
        DisplayTrait;

    private $children;

    /**
     * cs:group may carry the delimiter attribute to separate its child elements
     * @var
     */
    private $delimiter = "";

    public function __construct(\SimpleXMLElement $node)
    {
        $this->children = new ArrayList();
        foreach ($node->children() as $child) {
            $this->children->append(Factory::create($child));
        }
        $this->initDisplayAttributes($node);
        $this->initAffixesAttributes($node);
        $this->initDelimiterAttributes($node);
    }

    /**
     * @param $data
     * @return string
     */
    public function render($data)
    {
        $arr = [];
        /** @var RenderingInterface $child */
        foreach ($this->children as $child) {
            $arr[] = $child->render($data);
        }
        return $this->wrapDisplayBlock($this->addAffixes(implode($this->delimiter, $arr)));
    }
}