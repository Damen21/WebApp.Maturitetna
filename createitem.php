<?php
include_once 'header2.php';
echo '
<div class="login-box">
    <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
    <div class="user-box">
        <input type="text" name="itemname" placeholder="Ime oglasa..."> 
        </div> 
        <div class="user-box">
        <label for="znamka">znamka:</label>
        <select id="znamka" name="znamka">
  <option value="yeezy">yeezy</option>
  <option value="jordan">jordan</option>
  <option value="converse">converse</option>
  <option value="adidas">adidas</option>
  <option value="nike">nike</option>
</select>
</div>
<div class="user-box">
        <input type="text" name="model" placeholder="Model...">
        </div>
        <div class="user-box">
        <input type="text" name="itemdesc" placeholder="Opis...">
        </div>
        <div class="user-box">
        <input type="number" name="cena">
        <label>Cena</label> 
        </div>
        <div class="user-box">
        <label for="stanje">stanje:</label>
<select id="stanje" name="stanje">
  <option value="novo">novo</option>
  <option value="rabljeno">rabljeno</option>
</select>
</div>
<div class="user-box">
        <input type="file" name="file">
        </div>
        <button type="submit" name="submit">UPLOAD</button>
    </form>
    
</div>';