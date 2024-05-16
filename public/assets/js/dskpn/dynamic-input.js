$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    StandardData.forEach(function(item){
        $('#standard-pembelajaran').append(`
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                        <h6 class="my-auto text-white">${ item.name }</h6>
                    </div>
                    <textarea class="multisteps-form__textarea form-control zero-top-border" id="exampleFormControlTextarea1" rows="5" placeholder="${item.hint}"></textarea>
                </div>
            </div>
        `);
    });
 });
 

//  <div class="card mt-4" id="notifications">
//         <div class="card-header d-flex p-3 bg-gradient-primary">
//           <h6 class="my-auto text-white">KAEDAH</h6>
//         </div>
//         <div class="card-body pt-0">
          
//         </div>
//       </div>