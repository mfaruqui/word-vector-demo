import sys, os
import gzip
import math
import numpy
from operator import itemgetter
from numpy.linalg import norm

from tsne import plot_words

def read_word_vectors(fileObj):
  
  wordVectors = {}
  for lineNum, line in enumerate(fileObj):
    line = line.strip().lower()
    word = line.split()[0]
    wordVectors[word] = numpy.zeros(len(line.split())-1, dtype=float)
    for index, vecVal in enumerate(line.split()[1:]):
      wordVectors[word][index] = float(vecVal)
      
  ''' normalize weight vector '''
  wordVectors[word] /= math.sqrt((wordVectors[word]**2).sum() + 1e-6)
  return wordVectors
  
def assign_ranks(itemDict):
  rankedDict = {}
  rank = 0
  for key, val in sorted(itemDict.items(), key=itemgetter(1), reverse=True):
    rankedDict[key] = rank
    rank += 1
  return rankedDict
  
def spearmans_rho(rankedDict1, rankedDict2):
  assert len(rankedDict1) == len(rankedDict2)
  if len(rankedDict1) <= 1: return 0
  x_avg = sum([val for val in rankedDict1.values()])/len(rankedDict1)
  y_avg = sum([val for val in rankedDict2.values()])/len(rankedDict2)

  num = 0.
  for key in rankedDict1.keys():
    xi = rankedDict1[key]
    yi = rankedDict2[key]
    num += (xi-yi)**2

  n = 1.*len(rankedDict1)
  return 1-6*num/(n*(n*n-1))
  
def cosine_sim(vec1, vec2):
  return vec1.dot(vec2)/(norm(vec1)*norm(vec2))
  
def word_sim_tasks(wordVectors):
  
  FILES = ['data/EN-WS-353-ALL.txt', 'data/EN-WS-353-SIM.txt', \
           'data/EN-WS-353-REL.txt','data/EN-MC-30.txt', 'data/EN-RG-65.txt',\
           'data/EN-RW-STANFORD.txt', 'data/EN-MEN-TR-3k.txt', \
           'data/EN-MTurk-287.txt']
  for i, FILE in enumerate(FILES):
    manualDict, autoDict = ({}, {})
    notFound, totalSize = (0, 0)
    for line in open(FILE, 'r'):
      line = line.strip().lower()
      word1, word2, val = line.split()
      if word1 in wordVectors and word2 in wordVectors:
        manualDict[(word1, word2)] = float(val)
        autoDict[(word1, word2)] = cosine_sim(wordVectors[word1], wordVectors[word2])
      else:
        notFound += 1
        totalSize += 1
    correlation = spearmans_rho(assign_ranks(manualDict), assign_ranks(autoDict)) 
    print i+1, notFound, "%.4f" %correlation
      
if __name__=='__main__':

  fileName = sys.argv[1]
  if fileName.endswith('.txt'): fileObj = open(fileName, 'r')
  elif fileName.endswith('.gz'): fileObj = gzip.open(fileName, 'r')
  wordVectors = read_word_vectors(fileObj)
  
  word_sim_tasks(wordVectors)
  
  ''' Set 1 words: Synonyms and antonyms of 'beautiful' '''
  set1p = ["beautiful", "pretty", "splendid", "elegant", "marvelous", "magnificent", "charming", "cute", "gorgeous"]
  set1n = ["ugly", "awful", "foul", "hideous", "grotesque", "beastly", "horrid"]
  plot_words(wordVectors, set1p, set1n, 'set1.png')
  
  