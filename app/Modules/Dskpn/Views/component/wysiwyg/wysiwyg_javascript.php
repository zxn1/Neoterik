<script>
  const WysiwygComponent = {
  instances: {},

  createHTML: function ({ id, placeholder = "", inputNameId = "hiddenInput", deleteButton = "deleteButton", isLearningStandard = false, learningStandard = null}) {
    const editorId = `wysiwyg-editor-${id}`;
    const inputId = `${inputNameId}`;
    const toolbarId = `wysiwyg-toolbar-${id}`;

    try {
      // Decode once
      placeholder = decodeURIComponent(placeholder);
      // If decoding changed the string, it's probably encoded
    } catch (e) {
      placeholder = placeholder;
    }

    let extra_function = "tpUpdateNumbering('collection-tahap-penguasaan');";
    let extra_tool = `<button class="ql-bold"></button>
                      <button class="ql-italic"></button>
                      <button class="ql-underline"></button>`;
    if(isLearningStandard)
    {
      extra_function = "selectionPopulateBasedOnNumbering();";

      if(learningStandard != null)
      {
        let { sbm_code, sbm_id, learning_standard_number, index } = learningStandard;
        extra_tool = `<label for="standard-learning-number" style="position : relative; top : 2px;">Item:&nbsp;</label>
                    <input type="text" onchange="selectionPopulateBasedOnNumbering()" id="standard-learning-number" data-subject="${sbm_code}" name="standard-learning-number[${sbm_id}][${index}][]" pattern="^\\d+(\\.\\d+)*$" 
                      title="Sila masukkan format nombor yang sah (contoh: 1.1.1 atau 1.2.3.4). Hanya angka dan titik dibenarkan." style="position : relative; top : -2px;"  class="form-control w-15 p-1" placeholder="1.1" value="${learning_standard_number}" required>`; 
      } else {
        extra_tool = "";
      }
    }

    return `
      <div id="${toolbarId}" class="quill-toolbar-container d-flex justify-content-between align-items-center flex-wrap gap-2" style="flex-wrap: nowrap;">
        <div class="ql-toolbar-group d-flex align-items-center gap-2 flex-wrap">
          ${extra_tool}
          <button class="ql-list" value="ordered"></button>
          <button class="ql-list" value="bullet"></button>
        </div>
        
        <div class="ql-toolbar-actions">
          <a class="btn btn-link text-danger px-1 mb-0" href="javascript:void(0)" onclick="$('#${deleteButton}').remove(); ${extra_function}">
            <i class="far fa-trash-alt fa-lg" aria-hidden="true"></i>
          </a>
        </div>
      </div>


      <div id="${editorId}">${placeholder}</div>

      <input type="hidden" name="${inputId}[]" id="${inputId}-${id}" value="${encodeURIComponent(placeholder)}"/>
    `;
  },

  renderTo: function (targetId, options) {
    const { id } = options;
    const { inputNameId } = options;
    const html = this.createHTML(options);
    const target = document.getElementById(targetId);
    if (!target) return;

    // Replace target element
    target.innerHTML = html;

    // Re-get elements since outerHTML replaces the node
    const editorSelector = `#wysiwyg-editor-${id}`;
    const toolbarSelector = `#wysiwyg-toolbar-${id}`;
    const inputSelector = `${inputNameId}-${id}`;

    const quill = new Quill(editorSelector, {
      theme: 'snow',
      modules: {
        toolbar: toolbarSelector
      },
      placeholder: 'Tulis apa yang anda fikirkan?'
    });

    const hiddenInput = document.getElementById(inputSelector);

    quill.on('text-change', function () {
      hiddenInput.value = quill.root.innerHTML;
    });

    this.instances[id] = { quill, hiddenInput };
  }
};
</script>