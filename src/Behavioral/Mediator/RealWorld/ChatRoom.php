<?php

namespace Warden\Patterns\Behavioral\ChatRoom\RealWorld;

class ChatUser
{
    protected ?ChatRoom $chatRoom = null;

    public function __construct(
        public string $username
    )
    {
    }

    public function joinChat(ChatRoom $chatRoom): void
    {
        $chatRoom->join($this);

        $this->chatRoom = $chatRoom;
    }

    public function writeToChat(string $message)
    {
        $this->chatRoom->message($this, $message);
    }

    public function leaveChat(ChatRoom $chatRoom): void
    {
        $chatRoom->leave($this);

        $this->chatRoom = null;
    }
}

interface ChatRoomMediator
{
    public function join(ChatUser $user): void;
    
    public function leave(ChatUser $user): void;
    
    public function message(ChatUser $user, string $message): void;
}

class ChatRoom implements ChatRoomMediator
{
    protected array $history = [];

    protected array $users = [];

    public function join(ChatUser $user): void
    {
        $this->postMessage("({$user->username} enters the chat)");

        $this->users[$user->username] = $user;
    }
    
    public function leave(ChatUser $user): void
    {
        $this->postMessage("({$user->username} leaves the chat)");

        unset($this->users[$user->username]);
    }
    
    public function message(ChatUser $user, string $message): void
    {
        $this->postMessage("[{$user->username}]: $message");
    }

    public function dump(): string
    {
        return implode("\n", $this->history);
    }

    protected function postMessage(string $message): void
    {
        $this->history[] = $message;
    }
}

$chat = new ChatRoom;
$john = new ChatUser('John');
$jane = new ChatUser('Jane');

$john->joinChat($chat);
$jane->joinChat($chat);

$john->writeToChat('Hi, Jane!');
$jane->writeToChat('Why hello, John!');
$john->writeToChat('Got any news?');
$jane->writeToChat('Sorry, gotta go!');

$jane->leaveChat($chat);

var_dump($chat->dump());