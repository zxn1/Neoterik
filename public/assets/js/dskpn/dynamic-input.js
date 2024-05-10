$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    StandardData.forEach(function(item){
        $('#standard-pembelajaran').append(`
            <div class="col-md-4">
                <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">${ item.name }</p>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="${item.hint}"></textarea>
                </div>
            </div>
        `);
    });
 });
 