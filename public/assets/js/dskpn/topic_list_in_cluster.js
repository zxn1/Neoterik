$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    const items = ['Sains', 'Fizik', 'Kimia'];
        items.forEach(item => {
            $('#tahap-penguasaan').append(`
                <div class="col-md-12">
                    <div class="d-flex flex-column h-100">
                        <div id="collection1-${item}">
                            <div class="d-flex w-100 align-items-center mb-2" id="1-collection1-${item}">
                                <span class="form-control me-2">${item}</span>
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-${item}').remove();">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
 });
 
 $(document).ready(function() {
    const items = ['Sains', 'Fizik', 'Kimia'];
        items.forEach(item => {
            $('#tahap-penguasaan2').append(`
                <div class="col-md-12">
                    <div class="d-flex flex-column h-100">
                        <div id="collection2-${item}">
                            <div class="d-flex w-100 align-items-center mb-2" id="1-collection2-${item}">
                                <span class="form-control me-2">${item}</span>
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection2-${item}').remove();">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
 });

 $(document).ready(function() {
    const items = ['Sains', 'Fizik', 'Kimia'];
        items.forEach(item => {
            $('#tahap-penguasaan3').append(`
                <div class="col-md-12">
                    <div class="d-flex flex-column h-100">
                        <div id="collection3-${item}">
                            <div class="d-flex w-100 align-items-center mb-2" id="1-collection3-${item}">
                                <span class="form-control me-2">${item}</span>
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection3-${item}').remove();">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
 });

function clearDynamicInputs()
{
    StandardData.forEach(function(item){
        var collection = $('#collection1-' + item.name);
        var children = collection.children(); // Get all children elements
        children.not(':first-child').remove(); // Remove all excep first
    });
}

function clearAllDynamicInputs()
{
    StandardData.forEach(function(item) {
        var collection = $('#collection1-' + item.name);
        collection.empty();
    });
}

function clearDynamicInputs()
{
    StandardData.forEach(function(item){
        var collection = $('#collection2-' + item.name);
        var children = collection.children(); // Get all children elements
        children.not(':first-child').remove(); // Remove all excep first
    });
}

function clearAllDynamicInputs()
{
    StandardData.forEach(function(item) {
        var collection = $('#collection2-' + item.name);
        collection.empty();
    });
}

function clearDynamicInputs()
{
    StandardData.forEach(function(item){
        var collection = $('#collection3-' + item.name);
        var children = collection.children(); // Get all children elements
        children.not(':first-child').remove(); // Remove all excep first
    });
}

function clearAllDynamicInputs()
{
    StandardData.forEach(function(item) {
        var collection = $('#collection3-' + item.name);
        collection.empty();
    });
}