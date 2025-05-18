function toCapitalFirstCharOfEachWord() {
    this.value = this.value
        .toLowerCase()
        .replace(/\b\w/g, function(char) {
            return char.toUpperCase();
        });
}

function toCapitalizedAllChar() {
    this.value = this.value.toUpperCase();
}

function safeAddListener(id, functionRelated) {
    var el = document.getElementById(id);
    if (el) {
        el.addEventListener("blur", functionRelated);
    }
}

safeAddListener("clusterCode", toCapitalizedAllChar);
safeAddListener("editClusterCode", toCapitalizedAllChar);
safeAddListener("subjectCode", toCapitalizedAllChar);
safeAddListener("edit_subjectCode", toCapitalizedAllChar);
safeAddListener("dskpncode", toCapitalizedAllChar);
document.body.addEventListener("blur", function(e) {
    if (e.target && e.target.id === "input-core-competency-code") {
        toCapitalizedAllChar.call(e.target);
    }
}, true);

safeAddListener("editClusterName", toCapitalFirstCharOfEachWord);
safeAddListener("clusterName", toCapitalFirstCharOfEachWord);
safeAddListener("subjectName", toCapitalFirstCharOfEachWord);
safeAddListener("edit_subjectName", toCapitalFirstCharOfEachWord);
