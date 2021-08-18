<?php

namespace App\Http\Livewire\Groups\Messages;

use App\Events\MessageUpdate;
use App\Models\GroupMessage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Send extends Component
{
    use WithFileUploads;

    public $group;
    public $message;
    public $photo;

    public function mount($group)
    {
        $this->group = $group;
    }

    public function render()
    {
        return view('livewire.groups.messages.send');
    }

    public function sendMessage()
    {
        if (!preg_match('/.+/', $this->message) && !isset($this->photo)) {
            return;
        }

        if (isset($this->photo)) {
            $this->validate([
                'photo' => 'image',
            ]);
        }

        $groupeMessage = new GroupMessage();

        $groupeMessage->user_id = auth()->user()->id;
        $groupeMessage->group_id = $this->group->id;
        $groupeMessage->message = preg_match('/.+/', $this->message)
            ? $this->message
            : "";
        $groupeMessage->photo = isset($this->photo)
            ? $this->photo->store('photos')
            : "";
        $groupeMessage->save();

        $this->emit('refreshMessage');
        broadcast(new MessageUpdate($this->group->id))->toOthers();
        $this->reset('message');
        $this->reset('photo');
    }
}
