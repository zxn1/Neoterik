function requestToDeleteDSKPN(dskpn_id)
{
  Swal.fire({
    title: "Adakah anda benar-benar ingin memohon untuk memadam DSKPN ini?",
    html: `<textarea id="reason" placeholder="Sila masukkan alasan anda di sini..." cols="50" style="width : 100%;"></textarea>`,
    showDenyButton: true,
    icon: "info",
    confirmButtonText: "Teruskan",
    denyButtonText: `Tidak`,
    preConfirm: () => {
      const reason = Swal.getPopup().querySelector('#reason').value;
      if (!reason) {
        Swal.showValidationMessage(`Sila masukkan alasan anda`);
      }
      return { reason: reason };
    },
    didOpen: () => {
      const confirmButton = Swal.getConfirmButton();
      const textarea = Swal.getPopup().querySelector('#reason');
      confirmButton.disabled = true;
  
      textarea.addEventListener('input', () => {
        confirmButton.disabled = !textarea.value.trim();
      });
    }
  }).then((result) => {
    if (result.isConfirmed) {
      const reason = result.value.reason;
      window.location.href = req_delete_dskpn_endpoint + "?dskpn_id=" + dskpn_id + "&reason=" + encodeURIComponent(reason);
    } 
  });
}

function deleteDSKPN(dskpn_id)
{
  $.ajax({
    url: get_to_delete_reason + '?dskpn_id=' + dskpn_id,
    type: 'GET',
    data: {
        csrf: csrfToken, // Include the CSRF token
        // Other data parameters
    },
    dataType: 'json',
    success: function(data) {
        // Handle success response
        if(data.status == 'success')
        {
            Swal.fire({
              title: "Adakah anda benar-benar ingin meluluskan untuk memadam DSKPN ini?",
              showDenyButton: true,
              icon: "info",
              html: `Justifikasi:<br><textarea disabled>${data.data.dskpn_delete_reason}</textarea>`,
              confirmButtonText: "Sah",
              showCancelButton: true,
              cancelButtonText: 'Batal',
              denyButtonText: `Tidak Sah`
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = delete_dskpn_endpoint + "?dskpn_id=" + dskpn_id;
              } else if (result.isDenied) {
                  Swal.fire({
                      title: "Adakah anda benar-benar ingin membatalkan permohonan memadam DSKPN ini?",
                      showDenyButton: true,
                      icon: "info",
                      confirmButtonText: "Teruskan",
                      denyButtonText: `Tidak`
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = reject_delete_dskpn_endpoint + "?dskpn_id=" + dskpn_id;
                      } else if (result.isDenied) {
                        Swal.fire("Permintaan dibatalkan!", "", "error");
                      }
                    });
              } else {
                Swal.fire("Permintaan dibatalkan!", "", "error");
              }
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Maaf",
                text: "Proses mendapatkan justifikasi untuk padam dskpn gagal!"
            });
        }
    },
    error: function(xhr, status, error) {
        // Handle error
        Swal.fire({
            icon: "error",
            title: "Maaf",
            text: "Proses mendapatkan justifikasi untuk padam dskpn gagal!\n" + error
        });
    }
  });
}

// function deleteTopic(topicID)
// {
//     // Make a DELETE request using jQuery's $.ajax()
//     $.ajax({
//         url: '/dskpn/topic/delete/' + topicID,
//         type: 'DELETE',
//         data: {
//             csrf: csrfToken, // Include the CSRF token
//             // Other data parameters
//         },
//         dataType: 'json',
//         success: function(data) {
//             // Handle success response
//             if(data.status == 'success')
//             {
//                 Swal.fire({
//                     icon: "success",
//                     title: "Berjaya",
//                     text: "Topik berkaitan berjaya dipadam!"
//                 });
//             } else {
//                 Swal.fire({
//                     icon: "danger",
//                     title: "Maaf",
//                     text: "Proses pemadaman topik gagal!"
//                 });
//             }
//         },
//         error: function(xhr, status, error) {
//             // Handle error
//             Swal.fire({
//                 icon: "danger",
//                 title: "Maaf",
//                 text: "Proses pemadaman topik gagal!\n" + error
//             });
//         }
//     });
// }