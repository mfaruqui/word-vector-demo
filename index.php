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
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<script type="text/javascript">
  var userWordsInput = '';
    var pairsFound = new Array();
    var resultsFound = new Array();
    var taskNum = new Array();
</script>
<?php
  if(isset($_REQUEST["upload"])){
    $userwords = $_POST["userwords"];
    $userwords = trim($userwords);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'user-vecs/'.$_FILES['userfile']['name'])) {
      $vectorfile = 'user-vecs/'.$_FILES['userfile']['name'];
      $command = 'python -W ignore sample-script.py '.$vectorfile.' '.$userwords;
      $temp = exec($command, $output);
      foreach ($output as &$value) {
        list($taskNum, $notFound, $corr) = split(" ", $value);
        ?>
        <script type="text/javascript">
          pairsFound.push('<?=$notFound?>');
          resultsFound.push('<?=$corr?>');
          taskNum.push('<?=$taskNum?>');
        </script>
        <?php
      }
    } else {
      print "Could not upload file.";
    }
    print "</td></tr></table>";
  }
?>

<div>
<form enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="5000000000" />
    <h3>Step 1: Filter Your Vectors</h3>
    <br>
    Your vectors should be in the following format:<br>
    <pre class="prettyprint">
    london 0.102 -4.31 -0.003 ...
    paris -1.23 3.450 -0.03 ...
    </pre>
    Download the following <a href="fullVocab.txt">vocabulary</a> file and 
    <a href="filterVocab.py">script</a> and run:<br>
    <pre class="prettyprint">
    python filterVocab.py fullVocab.txt &lt; yourVectors(.txt/.txt.gz) &gt; filtVectors.txt
    </pre>
    Now you can upload the filtered vectors!
</div>
 
<div>
<form enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="5000000000" />
    <h3>Step 2: Upload Filtered Vectors:</h3>
    <br>
    <input name="userfile" type="file" />
    <input type="hidden" name="upload" value="1" />
    (in .txt/.txt.gz format)
</div>
<div>
  <h3>Step 3: Plot Your Words</h3>
  <input id="textField" name="userwords" type="text" style="width: 700px;"></input>
  <?php
    if(isset($_REQUEST["upload"])){
      if (strlen($userwords) != 0) {
        echo '<img align="center" src="user.png">';
      }
    }
  ?>
</div>
<div>
<input style="margin-left: 42%;" type="submit" value="Evaluate">
</div>
</form>

<div>
<h3>Word Pair Similarity Ranking</h3>
 
<br>
<table border="1" cellpadding="8" align="center">
<th>No.</th>
<th>Task Name</th>
<th>Word pairs</th>
<th>Reference</th>
<th>Pairs found</th>
<th><a href="http://en.wikipedia.org/wiki/Spearman's_rank_correlation_coefficient">Correlation</a></th>
<tr>
  <td align="center">1</td>
  <td align="left">WS-353</td>
  <td align="center">353 </td>
  <td align="left"><a href="http://www.cs.technion.ac.il/~gabr/resources/data/wordsim353/"> Finkelstein et. al, 2002</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">2</td>
  <td align="left">WS-353-SIM</td>
  <td align="center"> 203 </td>
  <td align="left"><a href="http://alfonseca.org/eng/research/wordsim353.html">Agirre et. al, 2009</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">3</td>
  <td align="left">WS-353-REL</td>
  <td align="center">252 </td>
  <td align="left"><a href="http://alfonseca.org/eng/research/wordsim353.html">Agirre et. al, 2009</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">4</td>
  <td align="left">MC-30</td>
  <td align="center">30 </td>
  <td align="left"> <a href="http://www.tandfonline.com/doi/abs/10.1080/01690969108406936#.Uu_392SwIyV"> Miller and Charles, 1930</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">5</td>
  <td align="left">RG-65</td>
  <td align="center">65 </td>
  <td align="left"><a href="http://dl.acm.org/citation.cfm?id=365657">R and G, 1965</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">6</td>
  <td align="left">Rare-Word</td>
  <td align="center">2034 </td>
  <td align="left"><a href="http://www-nlp.stanford.edu/~lmthang/morphoNLM/">Luong et. al, 2013</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">7</td>
  <td align="left">MEN</td>
  <td align="center">3000 </td>
  <td align="left"><a href="http://clic.cimec.unitn.it/~elia.bruni/MEN.html">Bruni et. al, 2012</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">8</td>
  <td align="left">MTurk-287</td>
  <td align="center">287 </td>
  <td align="left"><a href="http://tx.technion.ac.il/~kirar/Datasets.html">Radinsky et. al, 2011</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">9</td>
  <td align="left">MTurk-771</td>
  <td align="center">771 </td>
  <td align="left"><a href="http://www2.mta.ac.il/~gideon/mturk771.html">Halawi and Dror, 2012</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
<tr>
  <td align="center">10</td>
  <td align="left">YP-130</td>
  <td align="center">130</td>
  <td align="left"><a href="http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.119.1196">Yang and Powers, 2006</a> </td>
  <td align="center" class="pairs"> </td>
  <td align="center" class="result"> </td> 
</tr>
</table>
 
<script type="text/javascript">
for(var index in taskNum){
 var taskId = taskNum[index];
 taskId = taskId - 1;
 var pairVal = pairsFound[taskId];
 var resultVal = resultsFound[taskId];
 $($(".result")[taskId]).html(resultVal);
 $($(".pairs")[taskId]).html(pairVal);
}
</script>
 
</div>
 
<div>
   
<h3>Default Word Plots</h3>
<a href="http://homepage.tudelft.nl/19j49/t-SNE.html">t-SNE tool, Maaten and Hinton 2008</a>
<br><br>
Antonym and Synonyms<br>
<?php
  if(isset($_REQUEST["upload"]) || isset($_REQUEST["eval-trained"])){
    echo '<img align="center" src="set1.png">';
  }
?>
<br><br>
<!--Countries and Capitals<br>
<?php
  if(isset($_REQUEST["upload"]) || isset($_REQUEST["eval-trained"])){
    echo '<img align="center" src="set2.png">';
  }
?>
<br><br>-->
Male and Female<br>
<?php
  if(isset($_REQUEST["upload"]) || isset($_REQUEST["eval-trained"])){
    echo '<img align="center" src="set3.png">';
  }
?>
</div>
</body>
</html>