<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chat;
use Imagick;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class FrindsController extends Controller
{
    // public function generatePdfPreview($file)
    // {
    //     // Get the file path from storage
    //     $filePath = storage_path($file);
    //     dd($file);
    //     // Ensure file exists
    //     if (!file_exists($filePath)) {
    //         abort(404);
    //     }

    //     // Convert the first page of the PDF to an image
    //     $imagick = new Imagick();
    //     $imagick->readImage($filePath . '[0]'); // Read the first page
    //     $imagick->setImageFormat('png'); // Convert to PNG

    //     // Output image to the browser
    //     return response($imagick->getImageBlob(), 200)
    //         ->header('Content-Type', 'image/png');
    // }

    public function generatePdfPreview($file)
    {
        $decodedFile = urldecode($file);
        dd($decodedFile);
        // Use $decodedFile to process the file
        $path = storage_path('app/public/pdf-preview/' . $decodedFile);

        if (!file_exists($path)) {
            abort(404);
        }

        // Process the file (generate preview, etc.)
        return response()->file($path);
    }
    public function show($id)
    {
        $chat = Chat::findOrFail($id);
        return view('show', ['path' => $chat->media]);
    }

    public function deleteMedia($id)
    {
        // dd($id);
        // Find the message by ID
        $message = Chat::find($id);

        if ($message) {
            // Check if the message has media attached
            if ($message->media) {
                // Delete the media file from storage
                $mediaFiles = explode(',', $message->media);
                foreach ($mediaFiles as $media) {
                    if (Storage::exists($media)) {
                        Storage::delete($media);
                    }
                }
                $message->delete(); // Save the changes

                return response()->json(['message' => 'Media deleted successfully.'], 200);
            } else {
                return response()->json(['message' => 'No media found for this message.'], 404);
            }
        } else {
            return response()->json(['message' => 'Message not found.'], 404);
        }
    }
}
