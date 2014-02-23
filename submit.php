<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Word Vector Evaluation Demo</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/pygments.css">
 
</head>
 
<body>
<header>
<h2>Word Vector Evaluation</h2>
<nav>
  <ul>
    <li><a href="index.php">your-own</a></li>
    <li><a href="demo.php">pre-trained</a></li>
    <li><a href="comp.php">compare</a></li>
    <li><a href="submit.php">submit</a></li>
    <li><a href="suite.php">suite</a></li>
  </ul>
</nav>
</header>
 
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<?php
  if(isset($_REQUEST["upload"])){
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'user-vecs/'.$_FILES['userfile']['name'])) {
      ?>
        <script type="text/javascript">
          alert("File uploaded. Thanks!");
        </script>
      <?php
    } else {
      ?>
        <script type="text/javascript">
          alert("File could not be uploaded. Contact Us!");
        </script>
      <?php
    }
  }
?> 

<form enctype="multipart/form-data" action="" method="POST">
  <div>
  <h3>Upload Vectors:</h3><br>
  <table width="300">
    <tr>
      <td>Vector Name: </td>
      <td><input type="text" name="vecname" /></td>
    </tr>
    <tr>
      <td>Dimensions:</td>
      <td><input type="text" name="veclen" /></td>
    </tr>
    <tr>
      <td>Vocab Size:</td>
      <td><input type="text" name="vocablen" /></td>
    </tr>
    <tr>
      <td>Corpora Trained:</td>
      <td><input type="text" name="corpora" /></td>
    </tr>
    <tr>
      <td>Avail for download?:</td>
      <td><input type="text" name="corpora" /></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="text" name="work" /></td>
    </tr>
  </table> 
    <input type="hidden" name="MAX_FILE_SIZE" value="5000000000" />
    <br>
    <input name="userfile" type="file" />
    <input type="hidden" name="upload" value="1" />
    <input type="submit" value="Upload">
    (in .txt/.txt.gz format)
  </div>
</form>

<script type="text/javascript" src="gs_sortable.js"></script>
<script type="text/javascript">
<!--
var TSort_Data = new Array ('results', '', '', 'i', 'f', 'f', 'f', 'f', 'f', 'f');
tsRegister();
// -->
</script>

<div>
<h3>Current Word Vector Representations</h3>
 
<br>
<table border="1" cellpadding="8" align="center" id="results">
<th>Vector<sup>*</sup></th>
<th>Download?</th>
<th>Length</th>
<th>WS-353</th>
<th>Syn-Rel</th>
<th>Sem-Rel</th>
<th>SemEval-12 </th>
<th>Lex Ent</th>
<th>TOEFL</th>
<tr>
  <td align="left">Anon 1</td>
  <td align="center">Yes</td>
  <td align="center">50</td>
  <td align="center">0.56</td>
  <td align="center">0.44</td>
  <td align="center">0.35</td>
  <td align="center">0.48</td>
  <td align="center">0.8</td>
  <td align="center">0.84</td>
</tr>
<tr>
  <td align="left">Anon 2</td>
  <td align="center">No</td>
  <td align="center">50</td>
  <td align="center">0.75</td>
  <td align="center">0.65</td>
  <td align="center">0.71</td>
  <td align="center">0.52</td>
  <td align="center">0.34</td>
  <td align="center">0.88</td>
</tr>
<tr>
  <td align="left">Anon 3</td>
  <td align="center">Yes</td>
  <td align="center">540</td>
  <td align="center">0.55</td>
  <td align="center">0.44</td>
  <td align="center">0.16</td>
  <td align="center">0.27</td>
  <td align="center">0.52</td>
  <td align="center">0.60</td>
</tr>
</table>
<br>
<sup>*</sup>The vector names and values are kept arbitrary currently. 

</body>
</html>