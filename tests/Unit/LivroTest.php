<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivroTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateLivro()
    {
        $data = factory(\App\Models\Livro::class)->make()->toArray();

        $this->assertIsArray($data);
        $this->assertNotEmpty($data['name']);
        $this->assertNotEmpty($data['descricao']);
        $response = $this->post('livros', $data);
        $response->assertStatus(302);
    }
}
