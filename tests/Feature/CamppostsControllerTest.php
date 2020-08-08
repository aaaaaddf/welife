<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CamppostsControllerTest extends TestCase
{
    
    // テスト毎にmigrationを実行
    use RefreshDatabase;
    
    /**
     * - テスト実行前に呼ばれる
     * - テストデータの準備などの前処理に使う
     * - 書かなくてもOK
     */
    public function setUp(): void
    {
        parent::setUp();
        // seederを実行
        $this->seed();
    }

    /**
     * - テスト実行最後に呼ばれる
     * - テスト後処理などで使う
     * - 書かなくてもOK
     *
     * @throws \Throwable
     */
    public function tearDown(): void
    {
        parent::tearDown();
    }
    
    
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function campPostControllerのsearchが正しくできること()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function test2()
    {
        
        
    }
}
