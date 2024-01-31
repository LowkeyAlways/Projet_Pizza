    // Récupère l'année courante
    const currentYear = new Date().getFullYear();
    // Met à jour le contenu du span
    document.querySelector("footer p").innerHTML = "&copy; - " + "Andy LOUIS" + " - " + currentYear;