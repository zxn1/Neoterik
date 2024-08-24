$(document).ready(function() {
    $('.select2').select2();
});

function selectSubjectToCode(element)
{
    let selectedText = element.options[element.selectedIndex].text;
    let subjectCode = element.options[element.selectedIndex].getAttribute('data-code');

    recalculateCoreCompetencyCode();

    $("#subject-name-one").html(selectedText);
    $("#empty-core-competency").hide();
    $("#core-competency").show();
    $("#reset-n-save-section").show();
}

function resetTPForm()
{
    $("#collection-core-competency").empty();
    $("#collection-core-competency").append(`<div class="d-flex w-100 align-items-center" id="1-collection-core-competency" style="display: flex !important;flex-direction: row !important;">
                                                <div class="row w-100 p-2 pb-0">
                                                <div class="col-2 p-1">
                                                    <input name="input-core-competency-code[]" type="text" class="form-control me-2" id="input-core-competency-code" placeholder="KSN1" required>
                                                </div>
                                                <div class="col-10 d-flex p-1">
                                                    <input name="input-core-competency[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" required>
                                                    <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-core-competency').remove(); recalculateCoreCompetencyCode();">
                                                        <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                </div>
                                            </div>`);
}

function recalculateCoreCompetencyCode()
{
    let codeSubject = document.getElementById("subject-dynamic-field").options[document.getElementById("subject-dynamic-field").selectedIndex].getAttribute('data-code');
    let count = 1;
    var nodes = document.querySelectorAll("input[type=text]");
    for (var i=0; i<nodes.length; i++)
        if(nodes[i].id == 'input-core-competency-code')
        {
            nodes[i].value = codeSubject + count;
            count++;
        }
}

function addField(collectionId, text = "") {
    bareBoneId = collectionId;
    collectionId = 'collection-' + collectionId;

    // Get the collection container
    var collection = $('#' + collectionId);

    // Generate a unique ID for the new field
    var newFieldId = Math.floor(Math.random() * 1000000);

    // Create the new field HTML
    var newFieldHTML = `
        <div class="d-flex w-100 align-items-center" id="${newFieldId}-${collectionId}" style="display: flex !important;flex-direction: row !important;">
            <div class="row w-100 p-2 pb-0">
            <div class="col-2 p-1">
                <input name="input-core-competency-code[]" type="text" class="form-control me-2" id="input-core-competency-code" placeholder="KSN1" required>
            </div>
            <div class="col-10 d-flex p-1">
                <input name="input-core-competency[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" value="${text}" required>
                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#${newFieldId}-${collectionId}').remove(); recalculateCoreCompetencyCode();">
                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                </a>
            </div>
            </div>
        </div>
    `;

    collection.append(newFieldHTML);
    recalculateCoreCompetencyCode();
}

function countInputs(collectionId) {
    // Get the collection container
    var collection = $('#' + collectionId);

    // Count the number of input fields in the collection
    var inputCount = collection.children().length;

    return inputCount;
}