// document.addEventListener('DOMContentLoaded', function() {
//     let deleteLinks = document.querySelectorAll('.delete-link');

//     deleteLinks.forEach(function(link) {
//         link.addEventListener('click', function(event) {
//             event.preventDefault();
//             let employeeId = link.getAttribute('data-employee-id');
//             let deleteForm = document.getElementById('delete-form-' + employeeId);
//             deleteForm.submit();
//         });
//     });
// });


document.addEventListener('DOMContentLoaded', function() {
    let deleteLinks = document.querySelectorAll('.delete-link');

    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            let employeeId = link.getAttribute('data-employee-id');

            // Afficher la boîte de dialogue de confirmation
            if (confirm('Voulez-vous vraiment supprimer cet employé ?')) {
                // Si l'utilisateur clique sur "Oui", soumettre le formulaire de suppression
                let deleteForm = document.getElementById('delete-form-' + employeeId);
                deleteForm.submit();
            } else {
                // Sinon, annuler l'action
                return false;
            }
        });
    });
});