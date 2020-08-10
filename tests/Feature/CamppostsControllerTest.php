<?php

namespace Tests\Feature;

use App\Http\Controllers\CamppostsController;
use Illuminate\Http\Request;
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
    
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function searchCampPostが正しく検索できること()
    {
        $controller = new CamppostsController();
        $request = new \Illuminate\Http\Request(['prefecture_id' => 2]);
        $response = $controller->searchCampPost($request);
        //var_dump($response);
        $this->assertEquals(1, $response->total());
    }
}
