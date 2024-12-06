<div class="chat-body">
    <div class="chat-box-header">
        <a href="{{ route('contacts') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"
                style="height: 30px; width: 30px;display:inline-block; color:whitesmoke;margin: 5px 0 15px 15px;">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
        </a>
        <img src="{{ asset($user->image) }}" class="employee" style="border-radius: 50px; margin-left:5px; "
            alt="">
        <div class="employee-name" style="margin-left: 5px;">
            {{ $user->name === auth()->user()->name ? $user->name . ' (You)' : $user->name }}
        </div>


        <div class="top-right-menu-icons">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M12,7a2,2,0,1,0-2-2A2,2,0,0,0,12,7Zm0,10a2,2,0,1,0,2,2A2,2,0,0,0,12,17Zm0-7a2,2,0,1,0,2,2A2,2,0,0,0,12,10Z" />
            </svg>
        </div>
    </div>
    <div class="chat-box-content" wire:poll.keep-alive>
        <div class="conversation-group" id="textContent">
            @forelse ($messages as $message)
                {{-- <div class="message message-box {{ $message->friend_id === auth()->id() ?  'received':'send' }}"> --}}
                @php
                    $class = '';
                    if (auth()->check()) {
                        if ($message->user_id === auth()->id() && $message->friend_id === auth()->id()) {
                            $class = 'send';
                        } elseif ($message->user_id === auth()->id() && $message->friend_id !== auth()->id()) {
                            $class = 'send';
                        } elseif ($message->friend_id === auth()->id() && $message->user_id !== auth()->id()) {
                            $class = 'received';
                        }
                    }
                @endphp
                <div class="message message-box {{ $class }}">

                    <p>{{ $message->message ?? null }}</p>

                    <!-- Check if there is media and it is not empty -->
                    @if ($message->media)
                        <div class="message-media">
                            @foreach (explode(',', $message->media) as $media)
                                <!-- Check if media is an image -->
                                @foreach (['jpg', 'jpeg', 'png', 'gif'] as $ext)
                                    @if (str_ends_with($media, $ext))
                                        <img src="{{ Storage::url($media) }}" alt="media"
                                            style="max-width: 280px; max-height: 300px;">
                                    @endif
                                @endforeach

                                <!-- Check if media is a PDF -->
                                @if (str_ends_with($media, 'pdf'))
                                    <!-- Display PDF preview (first page) -->
                                    {{-- <canvas class="pdfViewer" style="max-width: 300px; max-height: 300px;"></canvas> --}}
                                    <canvas class="pdfViewer" data-pdf-url="{{ Storage::url($media) }}"
                                        style="max-width: 300px; max-height: 300px;"></canvas>
                                    <br>
                                    <!-- Provide a download link for the PDF -->
                                    <a href="{{ Storage::url($media) }}"><button>Download</button></a>
                                @endif

                                <!-- Check if media is a document -->
                                @if (str_ends_with($media, 'docx') || str_ends_with($media, 'xlsx'))
                                    <a href="{{ Storage::url($media) }}" target="_blank">Download File</a>
                                @endif

                                <!-- Check if media is a video -->
                                @foreach (['mp4', 'avi', 'mov', 'webm'] as $videoExt)
                                    @if (str_ends_with($media, $videoExt))
                                        <video width="280" controls>
                                            <source src="{{ Storage::url($media) }}" type="video/{{ $videoExt }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                @endforeach

                                <!-- Check if media is an audio file -->
                                @foreach (['mp3', 'wav', 'ogg'] as $audioExt)
                                    @if (str_ends_with($media, $audioExt))
                                        <audio controls>
                                            <source src="{{ Storage::url($media) }}" type="audio/{{ $audioExt }}">
                                            Your browser does not support the audio element.
                                        </audio>
                                    @endif
                                @endforeach

                                <!-- Handle unsupported media -->
                                @if (
                                    !str_ends_with($media, 'jpg') &&
                                        !str_ends_with($media, 'jpeg') &&
                                        !str_ends_with($media, 'png') &&
                                        !str_ends_with($media, 'gif') &&
                                        !str_ends_with($media, 'pdf') &&
                                        !str_ends_with($media, 'docx') &&
                                        !str_ends_with($media, 'mp4') &&
                                        !str_ends_with($media, 'avi') &&
                                        !str_ends_with($media, 'mov') &&
                                        !str_ends_with($media, 'webm') &&
                                        !str_ends_with($media, 'mp3') &&
                                        !str_ends_with($media, 'wav') &&
                                        !str_ends_with($media, 'ogg'))
                                    <span>Unsupported Media Type</span>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <div class="time">
                        <small>{{ \Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</small>
                    </div>
                </div>
            @empty
                <div class="message message-box received">
                    <p>Say Hi to {{ $user->name }}</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="input-group">
        <hr />
        <form wire:submit.prevent="send_message">
            <div class="row">
                <!-- File Input (aligned to the left) -->
                <div style="display: inline; position: relative;">
                    <svg class="file-and-smile-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        style="position: relative">
                        <path
                            d="M18.08,12.42,11.9,18.61a4.25,4.25,0,0,1-6-6l8-8a2.57,2.57,0,0,1,3.54,0,2.52,2.52,0,0,1,0,3.54l-6.9,6.89A.75.75,0,1,1,9.42,14l5.13-5.12a1,1,0,0,0-1.42-1.42L8,12.6a2.74,2.74,0,0,0,0,3.89,2.82,2.82,0,0,0,3.89,0l6.89-6.9a4.5,4.5,0,0,0-6.36-6.36l-8,8A6.25,6.25,0,0,0,13.31,20l6.19-6.18a1,1,0,1,0-1.42-1.42Z" />
                    </svg>
                    <input type="file" wire:model="media" multiple accept="*"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                </div>

                <!-- Message Textarea (aligned to the center) -->

                <textarea wire:model.lazy="message" id="text-box" placeholder="Type a message..." rows="1"
                    style="padding-left:10px;width:80%; margin-top:10px;" class="whatsapp-input"></textarea>


            </div>
        </form>
    </div>




    <div class="chat-box-footer">
        <div>
            <!-- file -->
            <div style="display: inline-block">
                {{-- <div style="display: inline;position:relative;">
                    <svg class="file-and-smile-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="position: relative">
                        <path
                            d="M18.08,12.42,11.9,18.61a4.25,4.25,0,0,1-6-6l8-8a2.57,2.57,0,0,1,3.54,0,2.52,2.52,0,0,1,0,3.54l-6.9,6.89A.75.75,0,1,1,9.42,14l5.13-5.12a1,1,0,0,0-1.42-1.42L8,12.6a2.74,2.74,0,0,0,0,3.89,2.82,2.82,0,0,0,3.89,0l6.89-6.9a4.5,4.5,0,0,0-6.36-6.36l-8,8A6.25,6.25,0,0,0,13.31,20l6.19-6.18a1,1,0,1,0-1.42-1.42Z" />
                    </svg>
                    <input type="file" wire:model="media" multiple accept="*"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                </div> --}}
                <!-- smile -->

                <svg class="file-and-smile-icons" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330"
                    style="enable-background: new 0 0 330 330" xml:space="preserve">
                    <g id="XMLID_26_">
                        <path id="XMLID_27_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300
                             c-74.44,0-135-60.561-135-135S90.56,30,165,30s135,60.561,135,135S239.439,300,165,300z" />
                        <path id="XMLID_30_" d="M215.911,200.912H114.088c-6.067,0-11.537,3.654-13.858,9.26c-2.321,5.605-1.038,12.057,3.252,16.347
                            C119.914,242.95,141.762,252,165,252c23.238,0,45.086-9.05,61.518-25.481c4.29-4.29,5.573-10.741,3.252-16.347
                            C227.448,204.566,221.978,200.912,215.911,200.912z" />
                        <path id="XMLID_31_" d="M115.14,147.14c3.72-3.72,5.86-8.88,5.86-14.14c0-5.26-2.14-10.42-5.86-14.141
                            C111.42,115.14,106.26,113,101,113c-5.27,0-10.42,2.14-14.14,5.859C83.13,122.58,81,127.74,81,133c0,5.26,2.13,10.42,5.86,14.14
                            c3.72,3.72,8.88,5.86,14.14,5.86C106.26,153,111.42,150.859,115.14,147.14z" />
                        <path id="XMLID_71_" d="M229,113c-5.26,0-10.42,2.14-14.14,5.859c-3.72,3.721-5.86,8.87-5.86,14.141c0,5.26,2.14,10.42,5.86,14.14
                            c3.72,3.72,8.88,5.86,14.14,5.86c5.26,0,10.42-2.141,14.14-5.86c3.73-3.72,5.86-8.88,5.86-14.14c0-5.26-2.13-10.42-5.86-14.141
                            C239.42,115.14,234.27,113,229,113z" />
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg>
                <svg wire:click="send_message" class="submit-button" type="button" class=""
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="margin-top: 15px;">
                    <path
                        d="M20.34,9.32l-14-7a3,3,0,0,0-4.08,3.9l2.4,5.37h0a1.06,1.06,0,0,1,0,.82l-2.4,5.37A3,3,0,0,0,5,22a3.14,3.14,0,0,0,1.35-.32l14-7a3,3,0,0,0,0-5.36Zm-.89,3.57-14,7a1,1,0,0,1-1.35-1.3l2.39-5.37A2,2,0,0,0,6.57,13h6.89a1,1,0,0,0,0-2H6.57a2,2,0,0,0-.08-.22L4.1,5.41a1,1,0,0,1,1.35-1.3l14,7a1,1,0,0,1,0,1.78Z" />
                </svg>
            </div>

            <!-- </div> -->
        </div>
    </div>
    {{-- <script>
        textContentScroll = document.getElementsByClassName('chat-box-content')[0];
        textContentScroll.scrollTop = textContentScroll.scrollHeight;


        let textContent = document.getElementsByClassName('conversation-group')[0];
        let textbox = document.querySelector("#text-box");
        textbox.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                textContentScroll = document.getElementsByClassName('chat-box-content')[0];
                textContentScroll.scrollTop = textContentScroll.scrollHeight + 40;
                return false;
            }
        });
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

    <script>
        // Function to render PDF on the canvas with zoom effect for top 25% of the page
        const renderPDF = async (url, canvasElement) => {
            const context = canvasElement.getContext('2d');

            try {
                // Get the PDF document
                const pdf = await pdfjsLib.getDocument(url).promise;
                const page = await pdf.getPage(1); // Get the first page of the PDF

                // Define the scale for a zoomed-in view of the top 25% of the page
                const scale =
                    1.5; // Adjust the scale for clarity, you can increase this value for a sharper preview
                const viewport = page.getViewport({
                    scale: scale
                });

                // Adjust the height to preview only the top 25% of the page
                const top25Height = viewport.height * 0.25; // 25% of the page height
                const top25Viewport = page.getViewport({
                    scale: scale,
                    offsetY: 0,
                    height: top25Height
                });

                // Set canvas dimensions based on the new height
                canvasElement.width = top25Viewport.width;
                canvasElement.height = top25Height;

                // Render the top 25% of the page
                const renderContext = {
                    canvasContext: context,
                    viewport: top25Viewport,
                };

                await page.render(renderContext).promise;
            } catch (err) {
                console.error("Error rendering PDF:", err);
            }
        };

        // Function to initialize the PDF rendering when the page loads
        const initializePDFRender = () => {
            // Select all canvas elements with class 'pdfViewer'
            const canvasElements = document.querySelectorAll('.pdfViewer');

            canvasElements.forEach((canvasElement) => {
                // Ensure that the canvas is not empty before rendering
                if (canvasElement) {
                    const pdfPath = canvasElement.getAttribute('data-pdf-url');
                    if (pdfPath) {
                        renderPDF(pdfPath, canvasElement);
                    }
                }
            });
        };

        // Wait for the DOM to be fully loaded before initializing PDF renders
        document.addEventListener('DOMContentLoaded', () => {
            initializePDFRender(); // Trigger PDF rendering for all canvases
        });
    </script>



</div>
