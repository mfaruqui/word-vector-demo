<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>WordVec Demo</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/pygments.css">

</head>

<body>
<header>
<h2>Word Vector Evaluation</h2>
</header>

<div id="content" >

<?php
  if(isset($_REQUEST["made_upload"])){
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'user-vecs/'.$_FILES['userfile']['name'])) {
      $vectorfile = 'user-vecs/'.$_FILES['userfile']['name'];
      
      //error_reporting(E_ALL);
      //$handle = popen('python sample-script.py '.$vectorfile.' 2>&1', 'r');
      //while (($buffer = fgets($handle, 4096)) !== false) {
      //    echo $buffer."<br>";
      //}
      //pclose($handle);
      
      $command = 'python -W ignore sample-script.py '.$vectorfile.' 2>&1';
      $temp = exec($command, $output);
      foreach ($output as &$value) {
        list($notFound, $corr) = split(" ", $value);
        print $notFound." ".$corr."<br/>";
      }
    } else {
      print "Could not upload file.";
    }
    print "</td></tr></table>";
  }
?>

<form enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="5000000000" />
    <h3>Upload Your Vectors (in .txt format):</h3> 
    <br>
    <input name="userfile" type="file" />
    <input type="submit" value="Upload" />
    <input type="hidden" name="made_upload" value="1" />
</form>

<br>

<h3>Word Similarity Tasks<h3>

<br>
<table border="1" cellpadding="8" align="center">
<th>No.</th>
<th>Task Name</th>
<th>Word pairs</th>
<th>Reference</th>
<th>Pairs found</th>
<th>Result</th>
<tr>
  <td align="center">1</td>
  <td align="center">WS-353</td>
  <td align="center">353 </td>
  <td align="center"><a href="http://www.cs.technion.ac.il/~gabr/resources/data/wordsim353/"> Finkelstein et. al, 2002</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
<tr>
  <td align="center">2</td>
  <td align="center">WS-353-SIM</td>
  <td align="center"> 203 </td>
  <td align="center"><a href="http://alfonseca.org/eng/research/wordsim353.html">Agirre et. al, 2009</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
<tr>
  <td align="center">3</td>
  <td align="center">WS-353-REL</td>
  <td align="center">252 </td>
  <td align="center"><a href="http://alfonseca.org/eng/research/wordsim353.html">Agirre et. al, 2009</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
<tr>
  <td align="center">4</td>
  <td align="center">MC-30</td>
  <td align="center">30 </td>
  <td align="center"> <a href="http://www.tandfonline.com/doi/abs/10.1080/01690969108406936#.Uu_392SwIyV"> Miller and Charles, 1930</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
<tr>
  <td align="center">5</td>
  <td align="center">RG-65</td>
  <td align="center">65 </td>
  <td align="center"><a href="http://dl.acm.org/citation.cfm?id=365657">R and G, 1965</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
<tr>
  <td align="center">6</td>
  <td align="center">Rare-Word</td>
  <td align="center">2034 </td>
  <td align="center"><a href="http://www-nlp.stanford.edu/~lmthang/morphoNLM/">Luong et. al, 2013</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
<tr>
  <td align="center">7</td>
  <td align="center">MEN-TR</td>
  <td align="center">3000 </td>
  <td align="center"><a href="http://clic.cimec.unitn.it/~elia.bruni/MEN.html">Bruni et. al, 2012</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
<tr>
  <td align="center">8</td>
  <td align="center">MTurk-287</td>
  <td align="center">287 </td>
  <td align="center"><a href="http://tx.technion.ac.il/~kirar/Datasets.html">Radinsky et. al, 2011</a> </td>
  <td align="center"> </td>
  <td align="center"> </td> 
</tr>
</table>

<br>

<h3>Word Plots<h3>

<?php
  if(isset($_REQUEST["made_upload"])){
    echo '<img src="set1.png" align = "center">';
  }
?>
  
</div>
</body>
</html>
