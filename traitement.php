<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sécurisation des données envoyées
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse à laquelle tu veux recevoir les messages
    $destinataire = "vincent.vanahmme.com";

    // Sujet de l'e-mail
    $sujet = "Nouveau message depuis le formulaire de contact";

    // Corps du message
    $contenu = "Adresse email : $email\n\nMessage :\n$message";

    // En-têtes de l'e-mail
    $headers = "From: $email";

    // Envoi de l'e-mail
    if (mail($destinataire, $sujet, $contenu, $headers)) {
        echo "<p>✅ Message envoyé avec succès. Merci de nous avoir contactés.</p>";
    } else {
        echo "<p>❌ Une erreur est survenue. Le message n'a pas été envoyé.</p>";
    }

} else {
    echo "<p>Formulaire non soumis correctement.</p>";
}
?>
