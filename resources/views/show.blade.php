<!-- resources/views/media/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Preview</title>
    <style>
        #pdfViewer {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>PDF Preview</h1>
    {{-- <canvas id="pdfViewer" ></canvas> --}}
    <canvas class="pdfViewer" data-pdf-url="/storage/media/PmF9Yn1UXkAUjTy5sgz3RLR9nWyBtkxR3ISxKRGm.pdf" width="918" height="297"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    // Function to render PDF on the canvas with zoom effect for top 25% of the page
    const renderPDF = async (url, canvasElement) => {
        const context = canvasElement.getContext('2d');
        
        try {
            // Get the PDF document
            const pdf = await pdfjsLib.getDocument(url).promise;
            const page = await pdf.getPage(1);  // Get the first page of the PDF

            // Define the scale for a zoomed-in view of the top 25% of the page
            const scale = 1.5; // Adjust the scale for clarity, you can increase this value for a sharper preview
            const viewport = page.getViewport({ scale: scale });

            // Adjust the height to preview only the top 25% of the page
            const top25Height = viewport.height * 0.25;  // 25% of the page height
            const top25Viewport = page.getViewport({ scale: scale, offsetY: 0, height: top25Height });

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
</body>
</html>
