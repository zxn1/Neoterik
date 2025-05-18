$(document).ready(function() {
    subjectData.forEach(function(item){
        item = item[0];

        $('#tahap-penguasaan').append(`
            <ul class="list-group col-lg-6 mb-2">
                <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white text-uppercase">${ item.sm_desc }</h6>
                </div>
                <div class="list-group-item" id="collection-${item.sm_code}" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                    <div class="d-flex w-100 align-items-center mb-2" id="1-collection-${item.sm_code}" style="display: flex !important;flex-direction: row !important;">
                        <input name="input-${item.sm_code}[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" readonly>
                    </div>
                </div>
            </ul>
        `);

        if(tpDatas.length !== 0)
        {
            if (tpDatas[item.sm_desc] && tpDatas[item.sm_desc][0] !== undefined)
            {
                var collSubCollzs = $('#collection-' + item.sm_code);
                collSubCollzs.empty();

                tpDatas[item.sm_desc][0][1].forEach(function(itemz) {
                    // Get the collection container
                    var collSubject = $('#collection-' + item.sm_code);
        
                    // Generate a unique ID for the new field
                    var newFieldColl = Math.floor(Math.random() * 1000000);
                    
                    let newInputHTMLField = `<div class="d-flex w-100 align-items-center mb-2" id="${newFieldColl}-${item.sm_code}">
                    <input type="text" name="input-${item.sm_code}[]" class="form-control me-2" placeholder="Menilai dan mencipta" value="${itemz}" readonly>
                    </div>`;
        
                    collSubject.append(newInputHTMLField);
                });
            }
        }
    });
 });
