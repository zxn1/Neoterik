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