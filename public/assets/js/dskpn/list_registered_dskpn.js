function requestToDeleteDSKPN(dskpn_id)
{
    Swal.fire({
        title: "Adakah anda benar-benar ingin memohon untuk memadam DSKPN ini?",
        showDenyButton: true,
        icon: "info",
        confirmButtonText: "Teruskan",
        denyButtonText: `Tidak`
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = req_delete_dskpn_endpoint + "?dskpn_id=" + dskpn_id;
        } else if (result.isDenied) {
          Swal.fire("Permintaan dibatalkan!", "", "error");
        }
      });
}

function deleteDSKPN(dskpn_id)
{
    Swal.fire({
        title: "Adakah anda benar-benar ingin meluluskan untuk memadam DSKPN ini?",
        showDenyButton: true,
        icon: "info",
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