<?php

namespace App\Http\Livewire;

use App\Models\chat;
use App\Models\frinds;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ChatWith extends Component
{
    use WithFileUploads;
    public $uuid;
    public $user;
    public $message;
    public $media;

    // public function send_message()
    // {
    //     $this->validate(['message' => "required"]);


    //     chat::create([
    //         'user_id' => auth()->id(),
    //         'message' => $this->message,
    //         'chat_id' => frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->first()->chat_id,
    //         'friend_id' => $this->user->id
    //     ]);

    //     $this->message = '';
    //     $this->render();
    // }

    // public function send_message()
    // {
    //     // Validate the input, making the message field optional if media is present
    //     if ($this->media) {
    //         $this->validate([
    //             'message' => 'nullable|string', // Message is optional, but if provided, it must be a string
    //             'media' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,xlsx' // Media should be a valid file
    //         ]);
    //     } else {

    //         $this->validate([
    //             'message' => 'required|string', // Message is optional, but if provided, it must be a string
    //         ]);
    //     }


    //     // Handle media upload if it's present
    //     $mediaPath = null;
    //     if ($this->media) {
    //         // Store the media file in the 'media' folder under 'public' disk
    //         $mediaPath = $this->media->store('media', 'public'); // Saves to storage/app/public/media
    //     }

    //     // Create the chat record, using media if available
    //     $chat = new chat();
    //     $chat->user_id = auth()->id();
    //     $chat->message = $this->message;
    //     if ($mediaPath) {
    //         $chat->media = $mediaPath;
    //     }
    //     $chat->chat_id = frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->first()->chat_id;
    //     $chat->friend_id = $this->user->id;
    //     $chat->save();
    //     // chat::create([
    //     //     'user_id' => auth()->id(),
    //     //     'message' => $this->message, // Store the message if provided
    //     //     'media' => $mediaPath, // Store the media path if a file was uploaded
    //     //     'chat_id' => frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->first()->chat_id,
    //     //     'friend_id' => $this->user->id
    //     // ]);

    //     // Reset the message input and media input after sending
    //     $this->message = '';
    //     $this->media = null;

    //     // Optionally, trigger the render function to update the chat
    //     $this->render();
    // }

    public function send_message()
    {
        // Handle media upload if it's present
        $mediaPaths = [];
        if ($this->media) {
            // Loop through each uploaded file
            foreach ($this->media as $file) {
                // Store the file in the 'public/media' directory and get its path
                $path = $file->store('media', 'public');
        
                // Prepend 'storage/' to the path
                $mediaPaths[] =  $path;
            }
        }
    
        // Convert the array of media paths into a comma-separated string
        $mediaPathsString = implode(',', $mediaPaths); // Convert array to a comma-separated string
    
        // Create the chat record, using the message and media paths
        $chat = new Chat();
        $chat->user_id = auth()->id();
        $chat->message = $this->message;
    
        // Store the media paths as a comma-separated string
        if (!empty($mediaPathsString)) {
            $chat->media = $mediaPathsString;
        }
    
        $chat->chat_id = frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->first()->chat_id;
        $chat->friend_id = $this->user->id;
        $chat->save();
    
        // Reset the message input and media input after sending
        $this->message = '';
        $this->media = null;
    
        // Optionally, trigger the render function to update the chat
        $this->render();
    }
    

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->user = User::where('uuid', $uuid)->first();

        if (frinds::where(['user_id' => auth()->id(), 'friend_id' => auth()->id()])->count() === 0) {
            $uuid = Str::uuid();
            frinds::create([
                'user_id' => auth()->id(),
                'chat_id' => $uuid,
                'friend_id' => auth()->id()
            ]);
        }
        if (frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->count() === 0 || frinds::where(['user_id' => $this->user->id, 'friend_id' => auth()->id()])->count() === 0) {
            $uuid = Str::uuid();
            frinds::create([
                'user_id' => auth()->id(),
                'chat_id' => $uuid,
                'friend_id' => $this->user->id
            ]);

            frinds::create([
                'user_id' => $this->user->id,
                'chat_id' => $uuid,
                'friend_id' => auth()->id()
            ]);
        }
    }
    public function render()
    {
        // return view('livewire.chat-with',[
        //     'messages' => chat::where('chat_id',frinds::where(['user_id'=>auth()->id(), 'friend_id' =>$this->user->id])->first()->chat_id)->get()
        //             ])->layout('layouts.main');

        return view('livewire.chat-with', [
            'messages' => Chat::where('chat_id', Frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->first()->chat_id)->get()
        ])
            ->layout('layouts.main'); // This sets the layout for the Livewire component's view


    }
}
