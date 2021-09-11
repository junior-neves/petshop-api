<?php

use App\Models\Owner;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class OwnerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public $data = [];
    protected Owner $owner;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->data = [
            'name' => 'Junior Construct',
            'phone' => '123456',
        ];
    }


    protected function setUp(): void
    {
        parent::setUp();
        $this->owner = Owner::create([
            'name' => "Junior Setup",
            'phone' => "123",
            ]
        );
    }


    public function testCreation() : void
    {
        $this->post('/owners',$this->data);
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id',$resposta);
        $this->assertArrayHasKey('name',$resposta);
        $this->assertArrayHasKey('phone',$resposta);
    }

    public function testCreationWithMissingName() : void
    {
        $this->data["name"] = null;

        $this->post('/owners',$this->data);
        $this->assertResponseStatus(422);

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('name',$resposta);
    }

    public function testCreationWithMissingPhone() : void
    {
        $this->data["phone"] = null;

        $this->post('/owners',$this->data);
        $this->assertResponseStatus(422);

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('phone',$resposta);
    }

    public function testGetAll() : void
    {
        $this->get('/owners');

        $this->assertResponseOk();
        $this->seeJsonStructure([
            '*' => [
                'id',
                'name',
                'phone'
            ]
        ]);
    }

    public function testGetOne() : void
    {
        $this->get('owners/'.$this->owner->id);
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('name',$resposta);
        $this->assertArrayHasKey('phone',$resposta);
        $this->assertArrayHasKey('id',$resposta);
    }

    public function testGetOneWithWrongId() : void
    {
        $this->get('/owners/9999',$this->data);
        $this->assertResponseStatus(404);
    }

    public function testUpdate() : void
    {
        $this->put('owners/'.$this->owner->id,$this->data);
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id',$resposta);
        $this->assertArrayHasKey('name',$resposta);
        $this->assertArrayHasKey('phone',$resposta);

        $this->assertEquals($this->data["name"],$resposta["name"]);
        $this->assertEquals($this->data["phone"],$resposta["phone"]);
    }

    public function testUpdateWithWrongId() : void
    {
        $this->put('owners/9999',$this->data);
        $this->assertResponseStatus(404);
    }

    public function testDelete() : void
    {
        $this->delete('owners/'.$this->owner->id);
        $this->assertResponseOk();
    }

    public function testDeleteWithWrongId() : void
    {
        $this->delete('owners/9999');
        $this->assertResponseStatus(404);
    }
}
