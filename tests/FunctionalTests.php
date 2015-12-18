<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FunctionalTests extends TestCase
{
    /**
     * Testing existing of link to user list page
     */
    public function testMainPageUserLink()
    {
        $this->visit('/')
             ->see('Users managing');
    }
    
    /**
     * Testing existing of link to messages list page
     */
    public function testMainPageMessageLink()
    {
        $this->visit('/')
             ->see('Message managing');
    }
    
    /**
     * Testing of list of users
     */
    public function testPageOfUsers()
    {
        $this->visit('/')
             ->click('Users managing')
             ->seePageIs('/users');
    }
    
    /**
     * Testing of list of messages
     */
    public function testPageOfMessages()
    {
        $this->visit('/')
             ->click('Message managing')
             ->seePageIs('/messages');
    }
    
    /**
     * Testing existing of user's editor page 
     */
    public function testPageUserEdit()
    {
        $this->visit('/users')
             ->click('Edit')
             ->seePageIs('/users/1/edit');
    }
    
    /**
     * Testing existing of messages's editor page 
     */
    public function testPageMessagesEdit()
    {
        $this->visit('/messages')
             ->click('Edit')
             ->seePageIs('/messages/1/edit');
    }
    
    /**
     * Testing existing of message if user removed
     */
    public function testMessageRemovedUser()
    {
        $this->visit('/users')
             ->press('Remove')
             ->see('User removed.');
    }
    
    /**
     * Testing existing of message if message removed
     */
    public function testMessageRemovedMessage()
    {
        $this->visit('/messages')
             ->press('Remove')
             ->see('Messages removed.');
    }
}
