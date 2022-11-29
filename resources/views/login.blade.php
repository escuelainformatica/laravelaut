<form method="post">
      @csrf
    <input type="text" name="email" ><br>
    <input type="text" name="password"><br>
    <input type="submit" name="boton" value="Login"/>
    <b>@dump($errors)</b>
</form>
