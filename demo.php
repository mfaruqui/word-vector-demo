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
<script type="text/javascript">
  var userWordsInput = '';
    var pairsFound = new Array();
    var resultsFound = new Array();
    var taskNum = new Array();
</script>
 
<?php
  if(isset($_REQUEST["eval-trained"])){
    $vecname = $_POST["vector"]; 
    $userwords = $_POST["userwords"];
    $userwords = trim($userwords);
    ?>
    <script type="text/javascript">userWordsInput = "<?=$userwords?>"</script>
    <?php 
    if ($vecname == "turian") {   
      $vectorfile = 'trained-vecs/turian.txt'; 
    }
    else if ($vecname == "senna") {   
      $vectorfile = 'trained-vecs/senna.txt'; 
    }
    else if ($vecname == "mik-sg"){
      $vectorfile = 'trained-vecs/mik-sg.txt';
    } 
    else if ($vecname == "mik-rnn-80"){
      $vectorfile = 'trained-vecs/mik-rnn-80.txt';
    } 
    else if ($vecname == "mik-rnn-640"){
      $vectorfile = 'trained-vecs/mik-rnn-640.txt';
    }
    else if ($vecname == "socher"){
      $vectorfile = 'trained-vecs/socher.txt';
    } 
    else if ($vecname == "faruqui"){
      $vectorfile = 'trained-vecs/faruqui.txt';
    }
    else {
      die('None of vectors chosen');  
    }
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
  } 
?> 
 
<div>
  <h3>Step 1: Choose Pre-trained Vector</h3>
  <br>
  <form action="" method="POST">
    <table border="1" cellpadding="8" align="center">
      <th>Select?</th>
      <th>Name</th>
      <th>Dimensions</th>
      <th>Vocabulary</th>
      <th>Reference</th>
      <tr>
        <td align="center"><input type="radio" name="vector" value="turian"></input></td>
        <td align="left">Metaoptimize</td>
        <td align="center">50</td>
        <td align="center">268810</td>
        <td align="left"><a href="http://metaoptimize.com/projects/wordreprs/">Turian et al, 2010</a></td>
      </tr>
      <tr>
        <td align="center"><input type="radio" name="vector" value="senna"></input></td>
        <td align="left">Senna</td>
        <td align="center">50</td>
        <td align="center">130000</td>
        <td align="left"><a href="http://ronan.collobert.com/senna/">Collobert et al, 2011</a></td>
      </tr>
      <tr>
        <td align="center"><input type="radio" name="vector" value="mik-rnn-80"></input></td>
        <td align="left">RNN</td>
        <td align="center">80</td>
        <td align="center">82390</td>
        <td align="left"><a href="http://rnnlm.org/">Mikolov et al, 2011</a></td>
      </tr>
      <tr>
        <td align="center"><input type="radio" name="vector" value="mik-rnn-640"></input></td>
        <td align="left">RNN</td>
        <td align="center">640</td>
        <td align="center">82390</td>
        <td align="left"><a href="http://rnnlm.org/">Mikolov et al, 2011</a></td>
      </tr>
    <tr>
        <td align="center"><input type="radio" name="vector" value="socher"></input></td>
        <td align="left">Global Context</td>
        <td align="center">50</td>
        <td align="center">100232</td>
        <td align="left"><a href="http://www.socher.org/index.php/Main/ImprovingWordRepresentationsViaGlobalContextAndMultipleWordPrototypes">Socher et al, 2012</a></td>
      </tr>
      <tr>
        <td align="center"><input type="radio" name="vector" value="mik-sg"></input></td>
        <td align="left">Skip-Gram</td>
        <td align="center">512</td>
        <td align="center">180834</td>
        <td align="left"><a href="http://arxiv.org/abs/1301.3781">Mikolov et al 2013</a></td>
      </tr>
      <tr>
        <td align="center"><input type="radio" name="vector" value="faruqui"></input></td>
        <td align="left">Multilingual</td>
        <td align="center">512</td>
        <td align="center">180834</td>
        <td align="left"><a href="http://cs.cmu.edu/~mfaruqui">Faruqui and Dyer, 2014</a></td>
      </tr>
    </table>
</div>
<div>
  <h3>Step 2: Plot Your Words</h3>
  <br>
  <input id="textField" name="userwords" type="text" style="width: 700px;"></input>
  <br><br> 
  <?php
  if(isset($_REQUEST["eval-trained"])){
    if (strlen($userwords) != 0) {
      echo '<img align="center" src="user.png">';
    }
  }
  ?>
</div>

<div>
  <input type="submit" name="eval-trained" style="margin-left:42%" value="Evaluate" />
  </form>
</div>

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
  if(isset($_REQUEST["eval-trained"])){
    echo '<img align="center" src="set1.png">';
  }
?>
<br><br>
<!--Countries and Capitals<br>
<?php
  if(isset($_REQUEST["eval-trained"])){
    echo '<img align="center" src="set2.png">';
  }
?>
<br><br>-->
Male and Female<br>
<?php
  if(isset($_REQUEST["eval-trained"])){
    echo '<img align="center" src="set3.png">';
  }
?>
</div>
</body>
</html>