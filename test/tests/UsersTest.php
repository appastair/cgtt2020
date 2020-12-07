<?php

class UserTest extends TestCase
{

    public function testAddUser(){
        $parameters = [
            'name' => 'Speed Reader',
            'email' => 'speed.reader@oversteer.com'
        ];
        $this->post("users/", $parameters, []);
        $this->seeStatusCode(201);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at'
            ]
        );
    }

    public function testGetUsers(){
        $this->get("users/", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [ '*' =>
                [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at'
                ]
            ]
        );
    }

    public function testGetUser(){
        $this->get("users/1", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at'
            ]
        );
    }

    public function testUpdateUser(){
        $parameters = [
            'name' => 'Jian Xu',
            'email' => 'hong.qi@fawcar.com.cn'
        ];
        $this->put("users/1", $parameters, []);
        $this->seeStatusCode(200);
    }

    public function testDeleteUser(){
        $this->delete("users/1", []);
        $this->seeStatusCode(410);
    }
}
