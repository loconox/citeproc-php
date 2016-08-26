<?php
/*
 * This file is a part of HDS (HeBIS Discovery System). HDS is an 
 * extension of the open source library search engine VuFind, that 
 * allows users to search and browse beyond resources. More 
 * Information about VuFind you will find on http://www.vufind.org
 * 
 * Copyright (C) 2016 
 * HeBIS Verbundzentrale des HeBIS-Verbundes 
 * Goethe-Universität Frankfurt / Goethe University of Frankfurt
 * http://www.hebis.de
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

namespace Seboettg\CiteProc\Rendering\Name;
use Seboettg\CiteProc\Rendering\RenderingInterface;
use Seboettg\CiteProc\Util\Factory;
use Seboettg\Collection\ArrayList;


/**
 * Class Substitude
 * @package Seboettg\CiteProc\Rendering\Name
 *
 * @author Sebastian Böttger <boettger@hebis.uni-frankfurt.de>
 */
class Substitute implements RenderingInterface
{

    /**
     * @var ArrayList
     */
    private $children;


    public function __construct(\SimpleXMLElement $node)
    {
        $this->children = new ArrayList();
        foreach ($node->children() as $child) {
            $this->children->append(Factory::create($child));
        }
    }

    /**
     * @param $data
     * @return string
     */
    public function render($data)
    {
        // TODO: Implement render() method.
    }
}