<pre>
    <?php
    
    const ERROR_REQUIRED = "Veuillez renseigner ce champ.";
    const ERROR_LENGTH = "Le champ doit faire entre 2 et 10 caractères";
    const ERROR_EMAIL = "L'email n'est pas valide";

    $errors = [
        'firstname' => "",
        'email' => "",
    ];

    if($_SERVER['REQUEST_METHOD'] === "POST"){

        $_POST = filter_input_array(INPUT_POST, [
            'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,

        ]);
    
        $firstname = $_POST['firstname'] ?? '';
        $email = $_POST['email'] ?? '';
    
        if (!$firstname) {
            $errors['firstname'] = ERROR_REQUIRED;
        } elseif (mb_strlen($firstname) < 2 || mb_strlen(($firstname) > 10)) {
            $errors['firstname'] = ERROR_LENGTH;
        }
    
        if (!$email) {
            $errors['email'] = ERROR_REQUIRED;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = ERROR_EMAIL;
        }
    } 
    ?>
</pre>

<form action="" method="POST">
    <div>
        <label for="firstname">Prénom</label>
        <div>
            <input type="text" name="firstname" id="firstname" value=<?= isset($firstname) ? "$firstname" :  ""?>>
            <?= $errors["firstname"] ? '<p style="color:red">' . $errors["firstname"] . "</p>" : '' ?>
        </div>
    </div>
    <div>
        <label for="email">Email</label>
        <div>
            <input type="text" name="email" id="email" value=<?= isset($email) ? "$email" :  ""?>>
            <?= $errors["email"] ? '<p style="color:red">' . $errors["email"] . "</p>" : '' ?>
        </div>
    </div>
    <div>
        <button>Submit</button>
    </div>
</form>













    <!--
   <div>
        <label for="surname">Nom</label>
        <div>
            <input type="text" name="surname" id="surname">
        </div>
    </div>
     <div>
        <label for="date">Date</label>
        <div>
            <input type="date" name="date" id="date">
        </div>
    </div>

    <div>
        <label for="femelle">Femme</label>
        <input type="radio" name="gender" id="femelle" value="femelle">
        <div>
            <label for="male">Homme</label>
            <input type="radio" name="gender" id="male" value="male">
        </div>
    </div>

    <div>
        <label for="cgu">CGU</label>
        <input type="checkbox" name="cgu" id="cgu">
    </div>

    <div>
        <label for="favotire">Favoris</label>
        <select name="favotire" id="favotire">
            <option value="wifi">Wifi</option>
            <option value="tv">TV</option>
            <option value="fibre">Fibre</option>

        </select>
    </div>
-->