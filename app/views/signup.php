
<form action="/insert" method="POST">
        <label class="test" for="nickname">Identifiant :</label>
        <input class="inputSign" type="text" id="nickname" name="nickname" placeholder="">

        <label class="test" for="email">Email :</label>
        <input class="inputSign" type="email" id="email" name="email" placeholder="">

        <label class="test" for="password">Mot de passe :</label>
        <input class="inputSign" type="password" id="password" name="password" placeholder="">

        <label class="test" for="confirmPassword">Confirmer le mot de passe :</label>
        <input class="inputSign" type="password" id="confirmPassword" name="confirmPassword" placeholder="">
        <input class="validate" type="submit" id="valider" value="Valider"/>
    </form>

<form action="/login" method="POST">
    <input class="validate" type="submit" id="valider" value="Login"/>
</form>