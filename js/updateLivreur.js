function updateLivreur() {
    var form = document.getElementById('livreurForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                location.reload();
            } else {
                alert('Erreur lors de la requête : ' + xhr.status);
            }
        }
    };

    xhr.open('POST', '../src/update_livreur.php', true);
    xhr.send(formData);
}