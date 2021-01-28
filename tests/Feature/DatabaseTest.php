<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    public function testDatabase()
    {
        // レコード新規作成
        $user = new \App\DatabaseTest;
        $user->name = "ユニット太郎";
        $user->email = "unittaro@test.com";
        $user->password = \Hash::make('unit_test');
        $user->save();

        // 取得したレコードに関するテスト
        $readUser = \App\DatabaseTest::where('name','ユニット太郎')->first();
        $this->assertNotNull($readUser);
        $this->assertTrue(\Hash::check('unit_test', $readUser->password));
        
        // レコード削除
        // \App\SampleTest::where('email', 'unittaro@test.com')->delete();
    }
}