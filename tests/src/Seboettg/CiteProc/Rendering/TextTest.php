<?php
/*
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Rendering;

use PHPUnit\Framework\TestCase;
use Seboettg\CiteProc\CiteProc;
use Seboettg\CiteProc\Context;
use Seboettg\CiteProc\Locale\Locale;
use Seboettg\CiteProc\Style\Macro;

class TextTest extends TestCase
{

    private $textXml = <<<EOT
<?xml version="1.0" encoding="utf-8"?>
<style>
    <citation>
        <layout>
            <text variable="title"/>
        </layout>
    </citation>
</style>;
EOT;


    private $dataTitle  = '{"title":"Ein herzzerreißendes Werk von umwerfender Genialität","type":"book"}';
    private $dataPublisherPlace = '{"publisher-place":"Frankfurt am Main"}';

    /**
     * @var CiteProc
     */
    private $citeproc;

    public function setUp()
    {

    }



    public function testMacro()
    {

        $macroXml = <<<EOT
<?xml version="1.0" encoding="utf-8"?>
<style xmlns="http://purl.org/net/xbiblio/csl" version="1.0">
    <macro name="title">
        <choose>
            <if type="book">
                <text variable="title" font-style="italic"/>
            </if>
            <else>
                <text variable="title"/>
            </else>
        </choose>
    </macro>
    <citation>
        <layout>
            <text macro="title"/>
        </layout>
    </citation>
</style>
EOT;
        $citeProc = new CiteProc($macroXml);



        $this->assertEquals(
            "<i>Ein Buch</i>",
            $citeProc->render(json_decode("[{\"title\":\"Ein Buch\", \"type\": \"book\"}]"), "citation")
        );

        $this->assertEquals(
            "Ein Buch",
            $citeProc->render(json_decode("[{\"title\":\"Ein Buch\", \"type\": \"thesis\"}]"), "citation")
        );
    }
}
