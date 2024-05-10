$(document).ready(function() {
    //listener 1
    $('#selection-kluster').on('change', function() {
        var selectedValue = $(this).val();
        autoPopulate(selectedValue, $('#selection-tp').val());
    });

    //listener 2
    $('#selection-tp').on('change', function() {
        var selectedValue = $(this).val();
        autoPopulate($('#selection-kluster').val(), selectedValue);
    });
});

function autoPopulate(kluster, tp)
{
    if(kluster == 3 && tp == 3)
    {
        clearAllDynamicInputs();

        StandardData.forEach(function(item){
            item.TP.forEach(function(ts){
                addField('collection-' + item.name, ts);
            });
        });
        Swal.fire({
            icon: "success",
            title: "Rekod TP dijumpai",
            text: "Rekod TP telah dijumpai!"
          });
    }
}