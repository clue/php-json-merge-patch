<?php

use Clue\JsonMergePatch\Patcher;

class PatcherTest extends PHPUnit_Framework_TestCase
{
    private $patcher;

    public function setUp()
    {
        $this->patcher = new Patcher();
    }

    /**
     * @dataProvider provideTestCases
     * @param unknown $original
     * @param unknown $patch
     * @param unknown $result
     */
    public function testA($original, $patch, $result)
    {
        $this->assertEquals(json_decode($result), $this->patcher->patch(json_decode($original), json_decode($patch)));
    }

    // test cases directly from RFC 7396: https://tools.ietf.org/html/rfc7396#appendix-A
    public function provideTestCases()
    {
        return array(
            array(
                '{"a":"b"}',
                '{"a":"c"}',
                '{"a":"c"}'
            ),
            array(
                '{"a":"b"}',
                '{"b":"c"}',
                '{"a":"b", "b":"c"}'
            ),
            array(
                '{"a":"b"}',
                '{"a":null}',
                '{}'
            ),
            array(
                '{"a":"b", "b":"c"}',
                '{"a":null}',
                '{"b":"c"}'
            ),
            array(
                '{"a":["b"]}',
                '{"a":"c"}',
                '{"a":"c"}'
            ),
            array(
                '{"a":"c"}',
                '{"a":["b"]}',
                '{"a":["b"]}'
            ),
            array(
                '{"a": { "b": "c"} }',
                '{"a": { "b": "d", "c": null} }',
                '{"a": { "b": "d" } }'
            ),
            array(
                '{"a": [ {"b":"c"} ] }',
                '{"a": [1]}',
                '{"a": [1]}'
            ),
            array(
                '["a","b"]',
                '["c","d"]',
                '["c","d"]'
            ),
            array(
                '{"a":"b"}',
                '["c"]',
                '["c"]'
            ),
            array(
                '{"a":"foo"}',
                'null',
                'null'
            ),
            array(
                '{"a":"foo"}',
                '"bar"',
                '"bar"'
            ),
            array(
                '{"e":null}',
                '{"a":1}',
                '{"e":null, "a":1}'
            ),
            array(
                '[1,2]',
                '{"a":"b", "c":null}',
                '{"a":"b"}'
            ),
            array(
                '{}',
                '{"a": {"bb": {"ccc": null}}}',
                '{"a": {"bb": {}}}'
            ),
        );
    }
}
