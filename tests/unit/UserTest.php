<?php

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testThatWeCanGetTheFirstName(){
        $user = new \App\Models\User;

        $user->setFirstName('Billy');

        $this->assertEquals($user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName(){
        $user = new \App\Models\User;

        $user->setLastName('Silly');

        $this->assertEquals($user->getLastName(), 'Silly');
    }

    public function testFullNameIsReturned() {
        $user = new \App\Models\User;
        $user->setFirstName('Billy');
        $user->setLastName('Silly');

        $this->assertEquals($user->getFullName(), 'Billy Silly');
    }

    public function testFirstAndLastNameAreTrimmed() {
        $user = new \App\Models\User;
        $user->setFirstName(' Billy    ');
        $user->setLastName('     Silly ');

        $this->assertEquals($user->getFirstName(), 'Billy');
        $this->assertEquals($user->getLastName(), 'Silly');
    }

    public function testEmailAddressCanBeSet() {
        $user = new \App\Models\User;
        $user->setEmail('billy@silly.com');

        $this->assertEquals($user->getEmail(), 'billy@silly.com');
    }

    public function testEmailVariablesContainCorrectValues(){
        $user = new \App\Models\User;
        $user->setFirstName('Billy');
        $user->setLastName('Silly');
        $user->setEmail('billy@silly.com');
        
        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Silly');
        $this->assertEquals($emailVariables['email'], 'billy@silly.com');

    }
}