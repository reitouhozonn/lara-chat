<?php

namespace App\Http\Livewire\Groups\Messages;

use App\Events\MessageUpdate;
use App\Models\GroupMessage;
use Livewire\Component;

class Show extends Component
{
    public $userId;
    public $group;
    public $groupId;
    public $messages = [];

    public function refreshMessage()
    {
        $this->messages = $this->group->messages;
    }

    public function mount($group)
    {
        $this->userId = auth()->user()->id;
        $this->group = $group;
        $this->groupId = $group->id;
        $this->refreshMessage();
    }

    public function getListeners()
    {
        return [
            "refreshMessage",
        ];
    }

    public function render()
    {
        return view('livewire.groups.messages.show');
    }

    public function deleteMessage($message_id)
    {
        $groupeMessage = GroupMessage::find($message_id);
        if ($groupeMessage->user_id == $this->userId) {
            $groupeMessage->delete();
            $this->emit('refreshMessage');
            broadcast(new MessageUpdate($this->group->id))->toOthers();
        }
    }
}
