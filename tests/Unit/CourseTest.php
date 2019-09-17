<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseStoreRequestTest extends TestCase
{
    use DatabaseTransactions;

    public function test_index_list_is_empty()
    {
        $response = $this->get('/api/courses');

        $response->assertStatus(200);
        $data = $response->json();

        $this->assertEmpty($data['data']);
    }

    public function test_index_list()
    {
        $total = 30;
        factory(\App\Course::class, $total)->create();

        $response = $this->get('/api/courses');

        $response->assertStatus(200);
        $data = $response->json();

        $this->assertNotEmpty($data['data']);
        $this->assertCount($total, $data['data']);
    }

    public function test_store_request_when_title_is_required()
    {
        $response = $this->post('/api/courses');

        $response->assertStatus(401);

        $response->assertJsonStructure([
            'errors' => [
                'title'
            ]
        ]);
    }

    public function test_store_request_success()
    {
        $title = 'Curso de MongoDB';
        $description = 'Curso básico';
        $response = $this->post('/api/courses', [
            'title' => $title,
            'description' => $description
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'created_at',
                'updated_at'
            ]
        ]);

        $data = $response->json();

        $this->assertEquals($title, $data['data']['title']);
        $this->assertEquals($description, $data['data']['description']);
    }

    public function test_update_reques()
    {
        $title = 'Curso de MongoDB';
        $description = 'Curso básico';
        $response = $this->post('/api/courses', [
            'title' => $title,
            'description' => $description
        ]);

        $data = $response->json();

        $title_edit = $title . '_EDIT';
        $responseEdit = $this->put('/api/courses/' . $data['data']['id'], [
            'title' => $title_edit,
            'description' => $description
        ]);

        $data = $responseEdit->json();

        $this->assertEquals($title_edit, $data['data']['title']);
        $this->assertEquals($description, $data['data']['description']);
    }
}
