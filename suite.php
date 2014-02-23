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

<div>
<h3>Word Pair Similarity</h3>
 
<br>
<table border="1" cellpadding="8" align="center">
<th>No.</th>
<th>Task Name</th>
<th>Word pairs</th>
<th>Reference</th>
<tr>
  <td align="center">1</td>
  <td align="left">WS-353</td>
  <td align="center">353 </td>
  <td align="left"><a href="http://www.cs.technion.ac.il/~gabr/resources/data/wordsim353/"> Finkelstein et. al, 2002</a> </td>
</tr>
<tr>
  <td align="center">2</td>
  <td align="left">WS-353-SIM</td>
  <td align="center"> 203 </td>
  <td align="left"><a href="http://alfonseca.org/eng/research/wordsim353.html">Agirre et. al, 2009</a> </td>
</tr>
<tr>
  <td align="center">3</td>
  <td align="left">WS-353-REL</td>
  <td align="center">252 </td>
  <td align="left"><a href="http://alfonseca.org/eng/research/wordsim353.html">Agirre et. al, 2009</a> </td>
 </tr>
<tr>
  <td align="center">4</td>
  <td align="left">MC-30</td>
  <td align="center">30 </td>
  <td align="left"> <a href="http://www.tandfonline.com/doi/abs/10.1080/01690969108406936#.Uu_392SwIyV"> Miller and Charles, 1930</a> </td>
 </tr>
<tr>
  <td align="center">5</td>
  <td align="left">RG-65</td>
  <td align="center">65 </td>
  <td align="left"><a href="http://dl.acm.org/citation.cfm?id=365657">R and G, 1965</a> </td>
</tr>
<tr>
  <td align="center">6</td>
  <td align="left">Rare-Word</td>
  <td align="center">2034 </td>
  <td align="left"><a href="http://www-nlp.stanford.edu/~lmthang/morphoNLM/">Luong et. al, 2013</a> </td>
</tr>
<tr>
  <td align="center">7</td>
  <td align="left">MEN</td>
  <td align="center">3000 </td>
  <td align="left"><a href="http://clic.cimec.unitn.it/~elia.bruni/MEN.html">Bruni et. al, 2012</a> </td>
</tr>
<tr>
  <td align="center">8</td>
  <td align="left">MTurk-287</td>
  <td align="center">287 </td>
  <td align="left"><a href="http://tx.technion.ac.il/~kirar/Datasets.html">Radinsky et. al, 2011</a> </td>
</tr>
<tr>
  <td align="center">9</td>
  <td align="left">MTurk-771</td>
  <td align="center">771 </td>
  <td align="left"><a href="http://www2.mta.ac.il/~gideon/mturk771.html">Halawi and Dror, 2012</a> </td>
</tr>
<tr>
  <td align="center">10</td>
  <td align="left">YP-130</td>
  <td align="center">130</td>
  <td align="left"><a href="http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.119.1196">Yang and Powers, 2006</a> </td>
</tr>
</table>
</div>

<div>
<h3>Word Relations</h3>
 
<br>
<table border="1" cellpadding="8" align="center">
<th>No.</th>
<th>Task Name</th>
<th>Size</th>
<th>Description</th>
<th>Reference</th>
<tr>
  <td align="center">1</td>
  <td align="left">TOEFL</td>
  <td align="center">80</td>
  <td align="left">Choose closest synonym</td>
  <td align="left"><a href="http://aclweb.org/aclwiki/index.php?title=TOEFL_Synonym_Questions_(State_of_the_art)"> Landauer and Dumais, 1997</a> </td>
</tr>
<tr>
  <td align="center">2</td>
  <td align="left">Syn-Rel</td>
  <td align="center">10765</td>
  <td align="left">Predict syntactic relation</td>
  <td align="left"><a href="https://code.google.com/p/word2vec/">Mikolov et. al, 2013</a> </td>
</tr>
<tr>
  <td align="center">3</td>
  <td align="left">Sem-Rel</td>
  <td align="center">8000</td>
  <td align="left">Predict semantic relation</td>
  <td align="left"><a href="https://code.google.com/p/word2vec/">Mikolov et. al, 2013</a> </td>
</tr>
<tr>
  <td align="center">4</td>
  <td align="left">SAT</td>
  <td align="center">374</td>
  <td align="left">Predict closest relation</td>
  <td align="left"><a href="http://aclweb.org/aclwiki/index.php?title=SAT_Analogy_Questions_(State_of_the_art)">Turney et. al, 2003</a> </td>
</tr>
<tr>
  <td align="center">5</td>
  <td align="left">Colors</td>
  <td align="center">52</td>
  <td align="left">Predict colors of nouns</td>
  <td align="left"><a href="http://aclweb.org/anthology//P/P12/P12-1015.bib">Bruni et. al, 2012</a> </td>
</tr>
<tr>
  <td align="center">6</td>
  <td align="left">BLESS</td>
  <td align="center">26554</td>
  <td align="left">Predict relations b/w two words</td>
  <td align="left"><a href="https://sites.google.com/site/geometricalmodels/shared-evaluation">Baroni and Lenci, 2011</a> </td>
</tr>
<tr>
  <td align="center">7</td>
  <td align="left">Phrase-Sim</td>
  <td align="center">5800</td>
  <td align="left">Predict similarity b/w two bigrams</td>
  <td align="left"><a href="http://homepages.inf.ed.ac.uk/s0453356/">Mitchell and Lapata, 2008</a> </td>
</tr>
<tr>
  <td align="center">8</td>
  <td align="left">Entailment</td>
  <td align="center">2770</td>
  <td align="left">Predict entailment b/w two words</td>
  <td align="left"><a href="http://dl.acm.org/citation.cfm?id=2380822">Baroni et al, 2012</a> </td>
</tr>
<tr>
  <td align="center">9</td>
  <td align="left">SemEval-10 Task-8</td>
  <td align="center">8000</td>
  <td align="left">Predict similarity b/w two words in a sentence</td>
  <td align="left"><a href="https://docs.google.com/document/d/1QO_CnmvNRnYwNWu1-QCAeR5ToQYkXUqFeAJbdEhsq7w/preview">Hendrickx et al, 2010</a> </td>
</tr>
<tr>
  <td align="center">10</td>
  <td align="left">SemEval-12 Task-2</td>
  <td align="center">79</td>
  <td align="left">Predict closest relation</td>
  <td align="left"><a href="https://sites.google.com/site/semeval2012task2/">Jurgens et al, 2012</a> </td>
</tr>
<tr>
  <td align="center">11</td>
  <td align="left">(Non-)Literal</td>
  <td align="center">342</td>
  <td align="left">Predict (non-)literal use in JJ-NN pairs</td>
  <td align="left"><a href="http://gboleda.utcompling.com/resources">Boleda et al, 2012</a> </td>
</tr>
</table>
</div>

<div>
<h3>Other Languages</h3>
 
<br>
<table border="1" cellpadding="8" align="center">
<th>No.</th>
<th>Language</th>
<th>Task Name</th>
<th>Size</th>
<th>Reference</th>
<tr>
  <td align="center">1</td>
  <td align="left">Arabic</td>
  <td align="left">WS-353</td>
  <td align="center">353</td>
  <td align="left"><a href="http://www.samerhassan.com/images/d/d7/Hassan09a.pdf">Hassan and Mihalcea, 2009</a> </td>
</tr>
<tr>
  <td align="center">2</td>
  <td align="left">Arabic</td>
  <td align="left">MC-30</td>
  <td align="center">30</td>
  <td align="left"><a href="http://www.samerhassan.com/images/d/d7/Hassan09a.pdf">Hassan and Mihalcea, 2009</a> </td>
</tr>
<tr>
  <td align="center">3</td>
  <td align="left">French</td>
  <td align="left">WS-353</td>
  <td align="center">353</td>
  <td align="left"><a href="http://www.site.uottawa.ca/~mjoub063/wordsims.htm">Joubarne and Inkpen, 2011</a> </td>
</tr>
<tr>
  <td align="center">4</td>
  <td align="left">German</td>
  <td align="left">RG-65</td>
  <td align="center">65</td>
  <td align="left"><a href="http://www.ukp.tu-darmstadt.de/data/semantic-relatedness/german-relatedness-datasets/">Gurevych, 2005</a> </td>
</tr>
<tr>
  <td align="center">5</td>
  <td align="left">German</td>
  <td align="left">Gur350</td>
  <td align="center">350</td>
  <td align="left"><a href="http://www.ukp.tu-darmstadt.de/data/semantic-relatedness/german-relatedness-datasets/">Gurevych, 2005</a> </td>
</tr>
<tr>
  <td align="center">6</td>
  <td align="left">German</td>
  <td align="left">ZG222</td>
  <td align="center">222</td>
  <td align="left"><a href="http://www.ukp.tu-darmstadt.de/data/semantic-relatedness/german-relatedness-datasets/">Zesch and Gurevych, 2006</a> </td>
</tr>
<tr>
  <td align="center">7</td>
  <td align="left">Romanian</td>
  <td align="left">WS-353</td>
  <td align="center">353</td>
  <td align="left"><a href="http://www.samerhassan.com/images/d/d7/Hassan09a.pdf">Hassan and Mihalcea, 2009</a> </td>
</tr>
<tr>
  <td align="center">8</td>
  <td align="left">Romanian</td>
  <td align="left">MC-30</td>
  <td align="center">30</td>
  <td align="left"><a href="http://www.samerhassan.com/images/d/d7/Hassan09a.pdf">Hassan and Mihalcea, 2009</a> </td>
</tr>
<tr>
  <td align="center">9</td>
  <td align="left">Spanish</td>
  <td align="left">WS-353</td>
  <td align="center">353</td>
  <td align="left"><a href="http://www.samerhassan.com/images/d/d7/Hassan09a.pdf">Hassan and Mihalcea, 2009</a> </td>
</tr>
<tr>
  <td align="center">10</td>
  <td align="left">Spanish</td>
  <td align="left">MC-30</td>
  <td align="center">30</td>
  <td align="left"><a href="http://www.samerhassan.com/images/d/d7/Hassan09a.pdf">Hassan and Mihalcea, 2009</a> </td>
</tr>
</table>
</div>
 
</body>
</html>