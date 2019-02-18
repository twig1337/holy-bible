<?php

/**
 * Class BibleReferenceTest
 */
class BibleReferenceTest extends TestCase
{
    public function testValidRequest()
    {
        $this->get('/genesis/1/1');

        $this->assertResponseStatus(200);

        $this->assertJsonStringEqualsJsonString($this->response->getContent(), json_encode([
            'data' => [
                'book' => 'Genesis',
                'book_number' => 1,
                'chapter' => 1,
                'verse' => 1,
                'reference' => 'Genesis 1:1',
                'version' => 'kjv',
                'text' => 'In the beginning God created the heaven and the earth.'
            ]
        ]));
    }

    public function testValidRequestWithVersion()
    {
        $this->get('/genesis/1/1?version=asv');

        $this->assertResponseStatus(200);

        $this->assertJsonStringEqualsJsonString($this->response->getContent(), json_encode([
            'data' => [
                'book' => 'Genesis',
                'book_number' => 1,
                'chapter' => 1,
                'verse' => 1,
                'reference' => 'Genesis 1:1',
                'version' => 'asv',
                'text' => 'In the beginning God created the heavens and the earth.'
            ]
        ]));
    }

    public function testInvalidVerseRequest()
    {
        $this->get('/genesis/1/40');

        $this->assertResponseStatus(404);

        $this->assertJsonStringEqualsJsonString($this->response->getContent(), json_encode([
            'error' => [
                'message' => 'Verse requested does not exist.'
            ]
        ]));
    }

    public function testInvalidVersionRequest()
    {
        $this->get('/genesis/1/1?version=bob');

        $this->assertResponseStatus(422);

        $this->assertJsonStringEqualsJsonString($this->response->getContent(), json_encode([
            'error' => [
                'message' => [
                    'version' => ['The selected version is invalid. Valid options are: KJV, ASV.']
                ]
            ]
        ]));
    }
}
