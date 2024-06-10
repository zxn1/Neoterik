let catatan_editor;
function initializeCKEditors() {
    // Select all textarea elements
    const textareas = document.querySelectorAll('textarea');

    // Loop through each textarea and initialize CKEditor
    textareas.forEach((textarea) => {
        if (textarea.id === 'catatan') {
            ClassicEditor
            .create( textarea, {
                simpleUpload: {
                // Feature configuration.
                uploadUrl: ckeditor_upload_url,
                headers: {
                    //later put csrf_token
                }
                }
            } )
            .then( editor => {
                catatan_editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );

            return;
        }

        ClassicEditor
            .create(textarea, {
                toolbar: [], // Remove the toolbar
                readOnly: true // Set read-only mode directly
            })
            .then(editor => {
                // Further configuration or customizations if needed
                // Example: Enable read-only mode with a custom ID
                editor.enableReadOnlyMode('custom-freetext-id');
            })
            .catch(error => {
                console.error(error);
            });
    });
}

// Call the function to initialize CKEditors when the page loads
window.addEventListener('DOMContentLoaded', initializeCKEditors);