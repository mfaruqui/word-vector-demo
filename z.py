import sys
import pickle
import numpy

words, embeddings = pickle.load(open(sys.argv[1], 'rb'))

for word in words:
  print word.encode('utf-8'),
  if word not in embeddings: continue
  for val in embeddings[word]:
    print val,
  print
