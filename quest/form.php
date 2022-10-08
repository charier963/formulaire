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

    <form action="thanks.php" method="POST" novalidate>

        <?php if (!empty($errors)) {  ?>
            <ul class="error">
                <?php foreach ($errors as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <div>
            <label for="firstname">nom</label>
            <input type="text" id="firstname" name="user_firstname" required>
        </div>
        <div>
            <label for="lastname">prenom</label>
            <input type="text" id="lastname" name="user_lastname" required>
        </div>
        <div>
            <label for="mail">e-mail</label>
            <input type="email" id="mail" name="user_mail" required>
        </div>
        <div>
            <label for="telephone">telephone</label>
            <input type="number" name="telephone" id="telephone" required>
        </div>
        <div>
            <select name="choixSubject" id="choixSubject">
                <option value="reclamation">reclamation</option>
       
                <option value="acknowledgements">remerciements</option>
            </select>
            <label for="message"></label>
            <textarea name="message" id="message" cols="30" rows="10">message</textarea>
        </div>
        <div>
            <button>Envoyer</button>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'post') {

            $contact = array_map('trim', $_POST);

            $errors = [];
            if (empty($contact['firstname'])) {
                $errors[] = 'Le prenom est obligatoire';
            }
            $maxFirstnameLenght = 50;
            if (strolem($contact['firstname']) > $maxFirstnameLenght) {
                $errors[] = 'Le prenom ne doit pas depasser ' . $maxFirstnameLenght . ' carathère';
            }
            if (empty($contact['lastname'])) {
                $errors[] = 'Le prenom est obligatoire';
            }
            $maxFirstnameLenght = 50;
            if (strolem($contact['lastname']) > 50) {
                $errors[] = 'Le prenom ne doit pas depasser ' . $maxFirstnameLenght . ' carathère';
            }
            if (empty($contact['email'])) {
                $errors[] = 'L\'email est obligatoire';
            }
            if (filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Le format d\'email est incorrect';
            }
            if (empty($contact['telephone'])) {
                $errors[] = 'Le telephone est obligatoire';
            }
            $maxFirstnameLenght = 50;
            if (strolem($contact['email']) > $maxFirstnameLenght) {
                $errors[] = 'L\'eamil ne doit pas depasser ' . $maxFirstnameLenght . ' carathère';
        
            if (empty($errors)) {
                header('location: thanks.php');
            }
        }
    }

        ?>


    </form>

</body>

</html>