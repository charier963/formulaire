<?php
$subjects = [
    'reclamation'=> 'reclamation',
    'acknowledgements'=>'remerciements',
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contact = array_map('trim', $_POST);

    $errors = [];
    if (empty($contact['user_firstname'])) {
        $errors[] = 'Le prenom est obligatoire';
    }
    $maxFirstnameLenght = 50;
    if (strlen($contact['user_firstname']) > $maxFirstnameLenght) {
        $errors[] = 'Le prenom ne doit pas depasser ' . $maxFirstnameLenght . ' caractères';
    }
    if (empty($contact['user_lastname'])) {
        $errors[] = 'Le nom est obligatoire';
    }
    $maxFirstnameLenght = 50;
    if (strlen($contact['user_lastname']) > $maxFirstnameLenght) {
        $errors[] = 'Le prenom ne doit pas depasser ' . $maxFirstnameLenght . ' caractères';
    }
    if (empty($contact['user_mail'])) {
        $errors[] = 'L\'email est obligatoire';
    }
    if (!filter_var($contact['user_mail'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Le format d\'email est incorrect';
    }
    if (empty($contact['telephone'])) {
        $errors[] = 'Le telephone est obligatoire';
    }
    $maxEmailLenght = 50;
    if (strlen($contact['user_mail']) > $maxEmailLenght) {
        $errors[] = 'L\'eamil ne doit pas depasser ' . $maxEmailLenght . ' caractères';
    }
    if (empty($contact['message'])) {
        $errors[] = 'Le message est obligatoire';
    }
    $maxmessagelLenght = 255;
    if (strlen($contact['message']) > $maxmessagelLenght) {
        $errors[] = 'L\'eamil ne doit pas depasser ' . $maxmessagelLenght . ' caractères';
    }
    var_dump($contact);
    if(!key_exists($contact['choixSubject'], $subjects)){ 
        $errors[] = 'Le sujet est incorrect';
    }
    if (empty($errors)) {
        header('location: thanks.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>formulaire</title>
</head>

<body>
    <h1>contacter</h1>

    <form action="" method="POST" >
        <?php if (!empty($errors)) {  ?>
            <ul class="error">
                <?php foreach ($errors as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <div>
            <label for="firstname">nom</label>
            <input type="text" id="firstname" name="user_firstname" required value="<?= $contact['user_firstname'] ?? '' ?>">
        </div>
        <div>
            <label for="lastname">prenom</label>
            <input type="text" id="lastname" name="user_lastname" required value="<?= $contact['user_lastname'] ?? '' ?>">
        </div>
        <div>
            <label for="mail">e-mail</label>
            <input type="email" id="mail" name="user_mail" required value="<?= $contact['user_mail'] ?? '' ?>">
        </div>
        <div>
            <label for="telephone">telephone</label>
            <input type="number" name="telephone" id="telephone" required value="<?= $contact['telephone'] ?? '' ?>">
        </div>
        <div>
            <label for="choixSubject">Sujet</label>
            <select name="choixSubject" id="choixSubject" required>
                <?php foreach($subjects as $subject => $subjectMessage): ?>
                    <option value="<?= $subject ?>"
                        <?php if(isset($contact['choixSubject']) && $contact['choixSubject'] === $subject) : ?>
                                selected
                            <?php endif; ?>
                    >
                    <?= $subjectMessage ?>
                   
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="message"></label>
            <textarea name="message" id="message" cols="30" rows="10"><?= $contact['message'] ?? '' ?></textarea required >
        </div>
        <div>
            <button>Envoyer</button>
        </div>

    </form>

</body>

</html>
