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
    <form action="" method="post">
        <div>
            <label for="firstname">nom</label>
            <input type="text" id="firstname" name="firstname">
        </div>
        <div>
            <label for="lastname">prenom</label>
            <input type="text" id="lastname" name="lastename">
        </div>
        <div>
            <label for="mail">e-mail</label>
            <input type="email" id="mail" name="user_mail">
        </div>
        <div>
            <label for="telephone">telephone</label>
            <input type="number" name="telephone" id="telephone">
        </div>
        <div>
            <textarea name="message" id="message" cols="30" rows="10">message</textarea>
        </div>
        <div>
            <button>Envoyer</button>
        </div>



    </form>

</body>

</html>