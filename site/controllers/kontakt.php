<?php

return function ($kirby, $pages, $page) {

  $alert = null;

  // Prüfen ob das Formular abgeschickt wurde
  if ($kirby->request()->is('POST')) {

    // Formulardaten holen und validieren
    $name = get('name');
    $email = get('email');
    $message = get('message');

    // Einfache Validierung
    if (empty($name) || empty($email) || empty($message)) {
      $alert = [
        'type' => 'error',
        'message' => 'Bitte füllen Sie alle Felder aus.'
      ];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $alert = [
        'type' => 'error',
        'message' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.'
      ];
    } else {
      // Email versenden
      try {
        $kirby->email([
          'from' => 'noreply@ihredomain.com',
          'replyTo' => $email,
          'to' => 'phil.rudolph@ymail.com',
          'subject' => 'Kontaktanfrage von ' . $name,
          'body' => "Name: " . $name . "\n" .
            "E-Mail: " . $email . "\n" .
            "Nachricht:\n" . $message
        ]);

        $alert = [
          'type' => 'success',
          'message' => 'Vielen Dank! Ihre Nachricht wurde erfolgreich versendet.'
        ];
      } catch (Exception $error) {
        $alert = [
          'type' => 'error',
          'message' => 'Es gab einen Fehler beim Versenden. Bitte versuchen Sie es später noch einmal.'
        ];
      }
    }
  }

  // Daten an das Template weitergeben
  return [
    'alert' => $alert
  ];
};
