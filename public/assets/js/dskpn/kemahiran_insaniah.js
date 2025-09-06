//initialize
subject_list.forEach((itemz, index) => {
    mappingProcess(index + "|" + itemz.sbm_id + "|0");
});

function mapKemahiranInsaniah(event)
{
    //console.log(kemahiran_insaniah_rules);
    let checkbox_id = event.target.id;
    //console.log(checkbox_id);
    mappingProcess(checkbox_id);
}

function mappingProcess(checkbox_id)
{
    let [index, subject_id, map_item_id] = checkbox_id.split('|');
    let tempArray = [];
    Object.keys(kemahiran_insaniah_rules).forEach(parent_id => {
        let related_ids = kemahiran_insaniah_rules[parent_id];
        //console.log(related_ids);

        //reset all
        checkMappedItem(parent_id, index + "|" + subject_id);
        
        //check what related only
        try {
            if (related_ids.some(id => document.getElementById(index + "|" + subject_id + '|' + id).checked)) {
                tempArray.push([parent_id, index + "|" +subject_id, true]);
                //checkMappedItem(parent_id, subject_id, true);
            }
        } catch (ex) {
            //nothing
        }
    });

    //console.log(tempArray);
    tempArray.forEach(val => {
        checkMappedItem(val[0], val[1], true);
    });
}

function checkMappedItem(item_id, subject_id, check_status = false)
{
    let checkbox = document.getElementById(subject_id + '|' + item_id);
    if (checkbox) {
        checkbox.checked = check_status;
    }
}